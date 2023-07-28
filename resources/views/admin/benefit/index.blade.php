@extends('admin.layouts.admin',['title'=>'Benefit'])
@section('content')

    <?php  $routeName='admin.benefit' ?>
    <a class="btn btn-primary my-1" href="{{route($routeName.'.create')}}">Add</a>
    <br>
    <div class="card ">
        <div class="card-body">
            <table class="table table-bordered" style="text-align: center">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th style="width: 50px">Edit</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models  as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->title}}</td>
                        <td>{{$model->description}}</td>
                        <td>
                            @isset($model->image)
                                <div class="form-group">
                                    <img src="{{asset('storage/'.$model->image)}}"
                                         class="object-fit-cover" width="70px" height="60px">
                                </div>
                            @endisset
                        </td>
                        <td>{{$model->type->title}}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"
                                       data-action="{{route('admin.status-benefit',$model->id)}}"
                                       @if($model->active) checked @endif>
                            </div>
                        </td>
                        <td>
                            <a href="{{route($routeName.'.edit',$model->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form class="delete-form" action="{{ route($routeName.'.destroy',$model->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            {{$models->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
