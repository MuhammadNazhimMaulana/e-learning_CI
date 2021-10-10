<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard_A extends BaseController
{
    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();

    }

    public function index()
    {
        // Helper Cookie
        helper('cookie');

        set_cookie("username_admin", $this->session->get('username'), 3600);

        return view('Admin_View/User_Admin/Dashboard_Admin');
    }

}