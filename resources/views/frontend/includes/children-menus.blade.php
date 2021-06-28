<li><a href="{{ route('frontend.category', $menu->slug) }}">{{ $menu->name }}</a>
    @if($menu->children)
    <ul class="mega-menu">
        <li>
            <ul>
                @foreach($menu->children as $children)
                    @include('frontend.includes.children-menus', ['menu' => $children])
                @endforeach
            </ul>
        </li>
    </ul>
    @endif
</li>
