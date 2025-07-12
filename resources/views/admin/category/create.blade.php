@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    {{-- <h1>Category</h1> --}}
@stop

@section('content')
    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">New Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Cover Image</label>
                    <div class="input-group">
                        <input type="file" name="cover_page" id="" class="form-control">
                    </div>

                    @error('cover_page')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

@stop

@section('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@stop
