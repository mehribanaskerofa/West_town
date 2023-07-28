@extends('admin.layouts.admin',['title'=>'Settings'])
@section('content')

    <?php  $routeName='admin.setting' ?>
    @if(!$model)
        <a class="btn btn-primary my-1" href="{{route($routeName.'.create')}}">Add</a>
    @endif
    <br>
    <div class="card ">
        <div class="card-body">
            <table class="table table-bordered" style="text-align: center">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Icon</th>
                    <th style="width: 50px">Edit</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody>
                @isset($model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->email}}</td>
                        <td>{{$model->phone}}</td>
                        <td>
                            @isset($model->image)
                                <div class="form-group">
                                    <img src="{{asset('storage/'.$model->image)}}"
                                         class="object-fit-cover" width="70px" height="60px">
                                </div>
                            @endisset
                        </td>
                        <td>{{$model->icon}}</td>
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
                @endisset
                </tbody>
            </table>
            <br>
{{--            {{$models->links('pagination::bootstrap-4')}}--}}
        </div>
    </div>
@endsection
