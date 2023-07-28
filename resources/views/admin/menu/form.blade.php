@extends('admin.layouts.admin',['title'=>'Menu'])


@section('content')
    <?php  $routeName='admin.menu' ?><br>
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
                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}
                                          @error("$langKey.name") text-danger @enderror"
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
                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}
                                 @error("$langKey.name"  )
                                                 text-danger @enderror" id="title-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                   <div class="row">
                                       <div class="form-group col-6">
                                           <label>Name</label>
                                           <input type="text" placeholder="name {{$lang}}" name="{{$lang}}[name]"
                                                  value="{{old("$lang.name",isset($model) ? ($model->translateOrDefault($lang)->name ?? '') : '')}}"
                                                  class="form-control">
                                           @error("$lang.name")
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
                        <label>Url</label>
                        <input type="text" placeholder="url" name="url"
                               value="{{old("url",isset($model) ? ($model->url ?? '') : '')}}"
                               class="form-control">
                        @error("url")
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

{{--@push('js')--}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            getCategoryAttributes($('.product-category').trigger('change').val());--}}
{{--            const $product_id={{@isset($model) ? $model->id : ''}};--}}
{{--            $('.product-category').on('change',function (){--}}
{{--                getCategoryAttributes($(this).val());--}}
{{--            });--}}

{{--            function getCategoryAttributes($category_id){--}}
{{--                $.ajax({--}}
{{--                    method: 'get',--}}
{{--                    url: "{{route('admin.category-attributes',['categoryId','productId'])}}"--}}
{{--                        .replace('categoryId',$category_id)--}}
{{--                        .replace('productId',$('.product-category').val()),--}}
{{--                    success(response) {--}}
{{--                        $('#attributes-area').html(response);--}}
{{--                        $('#select2').select2();--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
