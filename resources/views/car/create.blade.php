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
                        <a href="{{route('car')}}" class="btn btn-primary">Cars</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{ route('car.store') }}"
                              method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" id="model">Model</label>
                                <input type="text" id="model" class="form-control"
                                       name="model" placeholder="Enter Model"><br>
                                @error('model')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label class="form-label" id="color">Color</label>
                                <input type="text" class="form-control"
                                       name="color" id="color" placeholder="Enter Color"><br>
                                @error('color')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label class="form-label" id="price">Price</label>
                                <input type="number" class="form-control"
                                       name="price" id="price" placeholder="Enter Price"><br>
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="submit" value="Add Post" class="btn btn-outline-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
