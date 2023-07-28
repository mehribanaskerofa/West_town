<?php

namespace App\Services\RepositoryService;

use App\Models\Page;
use App\Repositories\PageRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class PageService
{
    public function __construct(protected PageRepository $repository,
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

        $data['image']=$this->fileUploadService
            ->uploadFile($request->image,'page_images');

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Page());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'page_images');
        }
        $data['active']=$data['active'] ?? false;

        $model=$this->repository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
//        foreach ($model->images as $productImage){
//            $this->fileUploadService->removeFile($productImage->image);
//        }
        self::ClearCached();
        $this->fileUploadService->removeFile($model->image);
        return $this->repository->delete($model);
    }

    public function CachedPages()
    {
        return Cache::rememberForever('pages',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('pages');
    }
}
