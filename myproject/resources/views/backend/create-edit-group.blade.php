{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">HTML Table
                    <div class="text-muted pt-2 font-size-sm">Datatable initialized from HTML table</div>
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
                <a href="#" class="btn btn-primary font-weight-bolder">
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
                </span>New Record</a>
                <!--end::Button-->
            </div>
        </div>

        <div class="card-body">
        <?php
        if(isset($group)){
            $action = route("groups.update",$group->id);
        }
        else{
            $action = route("groups.store");
        }
        ?>

            <!--begin::Search Form-->

            <div class="card card-custom">
                <form class="form" method="post" action="{{$action}}">
                    @if(isset($group))
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control"  placeholder="Title" name="title" value="{{$group->title ?? ""}}"/>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Parent</label>
                                    <select class="form-control form-control-solid" name="parent_id">
                                        <option value="" selected>Vui lòng chọn chỉ mục</option>
                                        <option value="">Không chọn</option>
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
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Image</label>
                                <div>
                                    <button type="button" id="ckfinder-popup-1" class="btn btn-success">Browse Server</button>
                                    <input  {{$group->image ?? ""}}id="ckfinder-input-1" class="form-control" type="text" style="width:60%; display: inline-block" name="image">
                                </div>

                            </div>
                            <div class="col" style="margin-top: 35px">
                                <img src="" id="image_result" style="width: 400px;height: 300px">
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label style="margin-top: 25px">Author</label>
                            <input type="text" class="form-control"  placeholder="Large input" name="author_id" value=""  />
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea type="text" class="form-control"  placeholder="Content" id="content-input" name="content">{{$group->content ?? ""}}</textarea>
                            <script>
                                CKEDITOR.replace( 'content-input' );
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description-input" name="description">{{$group->description ?? ""}}</textarea>
                            <script>
                                CKEDITOR.replace( 'description-input',
                                    {
                                        language: 'vi',
                                        filebrowserImageBrowseUrl: '/editor/ckfinder/ckfinder.html?Type=Images',
                                        filebrowserFlashBrowseUrl: '/editor/ckfinder/ckfinder.html?Type-Flash',
                                        filebrowserImageUploadUrl: '/editor/ckfinder/core/connector/php/connector.php?command-QuickUpload&type-Images',
                                        filebrowserFlashUploadUrl: '/editor/ckfinder/core/connector/php/connector.php?command-QuickUpload&type-Fla'

                                    });
                            </script>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
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
    <script>
        var button1 = document.getElementById( 'ckfinder-popup-1' );
        button1.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-1' );
        };
        function selectFileWithCKFinder( elementId ) {
            CKFinder.modal( {
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function( finder ) {
                    finder.on( 'files:choose', function( evt ) {
                        var file = evt.data.files.first();
                        var output = document.getElementById( elementId );
                        output.value = file.getUrl();
                        document.getElementById('image_result').src =file.getUrl();
                    } );

                    finder.on( 'file:choose:resizedImage', function( evt ) {
                        var output = document.getElementById( elementId );
                        output.value = evt.data.resizedUrl;
                    } );
                }
            } );
        }
    </script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@endsection
