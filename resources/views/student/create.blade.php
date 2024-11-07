@extends('Layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div>
                    <a href="{{route('student')}}" class="btn btn-primary">Student</a>
                </div>
                <form class="form-group mt-4" action="{{route('student.store')}}" method="post">
                    @csrf
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name"><br>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Enter Phone"><br>
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Enter Address"><br>
                    <input type="submit" value="Add" class="btn btn-outline-info">
                </form>
            </div>
        </div>
    </div>
@endsection

