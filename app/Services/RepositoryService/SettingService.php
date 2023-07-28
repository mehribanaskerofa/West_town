<?php

namespace App\Services\RepositoryService;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public function __construct(protected SettingRepository $repository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function data()
    {
        return $this->repository->first();
    }

    public function store($request)
    {
        $data=$request->all();

        $data['image']=$this->fileUploadService
            ->uploadFile($request->image,'setting_images');

        $data['active']=$data['active'] ?? true;

        $model= $this->repository->save($data,new Setting());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'setting_images');
        }
        $data['active']=$data['active'] ?? true;

        $model=$this->repository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        $this->fileUploadService->removeFile($model->image);
        return $this->repository->delete($model);
    }

    public function CachedSettings()
    {
        return Cache::rememberForever('settings',
            function (){
                return $this->repository->first();
            });
    }

    public static function ClearCached()
    {
        Cache::forget('settings');
    }
}
