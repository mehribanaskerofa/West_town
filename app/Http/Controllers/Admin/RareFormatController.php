<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RareFormatRequest;
use App\Models\RareFormat;
use App\Services\RepositoryService\RareFormatService;

class RareFormatController extends Controller
{

    public function __construct(protected RareFormatService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.rare.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.rare.form');
    }
    public function store(RareFormatRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.rare.index');
    }
    public function edit(RareFormat $rare)
    {
        return view('admin.rare.form',['model'=>$rare]);
    }
    public function update(RareFormatRequest $rareFormatRequest,RareFormat  $rare)
    {
        $this->service->update($rareFormatRequest,$rare);
        return redirect()->back();
    }
    public function destroy(RareFormat $rare)
    {
        $this->service->delete($rare);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = RareFormat::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
