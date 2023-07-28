<?php

namespace App\Repositories;

use App\Models\Benefit;
use App\Repositories\Abstract\AbstractRepository;

class BenefitRepository extends AbstractRepository
{
    protected $modelClass=Benefit::class;
}
