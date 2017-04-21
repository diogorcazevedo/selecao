<?php


namespace App\Modules\Academy\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Academy\Repositories\QuestionChoicesRepository;
use App\Modules\Academy\Repositories\QuestionImagesRepository;
use App\Modules\Academy\Repositories\QuestionRepository;
use Illuminate\Support\Facades\Session;
use App\Modules\Academy\Http\Requests\QuestionsRequest;


class QuestionsController extends Controller
{

    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var QuestionChoicesRepository
     */
    private $questionChoicesRepository;
    /**
     * @var QuestionImagesRepository
     */
    private $questionImagesRepository;

    public function __construct(QuestionRepository $questionRepository,
                                QuestionChoicesRepository $questionChoicesRepository,
                                QuestionImagesRepository $questionImagesRepository)

    {


        $this->questionRepository = $questionRepository;
        $this->questionChoicesRepository = $questionChoicesRepository;
        $this->questionImagesRepository = $questionImagesRepository;
    }




    public function store(QuestionsRequest $request)
    {

        $question = $request->persist();

        if($request->hasFile('image')) {
            $this->questionImagesRepository->store($request, $question->id);
        }

         Session::put('success', 'Operação realizada com sucesso');
         //return redirect()->route('items.edit',['item_id'=>$question->item->id,'user_id'=>$question->item->user_id]);
        return redirect()->away($request->input("url"));

    }

    public function update(QuestionsRequest $request, $id)
    {

        $request->update();
        $request->all();


        if($request->hasFile('image')) {
            $this->questionImagesRepository->store($request, $id);
        }
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->away($request->input("url"));
    }

    public function destroy($id)
    {

        $this->questionRepository->delete($id);
        Session::flash('success', 'Operação realizada com sucesso');

        return redirect()->back();

    }

    public function destroyImg($id)
    {

        $this->questionImagesRepository->destroy($id);
        Session::flash('error', 'Operação realizada com sucesso');

        return redirect()->back();

    }



}
