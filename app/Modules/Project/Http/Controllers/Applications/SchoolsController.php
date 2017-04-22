<?php


namespace App\Modules\Project\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use App\Modules\Project\Entities\SchoolBlockFloorClassrooms;
use App\Modules\Project\Entities\SchoolBlockFloors;
use App\Modules\Project\Entities\SchoolBlocks;
use App\Modules\Project\Http\Requests\School\SchoolRequest;
use App\Modules\Project\Http\Requests\School\ConfigRequest;
use App\Modules\Project\Http\Requests\School\EditRequest;
use App\Modules\Project\Entities\School;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


class SchoolsController extends Controller
{

    /**
     * @var School
     */
    private $school;
    /**
     * @var SchoolBlocks
     */
    private $schoolBlocks;
    /**
     * @var SchoolBlockFloors
     */
    private $schoolBlockFloors;
    /**
     * @var SchoolBlockFloorClassrooms
     */
    private $schoolBlockFloorClassrooms;

    public function __construct(School $school,
                                SchoolBlocks $schoolBlocks,
                                SchoolBlockFloors $schoolBlockFloors,
                                SchoolBlockFloorClassrooms $schoolBlockFloorClassrooms)
    {

        $this->school = $school;
        $this->schoolBlocks = $schoolBlocks;
        $this->schoolBlockFloors = $schoolBlockFloors;
        $this->schoolBlockFloorClassrooms = $schoolBlockFloorClassrooms;
    }


    public function index()
    {
        $schools = $this->school->paginate();


        return view('project::applications.schools.index', compact('schools'));
    }

    public function create()
    {
        $url = URL::previous();
        return view('project::applications.schools.create', compact('url'));
    }

    public function store(SchoolRequest $request)
    {
        $request->persist();
        return redirect()->away($request->input("url"));
    }


    public function edit($id)
    {
        $url = URL::previous();
        $school = $this->school->find($id);
        return view('project::applications.schools.edit', compact('school','url'));

    }
    public function update(SchoolRequest $request)
    {
        $request->update();
        return redirect()->away($request->input("url"));
    }


    public function config($id)
    {

        $url = URL::previous();
        $school = $this->school->find($id);
        return view('project::applications.schools.config', compact('school','url'));

    }

    public function make(ConfigRequest $request)
    {
        $request->persist();
        return redirect()->back();
    }


    public function blocks(EditRequest $request)
    {
        $request->blocks();
        return redirect()->back();
    }

    public function floors(EditRequest $request)
    {
        $request->floors();
        return redirect()->back();
    }
    public function classrooms(EditRequest $request)
    {
        $request->classrooms();
        return redirect()->back();
    }


    public function destroy($id)
    {
        $this->school->find($id)->delete();
        Session::flash('success', 'Excluido com sucesso');
        return redirect()->back();

    }

    public function addfloor($id,$classes)
    {
        $block = $this->schoolBlocks->find($id);
        $floor = new SchoolBlockFloors;
        $floor->school_id = $block->school_id;
        $floor->block_id = $block->id;
        $floor->name = 'novo';
        $floor->classrooms = 1;
        $floor->save();

        for($i = 1; $i <= $classes; $i++){

            $class = new SchoolBlockFloorClassrooms;
            $class->school_id   = $block->school_id;
            $class->block_id    = $block->id;
            $class->floor_id    = $floor->id;
            $class->name        = $i;
            $class->chairs       = 1;
            $class->save();
        }


        Session::flash('success', 'Criado com sucesso');
        return redirect()->back();

    }

    public function destroyblock($id)
    {

        $this->schoolBlocks->find($id)->delete();
        Session::flash('success', 'Excluido com sucesso');
        return redirect()->back();

    }

    public function destroyfloor($id)
    {

        $floor = $this->schoolBlockFloors->find($id);
        foreach($floor->floorclasses as $classes){
            $this->schoolBlockFloorClassrooms->find($classes->id)->delete();
        }
        $floor->delete();
        $block = $this->schoolBlocks->find($floor->block_id);
        $collection= $this->schoolBlockFloorClassrooms->where('block_id',$block->id);
        $block->description  = $collection->sum('chairs');
        $block->save();
        Session::flash('success', 'Excluido com sucesso');
        return redirect()->back();

    }
    public function destroyclassroom($id)
    {
        $class = $this->schoolBlockFloorClassrooms->find($id);
        $block = $this->schoolBlocks->find($class->block_id);
        $class->delete();
        $collection= $this->schoolBlockFloorClassrooms->where('block_id',$block->id);
        $block->description  = $collection->sum('chairs');
        $block->save();
        Session::flash('success', 'Excluido com sucesso');
        return redirect()->back();

    }

}
