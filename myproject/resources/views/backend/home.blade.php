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
                <a href="{{route("home.create")}}" class="btn btn-primary font-weight-bolder">
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
        {{--Search Detail--}}
        <form style="margin-bottom: 20px" method="get" action="{{route('search')}}">
            <div class="row" style="margin-bottom: 5px">
                <div class="col-lg-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping" style="background-color: deepskyblue "></span>
                        <input type="text" class="form-control" placeholder="Tiêu đề" aria-label="Tiêu đề" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping" style="background-color: coral">Group</span>
                        <select class="form-control form-control-solid" name="group_id">
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->title}}</option>
                                @if($group->child)
                                    @foreach($group->child as $gr)
                                        <option value="{{$gr->id}}">--- {{$gr->title}} ---</option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping" style="background-color: deeppink">Trạng thái</span>
                        <select class="form-control form-control-solid" name="status">
                            <option value="1">Hoạt động</option>
                            <option value="0">Tạm dừng</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"style="background-color: greenyellow ">Vị trí đặt</span>
                        <select class="form-control form-control-solid" name="position">
                            <option value="intro-banner">intro-banner</option>
                            <option value="business-banner">business-banner</option>
                            <option value="enviroment-banner">enviroment-banner</option>
                            <option value="vision-banner">vision-banner</option>
                            <option value="manager-banner">manager-banner</option>
                            <option value="partner-banner">partner-banner</option>
                            <option value="recent_post-banner">recent_post-banner</option>
                            <option value="contact-banner">contact-banner</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping" style="background-color: wheat ">Ngày tạo từ</span>
                        <input type="date" class="form-control"  aria-label="Tác giả" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping" style="background-color: yellow ">Tới ngày</span>
                        <input type="date" class="form-control"  aria-label="Tác giả" aria-describedby="addon-wrapping">
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-center" style="margin-top: 10px">
                <button type="submit" class="btn btn-success mr-2">Search</button>
            </div>
        </form>
        {{--End Search Detail--}}

            <!--begin::Search Form-->
{{--            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-lg-9 col-xl-8">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-md-4 my-2 my-md-0">--}}

{{--                            </div>--}}

{{--                            <div class="col-md-4 my-2 my-md-0">--}}

{{--                            </div>--}}
{{--                            <div class="col-md-4 my-2 my-md-0">--}}
{{--                                <div class="input-icon">--}}
{{--                                    <input type="text" class="form-control" placeholder="Search..." id="keyword" name="--}}
{{--keyword"/>--}}
{{--                                    <span><i class="flaticon2-search-1 text-muted"></i></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!--end::Search Form-->

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Nhóm</th>
                    <th>Trạng thái</th>
                    <th>Tác giả</th>
                    <th>Ảnh</th>
                    <th>Vị tri đặt</th>
                    <th>Tác vụ</th>
                </tr>
                </thead>
                <tbody id="listItems">
                @foreach($items as $key => $item)
                <tr>
                    <td>{{++$key}}</td>
                    <td style="text-overflow: Ellipsis;max-width: 200px;max-height: 50px;overflow: hidden;white-space: nowrap;">
                        <a href="{{$item->url}}">
                        {{$item->title}}
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success">{{$item->group[0]->title}}</button></td>
                    <td>
                        <?php
                        if($item->status == 1){
                          $status = "Hoạt động";
                          $color ="warning";
                        }
                        else{
                          $status = "Tạm dừng";
                          $color ="dark";
                        }
                        ?>
                            <span class="label label-{{$color}}  label-pill label-inline mr-2">{{$status}}</span>
                    </td>
                    <td>{{$item->user->name}}</td>
                    <td><img src="{!! $item->image !!}" style="width: 100px; height: 70px"></td>
                    <td>{{$item->position}}</td>
                    <td>
                        <a href="{{route("home.edit",$item->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <i class="fas fa-trash" style="margin-left: 5px" data-token="{{ csrf_token() }}"  onclick="delete_item()" data-url="{{route("home.destroy",$item->id)}}"></i>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $items->links('vendor.pagination.simple-bootstrap-4') !!}
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
        function delete_item(){
            var url = event.target.getAttribute("data-url");
            console.log(url)
            if (confirm('Bạn có muốn xoá Item này không?')) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function(res) {
                       alert(res)
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
