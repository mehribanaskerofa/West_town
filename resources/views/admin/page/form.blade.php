@extends('admin.layouts.admin',['title'=>'Page'])


@section('content')
    <?php  $routeName='admin.page' ?><br>
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
                                                "$langKey.description" ||
                                                "$langKey.slug" ||
                                                "$langKey.button")
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
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="title-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                   <div class="row">
                                       <div class="form-group col-4">
                                           <label>Title</label>
                                           <input type="text" placeholder="title {{$lang}}" name="{{$lang}}[title]"
                                                  value="{{old("$lang.title",isset($model) ? ($model->translateOrDefault($lang)->title ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.title")
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                       </div>
                                       <div class="form-group col-4">
                                           <label>Slug</label>
                                           <input type="text" placeholder="Slug {{$lang}}" name="{{$lang}}[slug]"
                                                  value="{{old("$lang.slug",isset($model) ? ($model->translateOrDefault($lang)->slug ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.slug")
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                       </div>
                                       <div class="form-group col-4">
                                           <label>Button</label>
                                           <input type="text" placeholder="Button {{$lang}}" name="{{$lang}}[button]"
                                                  value="{{old("$lang.button",isset($model) ? ($model->translateOrDefault($lang)->button ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.button")
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                       </div>
                                       <div class="form-group col-12">
                                           <label>Description</label>
                                           <textarea id="summernote"  placeholder="Description {{$lang}}" name="{{$lang}}[description]"
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
