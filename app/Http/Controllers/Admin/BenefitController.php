<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BenefitRequest;
use App\Models\Benefit;
use App\Services\RepositoryService\BenefitService;
use App\Services\RepositoryService\BenefitsTypeService;
use function Termwind\render;

class BenefitController extends Controller
{

    public function __construct(protected BenefitService $service,protected BenefitsTypeService $typeService)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.benefit.index',['models'=>$models]);
    }
    public function create()
    {
        $types=$this->typeService->CachedBenefitsType();
        return view('admin.benefit.form',['types'=>$types]);
    }
    public function store(BenefitRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.benefit.index');
    }
    public function edit(Benefit $benefit)
    {
        $types=$this->typeService->CachedBenefitsType();
        return view('admin.benefit.form',['model'=>$benefit,'types'=>$types]);
    }
    public function update(BenefitRequest $benefitRequest,Benefit  $benefit)
    {
        $this->service->update($benefitRequest,$benefit);
        return redirect()->back();
    }
    public function destroy(Benefit $benefit)
    {
        $this->service->delete($benefit);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = Benefit::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
