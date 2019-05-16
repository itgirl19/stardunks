<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 22-2-2019
 * Time: 10:26
 */

require_once 'controller/ProductsController.php';

$controller = new ProductsController();
$controller->handleRequest();