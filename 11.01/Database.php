<?php
namespace DB;
require_once "Products.php";
require_once "Users.php";
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
        $db = new \mysqli(
            $this->hostname,
            $this->username,
            $this->userpassword,
            $this->database
        );
        $this->db = $db;
    }

    public function CloseConnect()
    {
        $this->db->close();
        unset($this->db);
    }


    public function getAllData1(string $tableName)
    {
        if (!$this->db->connect_error or isset($this->db)) {
            $query = sprintf("SELECT * FROM %d", $tableName);
            $result = $this->db->query($query);
            if ($result) {
                $data = [];

                while ($row = $result->fetch_assoc()) {
                    if ($tableName === 'products') {
                        $product = new Products(
                            $row['id'],
                            $row['ean'],
                            $row['name'],
                            $row['description'],
                            $row['price'],
                            $row['created_at'],
                            $row['updated_at'],
                            $row['deleted_at']
                        );
                        $data[] = $product;
                    } elseif ($tableName === 'users') {
                        $user = new Users();
                        $user->setId($row['id']);
                        $user->setEmail($row['email']);
                        $user->setPassword($row['password']);
                        $user->setFirstName($row['first_name']);
                        $user->setLastName($row['last_name']);
                        $data[] = $user;
                    }
                }

                return $data;
            }
        } else {
            echo("Error, db connection failed: " . $this->db->error);
            return false;
        }
    }

    public function getProductByGlowny(int $id)
    {
        if (!$this->db->connect_error or isset($this->db)) {
            $query = sprintf("SELECT * FROM products WHERE id = %d", $id);
            $result = $this->db->query($query);
            if ($result) {
                $row = $result->fetch_assoc();
                if ($result) {
                    $row = $result->fetch_assoc();
                    if ($row) {
                        return $this->product_help($row);
                    }
                }
            }
        } else {
            echo("Error, db connection failed: " . $this->db->error);
            return false;
        }
    }

    public function getProductByEAN(string $ean)
    {
        if (!$this->db->connect_error or isset($this->db)) {
            $query = sprintf("SELECT * FROM products WHERE ean = %s", $ean);
            $result = $this->db->query($query);
            if ($result) {
                $row = $result->fetch_assoc();
                if ($row) {
                    return $this->product_help($row);
                } else {
                    echo("Error, db connection failed: " . $this->db->error);
                    return false;
                }
            }
        }
        return null;
    }

    function product_help($row){
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
