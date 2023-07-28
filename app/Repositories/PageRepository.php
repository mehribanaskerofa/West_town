<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Abstract\AbstractRepository;

class PageRepository extends AbstractRepository
{
    protected $modelClass=Page::class;
}
