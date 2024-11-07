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
                        <form action="{{ route('user.store') }}"
                              method="POST">
                            @csrf
                            <div class="mb-3">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" value="{{old('name')}}" class="form-control"
                                       name="name" placeholder="name"><br>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="email" value="{{old('email')}}" class="form-control"
                                       name="email" placeholder="email"><br>
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="password" class="form-control"
                                       name="password" placeholder="Password">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Roles</label>
                                    <select name="roles[]" class="select2"
                                            multiple="multiple"
                                            data-placeholder="Select a Role"
                                            aria-label="Select roles"
                                            style="width: 100%;">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary">Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
