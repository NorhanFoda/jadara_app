@extends('admin.layouts.app')

@section('pageTitle')
{{trans('admin.jadara')}}
@endsection

@section('pageSubTitle') {{trans('admin.additional_links')}}
@endsection

@section('content')

    <div class="row" style="display:block">

        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">
                    {{trans('admin.additional_links')}}
                </h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home">{{trans('admin.additional_links')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin.additional_links')}}
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
                    <h4 class="card-title">{{trans('admin.additional_links')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal needs-validation" novalidate method="post" enctype="multipart/form-data" action="{{route('links.update', $link->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">

                                    {{-- additional links --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="text" name="text_ar" value="{{$link->text_ar}}" class="form-control" placeholder="{{trans('admin.text_ar')}}" required>
                                                        <div class="invalid-feedback">
                                                            {{trans('admin.text_ar')}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="text_en" value="{{$link->text_en}}" class="form-control" placeholder="{{trans('admin.text_en')}}" required>
                                                        <div class="invalid-feedback">
                                                            {{trans('admin.text_en')}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="url" name="link" value="{{$link->link}}" class="form-control" placeholder="{{trans('admin.link')}}" required>
                                                        <div class="invalid-feedback">
                                                            {{trans('admin.link')}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="file" name="icon" class="form-control" placeholder="{{trans('admin.icon')}}" accept=".gif, .jpg, .png, .webp">
                                                        <div class="invalid-feedback">
                                                            {{trans('admin.icon')}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <img src="{{$link->icon}}" alt="" width="100px" height="100px" style="border-radius: 5px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- additional kinks end --}}
    
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

@section('scripts')
    <script>
        function deletelink(link_id){
            $('#delete_link'+link_id).remove();
            $.ajax({
                url: "{{route('links.delete')}}",
                type: "POST",
                dataType: "html",
                data: {
                    "_token" : "{{csrf_token()}}",
                    id: link_id
                },
                success: function(data){
                }
            });
        }
    </script>
@endsection