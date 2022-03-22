@extends('layouts.app')
@section('title') Sample Title @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="#">Sample</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sample Page</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 ">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-feather mr-2"></i>
                        Sample Page
                    </h4>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi, ducimus eos ipsa minus necessitatibus obcaecati porro quod saepe similique soluta tempora vel voluptates? Ad beatae deserunt magnam quibusdam vero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid aperiam consequatur doloremque ea, eaque exercitationem, harum illum impedit inventore laboriosam necessitatibus nihil nisi non nostrum numquam, pariatur quod sunt.</p>

                </div>
            </div>
        </div>
    </div>
@endsection
