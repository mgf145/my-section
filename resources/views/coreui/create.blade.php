@php
    $createAction = str_replace('create','store',Route::currentRouteAction());
    $controllerClass = str_replace('@store','',$createAction);
    $createAction = str_replace("App\Http\Controllers\\",'',$createAction);
    $ns = explode('\\',str_replace("Controller@store",'',$createAction));
    $sectionName = $ns[0];
    $controllerName = $ns[3];
    $createPageTitle = trans(strtolower($sectionName).'.'.strtolower($controllerName).'.create_page_title');
@endphp
@extends('admin.master')
@section('title',$createPageTitle)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus"></i>
                    <span>{{ $createPageTitle }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ action($createAction,Route::current()->parameters()) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include("$sectionName.views.admin.".$controllerClass::$viewForm.".form")
                        <button type="submit" class="btn btn-primary">@lang('admin.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
