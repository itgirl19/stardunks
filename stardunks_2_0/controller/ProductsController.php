<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 22-2-2019
 * Time: 11:15
 */

require_once 'model/ProductsLogic.php';

class ProductsController {
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
    public function handleRequest() {
        try {
            $op = isset($_REQUEST['op'])?$_REQUEST['op']:NULL;
            switch ($op) {
                case 'create':
                    $this->collectCreateProduct();
                    break;
                case 'reads':
                    $this->collectReadProducts();
                    break;
                case 'read':
                    $this->collectReadProduct($_REQUEST['id']);
                    break;
                case 'update':
                    $this->collectUpdateProduct();
                    break;
                case 'delete':
                    $this->collectDeleteProduct($_REQUEST['id']);
                    break;
                case 'search':
                    $this->collectSearch();
                    break;
                default:
                    $this->collectReadProducts();
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();

        }
    }
    public function collectCreateProduct() {}

    public function collectReadProducts() {
        $products = $this->ProductsLogic->readPage();
        include 'view/products.php';
    }

    public function collectUpdateProduct() {}

    public function collectDeleteProduct() {}

    public function collectSearch() {
        $search = $_REQUEST;
        $product = $this->PoductsLogic->searchProduct($search);
        include 'view/search.php';
    }






}