{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Vị trí quảng cáo

                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">

                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->

                <!--end::Button-->
            </div>
        </div>

        <div class="card-body">

            <!--begin::Search Form-->

            <!--end::Search Form-->


            {{-- Table --}}
    <div class="col-lg-12 row">
                <div class="border border-dark d-flex justify-content-center col-log-4" style="width: 300px;height: 50px; margin-bottom: 20px;margin-right: 50px; background-color:#ccffff">
                    <p style="margin-top: 14px ">Intro Banner</p>
                </div>

                <div class="border border-dark d-flex justify-content-center col-log-4 " style="width: 300px;height: 50px; margin-bottom: 20px; margin-right: 50px;background-color:#ccffff">
                <p style="margin-top: 14px ">Bussiness Banner</p>
                </div>

                <div class="border border-dark d-flex justify-content-center col-log-4" style="width: 300px;height: 50px; margin-bottom: 20px;margin-right: 50px; background-color:#ccffff">
                <p style="margin-top: 14px ">Enviroment Banner</p>
                </div>
    </div>

    <div class="col-lg-12 row">
                <div class="border border-dark d-flex justify-content-center col-log-4" style="width: 300px;height: 50px; margin-bottom: 20px;margin-right: 50px; background-color:#ccffff">
                    <p style="margin-top: 14px ">Mission Banner</p>
                </div>

                <div class="border border-dark d-flex justify-content-center col-log-4 " style="width: 300px;height: 50px; margin-bottom: 20px; margin-right: 50px;background-color:#ccffff">
                    <p style="margin-top: 14px ">Vision Banner</p>
                </div>

                <div class="border border-dark d-flex justify-content-center col-log-4" style="width: 300px;height: 50px; margin-bottom: 20px;margin-right: 50px; background-color:#ccffff">
                    <p style="margin-top: 14px ">Manager Banner</p>
                </div>
    </div>

    <div class="col-lg-12 row">
                <div class="border border-dark d-flex justify-content-center col-log-4" style="width: 300px;height: 50px; margin-bottom: 20px;margin-right: 50px; background-color:#ccffff">
                    <p style="margin-top: 14px ">Partner Banner</p>
                </div>

                <div class="border border-dark d-flex justify-content-center col-log-4 " style="width: 300px;height: 50px; margin-bottom: 20px; margin-right: 50px;background-color:#ccffff">
                    <p style="margin-top: 14px ">Recent_post Banner</p>
                </div>

                <div class="border border-dark d-flex justify-content-center col-log-4" style="width: 300px;height: 50px; margin-bottom: 20px;margin-right: 50px; background-color:#ccffff">
                    <p style="margin-top: 14px ">Contact Banner</p>
                </div>
    </div>
            {{-- End Table--}}

        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function delete_item(){
            var url = event.target.getAttribute("data-url");
            console.log(url)
            if (confirm('Do you want to delete this Item?')) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function(response) {
                        alert('Delete  success!')
                        window.location.reload();
                    },
                })
            }
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('keyup','#keyword',function () {
                var keyword = $(this).val();
                $.ajax({
                    type:"get",
                    url:"/search",
                    data:{
                        keyword:keyword
                    },
                    dataType:"json",
                    success:function (response) {
                        $('#listItems').html(response);
                    }
                })

            })
        })

    </script>
@endsection
