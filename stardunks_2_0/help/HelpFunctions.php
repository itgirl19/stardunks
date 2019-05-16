<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 4-4-2019
 * Time: 13:39
 */


class HelpFunctions {

    public function createTable($result) {
        $tableheader = false;
        $html = "";
        $html .= "<table>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if($tableheader == false) {
                $html .= "<tr>";
                foreach($row as $key=>$value) {
                    $html .= "<th>{$key}</th>";
                }
                $html .= "</tr>";
                $tableheader = true;
            }

            $html .= "<tr>";
            foreach($row as $value) {
                $html .= "<td>{$value}</td>";
            }
            $html .= "<td><button><i class='fab fa-readme'></i> READ</button></td>";
            $html .= "<td><button><i class='fas fa-edit'></i> UPDATE</button></td>";
            $html .= "<td><button><i class='fas fa-trash-alt'></i> DELETE</button></td>";
            $html .= "</tr>";

        }
        $html .= "</table>";
        return $html;

    }

}