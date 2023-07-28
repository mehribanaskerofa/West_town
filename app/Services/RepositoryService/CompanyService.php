<?php

namespace App\Services\RepositoryService;

use App\Models\Company;
use App\Models\Option;
use App\Repositories\CompanyRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class CompanyService
{
    public function __construct(protected CompanyRepository $repository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate(3,['options.translations']);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['image']=$this->fileUploadService
            ->uploadFile($request->image,'company_images');
        $data['date']=$request->date ?? date('d-m-y');

        $options=$data['options'] ?? [];
        unset($data['options']);


        $model= $this->repository->save($data,new Company());
        $model->options()->attach($options);//yoxla

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService
                ->replaceFile($request->image,$model->image,'company_images');
        }
        if($request->has('date')) {
            $data['date'] = $request->date ?? date('d-m-y');
        }

        $model->options()->sync($data['options'] ?? []);//yoxla
        unset($data['options']);

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

    public function CachedCompany()
    {
        return Cache::rememberForever('companies',
            function (){
                return $this->repository->all(with:['translations','options.translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('companies');
    }
}
