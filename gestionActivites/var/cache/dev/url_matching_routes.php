<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/activity' => [[['_route' => 'activity_index', '_controller' => 'App\\Controller\\ActivityController::index'], null, ['GET' => 0], null, true, false, null]],
        '/activity/child' => [[['_route' => 'activity_index_child', '_controller' => 'App\\Controller\\ActivityController::indexChild'], null, ['GET' => 0], null, false, false, null]],
        '/activity/myActivity' => [[['_route' => 'myActivity_index', '_controller' => 'App\\Controller\\ActivityController::index_myActivity'], null, ['GET' => 0], null, false, false, null]],
        '/activity/new' => [[['_route' => 'activity_new', '_controller' => 'App\\Controller\\ActivityController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/notAllowed' => [[['_route' => 'pageNotAllowed', '_controller' => 'App\\Controller\\SecurityController::notAllowed'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'user_animator_index', '_controller' => 'App\\Controller\\admin\\UserAnimatorController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/new' => [[['_route' => 'user_animator_new', '_controller' => 'App\\Controller\\admin\\UserAnimatorController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:69)'
                            .'|router(*:82)'
                            .'|exception(?'
                                .'|(*:101)'
                                .'|\\.css(*:114)'
                            .')'
                        .')'
                        .'|(*:124)'
                    .')'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:159)'
                .')'
                .'|/a(?'
                    .'|ctivity/(?'
                        .'|inscrit/([^/]++)(*:200)'
                        .'|([^/]++)(*:216)'
                        .'|child/([^/]++)(*:238)'
                        .'|myActivity/([^/]++)(*:265)'
                        .'|([^/]++)(?'
                            .'|/edit(*:289)'
                            .'|(*:297)'
                        .')'
                    .')'
                    .'|dmin/([^/]++)(?'
                        .'|(*:323)'
                        .'|/edit(*:336)'
                        .'|(*:344)'
                    .')'
                .')'
                .'|/registration/([^/]++)/register(*:385)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        69 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        82 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        114 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        124 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        159 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        200 => [[['_route' => 'activity_inscrit', '_controller' => 'App\\Controller\\ActivityController::activityInscrit'], ['user_id'], ['GET' => 0], null, false, true, null]],
        216 => [[['_route' => 'activity_show', '_controller' => 'App\\Controller\\ActivityController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        238 => [[['_route' => 'activity_show_child', '_controller' => 'App\\Controller\\ActivityController::showChild'], ['id'], ['GET' => 0], null, false, true, null]],
        265 => [[['_route' => 'myActivity_show', '_controller' => 'App\\Controller\\ActivityController::showMyActivity'], ['id'], ['GET' => 0], null, false, true, null]],
        289 => [[['_route' => 'activity_edit', '_controller' => 'App\\Controller\\ActivityController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        297 => [[['_route' => 'activity_delete', '_controller' => 'App\\Controller\\ActivityController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        323 => [[['_route' => 'user_animator_show', '_controller' => 'App\\Controller\\admin\\UserAnimatorController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        336 => [[['_route' => 'user_animator_edit', '_controller' => 'App\\Controller\\admin\\UserAnimatorController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        344 => [[['_route' => 'user_animator_delete', '_controller' => 'App\\Controller\\admin\\UserAnimatorController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        385 => [
            [['_route' => 'activity_register', '_controller' => 'App\\Controller\\ActivityRegistrationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
