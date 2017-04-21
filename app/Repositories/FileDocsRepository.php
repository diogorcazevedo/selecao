<?php

namespace App\Repositories;


use App\Entities\FileDocuments;


class FileDocsRepository
{


    /**
     * @var FileDocuments
     */
    private $fileDocuments;

    public function __construct(FileDocuments $fileDocuments)
    {


        $this->fileDocuments = $fileDocuments;
    }


    public function find($id)
    {
        return $this->fileDocuments->find($id);
    }

    public function pluck()
    {
        return $this->fileDocuments->pluck('name','id');
    }

}
