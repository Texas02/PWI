<?php

namespace DataBase;

use Products;
use User;

class Database
{
    public string $hostname;
    private string $username;
    private string $userpassword;
    private string $database;

    private \mysqli $db;

    public function __construct(string $hostname, string $username, string $userpassword, string $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->userpassword = $userpassword;
        $this->database = $database;
    }

    public function OpenConnect()
    {
        $this->db = new \mysqli($this->hostname, $this->username, $this->userpassword, $this->database);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function CloseConnect()
    {
        if (isset($this->db)) {
            $this->db->close();
            unset($this->db);
        }
    }

    public function getAllData($tableName)
    {
        $products = [];
        $users = [];

        $query = sprintf("SELECT * FROM %s", $tableName);
        $result = $this->db->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                if ($tableName === 'products') {
                    $products[] = $this->product_help($row);
                } else if ($tableName === 'users') {
                    $users[] = new User($row['id'], $row['email'], $row['password'], $row['first_name'], $row['last_name']);
                }
            }
        }

        return $tableName === 'products' ? $products : $users;
    }

    public function getAllProducts()
    {
        return $this->getAllData('products');
    }

    public function getAllUsers()
    {
        return $this->getAllData('users');
    }

    public function getRowById($tableName, int $id)
    {
        $query = sprintf("SELECT * FROM %s WHERE id = %d", $tableName, $id);
        $result = $this->db->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            if ($row) {
                if ($tableName === 'products') {
                    return $this->product_help($row);
                } else if ($tableName === 'users') {
                    return new User($row['id'], $row['email'], $row['password'], $row['first_name'], $row['last_name']);
                }
            } else {
                return null;
            }
        } else {
            throw new Exception("Błąd podczas pobierania danych");
        }
    }

    public function getRowByUniqueIndex($tableName, string $uniqueIndexValue)
    {
        $uniqueIndexColumn = ($tableName === 'products') ? 'ean' : 'email';

        $query = sprintf("SELECT * FROM %s WHERE %s = '%s'", $tableName, $uniqueIndexColumn, $uniqueIndexValue);
        $result = $this->db->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            if ($row) {
                if ($tableName === 'products') {
                    return $this->product_help($row);
                } else if ($tableName === 'users') {
                    return new User($row['id'], $row['email'], $row['password'], $row['first_name'], $row['last_name']);
                }
            } else {
                return null;
            }
        } else {
            throw new Exception("Błąd podczas pobierania danych");
        }
    }

    private function product_help(array $row)
    {
        $product = new Products();
        $product->setId($row['id']);
        $product->setEan($row['ean']);
        $product->setName($row['name']);
        $product->setDescription($row['description']);
        $product->setPrice($row['price']);
        $product->setCreatedAt($row['created_at']);
        $product->setUpdatedAt($row['updated_at']);
        $product->setDeletedAt($row['deleted_at']);

        return $product;
    }
}
