<?php
    namespace application\controllers;
    use Exception;

    class ApiController extends Controller {
        public function restArea() {
            return $this->model->restArea();
        }
        
    }