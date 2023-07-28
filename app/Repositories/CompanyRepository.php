<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Abstract\AbstractRepository;

class CompanyRepository extends AbstractRepository
{
    protected $modelClass=Company::class;
}
