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
    @if (hasPermission([
            'slider-index',
            'comment-index',
            'counter-index',
            'aboutus-index',
            'contact-index',
            'service-index',
            'project-index',
        ]))
        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i
                    data-feather="book-open"></i><span> {{ __('admin_local.Pages') }}</span></a>
            <ul class="sidebar-submenu">
                @if (hasPermission(['slider-index', 'comment-index']))
                    <li>
                        <a class="submenu-title" href="javascript:void(0)"
                            style="margin-bottom:5px;">{{ __('admin_local.Home') }}<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>

                        <ul class="nav-sub-childmenu submenu-content">
                            @if (hasPermission(['slider-index']))
                                <li><a
                                        href="{{ route('admin.pages.homepage.main_slider') }}">{{ __('admin_local.Slider') }}</a>
                                </li>
                            @endif
                            @if (hasPermission(['comment-index']))
                                <li><a
                                        href="{{ route('admin.pages.homepage.comments') }}">{{ __('admin_local.Comments') }}</a>
                                </li>
                            @endif
                            @if (hasPermission(['counter-index']))
                                <li><a
                                        href="{{ route('admin.pages.homepage.counting') }}">{{ __('admin_local.Counting') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (hasPermission(['aboutus-index']))
                    <li>
                        <a class="sidebar-link" href="{{ route('admin.pages.aboutUs') }}"
                            style="margin-bottom:5px;">{{ __('admin_local.About Us') }}</a>
                    </li>
                @endif
                @if (hasPermission(['contact-index']))
                    <li>
                        <a class="sidebar-link"
                            href="{{ route('admin.pages.contactUs') }}">{{ __('admin_local.Contact') }}</a>
                    </li>
                @endif
                @if (hasPermission(['service-index']))
                    <li>
                        <a class="sidebar-link"
                            href="{{ route('admin.pages.service.index') }}">{{ __('admin_local.Capabilities') }}</a>
                    </li>
                @endif
                @if (hasPermission(['service-index']))
                    <li>
                        <a class="sidebar-link"
                            href="{{ route('admin.pages.team.index') }}">{{ __('admin_local.Team Members') }}</a>
                    </li>
                @endif
                @if (hasPermission(['project-index']))
                    <li>
                        <a class="sidebar-link"
                            href="{{ route('admin.pages.project.index') }}">{{ __('admin_local.Projects') }}</a>
                    </li>
                @endif
                @if (hasPermission(['partner-index']))
                    <li>
                        <a class="sidebar-link"
                            href="{{ route('admin.pages.partner.index') }}">{{ __('admin_local.Brands') }}</a>
                    </li>
                @endif
                @if (hasPermission(['country-index', 'comment-index']))
                    <li>
                        <a class="submenu-title" href="javascript:void(0)"
                            style="margin-bottom:5px;">{{ __('admin_local.Public Diplomacy') }}<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>

                        <ul class="nav-sub-childmenu submenu-content">
                            @if (hasPermission(['country-index']))
                                <li><a
                                        href="{{ route('admin.pages.country.index') }}">{{ __('admin_local.Country Rep.') }}</a>
                                </li>
                            @endif
                            @if (hasPermission(['comment-index']))
                                <li><a
                                        href="{{ route('admin.pages.homepage.comments') }}">{{ __('admin_local.Create') }} / {{ __('admin_local.Vew') }}</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif
                @if (hasPermission(['message-index']))
                    <li>
                        <a class="sidebar-link"
                            href="{{ route('admin.pages.memberof.index') }}">{{ __('admin_local.Member Of') }}</a>
                    </li>
                @endif
                @if (hasPermission(['message-index']))
                    <li>
                        <a class="sidebar-link"
                            href="{{ route('admin.pages.contactUsMessages') }}">{{ __('admin_local.Messages') }}</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if (hasPermission(['work-index']))
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.work.index') }}"
                aria-expanded="false"><i data-feather="bookmark"></i><span> {{ __('admin_local.Works') }}</span>
            </a>
        </li>
    @endif
    @if (hasPermission(['maintenance-mode-index', 'logo-index']))
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
                @if (hasPermission(['logo-index']))
                    <li>
                        <a href="{{ route('admin.settings.logo.index') }}" class="sidebar-link">
                            <span> {{ __('admin_local.Logos and Icons') }} </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
</ul>
