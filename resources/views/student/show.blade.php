@extends('Layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-hover table-bordered border-secondary mt-4">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                    <tr>
                        <th>{{$student->id}}</th>
                        <td>{{$student->name}}</td>
                        <td>{{$student->phone}}</td>
                        <td>{{$student->address}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
