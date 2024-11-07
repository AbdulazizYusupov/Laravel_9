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
                        <a href="{{route('product')}}" class="btn btn-primary">Products</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{ route('product.store') }}"
                              method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control"
                                       name="name" placeholder="Enter name"><br>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control"
                                       name="price" placeholder="Enter price"><br>
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label class="form-label">Count</label>
                                <input type="number" class="form-control"
                                       name="count" placeholder="Enter count">
                                <input type="submit" value="Add Post" class="btn btn-outline-info">
                                @error('count')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
