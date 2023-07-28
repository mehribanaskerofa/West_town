<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFrontRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PageRequest;
use App\Models\Contact;
use App\Models\House;
use App\Services\RepositoryService\ContactService;

class CardController extends Controller
{

    public function __construct(protected ContactService $service)
    {

    }
    public function index()
    {
        return view('front.cards');
    }
    public function apart(House $house)
    {
//        dd($house);
        return view('front.apart',compact('house'));
    }
}
