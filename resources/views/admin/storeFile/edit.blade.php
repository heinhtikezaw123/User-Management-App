{{-- @extends('admin.layouts.master')

@section('title','Edit File Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-12-md">
                <form method="post" action="{{ route('admin#updateFile',['file' => basename($file)]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Choose File:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file">
                            <label class="custom-file-label" for="file">{{ $file }}</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection --}}


{{-- @extends('admin.layouts.master')

@section('title','Upload Files Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-12-md">
                <form method="post" action="{{ route('admin#uploadFile') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="file" name="file">
                    </div>
                    <div>
                        <label for="storageOption">Choose to store file : </label>
                        <select name="storageOption" id="storageOption">
                            <option value="local">Local Storage</option>
                            <option value="do">Digital Ocean Space</option>
                        </select>
                    </div>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection --}}

{{-- @extends('admin.layouts.master')

@section('title','Upload Files Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-12-md">
                <form method="post" action="{{ route('admin#uploadFile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Select File</label>
                        <input type="file" class="form-control-file" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <label for="storage-location">Storage Location</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="storage_location" id="local-storage" value="local" checked>
                            <label class="form-check-label" for="local-storage">
                                Local Storage
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="storage_location" id="do-space" value="do">
                            <label class="form-check-label" for="do-space">
                                Digital Ocean Space
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection --}}

@extends('admin.layouts.master')

@section('title', 'Edit Files Page')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h3 class="card-title">Update File</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin#updateFile',['file' => basename($file)]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="file" class="form-label"><strong>Choose a file</strong></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control @error('file') is-invalid @enderror" id="file" name="file">
                                        {{-- <input type="text" class="custom-file-label" value="{{ basename($file) }}"> --}}
                                        <label class="custom-file-label" for="file">{{ basename($file) }}</label>
                                    </div>
                                    {{-- <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror"> --}}
                                    @error('file')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 mt-4">
                                    <label for="storage" class="form-label"><strong>Choose storage option</strong></label>
                                    <div class="form-check">
                                        <input type="radio" name="storage" id="storage_do" checked value="do" class="form-check-input">
                                        <label for="storage_do" class="form-check-label">Digital Ocean Space</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="storage" id="storage_local" value="local" class="form-check-input" >
                                        <label for="storage_local" class="form-check-label">Local Storage</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
