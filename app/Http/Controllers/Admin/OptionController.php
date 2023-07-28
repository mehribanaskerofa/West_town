<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use App\Services\RepositoryService\OptionService;

class OptionController extends Controller
{

    public function __construct(protected OptionService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.option.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.option.form');
    }
    public function store(OptionRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.option.index');
    }
    public function edit(Option $option)
    {
        return view('admin.option.form',['model'=>$option]);
    }
    public function update(OptionRequest $optionRequest, Option $option)
    {
        $this->service->update($optionRequest,$option);
        return redirect()->back();
    }
    public function destroy(Option $option)
    {
        $this->service->delete($option);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = Option::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
