<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BenefitsTypeRequest;
use App\Models\BenefitsType;
use App\Services\RepositoryService\BenefitsTypeService;

class BenefitsTypeController extends Controller
{

    public function __construct(protected BenefitsTypeService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.benefits-type.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.benefits-type.form');
    }
    public function store(BenefitsTypeRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.benefits-type.index');
    }
    public function edit(BenefitsType $benefits_type)
    {
        return view('admin.benefits-type.form',['model'=>$benefits_type]);
    }
    public function update(BenefitsTypeRequest $benefitsTypeRequest,BenefitsType  $benefitsType)
    {
        $this->service->update($benefitsTypeRequest,$benefitsType);
        return redirect()->back();
    }
    public function destroy(BenefitsType $benefitsType)
    {
        $this->service->delete($benefitsType);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = BenefitsType::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
