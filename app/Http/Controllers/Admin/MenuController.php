<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Services\FileUploadService;
use App\Services\RepositoryService\MenuService;

class MenuController extends Controller
{

    public function __construct(protected MenuService $service)
    {

    }
    public function index()
    {
        $models=$this->service->dataAllWithPaginate();
        return view('admin.menu.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.menu.form');
    }
    public function store(MenuRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.menu.index');
    }
    public function edit(Menu $menu)
    {
        return view('admin.menu.form',['model'=>$menu]);
    }
    public function update(MenuRequest $menuRequest, Menu $menu)
    {
        $this->service->update($menuRequest,$menu);
        return redirect()->back();
    }
    public function destroy(Menu $menu)
    {
        $this->service->delete($menu);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = Menu::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
