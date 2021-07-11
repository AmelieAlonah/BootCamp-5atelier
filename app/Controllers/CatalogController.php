<?php

namespace oShop\Controllers;


use oShop\Models\Product;


class CatalogController extends CoreController
{
    public function category($params)
    {
        $categoryId = $params['id'];

        $productModel = new Product();
        $products = $productModel->findAll();

        $viewVars = [
            'category_id' => $categoryId,
            'products' => $products,
        ];

        $this->show('category_products', $viewVars);
    }

    public function brand($params)
    {
        $brandId = $params['id'];
        $viewVars = [
            'brand_id' => $brandId,
        ];

        $this->show('brand_products', $viewVars);
    }

    public function type($params)
    {
        $typeId = $params['id'];
        $viewVars = [
            'type_id' => $typeId,
        ];

        $this->show('type_products', $viewVars);
    }

    /**
     * Page produit
     */
    public function product($params)
    {
        $productId = $params['id'];

        $productModel = new Product();
        
        $product = $productModel->findJoinedToAll($productId);

        $this->show('product', ['product' => $product])
    }
}