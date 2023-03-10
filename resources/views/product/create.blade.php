@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Додати продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('main.index') }}" >Головна</a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Найменування">
                        @error('title') <span class="text-danger error"><small>{{ $message }}</small></span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Опис">
                        @error('description') <span class="text-danger error"><small>{{ $message }}</small></span>@enderror
                    </div>
                    <div class="form-group">
                        <select name="category_id[]" class="tags" multiple="multiple" data-placeholder="Оберіть категорію" style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger error"><small>{{ $message }}</small></span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="иет btn-primary" value="Додати">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
