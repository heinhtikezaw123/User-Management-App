@extends('admin.layouts.master')

@section('title','User Store File Lists')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <a href="{{ route('admin#uploadFilePage') }}">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Upload Files
                    </button>
                </a>

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2 text-center">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">File Name</th>
                                <th scope="col">Size</th>
                                <th scope="col">Last Modified</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr class="tr-shadow">
                                <td>
                                    @if (strpos($file, '.jpg') || strpos($file, '.avif') || strpos($file, '.apng') || strpos($file, '.jfif') || strpos($file, '.webp') || strpos($file, '.pjp') || strpos($file, '.pjpeg') || strpos($file, '.svg') || strpos($file, '.jpeg') || strpos($file, '.png') || strpos($file, '.gif') !== false)
                                        <img src="{{ Storage::disk('do')->url($file) }}" style="max-height: 50px; max-width: 50px;">
                                    @elseif (strpos($file, '.mp4') || strpos($file, '.avi') || strpos($file, '.mov') || strpos($file, '.wmv') || strpos($file, '.flv') !== false)
                                        <img src="{{ Storage::disk('do')->url($file) }}" style="max-height: 50px; max-width: 50px;">
                                    @elseif (strpos($file, '.pdf'))
                                        <img src="{{ asset('image/default_pdf.png') }}" alt="Default zip photo" style="max-height: 50px; max-width: 50px;">
                                    @elseif (strpos($file, '.zip'))
                                        <img src="{{ asset('image/default_zip.png') }}" alt="Default zip photo" style="max-height: 50px; max-width: 50px;">
                                    @elseif (strpos($file, '.doc') || strpos($file, '.docx') || strpos($file, '.txt') || strpos($file, '.html'))
                                        <img src="{{ asset('image/default_word.png') }}" alt="Default word photo" style="max-height: 50px; max-width: 50px;">
                                    @else
                                        <img src="{{ asset('image/default_file.png') }}" alt="Default File photo" style="max-height: 50px; max-width: 50px;">
                                    @endif
                                </td>

                                <td>{{ urldecode(basename($file)) }}</td>
                                <td>{{ formatSizeUnits(Storage::disk('do')->size($file)) }}</td>
                                <td>{{ \Carbon\Carbon::createFromTimestamp(Storage::disk('do')->lastModified($file))->diffForHumans() }}</td>
                                <td>


                                    <a href="{{ route('admin#deleteFile',['filename' => basename($file)]) }}" >
                                        <button class="btn btn-sm btn-danger me-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa-sharp fa-solid fa-trash me-2"></i>Delete
                                        </button>
                                    </a>

                                    <a href="{{ route('admin#downloadFile',['file' => basename($file)]) }}" >
                                        <button class="btn btn-sm btn-info me-2 text-white" data-toggle="tooltip" data-placement="top" title="Download">
                                            <i class="fa-solid fa-download me-2"></i>Download
                                        </button>
                                    </a>

                                    <a href="{{ route('admin#editFile',['file' => basename($file)]) }}">
                                        <button class="btn btn-sm btn-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                        </button>
                                    </a>
                                    {{-- <select  class="form-select" id="exampleFormControlSelect1">
                                        <option value="" class="d-none">Actions</option>
                                        <option value="delete">
                                            <a href="{{ route('admin#deleteFile',['filename' => basename($file)]) }}" >
                                                <button class="btn btn-sm btn-danger me-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa-sharp fa-solid fa-trash me-2"></i>Delete
                                                </button>
                                            </a>
                                        </option>
                                        <option value="download">
                                            <a href="{{ route('admin#downloadFile',['file' => basename($file)]) }}" >
                                                <button class="btn btn-sm btn-info me-2 text-white" data-toggle="tooltip" data-placement="top" title="Download">
                                                    <i class="fa-solid fa-download me-2"></i>Download
                                                </button>
                                            </a>
                                        </option>
                                        <option value="edit">
                                            <a href="{{ route('admin#editFile',['file' => basename($file)]) }}">
                                                <button class="btn btn-sm btn-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                </button>
                                            </a>
                                        </option>
                                    </select> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@php
function formatSizeUnits($bytes) {
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }
    return $bytes;
}
@endphp


