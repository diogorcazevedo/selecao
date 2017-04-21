<?php

namespace App\Modules\Academy\Repositories;


use App\Modules\Academy\Entities\ItemImages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ItemImagesRepository
{


    /**
     * @var ItemImages
     */
    private $itemImages;

    public function __construct(ItemImages $itemImages)
    {

        $this->itemImages = $itemImages;
    }


    public function store($request,$id){

        \DB::beginTransaction();
        try {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $img_id = $request->input('file_images_id');

            $img = $this->itemImages->create([
                            'item_id'             => $id,
                            'extension'           => $extension,
                            'position'            => $request->input('position'),
                            'file_images_id'      => $img_id,
                            'name'                => $name
                        ]);


            $w = $img->image->width;
            $h = $img->image->height;

            if(!is_null($w) or !is_null($h)){

                $image  = Image::make($file)->resize($w,$h)->save();
                Storage::disk('images')->put('items/'.$img->item_id.'/'.$img->id.'.'.$img->extension, $image);
            }else{
                Storage::disk('images')->put('items/'.$img->item_id.'/'.$img->id.'.'.$img->extension, File::get($file));
            }


            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public  function destroy($file){

        $this->itemImages->find($file)->delete();


    }

}
