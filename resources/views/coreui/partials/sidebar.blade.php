@php
    if (!function_exists('adminMenu')) {
        function adminMenu()
        {
            $list = glob(app_path('Http/Controllers/*/menu.php'));
            $menu = [];
            foreach ($list as $dir) {
                $menu[] = include($dir);
            }

            return \Illuminate\Support\Arr::sort($menu, function ($value) {
                return (isset($value['sequence'])) ? $value['sequence'] : 1000;
            });
        }
    }
@endphp

<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{!! url('/') !!}">
                    <i class="nav-icon icon-speedometer"></i>
                    <span>@lang('admin.first_page')</span>
                </a>
            </li>

            @foreach (adminMenu() as $menuData)
                @if (isset($menuData['permission']))
                    @php
                        $permissions = [$menuData['permission']];
                    @endphp
                @elseif (isset($menuData['elements']))
                    @php
                        $permissions = array_column($menuData['elements'],'permission');
                    @endphp
                @endif
                @if (Gate::any($permissions))
                    @if ($menuData['type'] == 'link')
                        @if (Gate::allows($menuData['permission']))
                            <li class="nav-item">
                                    <a class="nav-link" @if(isset($menuData['action'])) href="{{ $menuData['action'] }}" @endif>
                                        @if (array_key_exists('icon',$menuData))
                                            <i class="nav-icon {{ $menuData['icon'] }}"></i>
                                        @endif
                                        <span>{{ $menuData['name'] }}</span>
                                        @if (array_key_exists('badge',$menuData))
                                            @if (isset(${$menuData['badge']}) && ${$menuData['badge']} > 0)
                                                <span class="badge badge-primary">{{ ${$menuData['badge']} }}</span>
                                            @endif
                                        @endif
                                    </a>
                        </li>
                        @endif
                    @elseif($menuData['type'] == 'dropdown')
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#">
                                @if (array_key_exists('icon',$menuData))
                                    <i class="nav-icon {{ $menuData['icon'] }}"></i>
                                @endif
                                <span>{{ $menuData['name'] }}</span>
                                @if (array_key_exists('badge',$menuData))
                                    @if (isset(${$menuData['badge']}) && ${$menuData['badge']} > 0)
                                        <span class="badge badge-primary">{{ ${$menuData['badge']} }}</span>
                                    @endif
                                @endif
                            </a>
                            <ul class="nav-dropdown-items">
                                @foreach ($menuData['elements'] as $submenuData)
                                    @if (Gate::allows($submenuData['permission']))
                                        <li class="nav-item">
                                            <a class="nav-link {{--active--}}" @if(isset($submenuData['action'])) href="{{ $submenuData['action'] }}" @endif>
                                                @if (array_key_exists('icon',$submenuData))
                                                    <i class="nav-icon {{ $submenuData['icon'] }}"></i>
                                                @endif
                                                <span>{{ $submenuData['name'] }}</span>
                                                @if (array_key_exists('badge',$submenuData))
                                                    @if (isset(${$submenuData['badge']}) && ${$submenuData['badge']} > 0)
                                                        <span class="badge badge-primary">{{ ${$submenuData['badge']} }}</span>
                                                    @endif
                                                @endif
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
