<?php


namespace App\Modules\Project\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use Barryvdh\DomPDF\Facade as PDF;


class GenerateController extends Controller
{


    /**
     * @var UsersRepository
     */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function view()
    {
        $user = $this->usersRepository->find(1);

        return view('project::exams.generate.view',compact('user'));


    }
    public function pdf()
    {
        $user = $this->usersRepository->find(1);
        $pdf = PDF::loadView('project::exams.generate.pdf', compact('user'));
        return $pdf->download('invoice.pdf');


    }



}
