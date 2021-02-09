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
                                                        <div class="col-md-6">
                                                            <input type="text" name="contact_locations_ar[]" class="form-control" placeholder="{{trans('admin.location_ar')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.location_ar')}}
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="col-md-6">
                                                            <input type="text" name="contact_locations_en[]" class="form-control" placeholder="{{trans('admin.location_en')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.location_en')}}
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="col-md-6">
                                                            <input type="text" name="contact_phones_1[]" class="form-control" placeholder="{{trans('admin.phone')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.phone')}}
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="col-md-6">
                                                            <input type="text" name="contact_phones_2[]" class="form-control" placeholder="{{trans('admin.whatsapp_ar')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.whatsapp_ar')}}
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="col-md-6">
                                                            <input type="text" name="contact_phones_3[]" class="form-control" placeholder="{{trans('admin.whatsapp_en')}}">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.whatsapp_en')}}
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="col-md-6">
                                                            <input type="file" name="flags[]" class="form-control" placeholder="{{trans('admin.flag')}}" accept=".gif, .jpg, .png, .webp">
                                                            <div class="invalid-feedback">
                                                                {{trans('admin.flag')}}
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                    </div>
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success img-btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <div class="clone hidden">
                                                    <div class="control-group input-group" style="margin-top:10px">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="contact_locations_ar[]" class="form-control" placeholder="{{trans('admin.location_ar')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6">
                                                                <input type="text" name="contact_locations_en[]" class="form-control" placeholder="{{trans('admin.location_en')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6" dir="ltr">
                                                                <input type="text" name="contact_phones_1[]" class="form-control" placeholder="{{trans('admin.phone')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6" dir="ltr">
                                                                <input type="text" name="contact_phones_2[]" class="form-control" placeholder="{{trans('admin.whatsapp_ar')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6" dir="ltr">
                                                                <input type="text" name="contact_phones_3[]" class="form-control" placeholder="{{trans('admin.whatsapp_en')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6">
                                                                <input type="file" name="flags[]" class="form-control" placeholder="{{trans('admin.flag')}}">
                                                            </div>
                                                            <br><br>
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
                                                            <div class="col-md-6">
                                                                <input type="text" disabled class="form-control" value="{{$con->location_ar}}" placeholder="{{trans('admin.location_ar')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6">
                                                                <input type="text" disabled class="form-control" value="{{$con->location_en}}" placeholder="{{trans('admin.location_en')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6" dir="ltr">
                                                                <input type="text" disabled class="form-control" value="{{$con->phone}}" placeholder="{{trans('admin.phone')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6" dir="ltr">
                                                                <input type="text" disabled class="form-control" value="{{$con->whatsapp_ar}}" placeholder="{{trans('admin.whatsapp_ar')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6" dir="ltr">
                                                                <input type="text" disabled class="form-control" value="{{$con->whatsapp_en}}" placeholder="{{trans('admin.whatsapp_en')}}">
                                                            </div>
                                                            <br><br>
                                                            <div class="col-md-6">
                                                                <img src="{{$con->flag}}" alt="flag" width="50px" height="50px">
                                                            </div>
                                                            <br><br>
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
                                                    {{trans('admin.email')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter email end --}}

                                    {{-- enter email2 --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.email2')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin.email2')}}" name="email2" value="{{$settings->email2}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.email2')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter email2 end --}}

                                    {{-- enter website --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.website')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="{{trans('admin.website')}}" name="website" value="{{$settings->website}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.website')}}
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
                                                    {{trans('admin.services')}}
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
                                                    {{trans('admin.clients_area')}}
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
                                                    {{trans('admin.visit')}}
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
                                                    {{trans('admin.meeting')}}
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
                                                    {{trans('admin.ticket')}}
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
                                                    {{trans('admin.contact')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter contact end --}}

                                    {{-- enter contact_title --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.contact_title')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin.contact_title')}}" name="contact_title" value="{{$settings->contact_title}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.contact_title')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter contact_title end --}}

                                    {{-- enter contact_subtitle --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.contact_subtitle')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin.contact_subtitle')}}" name="contact_subtitle" value="{{$settings->contact_subtitle}}">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.contact_subtitle')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter contact_subtitle end --}}

                                    {{-- enter contact_description --}}
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.contact_description')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea name="contact_description" class="form-control" cols="30" rows="6" placeholder="{{trans('admin.contact_description')}}">{{$settings->contact_description}}</textarea>
                                                <div class="invalid-feedback">
                                                    {{trans('admin.contact_description')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter contact_description end --}}

                                    {{-- enter image --}}
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin.contact_image')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" name="contact_image" class="form-control" placeholder="{{trans('admin.contact_image')}}" accept=".gif, .jpg, .png, .webp">
                                                <div class="invalid-feedback">
                                                    {{trans('admin.contact_image')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <img src="{{$settings->contact_image}}" alt="" width="100px" height="100px" style="border-radius: 5px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- enter image end --}}
    
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
            //add multi contatcs
            $(".img-btn-success").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".img-btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });

            //add multi links
            $(".link-btn-success").click(function(){ 
                var html = $(".clone_links").html();
                $(".increment_links").after(html);
            });

            $("body").on("click",".link-btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });
        });

        function deleteContact(contact_id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'swal2-confirm',
                    cancelButton: 'swal2-cancel'
                },
                buttonsStyling: true
            });
            swalWithBootstrapButtons.fire({
                title: '{{trans("admin.title")}}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{trans("admin.yes")}}',
                cancelButtonText: '{{trans("admin.no")}}',
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#delete_contact'+contact_id).remove();
                    
                    var token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{route('contacts.delete')}}",
                        data: {
                            id: contact_id,
                            _token: token
                        } ,
                        dataType: 'json',
                        success: function (result) {
                            swalWithBootstrapButtons.fire({
                                title: '{{trans("admin.deleted_successfully")}}',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                } else if (
                    // / Read more about handling dismissals below /
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: '{{trans("admin.cancelled")}}',
                        showConfirmButton: false,
                        timer: 1500
                    });

                }
            });
        }

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