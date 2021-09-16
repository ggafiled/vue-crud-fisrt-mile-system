<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'First Mile ERP System',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>FIRST MILE System </b>',
    'logo_img' => 'https://sv1.picz.in.th/images/2021/02/11/o138qN.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'FIRST MILE System',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => false,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-none',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-none',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => true,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Custom config
    |--------------------------------------------------------------------------
    |
    | Language bar selection.
    |
    */
    'language_bar_enable' => true,
    'tabbed_iframe_enable' => true,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'global_search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],
       ['header' => 'MENU'],
        [
            'text' => 'dashboard',
            'url'  => '/dashboard',
            'icon' => 'fas fa-fw bi bi-kanban',
        ],
        [
            'text' => 'project_managment',
            'icon' => 'fas fa-fw fas fa-building',
            'roles'  => ["superadministrator", "administrator", "user"],
            'can'  => ["constarution-create", "constarution-read"],
            'submenu' => [
                [
                    'text' => 'building_managment',//building
                    'url'  => '/building',
                    'icon' => 'fas fa-fw bi bi-building',
                    'roles'  => ["superadministrator", "administrator", "user"]
                ],
                [
                    'text' => 'constitution_managment',//constalution
                    'url'  => '/constitution',
                    'icon' => 'fas fa-fw bi bi-aspect-ratio',
                    'can'  => ["constarution-create", "constarution-read"]
                ],
                [
                    'text' => 'progress_managment',//progress
                    'url'  => '/progress',
                    'icon' => 'mdi mdi-18px mdi-progress-wrench',
                    'roles'  => ["superadministrator", "administrator"]
                ],
                [
                    'text' => 'customer_managment',//customer
                    'url'  => '/customer',
                    'icon' => 'fas fa-fw fas fa-users',
                    'roles'  => ["superadministrator", "administrator"]
                ],
                [
                    'text' => 'planning_managment',//planing
                    'url'  => '/planing/map',
                    'icon' => 'fas fa-fw fas fa-list-alt',
                    'roles'  => ["superadministrator", "administrator"]
                ],
                [
                    'text' => 'contractor_managment',//contractor
                    'url'  => '/',
                    'icon' => 'fas fa-fw fas fa-file-signature',
                    'roles'  => ["superadministrator", "administrator"]
                ],
                [
                    'text' => 'accountant_managment',//accountant
                    'url'  => '/',
                    'icon' => 'fas fa-fw fa-file-invoice-dollar',
                    'roles'  => ["superadministrator", "administrator"]
                ],
            ]
        ],
        [
            'text' => 'reports_progress',
            'icon' => 'fas fa-fw fas fa-clipboard-list',
            'roles'  => ["superadministrator", "administrator"],
            'submenu' => [
                [
                    'text' => 'project_name_table',
                    'url'  => '/building/all',
                    'icon' => 'fas fa-fw fas fa-file-alt',
                ],
                [
                    'text' => 'project_tot_table',
                    'url'  => '/building/tot',
                    'icon' => 'fas fa-fw fas fa-file-alt',
                ],
                [
                    'text' => 'project_3bb_table',
                    'url'  => '/building/3bb',
                    'icon' => 'fas fa-fw fas fa-file-alt',
                ],
                [
                    'text' => 'project_true_table',
                    'url'  => '/building/true',
                    'icon' => 'fas fa-fw fas fa-file-alt',
                ],
                [
                    'text' => 'project_ais_table',
                    'url'  => '/building/ais',
                    'icon' => 'fas fa-fw fas fa-file-alt',
                    // 'icon' => 'c-icon c-icon-ais',
                ],
                [
                    'text' => 'project_fibernet_table',
                    'url'  => '/building/fibernet',
                    'icon' => 'fas fa-fw fas fa-file-alt',
                ],
            ]
        ],
        // [
        //     'text' => 'issue_tickets',
        //     'url'  => '/issue-tickets',
        //     'icon' => 'mdi mdi-ticket-confirmation-outline',
        //     'active_url' => 'issue-tickets'
        // ],
        // [
        //     'text' => 'map buildings',
        //     'url'  => '/mapbuilding',
        //     'icon' => 'bi bi-map-fill',
        //     'roles'  => ["superadministrator", "administrator","user"]
        // ],
        [
            'text' => 'console_log',
            'url'  => '/console-log',
            'icon' => 'mdi mdi-console',
            'roles'  => ["superadministrator", "administrator"]
        ],
        ['header' => 'user'],
        [
            'text' => 'user_information',
            'url'  => '/profile',
            'icon' => 'fas fa-fw fa-user',
            'can'  => ['profile-update', 'profile-read', 'password-update'],
        ],
        [
            'text' => 'user_role_permission',
            'url'  => '/permission',
            'icon' => 'bi bi-layers',
            'roles'  => ['superadministrator', 'administrator'],
        ],
        // [
        //     'text' => 'User Teams',
        //     'url'  => '/team',
        //     'icon' => 'bi bi-people',
        //     'roles'  => ['superadministrator','administrator'],
        // ],
        [
            'text' => 'user_management',
            'url'  => '/users',
            'icon' => 'bi bi-people',
            'roles'  => ['superadministrator', 'administrator'],
        ],
        [
            'text' => 'Data Validation',
            'url'  => '/settings?tab=building',
            'icon' => 'bi bi-gear-fill',
            'roles'  => ['superadministrator'],
            'active_url' => 'settings'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        App\Filter\GateFilter::class,
        // JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    */

    'livewire' => false,
];