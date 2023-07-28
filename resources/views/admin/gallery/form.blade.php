@extends('admin.layouts.admin',['title'=>'Gallery'])


@section('content')
    <?php  $routeName='admin.gallery' ?><br>
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset


                <div class="row">
                    @isset($model->image)
                        <div class="form-group col-3">
                            <img src="{{asset('storage/'.$model->image)}}" width="100px">
                        </div>
                    @endisset
                    <div class="form-group col-3">
                        <label>Image</label>
                        <input type="file"  name="image" class="form-control">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="form-group col-3">
                            <label>Active</label>
                            <input type="checkbox" class="mt-4" name="active" value="1" @checked(old('active',$model->active ?? 'checked'))>
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
