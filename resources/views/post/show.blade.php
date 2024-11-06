@extends('Layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-bordered border-secondary mt-4">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Image</th>
                    </tr>
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td><img src="{{asset($post->image)}}" alt="" width="200px"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
