@extends('Layout.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <a href="{{route('category')}}" class="btn btn-primary">Category</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{ route('category.store') }}"
                              method="POST">
                            @csrf
                            <div class="mb-3">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control"
                                       name="name" value="{{old('name')}}" placeholder="Enter name"><br>
                                @error('tr')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" class="form-control"
                                       name="tr" value="{{old('tr')}}">
                                <input type="submit" value="Add Post" class="btn btn-outline-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
