<?php


namespace App\Modules\Project\Http\Requests;


use App\Modules\Project\Entities\ProjectDocuments;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProjectFilesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */



    public function rules()
    {

        return [
             'project_id'         =>'required',
             'file_documents_id'  =>'required',
             'publish'            =>'required',
        ];

    }


    public function docs()
    {
        $documents_id   = $this->input('file_documents_id');
        $file           = $this->file('image');
        $name           = $this->input('name');
        $publish        = $this->input('publish');
        $project_id     = $this->input('project_id');
        $extension      = $file->getClientOriginalExtension();

        if(empty($name)){
            $name = $file->getClientOriginalName();
        }


        $document = ProjectDocuments::create([
            'project_id'          => $project_id,
            'extension'           => $extension,
            'publish'             => $publish,
            'file_documents_id'   => $documents_id,
            'name'                => $name
        ]);

        Storage::disk('documents')->put('project/'.$document->project_id.'/'.$document->id.'.'.$document->extension, File::get($file));
        Session::flash('success', 'Operação realizada com sucesso');
        return $document;


    }
}
