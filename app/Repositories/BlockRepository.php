<?php

namespace App\Repositories;

use App\Models\Block;
use App\Repositories\Abstract\AbstractRepository;

class BlockRepository extends AbstractRepository
{
    protected $modelClass=Block::class;
}
