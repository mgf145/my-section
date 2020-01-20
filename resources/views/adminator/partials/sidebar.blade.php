<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="#">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"></div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">@lang('admin.name')</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" href="{!! config('site.admin') !!}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-home"></i>
                </span>
                    <span class="title">@lang('admin.first_page')</span>
                </a>
            </li>

            @if (Gate::any(['menu.menucontroller.index']))
                <li class="nav-item dropdown">
                    <a href="#">
                        <span class="icon-holder"><i class="c-blue-500 fa fa-list"></i></span>
                        <span class="title">@lang('admin.menu')</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (Gate::allows('menu.menucontroller.index'))
                            <li>
                                <a class="sidebar-link {{--@if(request()->fullUrl() == $actionUrl) font-weight-bold sidebar-active-link @endif--}}" href="#">
                                    <span>@lang('admin.submenu1')</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Gate::allows('menu.menucontroller.index'))
                <li class="nav-item">
                    <a class="{{--@if(request()->fullUrl() == $actionUrl) font-weight-bold sidebar-active-link @endif--}}" href="#">
                        <span class="icon-holder"><i class="c-blue-500 fa fa-list"></i></span>
                        <span class="title">@lang('admin.menu')</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function () {
            var activeLink = $("a.sidebar-active-link")[0];
            if (activeLink){
                $("a.sidebar-active-link").parents('li.dropdown').addClass('active open');
            }
        });
    </script>
@endpush