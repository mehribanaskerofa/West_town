@extends('admin.layouts.admin',['title'=>'House'])


@section('content')
    <?php $routeName='admin.house'?>
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

{{--<input name="projectId" value="{{$productId}}" type="hidden">--}}

                <div class="row">
                    {{--project--}}
                                        <div class="form-group col-4">
                                            <label for="item">Project</label>
                                            <select id="item" class="form-control project_item">
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
                                        <div id="blocks_from_project" class="form-group col-4" >

                                        </div>
                </div>


                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-1 px-1"><h3 class="card-title">Title</h3></li>
                            @foreach(config('app.languages') as $langKey)
                                <li class="nav-item ">
                                    <a class="nav-link
                                    {{$loop->first ? ' active ' : '' }}
                                          @error("$langKey.price" )
                                                 text-danger @enderror"
                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#title-{{$langKey}}"
                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">
                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $index=>$lang)
                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="title-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Title</label>
                                            <input type="text" placeholder="title {{$lang}}" name="{{$lang}}[title]"
                                                   value="{{old("$lang.title",isset($model) ? ($model->translateOrDefault($lang)->title ?? '') : '')}}"
                                                   class="form-control">
                                            @error("$lang.title")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Price</label>
                                            <input type="text" placeholder="Price {{$lang}}" name="{{$lang}}[price]"
                                                   value="{{old("$lang.price",isset($model) ? ($model->translateOrDefault($lang)->price ?? '') : '')}}"
                                                   class="form-control">
                                            @error("$lang.price")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Description</label>
                                            <textarea id="summernote{{$index}}"  placeholder="Description {{$lang}}" name="{{$lang}}[description]"
                                                      class="form-control">
                                           {{old("$lang.description",isset($model) ? ($model->translateOrDefault($lang)->description ?? '') : '')}}
                                           </textarea>
                                            @error("$lang.description")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-6">
                        <label>Type</label>
                        <select name="type" class="form-control" id="house-type" >
                            @foreach( \App\Enums\Options::cases() as $type)
                                <option value="{{$type->value}}"
                                    @selected(old('type',(isset($model) ? $model->$type : null))==$type->value)
                                >{{$type->name}}</option>
                            @endforeach

                        </select>
                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-2 house-detail">
                            <label for="item">Floor</label>
                            <input type="number" placeholder="Floor" name="floor"
                                   value="{{old("floor",isset($model) ? ($model->floor ?? '') : '')}}"
                                   class="form-control">
                               @error('floor')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
                           </div>
                    <div class="form-group col-2 house-detail">
                               <label for="item">Room</label>
                        <input type="number" placeholder="Room" name="room"
                               value="{{old("room",isset($model) ? ($model->room ?? '') : '')}}"
                               class="form-control">
                               @error('room')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
                           </div>
                    <div class="form-group col-2 house-detail">
                        <label>Area</label>
                        <input type="number" placeholder="Area" name="area"
                               value="{{old("area",isset($model) ? ($model->area ?? '') : '')}}"
                               class="form-control">
                        @error("area")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-2">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date"
                               min="{{Carbon\Carbon::now()->format('d-m-y')}}"
                               value="{{old("date",isset($model) ? ($model->date ?? '') : '')}}"
                        >
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-2 d-flex flex-column">
                        <label>Active</label>
                        <input type="checkbox" name="active" value="1" @checked(old('active',$model->active ?? ''))
                        style="width: 20px;height: 20px"
                        >
                        @error('active')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    @isset($model->image)
                        <div class="form-group col-3">
                            <img src="{{asset('storage/'.$model->image)}}" width="100px" height="50px">
                        </div>
                    @endisset
                    <div class="form-group col-3">
                        <label>Image</label>
                        <input type="file"  name="image" class="form-control">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @isset($model->layout)
                        <div class="form-group col-3">
                            <img src="{{asset('storage/'.$model->layout)}}" width="100px" height="50px">
                        </div>
                    @endisset
                    <div class="form-group col-3">
                        <label>Layout</label>
                        <input type="file"  name="layout" class="form-control">
                        @error('layout')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{asset('js/summernote.js')}}"></script>
    <script>
        $(document).ready(function (){
            var $typeValue=$('#house-type').val();
            $('#house-type').on('change',function (){
                $typeValue= $(this).val();
                if($typeValue=="{{App\Enums\Options::OBJECT}}"){
                    $(".house-detail").css("display", "none");
                }else {
                    $(".house-detail").css("display", "block");
                }
            });


            getCategoryAttributes($('.project_item').trigger('change').val());
                        {{--const $product_id={{@isset($model) ? $model->id : ''}};--}}
            $('.project_item').on('change',function (){
                getCategoryAttributes($(this).val());
            });

            function getCategoryAttributes($project_id){
                $.ajax({
                    method: 'get',
                    url: "{{route('admin.project-blocks',['project_id'])}}"
                        .replace('project_id',$project_id),
                        // .replace('productId',$('.project_item').val()),
                    success(response) {
                        $('#blocks_from_project').html(response);
                        // $('#select2').select2();
                        // $('#blocks_from_project').modal();
                        // $('#blocks_from_project .form-group select').addClass('form-control');
                        // $('#blocks_from_project .form-group col-4').addClass('col-4');
                        // $('#blocks_from_project .form-group label').addClass('form-label');
                    }
                });
            }
        });
    </script>
@endpush
