<?php

namespace App\Repositories;

use App\Models\Option;
use App\Repositories\Abstract\AbstractRepository;

class OptionRepository extends AbstractRepository
{
    protected $modelClass=Option::class;
}
