<?php

namespace App\Repositories;

use App\Models\Team;
use App\Repositories\Abstract\AbstractRepository;

class TeamRepository extends AbstractRepository
{
    protected $modelClass=Team::class;
}
