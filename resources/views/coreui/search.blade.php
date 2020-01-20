@php
    $controllerClass = str_replace('@index','',Route::currentRouteAction());
    $sectionName = explode('\\',str_replace("App\Http\Controllers\\",'',$controllerClass))[0];
@endphp
<div class="col-md-12 collapse mb-3 @if(count(request()->except('page'))) show @endif" id="searchCollapse">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-search"></i>
                    <span>@lang('admin.search')</span>
                    <button type="button" class="close float-right" aria-label="Close" data-toggle="collapse" data-target="#searchCollapse">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form method="get" class="form-horizontal">
                        @include("$sectionName.views.admin.".$controllerClass::$viewForm.".search-form")
                        <div class="form-actions">
                            <button class="btn btn-primary" type="submit">@lang('admin.search')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
