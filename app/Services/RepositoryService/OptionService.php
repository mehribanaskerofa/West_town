<?php

namespace App\Services\RepositoryService;

use App\Models\Option;
use App\Repositories\OptionRepository;
use Illuminate\Support\Facades\Cache;

class OptionService
{
    public function __construct(protected OptionRepository $repository)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(10,['translations']);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Option());

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

    public function CachedOptionType()
    {
        return Cache::rememberForever('options',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('options');
    }
}
