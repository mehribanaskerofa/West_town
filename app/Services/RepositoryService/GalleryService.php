<?php

namespace App\Services\RepositoryService;

use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class GalleryService
{
    public function __construct(protected GalleryRepository $repository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(4);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['image']=$this->fileUploadService
            ->uploadFile($request->image,'gallery_images');

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Gallery());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'gallery_images');
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

    public function CachedGalleries()
    {
        return Cache::rememberForever('galleries',
            function (){
                return $this->repository->all();
            });
    }

    public static function ClearCached()
    {
        Cache::forget('galleries');
    }
}
