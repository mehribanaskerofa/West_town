<?php

namespace App\Repositories;

use App\Models\House;
use App\Repositories\Abstract\AbstractRepository;

class HouseRepository extends AbstractRepository
{
    protected $modelClass=House::class;
}
