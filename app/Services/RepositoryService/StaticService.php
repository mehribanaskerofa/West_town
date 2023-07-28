<?php

namespace App\Services\RepositoryService;

use App\Models\StaticModel;
use App\Repositories\StaticRepository;
use Illuminate\Support\Facades\Cache;

class StaticService
{
    public function __construct(protected StaticRepository $repository)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(5,['translations']);
    }

    public function store()
    {
        $data=request()->all();

        $data['active']=$data['active'] ?? false;
        $model= $this->repository->save($data,new StaticModel());

        self::ClearCached();
        return $model;
    }
    public function update($model)
    {
        $data=request()->all();

        $data['active']=$data['active'] ?? false;

        $model=$this->repository->save($data, $model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->repository->delete($model);
    }

    public function CachedStatics()
    {
        return Cache::rememberForever('statics',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('statics');
    }
}
