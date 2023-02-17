@extends('admin.layouts.master')

@section('title','User List Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">All Users</h2>
                        </div>
                    </div>
                    <div class="table-data__tool-right">

                        @if (Auth::user()->role->name == 'admin')
                            <a href="{{ route('admin#addUserPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add user
                                </button>
                            </a>
                        @endif
                        @if (in_array(2, $permissionIDs))
                            <a href="{{ route('admin#addUserPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add user
                                </button>
                            </a>
                        @endif

                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>
                </div>
                {{-- bootstrap alert after creating category--}}
                @if (session('userCreated'))
                    <div class='col-4 offset-8'>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('userCreated')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session('userDeleted'))
                <div class='col-4 offset-8'>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('userDeleted') }}!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                @if (session('userUpdated'))
                <div class='col-4 offset-8'>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{ session('userUpdated') }}!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-3">
                        <h4 class="text-secondary">Search Key : <span class="text-danger">{{ request('key') }}</span></h4>
                    </div>

                    <div class="col-3 offset-6">
                        <form action="#" method="GET">
                            <div class="d-flex">
                                <input type="text" name="key" class="form-control" placeholder="Search..." value="{{ request('key') }}">
                                <button class="btn bg-dark text-white" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
{{--
                <div class="row my-2">
                    <div class="col-5">
                        <h3> Total   ( {{ $userList->total() }} )</h3>
                    </div>
                </div> --}}

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2 text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">user name</th>
                                <th scope="col">name</th>
                                <th scope="col">role</th>
                                <th scope="col">email</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($userList as $user )
                                <tr class="tr-shadow">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if ($user->role)
                                            {{ $user->role->name }}
                                        @else
                                            <span class="text-danger">No role assigned</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->id == 1)
                                        <td></td>
                                    @else
                                        <td>
                                            <div class="table-data-feature">
                                                @if (Auth::user()->role->name == 'admin')
                                                    <a href="{{ route('admin#editUserPage',['id' => $user->id]) }}">
                                                        <button class="btn btn-sm btn-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                        </button>
                                                    </a>
                                                @endif
                                                @if (in_array(3, $permissionIDs))
                                                    <a href="{{ route('admin#editUserPage',['id' => $user->id]) }}">
                                                        <button class="btn btn-sm btn-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                        </button>
                                                    </a>
                                                @endif

                                                @if (Auth::user()->role->name == 'admin')
                                                    <a href="{{ route('admin#deleteUser',['id' => $user->id]) }}" >
                                                        <button class="btn btn-sm btn-danger me-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa-sharp fa-solid fa-trash me-2"></i>Delete
                                                        </button>
                                                    </a>
                                                @endif
                                                @if (in_array(4, $permissionIDs))
                                                    <a href="{{ route('admin#deleteUser',['id' => $user->id]) }}" >
                                                        <button class="btn btn-sm btn-danger me-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa-sharp fa-solid fa-trash me-2"></i>Delete
                                                        </button>
                                                    </a>
                                                @endif

                                                @if (Auth::user()->role->name == 'admin')
                                                    <a href="{{ route('admin#ViewUserPage',['id' => $user->id]) }}" >
                                                        <button class="btn btn-sm btn-info me-2 text-white" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fa-sharp fa-solid fa-eye me-2 text-white"></i>View
                                                        </button>
                                                    </a>
                                                @endif
                                                @if (in_array(1, $permissionIDs))
                                                    <a href="{{ route('admin#ViewUserPage',['id' => $user->id]) }}" >
                                                        <button class="btn btn-sm btn-info me-2 text-white" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fa-sharp fa-solid fa-eye me-2 text-white"></i>View
                                                        </button>
                                                    </a>
                                                @endif

                                            </div>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach




                        </tbody>
                    </table>


                    {{-- <div class="mt-3">
                        {{ $categories->links() }}
                    </div> --}}
                </div>


                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
