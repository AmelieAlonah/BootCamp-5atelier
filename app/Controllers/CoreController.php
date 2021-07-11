<?php

namespace oShop\Controllers;

use oShop\Models\Type;
use oShop\Models\Brand;

class CoreController
{
    protected function show($viewName, $viewVars = []) {

        global $router;
        $absoluteUrl = $_SERVER['BASE_URI'];

        $brandModel = new Brand();
        $topFiveBrands = $brandModel->findTopFiveFooter();

        $typeModel = new Type();
        $topFiveTypes = $typeModel->findTopFiveFooter();

        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}