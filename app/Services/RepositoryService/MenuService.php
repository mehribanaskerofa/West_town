<?php

namespace App\Services\RepositoryService;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class MenuService
{
    public function __construct(protected MenuRepository $repository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Menu());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        $data['active']=$data['active'] ?? false;

        $model=$this->repository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->repository->delete($model);
    }

    public function CachedMenus()
    {
        return Cache::rememberForever('menus',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('menus');
    }
}
