<?php

use Illuminate\Http\Request;

$router->group(["prefix" => "tasks"], function($router) {
	$router->post("", "Tasks@store");
	$router->get("", "Tasks@index");
	$router->put("{task}", "Tasks@update");
	$router->delete("{task}", "Tasks@destroy");
	$router->patch("{task}/completed", "Tasks@completed");
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});