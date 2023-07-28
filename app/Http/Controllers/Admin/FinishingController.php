<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinishingRequest;
use App\Models\Finishing;
use App\Models\Gallery;
use App\Services\RepositoryService\FinishingService;

class FinishingController extends Controller
{

    public function __construct(protected FinishingService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.finish.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.finish.form');
    }
    public function store(FinishingRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.finish.index');
    }
    public function edit(Finishing $finish)
    {
        return view('admin.finish.form',['model'=>$finish]);
    }
    public function update(FinishingRequest $finishingRequest, Finishing $finish)
    {
        $this->service->update($finishingRequest,$finish);
        return redirect()->back();
    }
    public function destroy(Finishing $finish)
    {
        $this->service->delete($finish);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = Finishing::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
