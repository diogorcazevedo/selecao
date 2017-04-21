<?php

namespace App\Modules\Academy\Repositories;



use App\Modules\Academy\Entities\QuestionImages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class QuestionImagesRepository
{


    /**
     * @var QuestionImages
     */
    private $questionImages;

    public function __construct(QuestionImages $questionImages)
    {


        $this->questionImages = $questionImages;
    }


    public function store($request,$id){

        \DB::beginTransaction();
        try {


            $file           = $request->file('image');
            $extension      = $file->getClientOriginalExtension();
            $name           = $file->getClientOriginalName();
            $img_id         = $request->input('file_images_id');

            $img = $this->questionImages->create([
                            'question_id'         => $id,
                            'extension'           => $extension,
                            'position'            => $request->input('position'),
                            'file_images_id'      => $img_id,
                            'name'                => $name
                        ]);


            $w = $img->image->width;
            $h = $img->image->height;

            if(!is_null($w) or !is_null($h)){

                $image  = Image::make($file)->resize($w,$h)->save();
                Storage::disk('images')->put('questions/'.$img->question_id.'/'.$img->id.'.'.$img->extension, $image);
            }else{
                Storage::disk('images')->put('questions/'.$img->question_id.'/'.$img->id.'.'.$img->extension, File::get($file));
            }


            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public  function destroy($file){

        $this->questionImages->find($file)->delete();


    }

}
