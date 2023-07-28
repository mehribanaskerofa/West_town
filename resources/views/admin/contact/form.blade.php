@extends('admin.layouts.admin',['title'=>'Contacts'])


@section('content')
    <?php  $routeName='admin.contact' ?>
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

                <div class="row">
                    <div class="form-group col-3">
                        <label>Phone</label>
                        <input type="text" class="mt-4" name="phone"
                               value="{{old("phone",isset($model) ? ($model->phone ?? '') : '')}}"                        >
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label>Notice</label>
                        <input type="text" class="mt-4" name="notice"
                               value="{{old("notice",isset($model) ? ($model->notice ?? '') : '')}}"                        >
                        @error('notice')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label>Active</label>
                        <input type="checkbox" class="mt-4" name="active" value="1" @checked(old('active',$model->active ?? ''))>
                        @error('active')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
