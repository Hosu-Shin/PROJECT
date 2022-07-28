<?php
    namespace application\controllers;
    use Exception;

    class ApiController extends Controller {
        public function selArea() {
            return $this->model->selArea();
        }

        public function insBobF() {
            $json = getJson();
            print_r($json);
            return [_RESULT => $this->model->productInsert($json)];
        }
        
    }