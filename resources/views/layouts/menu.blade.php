{!! Menu::new()->add(\Spatie\Menu\Link::to('#', '<i class="cil-speedometer"></i>
        Dashboard
        <span class="badge badge-info">NEW</span>')->addClass('c-sidebar-nav-link'))->withoutWrapperTag() !!}
{!! $menu->render() !!}