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
                    <a href="{{route('student.create')}}" class="btn btn-primary">Add Student</a>
                </div>
                <table class="table table-striped mt-4">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($students as $student)
                        <tr>
                            <th>{{$student->id}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->address}}</td>
                            <td>
                                <a href="{{route('student.show', $student->id)}}" class="btn btn-info">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit{{$student->id}}">
                                    <i class="fas fa-pencil"></i>
                                </button>

                                <div class="modal fade" id="edit{{$student->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('student.update', $student->id )}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">Name</label><br>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               value="{{ $student->name }}"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label><br>
                                                        <input type="text" class="form-control" id="phone" name="phone"
                                                               value="{{ $student->phone }}"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label><br>
                                                        <input type="text" class="form-control" id="address"
                                                               name="address"
                                                               value="{{ $student->address }}"><br>
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
                                <a href="{{route('student.destroy', $student->id)}}" class="btn btn-danger">
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

