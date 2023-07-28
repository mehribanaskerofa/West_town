<?php

namespace App\Repositories;

use App\Models\Benefit;
use App\Models\BenefitsType;
use App\Repositories\Abstract\AbstractRepository;

class BenefitsTypeRepository extends AbstractRepository
{
    protected $modelClass=BenefitsType::class;
}
