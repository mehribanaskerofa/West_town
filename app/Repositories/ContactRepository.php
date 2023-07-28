<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Abstract\AbstractRepository;

class ContactRepository extends AbstractRepository
{
    protected $modelClass=Contact::class;
}
