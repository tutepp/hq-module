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

            <!--begin::Search Form-->
            <?php
            if(isset($item)){
                $action = route("$module.update",$item->id);
            }
            else{
                $action = route("$module.store");
            }
            ?>
            <div class="card card-custom">
                <form class="form" method="post" action="{{ $action }}">
                    @if(isset($item))
                    @method('PUT')
                    @endif
                    @csrf

                    <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                    <input type="text" class="form-control" onchange="ChangeToSlug();" id="title" placeholder="Title" name="title" value="{{$item->title ?? ""}}"/>
                            </div>

                            <div class="form-group" hidden>
                            <label>Slug</label>
                            <input type="text" class="form-control" placeholder="Slug" id="slug" name="slug" value="{{$item->slug ?? ""}}"/>
                            </div>

                            <div class="form-group" hidden>
                                <label>Module</label>
                                <input type="text" class="form-control"  placeholder="Module" name="module" value="{{$module}}"/>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                <div class="col">
                                    <label>Group</label>
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
                                <div class="col">
                                    <label>Position</label>
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
                            <div class="form-row">
                                <div class="col">
                                    <label>Image</label>
                                    <div>
                                        <button type="button" id="ckfinder-popup-1" class="btn btn-success">Browse Server</button>
                                        <input {{$item->image ?? ""}} id="ckfinder-input-1" class="form-control" type="text" style="width:60%; display: inline-block" name="image">
                                    </div>
                                </div>
                                <div class="col" style="margin-top: 35px">
                                    <img src="{{$item->image ?? ""}}" id="image_result" style="width: 400px;height: 300px">
                                </div>
                            </div>
                            <div class="form-group" >
                                <div class="form-row">
                                 <div class="col">
                                <label style="margin-top: 25px">URL</label>
                                <input type="text" class="form-control"  id="url" placeholder="URL" name="url" value="{{$item->url ?? ""}}"  />
                                 </div>
                                    <div class="col">
                                    <label style="margin-top: 25px">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Hoạt động
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tạm dừng
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label style="margin-top: 25px">Author</label>
                                <input type="text" class="form-control"  placeholder="Large input" name="author_id" value="{{Auth::user()->id }}"  />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea type="text" class="form-control"  placeholder="Large input" id="content-input" name="content">{{$item->content ?? ""}}</textarea>
                                <script>
                                    CKEDITOR.replace( 'content-input' );
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description-input" name="description">{{$item->description ?? ""}}</textarea>
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

    <script language="javascript">
        function ChangeToSlug()
        {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("title").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
    <script language="javascript">
        function ChangeToSlug()
        {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("title").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
            document.getElementById('url').value = "{{url('')}}/blog/"+ slug;
        }
    </script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@endsection
