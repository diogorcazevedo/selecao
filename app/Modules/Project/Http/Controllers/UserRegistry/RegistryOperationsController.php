<?php


namespace App\Modules\Project\Http\Controllers\UserRegistry;
use App\Http\Controllers\Controller;
use App\Modules\Project\Entities\Register;
use App\Modules\Project\Repositories\RegisterRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;


class RegistryOperationsController extends Controller
{

    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var RegisterRepository
     */
    private $registerRepository;

    public function __construct(UsersRepository $usersRepository,
                                RegisterRepository $registerRepository)
    {

        $this->usersRepository = $usersRepository;
        $this->registerRepository = $registerRepository;
    }



    public function checkCPF(Request $request, $profile, $job)
    {
        $cpf = $request->input('cpf');
        $user = $this->usersRepository->getUserByCPF($cpf)->first();

        if (count($user) > 0) {
            $this->registerRepository->redirectToLogin();
            return redirect()->route('project.registers.create', ['job' => $job, 'user' => $user->id]);
        } else {
            return redirect()->route('authentication.registrations.create', ['profile' => $profile, 'job' => $job]);
        }


    }


    public function preview(Register $register)
    {
        return view('project::UserRegistry.preview', compact('register'));

    }

    public function getRegistersByCPF(Request $request = null)
    {

        if (!empty($request->all())) {

            $this->validate($request, ['cpf'   => 'required|size:14']);
            $cpf = $request->input('cpf');
            $user = $this->usersRepository->findByField('cpf',$cpf)->first();
            $registers = $this->registerRepository->getRegistersProjectInscricaoAbertaByUsers($user->id)->get();

            return view('project::UserRegistry.getRegistersByCPF',compact('registers'));
        }



        return view('project::UserRegistry.getRegistersByCPF');


    }





    /*
    public function local($register_id,$local)
    {

        $register = $this->repository->find($register_id);
        $register->local =  $local;
        $register->save();
        return redirect()->back();

    }
    */


}
