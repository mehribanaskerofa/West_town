<?php

namespace App\Repositories;

use App\Models\Infrastructure;
use App\Models\InfrastructuresType;
use App\Repositories\Abstract\AbstractRepository;

class InfrastructuresTypeRepository extends AbstractRepository
{
    protected $modelClass=InfrastructuresType::class;
}
