<?php

namespace App\Services\RepositoryService;

use App\Models\Benefit;
use App\Repositories\BenefitRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class BenefitService
{
    public function __construct(protected BenefitRepository $repository,
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

        $data['image']=$this->fileUploadService->uploadFile($request->image,'benefit_images');
        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Benefit());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'benefit_images');
        }
        $data['active']=$data['active'] ?? false;

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

    public function CachedBenefits()
    {
        return Cache::rememberForever('benefits',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('benefits');
    }
}
