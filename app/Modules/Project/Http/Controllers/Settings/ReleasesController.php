<?php


namespace App\Modules\Project\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Modules\Project\Http\Requests\ProjectFilesRequest;
use App\Modules\Project\Repositories\ProjectRepository;
use App\Repositories\FileDocsRepository;


class ReleasesController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var FileDocsRepository
     */
    private $fileDocsRepository;


    public function __construct(ProjectRepository $projectRepository,
                                FileDocsRepository $fileDocsRepository)
    {


        $this->projectRepository = $projectRepository;
        $this->fileDocsRepository = $fileDocsRepository;
    }


    public function index($project_id)
    {

        $project = $this->projectRepository->find($project_id);
        $files = $this->fileDocsRepository->pluck('name','id');

        return view('project::settings.index', compact('project','files'));

    }


    public function publish(ProjectFilesRequest $request)
    {
        $request->docs();
        return redirect()->back();
    }



}
