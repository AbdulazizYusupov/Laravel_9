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
                        <a href="{{route('user')}}" class="btn btn-primary">Roles</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{route('user.create')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Enter name"><br>
                                    @error('name')
                                    <spam class="text-danger">
                                        {{ $message }}
                                    </spam>
                                    @enderror<input type="email" class="form-control" name="email" placeholder="Enter email"><br>
                                    @error('email')
                                    <spam class="text-danger">
                                        {{ $message }}
                                    </spam>
                                    @enderror<input type="password" class="form-control" name="password" placeholder="Enter password"><br>
                                    @error('password')
                                    <spam class="text-danger">
                                        {{ $message }}
                                    </spam>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
