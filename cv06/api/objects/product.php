<?php

class Product {
    private $conn;
    private $table_name = 'products';

    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT id, name, description, price FROM ' . $this->table_name . ' ORDER BY id DESC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = 'SELECT id, name, description, price FROM ' . $this->table_name . ' WHERE id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->price = $row['price'];
    }

    public function update() {
        $query = 'UPDATE `products` SET `name`=:name, `description`=:description, `price`=:price WHERE `id`=:id';
        $stmt = $this->conn->prepare($query);

        // validate date if it does not contain any malicious code
        $this->id = filter_var($this->id, FILTER_UNSAFE_RAW);
        $this->name = filter_var($this->name, FILTER_UNSAFE_RAW);
        $this->description = filter_var($this->description, FILTER_UNSAFE_RAW);
        $this->price = filter_var($this->price, FILTER_UNSAFE_RAW);

        // bind the parameters
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);

        if ($stmt->execute()) {
            return true;
        }
        return false;

    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE `id` = :id';
        $stmt = $this->conn->prepare($query);

        $this->id = filter_var($this->id, FILTER_UNSAFE_RAW);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function create() {

        $query = 'INSERT INTO ' . $this->table_name . ' (`name`, `description`, `price`) VALUES (:name, :description, :price)'; 
        $stmt = $this->conn->prepare($query);

        // validate date if it does not contain any malicious code
        $this->name = filter_var($this->name, FILTER_UNSAFE_RAW);
        $this->description = filter_var($this->description, FILTER_UNSAFE_RAW);
        $this->price = filter_var($this->price, FILTER_UNSAFE_RAW);

        // bind the parameters
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);

        if ($stmt->execute()) {
            return true;
        }
        return false;

    }

}