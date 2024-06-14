<?php


namespace  Namdo24\Ezcode\Models;

use Namdo24\Ezcode\Commons\Model;

class Category extends Model
{

    public function getAll()
    {
        try {
            $sql = "
                SELECT 
                    c.id      c_id,
                    c.name    c_name               
                FROM category_course c               
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getAllKw($kw)
    {
        try {
            $sql = "
                SELECT 
                    c.id      c_id,
                    c.name    c_name               
                FROM category_course c where name like '%$kw%'              
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


    public function getByID($id)
    {
        try {
            $sql = "
                SELECT 
                c.id      c_id,
                c.name    c_name            
                FROM category_course c             
                WHERE c.id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($name)
    {
        try {
            $sql = "
                INSERT INTO category_course(name) 
                VALUES (:name) 
            ";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name', $name);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function update($id, $name)
    {
        try {
            $sql = "
                UPDATE category_course 
                SET    name    = :name
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM category_course WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
