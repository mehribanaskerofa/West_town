<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Models\Block;
use App\Models\House;
use App\Models\Project;
use App\Services\RepositoryService\BlockService;
use App\Services\RepositoryService\HouseService;
use App\Services\RepositoryService\ProjectService;
use Faker\Core\Number;

class HouseController extends Controller
{
    public function __construct(protected HouseService $houseService)
    {

    }

    public function index($projectId=0)
    {
        $models=$this->houseService->dataAllWithPaginate($projectId);
        return view('admin.house.index',['models'=>$models,'projectId'=>$projectId]);
    }
    public function create($projectId=0,ProjectService $projectService)
    {
        $projects=$projectService->CachedProjects();
        return view('admin.house.form',compact('projectId','projects'));
    }
    public function store(HouseRequest $request)
    {
        $this->houseService->store($request);
        return redirect()->route('admin.house.index',['projectId',$request->project_id]);
    }
    public function edit(House $house,ProjectService $projectService)
    {
        //        $categories=$categoryService->CachedCategories();
        $projects=$projectService->CachedProjects();
        return view('admin.house.form',['model'=>$house,'projects'=>$projects,'productId'=>$house->project_id]);
    }
    public function update(HouseRequest $houseRequest,House $house)
    {
        $this->houseService->update($houseRequest,$house);
        return redirect()->back();
    }
    public function destroy(House $house)
    {
        $this->houseService->delete($house);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = House::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function getBlocksByProject($projectId){
        $blocks=Block::query()->where('project_id',$projectId)->get();
        return view('admin.house.block-items',compact('blocks'));
    }
}
