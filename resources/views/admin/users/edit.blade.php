@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin.the_best')}}
@endsection

@section('pageSubTitle')
    {{trans('admin.edit_user')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin.users')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home">{{trans('admin.home')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin.edit_user')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span style="color:red;">{{$error}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>    
        @endforeach

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin.edit_user')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{-- @include('alert') --}}
                        <form class="form form-horizontal needs-validation" novalidate method="post" enctype="multipart/form-data" action="{{route('users.update', $user->id)}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.name')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin.name')}}" name="name" value="{{$user->name}}" required>
                                                <div class="invalid-feedback">
                                                    @error('name')
                                                        {{$message}}
                                                    @enderror
                                                    {{trans('admin.please_enter_name')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.email')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="email" class="form-control" placeholder="{{trans('admin.email')}}" value="{{$user->email}}" name="email">
                                                <div class="invalid-feedback">
                                                    @error('email')
                                                        {{$message}}
                                                    @enderror
                                                    {{trans('admin.please_enter_email')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.image')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="image" accept=".gif, .jpg, .png, .webp">
                                                <div class="inavlid-feedback">
                                                    @error('image')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{$user->image == null ? '/images/user.png' : $user->image}}" width="100px" height="100px" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{trans('admin.save')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
