<?php


namespace  Namdo24\Ezcode\Models;

use Namdo24\Ezcode\Commons\Model;

class Course extends Model
{

    public function getAll()
    {
        try {
            $sql = "
                SELECT 
                    c.id      c_id,
                    c.name    c_name,
                    c.image   c_image,
                    c.price   c_price,
                    c.student  c_student,
                    c.lesson  c_lesson,  
                    c.mota  c_mota,                
                    c.id_category c_id_category
                FROM course c
                
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
                    c.name    c_name,
                    c.image   c_image,
                    c.price   c_price,
                    c.student  c_student,
                    c.lesson  c_lesson,  
                    c.mota  c_mota,                
                    c.id_category c_id_category
                FROM course c  where name like '%$kw%'
                or price like '%$kw%'
                or student like '%$kw%'
                or lesson like '%$kw%'
                or id_category like '%$kw%'  
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
                SELECT *                 
                FROM course
                WHERE id = :id
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
    public function name($id)
    {
        try {
            $sql = "
                SELECT name                 
                FROM category_course
                WHERE id = :id
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
    public function listCate($id)
    {
        try {
            $sql = "
            SELECT* FROM course  WHERE id_category =:id ;
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function insert($name, $imagePath, $price, $lesson, $student, $describe, $categoryID)
    {
        try {
            $sql = "
                INSERT INTO course(name,image,price,lesson,student,mota,id_category) 
                VALUES (:name,:image,:price,:lesson,:student,:mota,:id_category) 
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_category', $categoryID);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image', $imagePath);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':lesson', $lesson);
            $stmt->bindParam(':student', $student);
            $stmt->bindParam(':mota', $describe);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function update(
        $id,
        $name,
        $imagePath,
        $price,
        $student,
        $lesson,
        $mota,
        $categoryID
    ) {
        try {         
            $sql = "UPDATE course SET name = :name,
                           image = :image,
                           price = :price,
                           lesson = :lesson,
                           student = :student,
                           mota = :mota,
                           id_category = :id_category
                       WHERE id = :id";        
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image', $imagePath);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':lesson', $lesson);
            $stmt->bindParam(':student', $student);
            $stmt->bindParam(':mota', $mota);
            $stmt->bindParam(':id_category', $categoryID);
            $stmt->bindParam(':id', $id);       
            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM course WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
