<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlockRequest;
use App\Models\Block;
use App\Models\Project;
use App\Services\RepositoryService\BlockService;
use App\Services\RepositoryService\ProjectService;

class BlockController extends Controller
{

    public function __construct(protected BlockService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.block.index',['models'=>$models]);
    }
    public function create(ProjectService $projectService)
    {
        $projects=$projectService->CachedProjects();
        return view('admin.block.form',compact('projects'));
    }
    public function store(BlockRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.block.index');
    }
    public function edit(Block $block,ProjectService $projectService)
    {
        $projects=$projectService->CachedProjects();
        return view('admin.block.form',['model'=>$block,'projects'=>$projects]);
    }
    public function update(BlockRequest $blockRequest, Block $block)
    {
        $this->service->update($blockRequest,$block);
        return redirect()->back();
    }
    public function destroy(Block $block)
    {
        $this->service->delete($block);
        return redirect()->back();
    }
}
