<?php

$app->get('/', 'AppController:home')->setName('home');

$app->group('/places', function () {
    $this->map(['GET', 'POST'], '/add', 'PointController:add')->setName('add_point');
    $this->map(['GET', 'POST'], '/{id}/edit', 'PointController:edit')->setName('edit_point');
    $this->get('/{id}/delete', 'PointController:delete')->setName('delete_point');
    $this->get('/{id}/events', 'PointController:getEvents')->setName('get_point_events');
});

$app->post('/comments/add','CommentController:add')->setName('add_comment');

$app->get('/api/comments/{id}','CommentController:API_get')->setName('api_comment.get');

$app->group('/search', function() {
    $this->group('/events', function() {
        $this->map(['GET', 'POST'], '', 'EventController:search')->setName('search_event');
    });
});

$app->group('/events', function () {
    $this->get('', 'EventController:get')->setName('get_events');
    $this->map(['GET', 'POST'], '/add', 'EventController:add')->setName('add_event');
    $this->map(['GET', 'POST'], '/{id}/edit', 'EventController:edit')->setName('edit_event');
    $this->get('/{id}/delete', 'EventController:delete')->setName('delete_event');
    $this->get('/{id}', 'EventController:show')->setName('get_event');
});

$app->group('/admin', function () {
    $this->get('', 'AdminController:home')->setName('admin');

    $this->group('/countries', function () {
        $this->get('', 'CountryController:get')->setName('get_countries');
        $this->map(['GET', 'POST'], '/add', 'CountryController:add')->setName('add_country');
        $this->map(['GET', 'POST'], '/{id}/edit', 'CountryController:edit')->setName('edit_country');
        $this->get('/{id}/delete', 'CountryController:delete')->setName('delete_country');
    });

    $this->group('/cities', function () {
        $this->get('', 'CityController:get')->setName('get_cities');
        $this->map(['GET', 'POST'], '/add', 'CityController:add')->setName('add_city');
        $this->map(['GET', 'POST'], '/{id}/edit', 'CityController:edit')->setName('edit_city');
        $this->get('/{id}/delete', 'CityController:delete')->setName('delete_city');
    });

    $this->group('/categories', function () {
        $this->get('', 'CategoryController:get')->setName('get_categories');
        $this->map(['GET', 'POST'], '/add', 'CategoryController:add')->setName('add_category');
        $this->map(['GET', 'POST'], '/{id}/edit', 'CategoryController:edit')->setName('edit_category');
        $this->get('/{id}/delete', 'CategoryController:delete')->setName('delete_category');
    });
});
