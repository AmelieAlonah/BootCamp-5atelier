<?php

namespace oShop\Models;

use PDO;
use oShop\Utils\Database;

class Type extends CoreModel
{
    private $name;
    private $footer_order;

    public function findAll()
    {
        $sql = '
            SELECT * FROM `type`
        ';

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Type');

        return $results;
    }

    public function find($id)
    {
        $sql = '
            SELECT *
            FROM type
            WHERE id = ' . $id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $result = $pdoStatement->fetchObject('oShop\Models\Type');

        return $result;
    }

    /**
     * Les 5 types du pied de page
     */
    public function findTopFiveFooter()
    {
        $sql = 'SELECT *
        FROM `type`
        WHERE `footer_order` != 0
        ORDER BY `footer_order` ASC
        LIMIT 5';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Type');

        return $types;
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
