<li @if(isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-item has-treeview {{ $item['submenu_class'] }}" style="cursor: pointer;">

    {{-- Menu toggler --}}
    <router-link tag="li" to="#" class="nav-link @if(isset($item['shift'])) {{ $item['shift'] }} @endif"
        {!! $item['data-compiled'] ?? '' !!}>

        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }}"></i>

        <p>
            {{ $item['text'] }}
            <i class="fas fa-angle-left right"></i>

            @if(isset($item['label']))
                <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                    {{ $item['label'] }}
                </span>
            @endif
        </p>

    </router-link>

    {{-- Menu items --}}
    <ul class="nav nav-treeview">
        @each('adminlte::partials.sidebar.menu-item', $item['submenu'], 'item')
    </ul>

</li>
