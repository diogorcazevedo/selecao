<?php


namespace App\Modules\Project\Http\Controllers\Financial;
use App\Http\Controllers\Controller;
use App\Modules\Project\Repositories\BenefitsRepository;
use App\Modules\Project\Repositories\ProjectRepository;
use App\Modules\Project\Repositories\RegisterRepository;


class TransactionsController extends Controller
{


    /**
     * @var RegisterRepository
     */
    private $registerRepository;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var BenefitsRepository
     */
    private $benefitsRepository;

    public function __construct(RegisterRepository $registerRepository,
                                ProjectRepository $projectRepository,
                                BenefitsRepository $benefitsRepository)
    {


        $this->registerRepository = $registerRepository;
        $this->projectRepository = $projectRepository;
        $this->benefitsRepository = $benefitsRepository;
    }


    public function index($project_id)
    {
        $project    = $this->projectRepository->find($project_id);
        $registers  = $this->registerRepository->getRegisterByProject($project_id);
        $benefits   = $this->benefitsRepository->getBenefitsByProject($project_id);
        $cash       = $this->projectRepository->getPaymentsByProject($project_id);


        return view('project::financial.index', compact('project','registers', 'benefits','cash'));

    }



}
