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

}
