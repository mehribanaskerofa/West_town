@extends('admin.layouts.admin',['title'=>'House '])
@section('content')

    <?php  $routeName='admin.house' ?>
    <a class="btn btn-primary my-1" href="{{route($routeName.'.create',$projectId)}}">Add</a>
    <br>
    <div class="card ">
        <div class="card-body">
            <table class="table table-bordered " style="text-align: center">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Block</th>
                    <th>Floor</th>
                    <th>Room</th>
                    <th>Area</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Layout</th>
                    <th>Active</th>
                    <th style="width: 50px">Edit</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody >
                @foreach($models  as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->block->block}}</td>
                        <td>{{$model->floor}}</td>
                        <td>{{$model->room}}</td>
                        <td>{{$model->area}}</td>
                        <td>{{$model->price}}</td>
                        <td>{{$model->date}}</td>
                        <td style="width: 80px">
                            @isset($model->layout)
                                <div class="form-group">
                                    <img src="{{asset('storage/'.$model->layout)}}"
                                         class="object-fit-cover" width="70px" height="30px">
                                </div>
                            @endisset
                        </td>
                        <td style="width: 40px">
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"
                                       data-action="{{route('admin.status-house',$model->id)}}"
                                       style="width: 40px;height: 20px"
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
