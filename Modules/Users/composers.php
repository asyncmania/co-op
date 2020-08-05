<?php
view()->composer(
    [
        'pages::public.register',
        'checkout::index',
    ],
    'Modules\Users\Composers\RegisterFormViewComposer'
);

view()->composer(
    [
        'pages::public.login',
        'pages::public.register',
        'users::login'
    ],
    'Modules\Users\Composers\LoginFormViewComposer'
);

view()->composer(
    [
        'users::admin._permissions_create',
        'users::admin._permissions',
    ],
    'Modules\Users\Composers\PermissionsViewComposer'
);

view()->composer(
    [
        'core::public.master',
        'core::public.account-master',
        'core::public._partials.top',
        'dashboard::public.index',
        'core::admin._user',
        'checkout::index',
    ],
    'Modules\Users\Composers\UsernameViewComposer'
);
