@extends('admin.layouts.template')

@section('title')
    <title>mawastudiothailand</title>
    <meta name="description" content="mawastudiothailand">
@stop
@section('stylesheet')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .ck-file-dialog-button{
        display: none;
    }
</style>

@stop('stylesheet')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            แก้ไขข้อมูลที่นั่ง</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">จัดการ</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">แก้ไขข้อมูลที่นั่ง</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    
                    
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{$url}}" enctype="multipart/form-data">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <div class="card-body border-top p-9">

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ที่นั่ง</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="งานการกุศลมูลนิธิบ้านพระพร" value="{{ $objs->seats_name }}">
                                    
                                        @if ($errors->has('name'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกที่นั่ง</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                

                              

                                <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สถานะการจอง</label>
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" name="status" @if($objs->status == 1)
                                            checked="checked"
                                        @endif value="1"/>
                                            <label class="form-check-label" for="allowmarketing"></label>
                                        </div>
                                    </div>
                                    <!--begin::Label-->
                                </div>
                            

                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </form>


                                @if($order)
                                    {{-- มี order --}}

                                    <form class="form" method="POST" action="{{ url('admin/edit_order_by_seasts/'.$order->id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold fs-3 mb-1">แก้ไขข้อมูลผู้จอง</span>
                                                </h3>
                                            </div>
                                            <div class="card-body border-top p-9">

                                            <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">QR CODE</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                    <!-- <img src="{!!$message->embedData(QrCode::format('png')->size(220)->generate('https://admin.mawastudiothailand.com/admin/verify_checkin?orderid='.$order->order_id.'&seasts='.$objs->seats_name), 'QrCode.png', 'image/png')!!}"> -->
                                                        {!! QrCode::size(300)->generate('https://admin.mawastudiothailand.com/admin/verify_checkin?orderid='.$order->order_id.'&seasts='.$objs->seats_name) !!}
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Order ID</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $order->order_id }}" readonly>
                                                        <input type="hidden" name="seasts_id" value="{{ $objs->id }}" readonly>
                                                        <input type="hidden" name="one_seasts" value="{{ $objs->id }}">
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">email</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="email" class="form-control form-control-lg form-control-solid" value="{{ $order->email }}">
                                                    
                                                        @if ($errors->has('email'))
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                <div>กรุณากรอก email</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อ-นามสกุล</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="username" class="form-control form-control-lg form-control-solid" value="{{ $order->username }}">
                                                    
                                                        @if ($errors->has('username'))
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                <div>กรุณากรอก ชื่อ-นามสกุล</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">เบอร์ติดต่อ</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="phone" class="form-control form-control-lg form-control-solid" value="{{ $order->phone }}">
                                                    
                                                        @if ($errors->has('phone'))
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                <div>กรุณากรอก เบอร์ติดต่อ</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Col-->
                                                </div>


                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Line ID</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="line" class="form-control form-control-lg form-control-solid" value="{{ $order->line }}">
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สถานะการจอง</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <select class="form-select" aria-label="Select example" name="status">
                                                            <option value="0" @if( $order->status == 0)
                                                                selected='selected'
                                                                @endif>รอการชำระเงิน</option>
                                                            <option value="1" @if( $order->status == 1)
                                                                selected='selected'
                                                                @endif>รอการตรวจสอบ</option>
                                                            <option value="2" @if( $order->status == 2)
                                                                selected='selected'
                                                                @endif>ชำระเงินสำเร็จ</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>


                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สถานะการเข้างาน</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <select class="form-select" aria-label="Select example" name="status_checkin">
                                                            <option value="0" @if( $objs->status_checkin == 0)
                                                                selected='selected'
                                                                @endif>ยังไม่มาเข้าร่วมงาน</option>
                                                            <option value="1" @if( $objs->status_checkin == 1)
                                                                selected='selected'
                                                                @endif>ได้เข้าร่วมงานแล้ว</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ที่นั่ง</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $order->my_seasts }}" readonly>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ราคา</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $order->price }}" readonly>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">วันที่จอง</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $order->created_at }}" readonly>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                @if($order->image_order)
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">หลักฐานการชำระเงิน</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <img src="{{ url('images/mawastudio/slip/'.$order->image_order) }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                @endif

                                                <div class="row mb-0">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ส่งอีเมลสถานะการจองสำเร็จ</label>
                                                    <!--begin::Label-->
                                                    <!--begin::Label-->
                                                    <div class="col-lg-8 d-flex align-items-center">
                                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing2" name="email_status" value="1"/>
                                                            <label class="form-check-label" for="allowmarketing2"></label>
                                                        </div>
                                                    </div>
                                                    <!--begin::Label-->
                                                </div>

                                            </div>
                                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</button>
                                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">บันทึกข้อมูล</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    {{-- ไม่มี order --}}
                                    <form class="form" method="POST" action="{{ url('admin/add_order_by_seasts/'.$objs->id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold fs-3 mb-1">เพิ่มข้อมูลผู้จอง</span>
                                                </h3>
                                            </div>
                                            <div class="card-body border-top p-9">

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">email</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="email" class="form-control form-control-lg form-control-solid" value="{{old('email') ? old('email') : ''}}">
                                                        <input type="hidden" name="order_event_id"  value="{{ $objs->event_id }}">
                                                        @if ($errors->has('email'))
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                <div>กรุณากรอก email</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อ-นามสกุล</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="username" class="form-control form-control-lg form-control-solid" value="{{old('username') ? old('username') : ''}}">
                                                        <input type="hidden" name="one_seasts" value="{{ $objs->id }}">
                                                        @if ($errors->has('username'))
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                <div>กรุณากรอก ชื่อ-นามสกุล</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">เบอร์ติดต่อ</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="phone" class="form-control form-control-lg form-control-solid" value="{{old('phone') ? old('phone') : ''}}">
                                                    
                                                        @if ($errors->has('phone'))
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                <div>กรุณากรอก เบอร์ติดต่อ</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Col-->
                                                </div>


                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Line ID</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="line" class="form-control form-control-lg form-control-solid" value="{{old('line') ? old('line') : ''}}">
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สถานะการจอง</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <select class="form-select" aria-label="Select example" name="status">
                                                            <option value="0" >รอการชำระเงิน</option>
                                                            <option value="1" >รอการตรวจสอบ</option>
                                                            <option value="2" >ชำระเงินสำเร็จ</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สถานะการเข้างาน</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <select class="form-select" aria-label="Select example" name="status_checkin">
                                                            <option value="0" @if( $objs->status_checkin == 0)
                                                                selected='selected'
                                                                @endif>ยังไม่มาเข้าร่วมงาน</option>
                                                            <option value="1" @if( $objs->status_checkin == 1)
                                                                selected='selected'
                                                                @endif>ได้เข้าร่วมงานแล้ว</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ที่นั่ง</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="my_seasts" class="form-control form-control-lg form-control-solid" value="{{ $objs->seats_name }}">
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ราคา</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="price" class="form-control form-control-lg form-control-solid" value="{{old('price') ? old('price') : ''}}">
                                                    </div>
                                                    <!--end::Col-->
                                                </div>


                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">หลักฐานการชำระเงิน</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="file" name="image" class="form-control form-control-lg form-control-solid" >
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                            </div>
                                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</button>
                                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">บันทึกข้อมูล</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif


                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

    <!--begin::Toast-->
<div id="kt_docs_toast_stack_container" class="toast-container position-fixed end-0 p-3 z-index-3" style="top: 80px!important;">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-kt-docs-toast="stack">
        <div class="toast-header">
            <span class="svg-icon svg-icon-2 svg-icon-success me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="currentColor"></path>
                <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="currentColor"></path>
                </svg>
                </span>
            <strong class="me-auto">ยินดีด้วย!</strong>
            <small>1 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            คุณได้ทำการอัพโหลดรูปสำเร็จ
        </div>
    </div>
</div>
<!--end::Toast-->

@endsection

@section('scripts')


@stop('scripts')
