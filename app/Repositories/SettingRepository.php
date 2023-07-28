<?php

namespace App\Repositories;

use App\Models\Finishing;
use App\Models\Setting;
use App\Repositories\Abstract\AbstractRepository;

class SettingRepository extends AbstractRepository
{
    protected $modelClass=Setting::class;
}
