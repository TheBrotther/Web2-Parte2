<?php
require_once 'controller/AtributoControllerApi.php';
require_once 'controller/HeroeControllerApi.php';
require_once 'libs/Router.php';

$route = new Router();
    $route->addRoute('atributos/:ID', 'GET', 'AtributoControllerApi', 'getAtributo');
    $route->addRoute('atributos', 'GET', 'AtributoControllerApi', 'getAtributos');
    $route->addRoute('atributos', 'POST', 'AtributoControllerApi', 'insertAtributo');
    $route->addRoute('atributos/:ORDER/:COLUMN', 'GET', 'AtributoControllerApi', 'getByOrderedColumn');
    $route->addRoute('atributos/:ID', 'PUT', 'AtributoControllerApi', 'updateAtributo');
    $route->addRoute('atributos/:ID', 'DELETE', 'AtributoControllerApi', 'deleteAtributo');

    $route->addRoute('heroes/:ID', 'GET', 'HeroeControllerApi', 'getHeroe');
    $route->addRoute('heroes', 'GET', 'HeroeControllerApi', 'getHeroes');
    $route->addRoute('heroes/:ORDER/:COLUMN', 'GET', 'HeroeControllerApi', 'getByOrderedColumn');
    $route->addRoute('heroes', 'POST', 'HeroeControllerApi', 'insertHeroe');
    $route->addRoute("heroes/atributos/:ID", "GET", "HeroeControllerApi", "getHeroesbyAtributo");
    $route->addRoute('heroes/:ID', 'PUT', 'HeroeControllerApi', 'updateHeroe');
    $route->addRoute('heroes/:ID', 'DELETE', 'HeroeControllerApi', 'deleteHeroe');
    
    $route->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);