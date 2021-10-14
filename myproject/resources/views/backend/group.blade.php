{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Bảng quản lý thông tin
                    <div class="text-muted pt-2 font-size-sm">Bảng quản lý Items</div>
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
                <a href="{{route('groups.create')}}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Tạo mới</a>
                <!--end::Button-->
            </div>
        </div>

        <div class="card-body">
            @foreach($groups as $group)
            <div style="width: 50%;margin-top: 5px">
                 <div class="bg-success text-white py-2 px-4">{{$group->title}}
                     <div style="float: right">
                         <a href="{{route("groups.edit",$group->id)}}">
                             <i class="fas fa-edit" style="color: white"></i>
                         </a>
                         <i class="far fa-trash-alt" style="color: white" onclick="delete_group()" data-url="{{route("groups.destroy",$group->id)}}"></i>
                     </div>
                 </div>
                @if($group->child)
                @foreach($group->child as $gr)
                <div style="margin-left: 50px;margin-top: 5px">
                    <div class="bg-warning text-white py-2 px-4">--- {{$gr->title}} ---
                        <div style="float: right">
                            <a href="{{route("groups.edit",$gr->id)}}">
                            <i class="fas fa-edit" style="color: white"></i>
                            </a>
                            <i class="far fa-trash-alt" style="color: white" onclick="delete_group()" data-url="{{route("groups.destroy",$gr->id)}}"></i>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {!! $groups->links('vendor.pagination.simple-bootstrap-4') !!}
            </div>
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
        function delete_group(){
            var url = event.target.getAttribute("data-url");
            console.log(url)
            if (confirm('Bạn có muốn xoá Product này không?')) {
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

@endsection
