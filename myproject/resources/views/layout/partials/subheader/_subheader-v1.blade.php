{{-- Subheader V1 --}}

<div class="subheader py-2 {{ Metronic::printClasses('subheader', false) }}" id="kt_subheader">
    <div class="{{ Metronic::printClasses('subheader-container', false) }} d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

		{{-- Info --}}
        <div class="d-flex align-items-center flex-wrap mr-1">

			{{-- Page Title --}}

            @if (!empty($page_breadcrumbs))
				{{-- Separator --}}
                <div class="subheader-separator subheader-separator-ver my-2 mr-4 d-none"></div>

				{{-- Breadcrumb --}}
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2">
                </ul>
            @endif
        </div>

		{{-- Toolbar --}}
        <div class="d-flex align-items-center">

            @hasSection('page_toolbar')
                @section('page_toolbar')
            @endif

            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                <a href="{{route('page.index')}}" class="btn btn-icon">
                    <i class="fas fa-home"></i>
                </a>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                    {{-- Navigation --}}
                </div>
            </div>
        </div>

    </div>
</div>
