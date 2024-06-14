<?php
namespace Namdo24\Ezcode\Controllers\Client;
use Namdo24\Ezcode\Commons\Controller;
use Namdo24\Ezcode\Models\Category;
use Namdo24\Ezcode\Models\Course;
class ClientHomeController extends Controller{
   public function index(){
      $data['categories']=(new Category)->getAll();
      $data['courses']=(new Course)->getAll();
    return $this->renderViewClient('home',$data);
   }
   public function list($id){   
      $data['courses']=(new Course)->listCate($id);
     $data['name']=(new Course)->name($id);
     $data['categories']=(new Category)->getAll();
    return $this->renderViewClient('homeCate',$data);
   }
   public function show($id){   
      $data['course']=(new Course)->getByID($id);
      $data['categories']=(new Category)->getAll();
    return $this->renderViewClient('show',$data);
   }

}
