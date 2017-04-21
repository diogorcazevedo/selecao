<?php


namespace App\Modules\Academy\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Academy\Http\Requests\QuestionChoicesRequest;
use App\Modules\Academy\Repositories\QuestionChoicesRepository;
use Illuminate\Support\Facades\Session;


class QuestionChoicesController extends Controller
{


    /**
     * @var QuestionChoicesRepository
     */
    private $questionChoicesRepository;

    public function __construct(QuestionChoicesRepository $questionChoicesRepository)

    {


        $this->questionChoicesRepository = $questionChoicesRepository;
    }


    public function update(QuestionChoicesRequest $request, $id)
    {

        $request->update();
        $request->all();

        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->away($request->input("url"));
    }

    public function destroy($id)
    {

        $this->questionChoicesRepository->delete($id);
        Session::flash('success', 'Operação realizada com sucesso');

        return redirect()->back();

    }



}
