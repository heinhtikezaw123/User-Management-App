@extends('admin.layouts.master')

@section('title','Add New User Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card shadow rounded-4">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2"> Add New User</h3>
                        </div>
                        <hr>

                        <form action="{{ route('admin#addUser') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="row col-8 offset-2">

                                    <div class="form-group">
                                        <label class="control-label mb-1">Name</label>
                                        <input id="cc-pament" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" aria-required="true" aria-invalid="false" placeholder="Enter your name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label class="control-label mb-1">Email</label>
                                        <input id="cc-pament" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-invalid="false" placeholder="Enter your email">
                                    </div>
                                    @error('email')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label class="control-label mb-1">User Name</label>
                                        <input id="cc-pament" name="userName" type="text" class="form-control @error('userName') is-invalid @enderror" value="{{ old('userName') }}" aria-required="true" aria-invalid="false" placeholder="Enter your username">
                                    </div>
                                    @error('userName')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label class="control-label mb-1">Phone</label>
                                        <input id="cc-pament" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" aria-invalid="false" placeholder="Enter your phone">
                                    </div>
                                    @error('phone')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" name="password" autocomplete="off" placeholder="Password">
                                    </div>
                                    @error('password')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label>ConfirmPassword</label>
                                        <input class="au-input au-input--full" type="password" name="confirmPassword" placeholder="Confirm Password">
                                    </div>
                                    @error('confirmPassword')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror


                                    <div class="form-group">
                                        <label class="control-label mb-1">Gender</label>
                                        <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">Choose Gender...</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label class="control-label mb-1 ">Role</label>
                                        <select name="roleId" id="roleId" class="form-control @error('roleId') is-invalid @enderror">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('roleId')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="mt-3 col-5 offset-7">
                                        <button type="submit" class="btn bg-dark text-white w-100">
                                           <i class="fa-solid fa-circle-chevron-right me-1"></i> Create
                                        </button>
                                    </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
