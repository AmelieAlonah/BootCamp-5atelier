<?php

namespace oShop\Models;

use PDO;
use oShop\Utils\Database;


class Product extends CoreModel
{
    /**
     * Les propriétés sont en snake_case au lieu de camelCase
     * c'est une exception à notre convention pour être raccord les colonnes
     */

    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

    /**
     * Get one product by its id
     * 
     * @param int $id Product primary key
     * @return Product Product found
     */
    public function find(int $id): Product
    {
        $sql = "SELECT * FROM product WHERE id={$id}";

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $product = $pdoStatement->fetchObject('oShop\Models\Product');

        return $product;
    }

    /**
     * Get all products
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM product;";

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product');

        return $products;
    }

    /**
     * Find one product with category name, type name, brand name
     */
    public function findJoinedToAll(int $id)
    {
        $sql = "SELECT product.*, brand.name AS brand_name, category.name AS category_name, type.name AS type_name
        FROM `product`
        INNER JOIN brand ON product.brand_id = brand.id
        LEFT JOIN category ON product.category_id = category.id
        INNER JOIN type ON product.type_id = type.id
        WHERE product.id = {$id}";

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $product = $pdoStatement->fetchObject('oShop\Models\Product');

        return $product;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
}