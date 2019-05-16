<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 22-2-2019
 * Time: 11:14
 */

require 'header.php';

echo $products[1];

$html='';
for ($i=1; $i <= $products[0]; $i++) {
    $html .= "<a href = 'localhost/index.php?op=readpage&p=$i'>".$i."</a>";
}
echo $html;

include 'footer.php';



