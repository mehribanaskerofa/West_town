<?php

namespace App\Services\RepositoryService;

use App\Models\RareFormat;
use App\Repositories\RareFormatRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class RareFormatService
{
    public function __construct(protected RareFormatRepository $repository,
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
            ->uploadFile($request->image,'rare_format_images');

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new RareFormat());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
//            dd($request->toArray());

            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'rare_format_images');
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

    public function CachedRareFormats()
    {
        return Cache::rememberForever('rare_formats',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('rare-formats');
    }
}
