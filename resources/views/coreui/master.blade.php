<!doctype html>
<html lang="{{app()->getLocale()}}" dir="rtl">

@include('admin.partials.head')

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('admin.partials.header')

    <div class="app-body">
        @include('admin.partials.sidebar')
        <main class="main">
            @include('admin.partials.top-bar')
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @yield('content')
                </div>
            </div>
        </main>

{{--        @include('admin.partials.hidden-sidebar')--}}
    </div>

    {{--@include('admin.partials.footer')--}}

    <!-- CoreUI and necessary plugins-->
    <script type="text/javascript" src="{!! asset('assets/admin/vendors/jquery/js/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/admin/vendors/popper.js/js/popper.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/admin/vendors/bootstrap/js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/admin/vendors/pace-progress/js/pace.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/admin/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/admin/vendors/toast/toast.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/admin/vendors/@coreui/coreui/js/coreui.min.js') !!}"></script>

    @include('admin.partials.notifications')

    <script>
        $(document).ready(function ($) {
            $(document).on('change', '.check-all', function () {
                var checkboxes = $('.delete-item');
                if ($(this).is(":checked")) {
                    checkboxes.each(function () {
                        $(this).prop('checked',true);
                    });
                } else {
                    checkboxes.each(function () {
                        $(this).prop('checked',false);
                    });
                }
            });
            $(document).on('click', '.delete-btn', function () {
                if (confirm("@lang('admin.delete_confirmation')")) {
                    var btn = $(this);
                    var deleteForm = $("#delete-form");
                    var checkedItems = $('.delete-item:checked');
                    if (checkedItems.length) {
                        checkedItems.each(function () {
                            deleteForm.append('<input type="hidden" name="deleteId[]" value="' + $(this).val() + '">');
                            deleteForm.submit();
                        });
                    }
                }
            });
        });
    </script>

    @stack('js')

</body>
</html>
