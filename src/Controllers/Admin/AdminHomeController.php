<?php
namespace Namdo24\Ezcode\Controllers\Admin;
use Namdo24\Ezcode\Commons\Controller;

class AdminHomeController extends Controller{
   public function index(){
    return $this->renderViewAdmin('layouts.home');
   }
}
