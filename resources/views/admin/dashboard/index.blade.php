@extends('admin.layouts.template')

@section('title')
    <title>mawastudiothailand</title>
    <meta name="description" content="mawastudiothailand">
@stop
@section('stylesheet')

<style>
.svg-icon.svg-icon-3 svg {
    height: 25px!important;
    width: 25px!important;
}
.brx {
  content: '\A';
  display: contents;
  white-space: pre;
}
.fs-12{
    font-size: 10px
}
.hrx{
    margin-top: 20px;
    margin-bottom: 20px;
    border-bottom-width: 1px;
    border-bottom-style: dashed;
    border-bottom-color: #E4E6EF;
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
                            ภาพโดยรวมเว็บไซต์</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">ดูสถิติต่างๆ</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">

                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    
                  <div class="row g-5 g-xl-10 mb-xl-10">
                    <div class="col-md-12">
                            <div class="card h-md-100" style="width:858px">

                                

                                <div class="card-body" >

                                    <div class="d-flex flex-wrap">

                                        @if($objA)
                                            @for ($i = 0; $i < count($objA); $i++)

                                                    @if($objA[$i]['status'] == 0)
                                                    <div class="d-flex justify-content-center text-center flex-column m-1" >
                                                        <a href="{{ url('admin/edit_seasts/'.$objA[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            <img src={{url('img/1690350050599.jpg') }} style="height:25px" />
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objA[$i]['seats_name']}}</span>
                                                    </div>
                                                    @else

                                                    <div class="d-flex justify-content-start text-center flex-column m-1" >
                                                        <a href="{{ url('admin/edit_seasts/'.$objA[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            @if($objA[$i]['status_order'] == 1)
                                                            <span class="svg-icon svg-icon-3 svg-icon-muted ">
                                                            @endif
                                                            @if($objA[$i]['status_order'] == 0)
                                                            <span class="svg-icon svg-icon-3 svg-icon-muted ">
                                                            @endif
                                                            @if($objA[$i]['status_order'] == 2)
                                                            <span class="svg-icon svg-icon-3 svg-icon-success ">
                                                            @endif
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor"></path>
                                                                    <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
                                                                    <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objA[$i]['seats_name']}}</span>
                                                    </div>
                                                    @endif
                                             
                                            @endfor
                                        @endif
                                        
                                    </div>
                                    <div class="hrx"></div>
                                    <div class="d-flex flex-wrap">

                                        @if($objB)
                                            @for ($i = 0; $i < count($objB); $i++)

                                                    @if($objB[$i]['status'] == 0)
                                                    <div class="d-flex justify-content-center text-center flex-column m-1">
                                                        <a href="{{ url('admin/edit_seasts/'.$objB[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            <img src={{url('img/1690350050599.jpg') }} style="height:25px" />
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objB[$i]['seats_name']}}</span>
                                                    </div>
                                                    @else

                                                    <div class="d-flex justify-content-start text-center flex-column m-1">
                                                        <a href="{{ url('admin/edit_seasts/'.$objB[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            <span class="svg-icon svg-icon-3 svg-icon-muted ">
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor"></path>
                                                                    <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
                                                                    <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objB[$i]['seats_name']}}</span>
                                                    </div>
                                                    @endif
                                             
                                            @endfor
                                        @endif
                                        
                                    </div>
                                    <div class="hrx"></div>
                                    <div class="d-flex flex-wrap">

                                        @if($objC)
                                            @for ($i = 0; $i < count($objC); $i++)

                                                    @if($objC[$i]['status'] == 0)
                                                    <div class="d-flex justify-content-center text-center flex-column m-1">
                                                        <a href="{{ url('admin/edit_seasts/'.$objC[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            <img src={{url('img/1690350050599.jpg') }} style="height:25px" />
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objC[$i]['seats_name']}}</span>
                                                    </div>
                                                    @else

                                                    <div class="d-flex justify-content-start text-center flex-column m-1">
                                                        <a href="{{ url('admin/edit_seasts/'.$objC[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            <span class="svg-icon svg-icon-3 svg-icon-muted ">
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor"></path>
                                                                    <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
                                                                    <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objC[$i]['seats_name']}}</span>
                                                    </div>
                                                    @endif
                                             
                                            @endfor
                                        @endif
                                        
                                    </div>
                                    <div class="hrx"></div>
                                    <div class="d-flex flex-wrap">

                                        @if($objD)
                                            @for ($i = 0; $i < count($objD); $i++)

                                                    @if($objD[$i]['status'] == 0)
                                                    <div class="d-flex justify-content-center text-center flex-column m-1">
                                                        <a href="{{ url('admin/edit_seasts/'.$objD[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            <img src={{url('img/1690350050599.jpg') }} style="height:25px" />
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objD[$i]['seats_name']}}</span>
                                                    </div>
                                                    @else

                                                    <div class="d-flex justify-content-start text-center flex-column m-1">
                                                        <a href="{{ url('admin/edit_seasts/'.$objD[$i]['id']) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            <span class="svg-icon svg-icon-3 svg-icon-muted ">
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor"></path>
                                                                    <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
                                                                    <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-12">{{$objD[$i]['seats_name']}}</span>
                                                    </div>
                                                    @endif
                                             
                                            @endfor
                                        @endif
                                        
                                    </div>
                                    
                                    
                                </div>

                            </div>
                    </div>
                  </div>

                    
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

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
      $("input:checkbox").change(function() {
        var user_id = $(this).closest('tr').attr('id');
    
        $.ajax({
                type:'POST',
                url:'{{url('api/api_post_status_contact')}}',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { "user_id" : user_id },
                success: function(data){
                  if(data.data.success){
    
    
                    Swal.fire({
                        text: "ระบบได้ทำการอัพเดทข้อมูลสำเร็จ!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
    
    
    
                  }
                }
            });
        });
    });
    </script>

@stop('scripts')
