<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
	'/' => 'test#index',
	'/menu' => 'menu#menu',
	'/add' => 'add#add',
	'/delete' => 'delete#delete',
	'/edit' => 'edit#edit',
	'/list' => 'list#list',
	'/test' => 'test#index'
);