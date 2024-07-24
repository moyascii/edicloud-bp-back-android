<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function generate_hash($clave)
    {
        $password = $clave;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        echo $hash;
    }
    public function index(): string
    {
        return view('v_login');
    }
}
