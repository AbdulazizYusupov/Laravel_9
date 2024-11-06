@extends('Layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                @if (session('create'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('create') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('update'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('update') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div>
                    <a href="{{route('post.create')}}" class="btn btn-primary">Add Post</a>
                </div>
                <table class="table table-striped mt-4">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Image</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td><img src="{{asset($post->image)}}" alt="" width="200px"></td>
                            <td>
                                <a href="{{route('post.show', $post->id)}}" class="btn btn-info">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit{{$post->id}}">
                                    <i class="fas fa-pencil"></i>
                                </button>

                                <div class="modal fade" id="edit{{$post->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('post.update', $post->id )}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="title">Title</label><br>
                                                        <input type="text" class="form-control" id="title" name="title"
                                                               value="{{ $post->title }}"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body">Body</label><br>
                                                        <input type="text" class="form-control" id="body" name="body"
                                                               value="{{ $post->body }}"><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('post.destroy', $post->id)}}" class="btn btn-danger">
                                    <i class="fas fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

