@if (!$items->isEmpty())
    <span>&nbsp;&nbsp;&nbsp;</span>
    <span class="font-lg">@lang('admin.show')</span>
    <span class="font-lg">{{ $items->firstItem() }} @lang('admin.to') {{ $items->lastItem() }}</span>
    <span class="font-lg">از</span>
    <span class="font-lg">{{ $items->total() }} @lang('admin.result')</span>
@endif
