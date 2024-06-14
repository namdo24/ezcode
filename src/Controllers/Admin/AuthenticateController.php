<?php

namespace Namdo24\Ezcode\Controllers\Admin;

use Namdo24\Ezcode\Commons\Controller;
use Namdo24\Ezcode\Models\User;

class AuthenticateController extends Controller
{
    public function login()
    {
      if(!empty($_POST)){
        $_SESSION['errors'] = [];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']['email'] = 'Email không được để đúng và phải đúng định dạng';
        }
        if (empty($password)) {
            $_SESSION['errors']['password'] = 'Password không được để trống';
        }

        $user = (new User)->getByEmailAndPassword($email, $password);
        if (empty($user)) {
            $_SESSION['errors']['not-found'] = 'Thông tin người dùng không đúng';
        } else {
            $_SESSION['user'] = $user;
            header('Location: /admin');
            exit();
        }
      }
      
        return $this->renderViewAdmin('user.login');
    }
    public function logout(){
        session_destroy();
        header('Location:/auth/login');
        exit();
    }
}
