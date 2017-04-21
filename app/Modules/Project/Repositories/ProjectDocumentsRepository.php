<?php

namespace App\Modules\Project\Repositories;

use App\Entities\OrderDocuments;
use App\Modules\Project\Entities\ProjectDocuments;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProjectDocumentsRepository
{


    /**
     * @var ProjectDocuments
     */
    private $projectDocuments;

    public function __construct(ProjectDocuments $projectDocuments)
    {


        $this->projectDocuments = $projectDocuments;
    }




    public function store($request,$project_id){



        $file = $request->file('image');
        $name = $request->input('name');
        $extension = $file->getClientOriginalExtension();

        if(empty($name)){
            $name = $file->getClientOriginalName();
        }

        $documents_id = $request->input('file_documents_id');

        $document = $this->projectDocuments->create([
            'project_id'          => $project_id,
            'extension'           => $extension,
            'file_documents_id'   => $documents_id,
            'name'                => $name
        ]);



        Storage::disk('documents')->put('project/'.$document->project_id.'/'.$document->id.'.'.$document->extension, File::get($file));

        return $document;



    }

}
