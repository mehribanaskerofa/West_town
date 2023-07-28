@extends('admin.layouts.admin',['title'=>'Company'])


@section('content')
    <?php  $routeName='admin.company' ?><br>
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
                                       <div class="form-group col-3">
                                           <label>Title</label>
                                           <input type="text" placeholder="title {{$lang}}" name="{{$lang}}[title]"
                                                  value="{{old("$lang.title",isset($model) ? ($model->translateOrDefault($lang)->title ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.title")
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                       </div>
                                       <div class="form-group col-3">
                                           <label>Address</label>
                                           <input type="text" placeholder="address {{$lang}}" name="{{$lang}}[address]"
                                                  value="{{old("$lang.address",isset($model) ? ($model->translateOrDefault($lang)->address ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.address")
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                       </div>
                                       <div class="form-group col-3">
                                           <label>Zone</label>
                                           <input type="text" placeholder="zone {{$lang}}" name="{{$lang}}[zone]"
                                                  value="{{old("$lang.zone",isset($model) ? ($model->translateOrDefault($lang)->zone ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.zone")
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                       </div>
                                       <div class="form-group col-3">
                                           <label>Territory</label>
                                           <input type="text" placeholder="territory {{$lang}}" name="{{$lang}}[territory]"
                                                  value="{{old("$lang.territory",isset($model) ? ($model->translateOrDefault($lang)->territory ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.territory")
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
                    <div class="form-group col-3">
                        <label>Phone</label>
                        <input type="text" placeholder="phone" name="phone"
                               value="{{old("phone",isset($model) ? ($model->phone ?? '') : '')}}"
                               class="form-control">
                        @error("phone")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label>Email</label>
                        <input type="text" placeholder="email" name="email"
                               value="{{old("email",isset($model) ? ($model->email ?? '') : '')}}"
                               class="form-control">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-2">
                        <label>Project count</label>
                        <input type="number" placeholder="project_count" name="project_count"
                               value="{{old("project_count",isset($model) ? ($model->project_count ?? '') : '')}}"
                               class="form-control">
                        @error("project_count")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-2">
                        <label>Block count</label>
                        <input type="number" placeholder="block_count" name="block_count"
                               value="{{old("block_count",isset($model) ? ($model->block_count ?? '') : '')}}"
                               class="form-control">
                        @error("block_count")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-2">
                        <label>House count</label>
                        <input type="number" placeholder="house_count" name="house_count"
                               value="{{old("house_count",isset($model) ? ($model->house_count ?? '') : '')}}"
                               class="form-control">
                        @error("house_count")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label>Iframe Address</label>
                        <input type="text" placeholder="iframe" name="iframe"
                               value="{{old("iframe",isset($model) ? ($model->iframe ?? '') : '')}}"
                               class="form-control">
                        @error("iframe")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label>Videokamera</label>
                        <input type="text" placeholder="visual" name="visual"
                               value="{{old("visual",isset($model) ? ($model->visual ?? '') : '')}}"
                               class="form-control">
                        @error("visual")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
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
                    <div class="form-group col-2">
                        <label>Color</label>
                        <input type="color" placeholder="color" name="color"
                               value="{{old("color",isset($model) ? ($model->color ?? '') : '')}}"
                               class="form-control">
                        @error("color")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
{{--                    <div class="form-group col-2">--}}
{{--                        <label>Active</label>--}}
{{--                        <input type="checkbox" class="mt-4" name="active" value="1" @checked(old('active',$model->active ?? ''))>--}}
{{--                        @error('active')--}}
{{--                        <span class="text-danger">{{$message}}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
                    <div class="form-group col-4">
                        <label>Options</label>
                        <select multiple="multiple" name="options[]" class="form-control select" data-fouc>
                            @foreach($options as $option)
                                <option value="{{$option->id}}"
                                @isset($model)   @selected(in_array($option->id,(old('options[]',$model->options->pluck('id')->toArray())))) @endisset
                                >{{$option->title}}</option>
                            @endforeach
                        </select>
                    </div>



                    @isset($model->image)
                        <div class="form-group col-2 pt-3">
                            <img src="{{asset('storage/'.$model->image)}}" width="100px" >
                        </div>
                    @endisset
                    <div class="form-group col-3">
                        <label>Image</label>
                        <input type="file"  name="image" class="form-control">
                        @error('image')
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
