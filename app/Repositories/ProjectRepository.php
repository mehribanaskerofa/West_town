<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Abstract\AbstractRepository;

class ProjectRepository extends AbstractRepository
{
    protected $modelClass=Project::class;
}
