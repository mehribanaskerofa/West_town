@extends('admin.layouts.admin',['title'=>'Settings'])


@section('content')
    <?php  $routeName='admin.setting' ?><br>
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

                <div class="row">
                    <div class="form-group col-4">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email"
                               value="{{old("email",isset($model) ? ($model->email ?? '') : '')}}"                        >
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone"
                               value="{{old("phone",isset($model) ? ($model->phone ?? '') : '')}}"
                        >
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label>Icon</label>
                        <input type="text" class="form-control" name="icon"
                               value="{{old("icon",isset($model) ? ($model->icon ?? '') : '')}}"                        >
                        @error('icon')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                @isset($model->image)
                        <div class="form-group col-2">
                            <img src="{{asset('storage/'.$model->image)}}" width="150px">
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
