<?php

namespace App\Services\RepositoryService;

use App\Models\Block;
use App\Repositories\BlockRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class BlockService
{
    public function __construct(protected BlockRepository $repository,
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
            ->uploadFile($request->image,'block_layouts');

        $data['date']=$request->date ?? date('d-m-y');


        $model= $this->repository->save($data,new Block());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'block_layouts');
        }

        $data['date']=$request->date ?? date('d-m-y');

        $model=$this->repository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        $this->fileUploadService->removeFile($model->layout);
        return $this->repository->delete($model);
    }

    public function CachedBlocks()
    {
        return Cache::rememberForever('blocks',
            function (){
                return $this->repository->all();
            });
    }

    public static function ClearCached()
    {
        Cache::forget('blocks');
    }
}
