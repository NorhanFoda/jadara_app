@extends('admin.layouts.app')

@section('pageTitle'){{trans('admin.home')}}
@endsection

@section('pageSubTitle') {{trans('admin.settings')}}
@endsection

@section('content')

    <div class="row" style="display:block">

        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">
                    {{trans('admin.settings')}}
                </h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/home">{{trans('admin.settings')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin.settings')}}
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
                    <h4 class="card-title">{{trans('admin.settings')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal needs-validation" novalidate method="post" enctype="multipart/form-data" action="{{route('settings.update', $settings->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">

                                    {{-- location --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.contact_us_numbers')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="input-group control-group increment" >
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <input type="text" name="contact_locations_ar[]" class="form-control" placeholder="{{trans('admin.location_ar')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.please_enter_contact_us_location')}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="contact_locations_en[]" class="form-control" placeholder="{{trans('admin.location_en')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.please_enter_contact_us_location')}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="contact_phones_1[]" class="form-control" placeholder="{{trans('admin.phone')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.please_enter_contact_us_phone_1')}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="contact_phones_2[]" class="form-control" placeholder="{{trans('admin.phone')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.please_enter_contact_us_phone_2')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success img-btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <div class="clone hidden">
                                                    <div class="control-group input-group" style="margin-top:10px">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <input type="text" name="contact_locations_ar[]" class="form-control" placeholder="{{trans('admin.location_ar')}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" name="contact_locations_en[]" class="form-control" placeholder="{{trans('admin.location_en')}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" name="contact_phones_1[]" class="form-control" placeholder="{{trans('admin.phone')}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" name="contact_phones_2[]" class="form-control" placeholder="{{trans('admin.phone')}}">
                                                            </div>
                                                        </div>
                                                        <div class="input-group-btn"> 
                                                            <button class="btn btn-danger img-btn-danger" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($contacts as $con)
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10" id="delete_contact{{$con->id}}">
                                                    <div class="control-group input-group" style="margin-top:10px">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <input type="text" disabled class="form-control" value="{{$con->location_ar}}" placeholder="{{trans('admin.location_ar')}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" disabled class="form-control" value="{{$con->location_en}}" placeholder="{{trans('admin.location_en')}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" disabled class="form-control" value="{{$con->phone_1}}" placeholder="{{trans('admin.phone')}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" disabled class="form-control" value="{{$con->phone_2}}" placeholder="{{trans('admin.phone')}}">
                                                            </div>
                                                        </div>
                                                        <div class="input-group-btn"> 
                                                            <button class="btn btn-danger" onclick="deleteContact({{$con->id}})" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- location end --}}

                                    {{-- enter email --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.email')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin.email')}}" name="email" value="{{$settings->email}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_email')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter email end --}}

                                    {{-- enter website --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.website')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="{{trans('admin.website')}}" name="website" value="{{$settings->website}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_website')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter website end --}}

                                    {{-- enter services --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.services')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="{{trans('admin.services')}}" name="services" value="{{$settings->services}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_services')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter services end --}}

                                    {{-- enter clients_area --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.clients_area')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="{{trans('admin.clients_area')}}" name="clients_area" value="{{$settings->clients_area}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_clients_area')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter clients_area end --}}
    
                                    {{-- enter whatsapp --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.whatsapp')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="{{trans('admin.whatsapp')}}" name="whatsapp" value="{{$settings->whatsapp}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_whatsapp')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter whatsapp end --}}

                                    {{-- enter chat --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.chat')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="url" class="form-control" placeholder="{{trans('admin.chat')}}" name="chat" value="{{$settings->chat}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_chat')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter chat end --}}

                                    {{-- enter visit --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.visit')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="url" class="form-control" placeholder="{{trans('admin.visit')}}" name="visit" value="{{$settings->visit}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_visit')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter visit end --}}

                                    {{-- enter meeting --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.meeting')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="url" class="form-control" placeholder="{{trans('admin.meeting')}}" name="meeting" value="{{$settings->meeting}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_meeting')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter meeting end --}}

                                    {{-- enter ticket --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.ticket')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="url" class="form-control" placeholder="{{trans('admin.ticket')}}" name="ticket" value="{{$settings->ticket}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_ticket')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter ticket end --}}

                                    {{-- enter contact --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.contact')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="url" class="form-control" placeholder="{{trans('admin.contact')}}" name="contact" value="{{$settings->contact}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.please_enter_contact')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter contact end --}}
    
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
        $(document).ready(function(){
            //add multi images
            $(".img-btn-success").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".img-btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });
        });

        function deleteContact(contact_id){
            $('#delete_contact'+contact_id).remove();
            $.ajax({
                url: "{{route('contacts.delete')}}",
                type: "POST",
                dataType: "html",
                data: {
                    "_token" : "{{csrf_token()}}",
                    id: contact_id
                },
                success: function(data){
                }
            });
        }
    </script>
@endsection