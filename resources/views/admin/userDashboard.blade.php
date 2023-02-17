@extends('admin.layouts.master')

@section('title','User Dashboard Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-12-md">
                <h1>Welcome {{ ucfirst(Auth::user()->name) }} !</h1>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
