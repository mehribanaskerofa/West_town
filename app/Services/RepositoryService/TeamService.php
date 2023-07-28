<?php

namespace App\Services\RepositoryService;

use App\Models\Team;
use App\Repositories\TeamRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class TeamService
{
    public function __construct(protected TeamRepository $repository,
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
            ->uploadFile($request->image,'team_images');

        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Team());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'team_images');
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

    public function CachedTeams()
    {
        return Cache::rememberForever('teams',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('teams');
    }
}
