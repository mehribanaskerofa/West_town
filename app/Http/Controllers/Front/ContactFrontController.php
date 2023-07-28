<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFrontRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PageRequest;
use App\Models\Contact;
use App\Services\RepositoryService\ContactService;

class ContactFrontController extends Controller
{

    public function __construct(protected ContactService $service)
    {

    }
    public function store(ContactFrontRequest $request)
    {
        $this->service->store($request);
        return redirect()->back();
    }

}
