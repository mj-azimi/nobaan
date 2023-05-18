<?php
namespace Controller;

use Lib\View;

class BaseController {
    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    public function render($viewName, $data = []) {
        $this->view->render($viewName, $data);
    }

    // دیگر متدها و عملیات مورد نیاز برای کنترلر‌ها
}
