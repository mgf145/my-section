@php
    $editAction = str_replace('edit','update',Route::currentRouteAction());
    $controllerClass = str_replace('@update','',$editAction);
    $editAction = str_replace("App\Http\Controllers\\",'',$editAction);
    $ns = explode('\\',str_replace("Controller@update",'',$editAction));
    $sectionName = $ns[0];
    $controllerName = $ns[3];
    $editPageTitle = trans(strtolower($sectionName).'.'.strtolower($controllerName).'.edit_page_title');
@endphp
@extends('admin.master')
@section('title',trans(strtolower($sectionName).'.'.strtolower($controllerName).'.edit_page_title'))
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>
                    <span>{{ $editPageTitle }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ action($editAction,Route::current()->parameters()) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include("$sectionName.views.admin.".$controllerClass::$viewForm.".form")
                        <button type="submit" class="btn btn-primary">@lang('admin.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
