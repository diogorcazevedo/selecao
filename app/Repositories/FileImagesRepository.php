<?php

namespace App\Repositories;


use App\Entities\FileImages;

class FileImagesRepository
{


    /**
     * @var FileImages
     */
    private $fileImages;

    public function __construct(FileImages $fileImages)
    {

        $this->fileImages = $fileImages;
    }


    public function find($id)
    {
        return $this->fileImages->find($id);
    }

    public function pluck()
    {
        return $this->fileImages->pluck('name','id');
    }

}
