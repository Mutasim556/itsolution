<ul class="sidebar-links" id="simple-bar">
    <li class="sidebar-list">
        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.index') }}" aria-expanded="false"><i
                data-feather="home"></i><span>{{ __('admin_local.Dashboard') }}</span>
        </a>
    </li>
    @if (hasPermission(['user-index', 'user-create', 'user-update', 'user-delete']))
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title" href="javascript:void(0)" aria-expanded="false">
                <i data-feather="user-plus"></i>
                <span class="lan-3">{{ __('admin_local.Users') }}</span>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{ route('admin.user.index') }}" class="sidebar-link">
                        <span> {{ __('admin_local.User List') }} </span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if (hasPermission([
            'role-permission-index',
            'role-permission-create',
            'role-permission-update',
            'role-permission-delete',
        ]))
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.role.index') }}"
                aria-expanded="false"><i data-feather="unlock"></i><span>
                    {{ __('admin_local.Roles And Permissions') }}</span>
            </a>
        </li>
    @endif
    @if (hasPermission(['language-index', 'language-create', 'language-update', 'language-delete', 'backend-string-index']))
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title" href="javascript:void(0)" aria-expanded="false">
                <i data-feather="slack"></i>
                <span class="lan-3">{{ __('admin_local.Language') }}</span>
            </a>
            <ul class="sidebar-submenu">
                @if (hasPermission(['language-index', 'language-create', 'language-update', 'language-delete']))
                    <li>
                        <a href="{{ route('admin.language.index') }}" class="sidebar-link">
                            <span> {{ __('admin_local.Language List') }} </span>
                        </a>
                    </li>
                @endif

                @if (hasPermission(['backend-string-index']))
                    <li>
                        <a href="{{ route('admin.backend.language.index') }}" class="sidebar-link">
                            <span> {{ __('admin_local.Backed Language') }} </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if (hasPermission(['slider-index','aboutus-index','contact-index','service-index']))
        <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                href="javascript:void(0)"><i data-feather="book-open"></i><span>{{ __('admin_local.Pages') }}</span></a>
            <ul class="sidebar-submenu">
                @if (hasPermission(['slider-index']))
                <li>
                    <a class="submenu-title" href="javascript:void(0)" style="margin-bottom:5px;">{{ __('admin_local.Home') }}<span class="sub-arrow"><i
                                class="fa fa-angle-right"></i></span></a>

                    <ul class="nav-sub-childmenu submenu-content">
                        @if (hasPermission(['slider-index']))
                        <li><a href="{{ route('admin.pages.homepage.main_slider') }}">{{ __('admin_local.Slider') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                 @if (hasPermission(['aboutus-index']))
                <li>
                    <a class="sidebar-link" href="{{ route('admin.pages.aboutUs') }}" style="margin-bottom:5px;">{{ __('admin_local.About Us') }}</a>
                </li>
                @endif
                 @if (hasPermission(['contact-index']))
                 <li>
                    <a class="sidebar-link" href="{{ route('admin.pages.contactUs') }}">{{ __('admin_local.Contact') }}</a>
                </li>
                @endif
                @if (hasPermission(['service-index']))
                <li>
                    <a class="sidebar-link" href="{{ route('admin.pages.service.index') }}">{{ __('admin_local.Services') }}</a>
                </li>
                @endif
                 @if (hasPermission(['service-index']))
                <li>
                    <a class="sidebar-link" href="{{ route('admin.pages.team.index') }}">{{ __('admin_local.Team Members') }}</a>
                </li>
                @endif
            </ul>
        </li>
    @endif
    @if (hasPermission(['maintenance-mode-index']))
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title" href="javascript:void(0)" aria-expanded="false">
                <i data-feather="settings"></i>
                <span class="lan-3">{{ __('admin_local.Settings') }}</span>
            </a>
            <ul class="sidebar-submenu">
                @if (hasPermission(['maintenance-mode-index']))
                    <li>
                        <a href="{{ route('admin.settings.server.maintenanceMode') }}" class="sidebar-link">
                            <span> {{ __('admin_local.Maintenance Mode') }} </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
</ul>
