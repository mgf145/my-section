@if (!$items->isEmpty())
    <span>&nbsp;&nbsp;&nbsp;</span>
    <span class="fsz-sm">@lang('admin.show')</span>
    <span class="fsz-sm">{{ $items->firstItem() }} @lang('admin.to') {{ $items->lastItem() }}</span>
    <span class="fsz-sm">از</span>
    <span class="fsz-sm">{{ $items->total() }} @lang('admin.result')</span>
@endif