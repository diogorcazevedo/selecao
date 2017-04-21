<?php


namespace App\Modules\Project\Http\Controllers\Reports;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Project\Repositories\ProjectRepository;


class RegistersController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {

        $this->projectRepository = $projectRepository;
    }

    public function cities($project_id)

    {

        $registers = $this->projectRepository->getRegisterByLocal($project_id);

        if(count($registers)>0){

            foreach($registers as $register){
                $mensagem = arraylocais()["$register->local"];
                $local[] = $mensagem;
                $count_row[] =  $register->count_row;
            }


        }else{
            $local[] ='sem dados';
            $count_row[] = '0';
        }


        $project = $this->projectRepository->find($project_id);


        return view('project::reports.registers.cities', compact('project','local','count_row'));

    }


    public function jobs($project_id)

    {

        $registers = $this->projectRepository->getRegisterByJob($project_id);


        if(count($registers)>0){

            foreach($registers as $register){
                $mensagem = $register->name;
                $local[] = $mensagem;
                $count_row[] =  $register->count_row;
            }


        }else{
            $local[] ='sem dados';
            $count_row[] = '0';
        }


        $project = $this->projectRepository->find($project_id);


        return view('project::reports.registers.jobs', compact('project','local','count_row'));

    }

}
