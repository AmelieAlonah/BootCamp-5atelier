<?php

namespace oShop\Models;

use PDO;
use oShop\Utils\Database;

class Brand extends CoreModel
{
    private $name;
    private $footer_order;

    public function findTopFiveFooter()
    {
        $sql = 'SELECT *
        FROM `brand`
        WHERE `footer_order` != 0
        ORDER BY `footer_order` ASC
        LIMIT 5';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Brand');
        return $brands;
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
     * Get the value of footer_order
     */ 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }
}