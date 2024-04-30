<?php


function api_user_post($data){
    $email =  $data['email'];
    $username = $data['username'];
    $password = $data['password'];

    if(empty($email) || empty($username) || empty($password)){
        $response = new WP_Error('error', 'Dados incompletos', ['status' => 406]);
        return rest_ensure_response($response);
    }

    if(username_exists($username)){
        $response = new WP_Error('error', 'Usuário já cadastrado', ['status' => 403]);
        return rest_ensure_response($response);
    }

    if(email_exists($email)){
        $response = new WP_Error('error', 'Email já cadastrado', ['status' => 403]);
        return rest_ensure_response($response);
    }

    if (strlen($password) < 8 || strlen($password) > 16) {
        $response = new WP_Error('error', 'A senha deve ter entre 8 e 16 caracteres.', array('status' => 400));
        return rest_ensure_response($response);
    }

    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
        // Senha não atende aos critérios de letras maiúsculas e caracteres especiais
        $response = new WP_Error('error', 'A senha deve conter pelo menos uma letra maiúscula e um caractere especial.', array('status' => 400));
        return rest_ensure_response($response);
    }

    
    return rest_ensure_response($response);
}

function register_api_user_post(){
    register_rest_route('api', 'user', [
        'methods' => 'POST',
        'callback' => 'api_user_post'
    ]);
}

add_action('rest_api_init', 'register_api_user_post');


?>