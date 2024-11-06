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
                    <input type="text" name="name" class="form-control" placeholder="Enter Name"><br>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone"><br>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address"><br>
                    <input type="submit" value="Add" class="btn btn-outline-info">
                </form>
            </div>
        </div>
    </div>
@endsection

