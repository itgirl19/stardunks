<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 22-2-2019
 * Time: 11:06
 */

require_once 'model/DataHandler.php';
require_once 'help/HelpFunctions.php';

class ProductsLogic {
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost","mysql","stardunks","root","AArw3c8WciwJRFT");
        $this->HelpFunctions = new HelpFunctions();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function createProduct() {}

    public function readPage(){
        $item_per_page = 4;
        $postion = ((1-1) * $item_per_page);
        $sql ="SELECT * FROM products LIMIT $postion, $item_per_page";
        $res = $this->DataHandler->readsData($sql);
        $results = $this->HelpFunctions->CreateTable($res);
        $pages = $this->DataHandler->countpages('SELECT COUNT(*) FROM products');
        return array($pages,$results);
    }

    public function deleteProducts() {
        try {
        } catch (Exception $e) {
            throw  $e;
        }
    }

    public function searchProduct() {
        $search_value = $search['search'];
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$search_value%' OR other_product_details LIKE '%$search_value%'";
        $result = $this->DataHandler->searchProduct();
        return $result;
    }





}