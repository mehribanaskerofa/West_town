@extends('admin.layouts.admin',['title'=>'Infrastructure'])


@section('content')
    <?php  $routeName='admin.infrastructure' ?><br>
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-2 px-3"><h3 class="card-title">Title</h3></li>
                            @foreach(config('app.languages') as $langKey)
                                <li class="nav-item ">
                                    <a class="nav-link
                                    {{$loop->first ? ' active ' : '' }}
                                          @error("$langKey.title" ||
                                                "$langKey.description")
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
                    <div class="form-group">
                        <label>Type</label>
                        <select name="infrastructures_type_id" class="form-control">
                            @foreach($types as $type)
                                <option value="{{$type->id}}"
                                    @selected(old('infrastructures_type_id',(isset($model) ? $model->infrastructures_type_id : null))==$type->id)
                                >{{$type->title}}</option>
                            @endforeach

                        </select>
                        @error('infrastructures_type_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
{{--                    map--}}
                    <div class="form-group col-6">
                        <label>longitude</label>
                        <input type="number" step="0.0000001" placeholder="longitude" name="longitude"
                               value="{{old("longitude",isset($model) ? ($model->longitude ?? '') : '')}}"
                               class="form-control">
                        @error("longitude")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>latitude</label>
                        <input type="number" step="0.0000001" placeholder="latitude" name="latitude"
                               value="{{old("latitude",isset($model) ? ($model->latitude ?? '') : '')}}"
                               class="form-control">
                        @error("latitude")
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

@push('js')
    <script src="{{asset('js/summernote.js')}}"></script>
@endpush
