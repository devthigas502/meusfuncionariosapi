<?php


function api_user_post($data){
    $email =  $data['email'];
    $username = $data['username'];
    $password = $data['password'];

    if(empty($email) || empty($username) || empty($password)){
        $response = new WP_Error('error', 'Dados incompletos', ['status' => 406]);
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