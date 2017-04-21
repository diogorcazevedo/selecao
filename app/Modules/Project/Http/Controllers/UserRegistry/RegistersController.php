<?php


namespace App\Modules\Project\Http\Controllers\UserRegistry;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Project\Entities\Job;
use App\Modules\Project\Http\Requests\UserRegistry\Registers\EditRequest;
use App\Modules\Project\Http\Requests\UserRegistry\Registers\StoreRequest;
use App\Modules\Project\Repositories\ProjectRepository;
use Illuminate\Support\Facades\URL;


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



    public function create(User $user,Job $job)
    {

        $cities = $this->projectRepository->getProjectCities($job)->pluck('name','id');
        $url = URL::previous();

        return view('project::UserRegistry.registers.create', compact('job', 'url', 'user','cities'));

    }


    public function store(StoreRequest $request){

        $register = $request->persist();

        return redirect(route('project.registers.preview',['register'=>$register->id]));
    }

    public function update(EditRequest $request,$register)
    {

        $request->persist($register);

        return redirect()->away($request->input("url"));

    }


    public function destroy($id)
    {

        $this->repository->find($id)->delete();
        return redirect()->back();

    }

}
