<?php

namespace App\Repositories;

use App\Models\Infrastructure;
use App\Repositories\Abstract\AbstractRepository;

class InfrastructureRepository extends AbstractRepository
{
    protected $modelClass=Infrastructure::class;
}
