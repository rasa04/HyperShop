<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!--PRODUCT-->
                <h1 class="m-0">
                @if(Route::current()->getName() === 'product.index') <b>Products</b>
                @elseif(Route::current()->getName() === 'product.show') <a href="{{route('product.index')}}">Products</a>/{{$product->id}}
                @elseif(Route::current()->getName() === 'product.edit') <a href="{{route('product.index')}}">Products</a>/<a href="{{ route('product.show', $product->id) }}">{{$product->id}}</a>/edit
                @elseif(Route::current()->getName() === 'product.create') <a href="{{route('product.index')}}">Products</a>/create
                <!--BRAND-->
                @elseif(Route::current()->getName() === 'brand.index') <b>Brands</b>
                @elseif(Route::current()->getName() === 'brand.show') <a href="{{route('brand.index')}}">Brands</a>/{{$brand->id}}
                @elseif(Route::current()->getName() === 'brand.edit') <a href="{{route('brand.index')}}">Brands</a>/<a href="{{ route('brand.show', $brand->id) }}">{{$brand->id}}</a>/edit
                @elseif(Route::current()->getName() === 'brand.create') <a href="{{route('brand.index')}}">Brands</a>/create
                <!--CATEGORY-->
                @elseif(Route::current()->getName() === 'category.index') <b>Categories</b>
                @elseif(Route::current()->getName() === 'category.show') <a href="{{route('category.index')}}">Categories</a>/{{$category->id}}
                @elseif(Route::current()->getName() === 'category.edit') <a href="{{route('category.index')}}">Categories</a>/<a href="{{ route('category.show', $category->id) }}">{{$category->id}}</a>/edit
                @elseif(Route::current()->getName() === 'category.create') <a href="{{route('category.index')}}">Categories</a>/create
                <!--USERS-->
                @elseif(Route::current()->getName() === 'user.index') <b>Users</b>
                @elseif(Route::current()->getName() === 'user.show') <a href="{{route('user.index')}}">Users</a>/{{$user->id}}
                @elseif(Route::current()->getName() === 'user.edit') <a href="{{route('user.index')}}">Users</a>/<a href="{{ route('user.show', $user->id) }}">{{$user->id}}</a>/edit
                @elseif(Route::current()->getName() === 'user.create') <a href="{{route('user.index')}}">Users</a>/create
                @endif
                </h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <!--PRODUCT-->
            <ol class="breadcrumb float-sm-right">
                @if(Route::current()->getName() == 'product.index')
                        <li class="breadcrumb-item active">Products</li>
                @elseif(Route::current()->getName() === 'product.show') <li class="breadcrumb-item active">{{ $product->name }}/<a href="{{route('product.index')}}">Products</a></li>
                @elseif(Route::current()->getName() === 'product.edit') <li class="breadcrumb-item active">edit /<a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>/<a href="{{route('product.index')}}">Products</a></li>
                @elseif(Route::current()->getName() === 'product.create') <li class="breadcrumb-item active">create /<a href="{{route('product.index')}}">Products</a></li>
                <!--BRAND-->
                @elseif(Route::current()->getName() == 'brand.index') <li class="breadcrumb-item active">Brands</li>
                @elseif(Route::current()->getName() === 'brand.show') <li class="breadcrumb-item active">{{ $brand->name }}/<a href="{{route('brand.index')}}">Brands</a></li>
                @elseif(Route::current()->getName() === 'brand.edit') <li class="breadcrumb-item active">edit /<a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a>/<a href="{{route('brand.index')}}">Brands</a></li>
                @elseif(Route::current()->getName() === 'brand.create') <li class="breadcrumb-item active">create /<a href="{{route('brand.index')}}">Brands</a></li>
                <!--CATEGORY-->
                @elseif(Route::current()->getName() == 'category.index') <li class="breadcrumb-item active">Categories</li>
                @elseif(Route::current()->getName() === 'category.show') <li class="breadcrumb-item active">{{ $category->name }}/<a href="{{route('category.index')}}">Categories</a></li>
                @elseif(Route::current()->getName() === 'category.edit') <li class="breadcrumb-item active">edit /<a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>/<a href="{{route('category.index')}}">Categories</a></li>
                @elseif(Route::current()->getName() === 'category.create') <li class="breadcrumb-item active">create /<a href="{{route('category.index')}}">Categories</a></li>
                <!--USERS-->
                @elseif(Route::current()->getName() == 'user.index') <li class="breadcrumb-item active">Users</li>
                @elseif(Route::current()->getName() === 'user.show') <li class="breadcrumb-item active">{{ $user->name }}/<a href="{{route('user.index')}}">Users</a></li>
                @elseif(Route::current()->getName() === 'user.edit') <li class="breadcrumb-item active">edit /<a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>/<a href="{{route('user.index')}}">Users</a></li>
                @elseif(Route::current()->getName() === 'user.create') <li class="breadcrumb-item active">create /<a href="{{route('user.index')}}">Users</a></li>
                @endif
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
