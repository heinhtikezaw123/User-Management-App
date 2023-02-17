@extends('admin.layouts.master')

@section('title','Role List Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">All Roles</h2>
                        </div>
                    </div>
                    <div class="table-data__tool-right">
                        @if (in_array(6, $permissionIDs))
                            <a href="{{ route('admin#addRolePage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add new role
                                </button>
                            </a>
                        @endif
                        @if (Auth::user()->role->name == 'admin')
                            <a href="{{ route('admin#addRolePage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add new role
                                </button>
                            </a>
                        @endif
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>
                </div>
                {{-- bootstrap alert after creating category--}}
                @if (session('SuccessRole'))
                    <div class='col-4 offset-8'>
                        <<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('SuccessRole')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session('roleDeleted'))
                <div class='col-4 offset-8'>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('roleDeleted') }}!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                @if (session('updateRole'))
                <div class='col-4 offset-8'>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('updateRole') }}!</strong>
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

                {{-- <div class="row my-2">
                    <div class="col-5">
                        <h3> Total   ( {{ $roleList->total() }} )</h3>
                    </div>
                </div> --}}

                {{-- @if(count($categories) != 0) --}}
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($roleList as $r )
                                    <tr class="tr-shadow">
                                        <td>{{ $r->id }}</td>
                                        <td>{{ $r->name }}</td>
                                        <td class="text-center">
                                            <div class=" text-center" @if ( $r->name == 'admin') hidden @endif>
                                                @if (Auth::user()->role->name == 'admin')
                                                    <a href="{{ route('admin#editRolePage',['id' => $r->id]) }}">
                                                        <button class="btn btn-sm btn-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                        </button>
                                                    </a>
                                                @endif
                                                @if (in_array(7, $permissionIDs))
                                                    <a href="{{ route('admin#editRolePage',['id' => $r->id]) }}">
                                                        <button class="btn btn-sm btn-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                        </button>
                                                    </a>
                                                @endif


                                                @if (Auth::user()->role->name == 'admin')
                                                    <a href="{{ route('admin#deleteRole',['id' => $r->id]) }}" >
                                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa-sharp fa-solid fa-trash me-2"></i>Delete
                                                        </button>
                                                    </a>
                                                @endif
                                                @if (in_array(8, $permissionIDs))
                                                    <a href="{{ route('admin#deleteRole',['id' => $r->id]) }}" >
                                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa-sharp fa-solid fa-trash me-2"></i>Delete
                                                        </button>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>


                        {{-- <div class="mt-3">
                            {{ $categories->links() }}
                        </div> --}}
                    </div>

                {{-- @else --}}
                    {{-- <h3 class="text-secondary text-center mt-5">There is no categories here</h3> --}}
                {{-- @endif --}}
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
