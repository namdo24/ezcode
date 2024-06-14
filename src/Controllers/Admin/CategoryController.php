<?php

namespace Namdo24\Ezcode\Controllers\Admin;

use Namdo24\Ezcode\Commons\Controller;
use Namdo24\Ezcode\Models\Category;
// use Namdo24\Ezcode\Models\Category;
class CategoryController extends Controller
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category;
    }

    // Danh sách
    public function index()
    {
        if (!empty($_GET['kw'])) {
            $data['categories'] = $this->category->getAllKw($_GET['kw']);
        } else {
            $data['categories'] = $this->category->getAll();
        }
        return $this->renderViewAdmin(
            'category.category-list',
            $data
        );
    }
    // Thêm mới
    public function create()
    {
        if (!empty($_POST)) {
            $this->category->insert($_POST['name']);

            header('Location: /admin/category');
            exit();
        }



        return $this->renderViewAdmin('category.category-create');
    }



    // Cập nhật theo ID
    public function update($id)
    {
        $data['category'] = $this->category->getByID($id);

        if (empty($data['category'])) {
            echo '404-Not found';
            die;
        }
        if (!empty($_POST)) {
            $this->category->update($id, $_POST['name']);

            header("Location: /admin/category");

            exit();
        }
        return $this->renderViewAdmin('category.category-update', $data);
    }

    // Delete theo ID
    public function delete($id)
    {
        $category = $this->category->getByID($id);
        if (empty($category)) {
            echo '404-Not found';
            die;
        }
        $this->category->delete($id);
        header('Location: /admin/category');
        exit();
    }
}
