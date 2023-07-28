<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Layout</div> <i class="icon-menu" title="Layout options"></i></li>
<li class="nav-item nav-item-submenu">
    <a href="#" class="nav-link"><i class="icon-stack2"></i> <span>Page layouts</span></a>

    <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
        <li class="nav-item ">
            <a href="{{route('admin.menu.index')}}" class="nav-link">
                <span>Menu </span></a>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.page.index')}}" class="nav-link">
                <span>Page </span></a>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.static.index')}}" class="nav-link">
                <span>Static </span></a>
        </li>

    </ul>
</li>

<li class="nav-item nav-item-submenu">
    <a href="#" class="nav-link"><i class="icon-cabinet"></i> <span>Projects</span></a>

    <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-cabinet"></i> <span>Company </span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
                <li class="nav-item">
                    <a href="{{route('admin.company.index')}}" class="nav-link">
                        <span>Company </span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.option.index')}}" class="nav-link">
                        <span>Company options</span></a>
                </li>
            </ul>
        </li>



        <li class="nav-item">
            <a href="{{route('admin.project.index')}}" class="nav-link">
                <span>Buildings </span></a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.block.index')}}" class="nav-link">
                <span>Block </span></a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.house.index',$projectId=0)}}" class="nav-link">
                <span>Houses </span></a>
        </li>
<hr>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-new"></i> <span>Benefits</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
                <li class="nav-item">
                    <a href="{{route('admin.benefits-type.index')}}" class="nav-link">
                        <span>Benefits type </span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.benefit.index')}}" class="nav-link">
                        <span>Benefits</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-magazine"></i> <span>Infrastructures</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
                <li class="nav-item">
                    <a href="{{route('admin.infrastructures-type.index')}}" class="nav-link">
                        <span>Infrastructures type </span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.infrastructure.index')}}" class="nav-link">
                        <span>Infrastructures</span></a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li class="nav-item ">
    <a href="{{route('admin.contact.index')}}" class="nav-link"><i class="icon-phone-hang-up"></i> <span>Contact</span></a>
</li>
<li class="nav-item ">
    <a href="{{route('admin.setting.index')}}" class="nav-link"><i class="icon-terminal"></i> <span>Setting</span></a>
</li>
<li class="nav-item ">
    <a href="{{route('clear-cache')}}" class="nav-link"><i class="icon-clear-formatting"></i> <span>Clear cache</span></a>
</li>
