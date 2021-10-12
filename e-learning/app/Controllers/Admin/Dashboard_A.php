<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

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

        if($this->session->get('remember') == 'Remember'){
            $id_user = $this->session->get('id_user');

            $model = new User_M();
    
            $user = $model->find($id_user);

            set_cookie("cookie_token", $user->cookie_token, 3600);

            $data = [
                'user' => $user,
                'title' => 'Login dengan membuat'
            ];

        }else if(get_cookie("cookie_token") != null){
            $cookie_token = get_cookie("cookie_token");

            $model = new User_M();
    
            $user = $model->where('tbl_user.cookie_token', $cookie_token)->first();

            $data = [
                'user' => $user,
                'title' => 'Login pakai cookie'
            ];
        }else{

            $data = [
                'title' => 'Login biasa'
            ];
        }

        return view('Admin_View/User_Admin/Dashboard_Admin', $data);
    }

}