<?php

namespace App\Services\RepositoryService;

use App\Models\Project;
use App\Repositories\ProjectRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class ProjectService
{
    public function __construct(protected ProjectRepository $repository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->groupBy('company_id',['translations'],6);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['image']=$this->fileUploadService
            ->uploadFile($request->image,'project_images');

        $data['date']=$request->date ?? date('d-m-y');

        $model= $this->repository->save($data,new Project());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'project_images');
        }
        if($request->has('date')) {
            $data['date'] = $request->date ?? date('d-m-y');
        }

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

    public function CachedProjects()
    {
        return Cache::rememberForever('projects',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('projects');
    }
}
