<?php

class Controller
{
    public function model($model)
    {
        require_once __DIR__ . "/../models/" . $model . ".php";

        return new $model();
    }

    public function view($viewname, $data = [])
    {
        extract($data, EXTR_SKIP);

        require_once __DIR__ . '/../views/' . $viewname . '.php';
    }
}
