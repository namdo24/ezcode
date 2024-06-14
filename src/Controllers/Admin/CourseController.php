<?php

namespace Namdo24\Ezcode\Controllers\Admin;

use Namdo24\Ezcode\Commons\Controller;
use Namdo24\Ezcode\Models\Course;
use Namdo24\Ezcode\Models\Category;

class CourseController extends Controller
{
    private Course $courses;


    const PATH_UPLOAD = '/uploads/courses/';

    public function __construct()
    {
        $this->courses = new Course;
    }

    // Danh sách
    public function index()
    {

        if (!empty($_GET['kw'])) {
            $data['courses'] = $this->courses->getAllKw($_GET['kw']);           
        }   
        else {
            $data['courses'] = $this->courses->getAll();
          
        }
        return $this->renderViewAdmin(
            'course.course-list',
            $data
        );
    }
    // Thêm mới
    public function create()
    {
        if (!empty($_POST)) {
            $categoryID = $_POST['id_category'];
            $name      = $_POST['name'];
            $price    = $_POST['price'];
            $student    = $_POST['student'];
            $lesson   = $_POST['lesson'];
            $describe    = $_POST['describe'];
            $image      = $_FILES['image'] ?? null;
            $imagePath  = null;
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }

            $this->courses->insert(
                $name,
                $imagePath,
                $price,
                $lesson,
                $student,
                $describe,
                $categoryID
            );

            header('Location: /admin/course');
            exit();
        }

        $data['categories'] = (new Category)->getAll();
        return $this->renderViewAdmin('course.course-create', $data);
    }

    public function update($id)
    {
        $data['course'] = $this->courses->getByID($id);
        if (empty($data['course'])) {
            echo '404-Not found';
            die;
        }

        if (!empty($_POST)) {
            $categoryID = $_POST['id_category'];
            $name      = $_POST['name'];
            $price    = $_POST['price'];
            $student    = $_POST['student'];
            $lesson   = $_POST['lesson'];
            $mota    = $_POST['describe'];
        
            $image = $_FILES['image'] ?? null;
            $imagePath = $data['course']['image'];
            $move = false;
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $data['course']['image'];
                } else {
                    $move = true;
                }
            }       
            $this->courses->update(
                $id,
                $name,
                $imagePath,
                $price,
                $student,
                $lesson,
                $mota,
                $categoryID
            );
            if (
                $move
                && $data['course']['image']
                && file_exists(PATH_ROOT . $data['course']['image'])
            ) {
                unlink(PATH_ROOT . $data['course']['image']);
            }
            header("Location: /admin/course");
            exit();
        }
        $data['categories'] = (new Category)->getAll();

        return $this->renderViewAdmin('course.course-update', $data);
    }
    // Delete theo ID
    public function delete($id)
    {
        $course = $this->courses->getByID($id);

        if (empty($course)) {
            die(404);
        }

        $this->courses->delete($id);

        if ($course['image'] && file_exists(PATH_ROOT . $course['image'])) {
            unlink(PATH_ROOT . $course['image']);
        }

        header('Location: /admin/course');
        exit();
    }
}
