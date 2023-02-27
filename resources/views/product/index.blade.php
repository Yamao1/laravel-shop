@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукти</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('products.create')}}" class="btn btn-primary">Додати Продукт</a>
                        </div>

                        @if( $categories->isNotEmpty())
                        <div class="card-header">
                            <form action="{{ route('filter.index') }}" method="get" >
                                <div class="form-group">
                                    <select name="category_id" class="tags"  data-placeholder="Оберіть категорію" style="width: 10%;">
                                        <option  disabled selected>Тег</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->title }}">{{$category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Фільтрувати по категорії">
                                </div>
                            </form>
                            <form action="{{ route('products.index') }}" method="get" >
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Очистити фыльтр">
                                </div>
                            </form>
                        </div>
                        @endif
                        @if( $categories->isEmpty())
                            <span>Немає категорій для фільтру</span>
                        @endif
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Назва</th>
                                    <th>опис</th>
                                    <th>Категорія</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><a href="{{route('products.show', $product->id)}}">{{$product->title}}</a>
                                        </td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->categories()->pluck('title')->implode(', ')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('.filter1').click(function (){
                let order = $(this).data('order')
                console.log(order)
            })
        })
    </script>
@endsection
