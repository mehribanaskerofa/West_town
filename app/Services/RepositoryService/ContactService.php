<?php

namespace App\Services\RepositoryService;

use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Cache;

class ContactService
{
    public function __construct(protected ContactRepository $repository)
    {
    }
    public function dataAllWithPagination()
    {
        return $this->repository->paginate(5);
    }

    public function store($request)
    {
        $data=$request->all();

        $data['active']=$data['active'] ?? true;
        $data['notice']=$data['notice'] ?? '';

        $model= $this->repository->save($data,new Contact());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        $data['active']=$data['active'] ?? true;

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

    public function CachedContacts()
    {
        return Cache::rememberForever('contacts',
            function (){
                return $this->repository->all();
            });
    }

    public static function ClearCached()
    {
        Cache::forget('contacts');
    }
}
