@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт</h1>
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
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Редагувати</a>
                            </div>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Видалити">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>Продукт</td>
                                    <td>Опис</td>
                                    <td>Категорія</td>
                                </tr>
                                <tr>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->categories()->pluck('title')->implode(', ')}}</td>
                                </tr>
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
