<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\RepositoryService\CompanyService;
use App\Services\RepositoryService\ProjectService;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function __construct(protected ProjectService $service)
    {

    }
    public function index()
    {
//        $distinctCompanyIds = Project::select('company_id')
//            ->groupBy('company_id')
//            ->get()
//            ->pluck('company_id');
//
//        $models = Project::whereIn('company_id', $distinctCompanyIds)
//            ->with('company')
//            ->paginate(10);
        $models = $this->service->dataAllWithPaginate();
//        dd($models->toArray());
//        $models = Project::whereIn('company_id', function ($query) {
////            dd($query->select('company_id')
////                ->from('projects')->get()->groupBy('company_id'));
//            return $query->select('company_id')
//                ->from('projects')
//                ->get()
//                ->groupBy('company_id');
//        })
//            ->with('company')
//            ->get();
//        dd($models->toArray());

        return view('admin.project.index',['models'=>$models]);
    }
    public function create(CompanyService $companyService)
    {
        $companies=$companyService->CachedCompany();
        return view('admin.project.form',compact('companies'));
    }
    public function store(ProjectRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.project.index');
    }
    public function edit(Project $project,CompanyService $companyService)
    {
        $companies=$companyService->CachedCompany();
        return view('admin.project.form',['model'=>$project,'companies'=>$companies]);
    }
    public function update(ProjectRequest $projectRequest, Project $project)
    {
        $this->service->update($projectRequest,$project);
        return redirect()->back();
    }
    public function destroy(Project $project)
    {
        $this->service->delete($project);
        return redirect()->back();
    }
}
