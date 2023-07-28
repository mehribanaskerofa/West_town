<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Repositories\Abstract\AbstractRepository;

class GalleryRepository extends AbstractRepository
{
    protected $modelClass=Gallery::class;
}
