<?php

class HomeController extends BaseController {

    public function getIndex() {
        return View::make('hello');
    }

    public function getEntrar() {
        $titulo = 'Entrar - Desenvolvendo com Laravel';
        return View::make('home/entrar', compact('titulo'));
    }

    public function getCadastrar() {

        return View::make('home/cadastrar', compact('titulo'));

    }

    public function cadastrarUsuario() {

       $rules = array(
        'username' => array('required'),
        'email'       => array('required', 'email', 'unique:usuarios'),
        'senha' => array('required', 'min:7')
    );

    $validation = Validator::make(Input::all(), $rules);
       
        if ($validation -> fails()) {
           return Redirect::to('cadastrar')->withErrors($validation);
        } else {
            $user = new Usuario;
            $user -> email = Input::get("email");
            $user -> nome = Input::get("username");
            $user -> senha = Hash::make(Input::get("senha"));
            $user -> tipo = "admin";

            if ($user -> save()) {

                $erro = TRUE;
                return Redirect::to('cadastrar') -> with('sucesso', 1);

            } else {
                return Redirect::to('cadastrar') -> with('error', 1);
            }
        }
    }

    public function postEntrar() {
        // Opção de lembrar do usuário
        $remember = false;
        if (Input::get('remember')) {
            $remember = true;
        }

        // Autenticação
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('senha')), $remember)) {
            return Redirect::to('perfil');
        } else {
            return Redirect::to('entrar') -> with('flash_error', 1) -> withInput();
        }
    }

    public function getSair() {
        Auth::logout();
        return Redirect::to('/');
    }

}
