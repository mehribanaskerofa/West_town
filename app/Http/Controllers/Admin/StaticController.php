<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticModel;
use App\Services\RepositoryService\StaticService;

class StaticController extends Controller
{

    public function __construct(protected StaticService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.static.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.static.form');
    }
    public function store()
    {
        $this->service->store();
        return redirect()->route('admin.static.index');
    }
    public function edit(StaticModel $static)
    {
        return view('admin.static.form',['model'=>$static]);
    }
    public function update(StaticModel $static)
    {
        $this->service->update($static);
        return redirect()->back();
    }
    public function destroy(StaticModel $static)
    {
        $this->service->delete($static);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = StaticModel::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
