<?php

namespace App\Repositories;





use App\Entities\Company;

class CompanyRepository
{


    /**
     * @var Company
     */
    private $company;

    public function __construct(Company $company)
    {

        $this->company = $company;
    }


    public function find($company_id)
    {
        return $this->company->find($company_id);
    }



}
