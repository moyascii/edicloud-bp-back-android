<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $session = session();
        // $selectedCondominioId = $session->get('condominio_seleccionado');

        // if (!$selectedCondominioId) {
        //     return redirect()->to('/login/selectCondominio');
        // }

        $data = [
            'headerData' => ['title' => 'Dashboard'],
            'user' => [
                'user_nombre' => $session->get('user_nombre')
                // 'condominio_id' => $selectedCondominioId
            ]
        ];

        return view('v_dashboard', $data);
    }
}
