<?php

namespace App\Repositories;

use App\Models\Finishing;
use App\Repositories\Abstract\AbstractRepository;

class FinishingRepository extends AbstractRepository
{
    protected $modelClass=Finishing::class;
}
