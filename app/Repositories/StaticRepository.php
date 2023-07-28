<?php

namespace App\Repositories;

use App\Models\StaticModel;
use App\Repositories\Abstract\AbstractRepository;

class StaticRepository extends AbstractRepository
{
    protected $modelClass=StaticModel::class;
}
