@extends('admin.layouts.admin',['title'=>'Block '])
@section('content')

    <?php  $routeName='admin.block' ?>
    <a class="btn btn-primary my-1" href="{{route($routeName.'.create')}}">Add</a>
    <br>
    <div class="card ">
        <div class="card-body">
            <table class="table table-bordered" style="text-align: center">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Project</th>
                    <th>Block</th>
                    <th>Rooms</th>
                    <th>Image</th>
                    <th style="width: 50px">Edit</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models  as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->project->title}}</td>
                        <td>{{$model->block}}</td>
                        <td>{{$model->rooms}}</td>
                        <td style="width: 80px">
                            @isset($model->image)
                                <div class="form-group" >
                                    <img src="{{asset('storage/'.$model->image)}}"
                                         class="object-fit-cover" width="70px" height="30px">
                                </div>
                            @endisset
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
