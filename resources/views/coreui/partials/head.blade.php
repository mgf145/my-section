<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @lang('admin.name')
        @if (trim($__env->yieldContent('title')))
            - @yield('title')
        @endif
    </title>

    <!-- Icons-->
    <link href="{!! asset('assets/admin/vendors/@coreui/icons/css/coreui-icons.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/vendors/simple-line-icons/css/simple-line-icons.css') !!}" rel="stylesheet">

    <!-- Main styles for this application-->
    <link href="{!! asset('assets/admin/css/style.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/vendors/pace-progress/css/pace.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/vendors/toast/toast.min.css') !!}" rel="stylesheet">

    @stack('css')
</head>
