<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Http\Requests\SettingRequest;
use App\Models\Page;
use App\Models\Setting;
use App\Services\RepositoryService\PageService;
use App\Services\RepositoryService\SettingService;

class SettingController extends Controller
{

    public function __construct(protected SettingService $service)
    {

    }
    public function index()
    {
        $model=$this->service->data();
        return view('admin.setting.index',['model'=>$model]);
    }
    public function create()
    {
        return view('admin.setting.form');
    }
    public function store(SettingRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.setting.index');
    }
    public function edit(Setting $setting)
    {
        return view('admin.setting.form',['model'=>$setting]);
    }
    public function update(SettingRequest $settingRequest, Setting $setting)
    {
        $this->service->update($settingRequest,$setting);
        return redirect()->back();
    }
    public function destroy(Setting $setting)
    {
        $this->service->delete($setting);
        return redirect()->back();
    }
    public function status($id)
    {
        $model = Setting::find($id);

        $model->active = request()->active;
        $model->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
