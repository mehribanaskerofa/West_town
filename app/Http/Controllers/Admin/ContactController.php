<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PageRequest;
use App\Models\Contact;
use App\Services\RepositoryService\ContactService;

class ContactController extends Controller
{

    public function __construct(protected ContactService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPagination();
        return view('admin.contact.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.contact.form');
    }
    public function store(PageRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.contact.index');
    }
    public function edit(Contact $contact)
    {
        return view('admin.contact.form',['model'=>$contact]);
    }
    public function update(ContactRequest $contactRequest, Contact $contact)
    {
        $this->service->update($contactRequest,$contact);
        return redirect()->back();
    }
    public function destroy(Contact $contact)
    {
        $this->service->delete($contact);
        return redirect()->back();
    }
}
