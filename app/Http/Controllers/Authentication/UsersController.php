<?php


namespace App\Http\Controllers\Authentication;


use App\Http\Requests\Authentication\Registration\EditRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\Registration\PasswordRequest;

class UsersController extends Controller
{


    /**
     * @var User
     */
    private $user;
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    public function __construct(User $user, UsersRepository $usersRepository)

    {
        $this->user = $user;
        $this->usersRepository = $usersRepository;
    }


    public function index(Request $requests)
    {
        $users = $this->usersRepository->getUsers($requests)->paginate(15);
        $search = $requests->search;

        return view('authentication.registrations.index', compact('users','search'));
    }



    public function edit($id)
    {
        $url = URL::previous();
        $user = $this->user->find($id);
        $user->complement->birthdate = birthdate($user->complement->birthdate);

        return view('authentication.registrations.edit', compact('user','url'));

    }

    public function update(EditRequest $request)
    {

        $request->persist();
        return redirect()->away($request->input("url"));

    }

    public function password($id)
    {

        $url = URL::previous();
        $user = $this->user->find($id);

        return view('authentication.registrations.password', compact('user','url'));

    }

    public function updatePassword(PasswordRequest $request)
    {

        $request->persist();
        return redirect()->away($request->input("url"));
    }

}
