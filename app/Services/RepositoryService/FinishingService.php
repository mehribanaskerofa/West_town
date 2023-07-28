<?php

namespace App\Services\RepositoryService;

use App\Models\Finishing;
use App\Repositories\FinishingRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class FinishingService
{
    public function __construct(protected FinishingRepository $repository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(10,['translations']);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['image']=$this->fileUploadService
            ->uploadFile($request->image,'finishing_images');

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Finishing());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'finishing_images');
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

    public function CachedFinishings()
    {
        return Cache::rememberForever('finishings',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('finishings');
    }
}
