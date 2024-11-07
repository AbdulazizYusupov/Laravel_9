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
                        <a href="{{route('role')}}" class="btn btn-primary">Roles</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{ route('role.store') }}"
                              method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control"
                                       name="name">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Permissions</label>
                                    <select name="permissions[]" class="select2"
                                            multiple="multiple"
                                            data-placeholder="Select a Permission"
                                            aria-label="Select permissions"
                                            style="width: 100%;">
                                        @foreach ($permissions as $per)
                                            <option value="{{ $per->id }}">
                                                {{ $per->key }}
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
