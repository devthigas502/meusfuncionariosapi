<?php


function api_user_post($data){
    $email =  $data['email'];
    $username = $data['username'];
    $password = $data['password'];


    $response = [
        "email" => $data['email'],
        "username" => $data['username'],
        "password" => $data['password']
    ];

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