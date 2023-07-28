<?php

namespace App\Repositories;

use App\Models\Grand;
use App\Repositories\Abstract\AbstractRepository;

class GrandRepository extends AbstractRepository
{
    protected $modelClass=Grand::class;
}
