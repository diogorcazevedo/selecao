<?php


namespace App\Modules\Academy\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Academy\Entities\Item;
use App\Modules\Academy\Entities\ProgramItems;
use App\Modules\Academy\Http\Requests\ItemsRequest;

use App\Modules\Academy\Repositories\ItemImagesRepository;
use App\Modules\Academy\Repositories\ItemRepository;
use App\Modules\Academy\Repositories\ProgramItemsRepository;
use App\Modules\Academy\Repositories\QuestionChoicesRepository;
use App\Modules\Academy\Repositories\QuestionRepository;
use Illuminate\Support\Facades\Session;


class ItemsController extends Controller
{


    /**
     * @var ItemRepository
     */
    private $itemRepository;
    /**
     * @var ItemImagesRepository
     */
    private $itemImagesRepository;
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var QuestionChoicesRepository
     */
    private $questionChoicesRepository;
    /**
     * @var ProgramItemsRepository
     */
    private $programItemsRepository;


    public function __construct(ItemRepository $itemRepository,
                                ItemImagesRepository $itemImagesRepository,
                                QuestionRepository $questionRepository,
                                QuestionChoicesRepository $questionChoicesRepository,
                                ProgramItemsRepository $programItemsRepository)

    {


        $this->itemRepository = $itemRepository;
        $this->itemImagesRepository = $itemImagesRepository;
        $this->questionRepository = $questionRepository;
        $this->questionChoicesRepository = $questionChoicesRepository;
        $this->programItemsRepository = $programItemsRepository;
    }

    public function save($item_id,$status)
    {
        //Edict informa com quem está o item (administrador ou professor)

        //0  = primeira fase (construcao) - NOVO
        //1  = enviado para análise e em análise -  ITEM EM ANÁLISE PELA COORDENAÇÃO
        //999  =  DESCARTADO
        //50  = PRONTO PARA USO
        //100  = PUBLICAR NO SITE


        $item = $this->itemRepository->find($item_id);
        $item->status = $status;
        $item->save();

        Session::put('success', 'Operação realizada com sucesso');
        return redirect()->back();

    }




    public function store(ItemsRequest $request)
    {

        $item = $request->persist();
        $data = $request->all();


        if($request->hasFile('image')) {
            $this->itemImagesRepository->store($request, $item->id);
        }
        for($contador = 0; $contador < $data['qtd']; $contador++)
        {
            $pergunta = $contador + 1;
            $data['item_id']=$item->id;
            $data['description']='Pergunta: '. $pergunta;
            $question = $this->questionRepository->create($data);

            for($cont = 0; $cont < $data['choices']; $cont++)
            {
                $resposta = $cont + 1;
                $data['question_id']=$question->id;
                $data['description']='Resposta: '. $resposta;
                $this->questionChoicesRepository->create($data);

            }

        }


        Session::flash('success', 'Operação realizada com sucesso');

        return redirect()->route($data['url'],['item_id'=>$item->id]);

    }



    public function update(ItemsRequest $request, $id)
    {

        $request->update();
        $request->all();


        if($request->hasFile('image')) {
            $this->itemImagesRepository->store($request, $id);
        }
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->away($request->input("url"));
    }

    public function destroy($id)
    {

        $this->itemRepository->delete($id);
        Session::flash('success', 'Operação realizada com sucesso');

        return redirect()->route('items.index');

    }

    public function destroyImg($id)
    {

        $this->itemImagesRepository->destroy($id);
        Session::flash('error', 'Operação realizada com sucesso');

        return redirect()->back();

    }



    public function addProgram($programItems,$item)
    {
        $programItems = $this->programItemsRepository->find($programItems);
        $item = $this->itemRepository->find($item);
        $this->itemRepository->addProgramItem($programItems,$item);
        return redirect()->back();

    }

    public function revokeProgram($programItems, $item)
    {

        $programItems = $this->programItemsRepository->find($programItems);
        $item = $this->itemRepository->find($item);
        $this->itemRepository->revokeProgramItem($programItems,$item);
        return redirect()->back();

    }


}
