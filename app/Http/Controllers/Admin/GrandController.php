<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrandRequest;
use App\Models\Grand;
use App\Services\RepositoryService\GrandService;

class GrandController extends Controller
{

    public function __construct(protected GrandService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.grand.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.grand.form');
    }
    public function store(GrandRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.grand.index');
    }
    public function edit(Grand $grand)
    {
        return view('admin.grand.form',['model'=>$grand]);
    }
    public function update(GrandRequest $grandRequest, Grand $grand)
    {
        $this->service->update($grandRequest,$grand);
        return redirect()->back();
    }
    public function destroy(Grand $grand)
    {
        $this->service->delete($grand);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = Grand::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
