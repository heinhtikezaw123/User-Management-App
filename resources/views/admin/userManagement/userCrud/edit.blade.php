@extends('admin.layouts.master')

@section('title','Edit User List Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card shadow rounded-4">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Edit User Account</h3>
                        </div>
                        <hr>

                        <form action="{{ route('admin#editUser') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-4 offset-1">
                                    @if ($userList->image == null)
                                        @if ($userList->gender == 'male')
                                            <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm" />
                                        @else
                                            <img src="{{asset('image/female_user.png')}}" class="img-thumbnail shadow-sm" />
                                        @endif
                                    @else
                                        <img src="{{asset('storage/'.$userList->image)}}" class="img-thumbnail"  />
                                    @endif
                                    {{-- <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm" /> --}}
                                    <div class="row">
                                        <input type="file" class="mt-4" name="image" id="">
                                    </div>
                                </div>

                                <div class="row col-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Name</label>
                                        <input id="cc-pament" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$userList->name) }}" aria-required="true" aria-invalid="false" placeholder="Enter your name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <input id="cc-pament" name="id" type="text"  style="display:none" class="form-control hidden @error('name') is-invalid @enderror" value="{{ old('id',$userList->id) }}" aria-required="true" aria-invalid="false" placeholder="Enter your name">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-1">User Name</label>
                                        <input id="cc-pament" name="userName" type="text" class="form-control @error('userName') is-invalid @enderror" value="{{ old('userName',$userList->user_name) }}" aria-required="true" aria-invalid="false" placeholder="Enter your username">
                                    </div>
                                    @error('userName')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label class="control-label mb-1">Email</label>
                                        <input id="cc-pament" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$userList->email) }}" aria-invalid="false" placeholder="Enter your email">
                                    </div>
                                    @error('email')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror


                                    <div class="form-group">
                                        <label class="control-label mb-1">Phone</label>
                                        <input id="cc-pament" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$userList->phone) }}" aria-invalid="false" placeholder="Enter your phone">
                                    </div>
                                    @error('phone')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror


                                    <div class="form-group">
                                        <label class="control-label mb-1">Gender</label>
                                        <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">Choose Gender...</option>
                                            <option value="male"  {{ ($userList->gender == 'male') ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ ($userList->gender == 'female') ? 'selected' : '' }}>Female</option>
                                          </select>
                                    </div>
                                    @error('gender')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror

                                    <div class="form-group">
                                        <label class="control-label mb-1">Role</label>
                                        <select name="roleId" id="roleId" class="form-control @error('roleId') is-invalid @enderror">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ $role->id == $userList->role_id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
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
                                           <i class="fa-solid fa-circle-chevron-right me-1"></i> Update
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



