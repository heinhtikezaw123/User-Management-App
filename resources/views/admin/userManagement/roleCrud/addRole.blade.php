@extends('admin.layouts.master')

@section('title','Add Role')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card shadow rounded-4">
                    <div class="card-body">
                        <div class="cahhrd-title">
                            <h3 class="text-center title-2">Add New Role</h3>
                        </div>
                        <hr>

                        <form action="{{ route('admin#addRole') }}" method="POST" class="ms-4">
                            @csrf
                                <div class="form-group">
                                    <label class="control-label mb-1 fs-5">Role Name :</label> <br>
                                    <input type="text" class="form-control col-4  @error('roleName') is-invalid @enderror" name="roleName" placeholder="Role Name">
                                    @error('roleName')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label mb-1 fs-5">Permissions :</label> <br>

                                    @foreach ($feature as $f)
                                        <div class="uer-permission row mb-5">
                                            <div class="col fs-4">{{ ucfirst($f->name) }}</div>
                                            <div class="col">
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input rounded-0 fs-2 " type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    Select All
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                @foreach ($f->permissions as $permission)
                                                    <div class="row">
                                                        <div class="form-check d-flex align-items-center mb-4 row">
                                                            <input class="form-check-input rounded-0 fs-2" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                                            <label class="form-check-label" for="{{ $permission->id }}">
                                                                {{ ucfirst($permission->name) .' '. ucfirst($f->name) }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="my-5 col-3 ms-auto">
                                    <button type="submit" class="btn bg-dark text-white w-100">
                                       <i class="fa-solid fa-circle-chevron-right me-1" id='create_btn'></i> Create
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection




