<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Services\RepositoryService\PageService;

class PageController extends Controller
{

    public function __construct(protected PageService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.page.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.page.form');
    }
    public function store(PageRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.page.index');
    }
    public function edit(Page $page)
    {
        return view('admin.page.form',['model'=>$page]);
    }
    public function update(PageRequest $pageRequest, Page $page)
    {
        $this->service->update($pageRequest,$page);
        return redirect()->back();
    }
    public function destroy(Page $page)
    {
        $this->service->delete($page);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = Page::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
