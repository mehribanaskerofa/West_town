@extends('admin.layouts.admin',['title'=>'Block'])


@section('content')
    <?php $routeName='admin.block'?>
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

{{--<input name="product_id" value="{{$productId}}" type="hidden">--}}

                <div class="row">

                    <div class="form-group col-4">
                    <label for="item">Project</label>
                    <select name="project_id" id="item" class="form-control">
                        @foreach($projects as $project)
                        <option value="{{$project->id}}"
                            @selected(old('project_id',(isset($model) ? $model->project_id : null))==$project->id)
                        >{{$project->title}}</option>
                        @endforeach
                    </select>
                        @error('project_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="item">Block</label>
                        <input type="number"  name="block" class="form-control"
                               value="{{old("block",isset($model) ? ($model->block ?? '') : '')}}">
                        @error('block')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="item">Rooms</label>
                        <input type="number"  name="rooms" class="form-control"
                               value="{{old("rooms",isset($model) ? ($model->rooms ?? '') : '')}}">
                        @error('rooms')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date"
                               min="{{Carbon\Carbon::now()->format('d-m-y')}}"
                               value="{{old("date",isset($model) ? ($model->date ?? '') : '')}}"
                        >
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        @isset($model->image)
                            <img src="{{asset('storage/'.$model->image)}}"
                                 class="object-fit-cover" width="100px"  height="120px">
                        @endisset
                        <div >
                            <label>Image</label>
                            <input type="file"  name="image" class="form-control">
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>



                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection


