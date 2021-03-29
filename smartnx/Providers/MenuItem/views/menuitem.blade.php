@foreach($itens as $item)
    @php
        $route = '#';
        $active = false;

        $routeCurrent = \Request::route()->getName();

        if(array_key_exists('route_name', $item)){
            $route = route($item['route_name']);
            $active = ($routeCurrent == $item['route_name']) ? 'active' : '';
        }

        if(array_key_exists('group_name', $item)){
            $group = explode('.', $routeCurrent);
            $open = (array_shift($group) == $item['group_name']) ? 'active open' : '';
        }
    @endphp
    <li class="has-sub {{$active ?? ''}} {{$open ?? ''}}">
        <a href="{{$route}}" title="{{$item['title']}}" data-filter-tags="{{mb_strtolower($item['title'])}}">
            @if(array_key_exists('sub_menu', $item))
                <b class="caret"></b>
            @endif

            @if(array_key_exists('icon', $item))
                <i class="fa fa-{{$item['icon']}}"></i>
            @endif
            <span class="nav-link-text" data-i18n="{{$route}}">{{$item['title']}}</span>
        </a>
        @if(array_key_exists('sub_menu', $item))
            <ul class="sub-menu">
                @include('MenuItem::menuitem', ['itens' => $item['sub_menu']])
            </ul>
        @endif
    </li>
@endforeach
