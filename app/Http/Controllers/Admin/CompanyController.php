<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\RepositoryService\CompanyService;
use App\Services\RepositoryService\OptionService;

class CompanyController extends Controller
{

    public function __construct(protected CompanyService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.company.index',['models'=>$models]);
    }
    public function create(OptionService $optionService)
    {
        $options=$optionService->CachedOptionType();
        return view('admin.company.form',['options'=>$options]);
    }
    public function store(CompanyRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.company.index');
    }
    public function edit(Company $company,OptionService $optionService)
    {
        $options=$optionService->CachedOptionType();
        return view('admin.company.form',['model'=>$company,'options'=>$options]);
    }
    public function update(CompanyRequest $companyRequest, Company $company)
    {
        $this->service->update($companyRequest,$company);
        return redirect()->back();
    }
    public function destroy(Company $company)
    {
        $this->service->delete($company);
        return redirect()->back();
    }

}
