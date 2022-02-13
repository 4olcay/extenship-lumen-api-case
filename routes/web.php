<?php

use App\Http\Controllers\UserController;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->post('/login', 'UserController@login');
    $router->post('/create', 'UserController@create');
    $router->get('/list', 'UserController@list');

    $router->group(['prefix' => '/{user_id}'], function() use ($router) {
        $router->get('/get', 'UserController@get');
        $router->delete('/delete', 'UserController@delete');
    });
});

$router->group(['prefix' => 'article'], function () use ($router) {
    $router->post('/create', 'ArticleController@create');
    $router->get('/notification-pending-list', 'ArticleController@notificationPendingList');

    $router->group(['prefix' => '/{article_id}'], function() use ($router) {
        $router->get('/detail', 'ArticleController@get');
        $router->patch('/update-subject', 'ArticleController@updateSubject');
        $router->patch('/update-content', 'ArticleController@updateContent');
        $router->patch('/notification-sent', 'ArticleController@notificationSent');
        $router->delete('/remove', 'ArticleController@remove');
    });

    $router->group(['prefix' => 'comment'], function () use ($router) {
        $router->post('/create', 'CommentController@create');
    
        $router->group(['prefix' => '/{comment_id}'], function () use ($router) {
            $router->get('/detail', 'CommentController@detail');
            $router->patch('/update-content', 'CommentController@updateContent');
            $router->delete('/remove', 'CommentController@remove');
        });    
    });
});