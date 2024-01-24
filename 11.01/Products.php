<?php
namespace DB;
class Products
{
    private int $id;
    private string $ean;
    private string $name;
    private string $description;
    private int $price;
    private string $createdAt;
    private string $updatedAt;
    private string $deletedAt;


    public function __construct(int $id, string $ean, string $name, string $description, int $price, string $createdAt, string $updatedAt, string $deletedAt)
    {
        $this->id = $id;
        $this->ean = $ean;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        return $this -> id = $id;
    }

    public function getEan(int $ean){
        return $this -> ean;
    }

    public function setEan(string $ean){
        return $this -> ean = $ean;
    }

    public function getName(){
        return $this -> name;
    }

    public function setName(string $name){
        return $this -> name = $name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice(int $price){
        $this->price = $price;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt){
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt){
        $this->updatedAt = $updatedAt;
    }

    public function getDeletedAt(){
        return $this->deletedAt;
    }

    public function setDeletedAt(string $deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

}