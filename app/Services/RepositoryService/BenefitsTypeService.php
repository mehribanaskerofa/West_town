<?php

namespace App\Services\RepositoryService;

use App\Models\BenefitsType;
use App\Repositories\BenefitsTypeRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class BenefitsTypeService
{
    public function __construct(protected BenefitsTypeRepository $repository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(4,['translations']);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new BenefitsType());

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

    public function CachedBenefitsType()
    {
        return Cache::rememberForever('benefits-type',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('benefits-type');
    }
}
