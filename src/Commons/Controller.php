<?php 


namespace Namdo24\Ezcode\Commons;
use eftec\bladeone\BladeOne;

class Controller
{
    public function renderViewClient($view, $data = []) {
        $templatePath = __DIR__ . '/../Views/Client';
        // echo __DIR__;die;

        $blade = new BladeOne($templatePath);

        echo $blade->run($view, $data);
    }
    public function renderViewAdmin($view, $data = []) {
        $templatePath = __DIR__ . '/../Views/Admin';
        // echo __DIR__;die;

        $blade = new BladeOne($templatePath);

        echo $blade->run($view, $data);
    }
   

}