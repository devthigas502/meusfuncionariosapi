<?php


function user_get(){
    $user = wp_get_current_user();

    if($user->ID == 0){
        $response = new WP_Error('error','Usuário não autenticado',['status' => 401]);
        return rest_ensure_response($response);
    }

    $response = [
        'id' => $user->ID,
        'name' => $user->display_name,
        'email' => $user->user_email,
        'registered' => $user->user_registered
    ];

    return rest_ensure_response($response);
}


function register_user_get(){
    register_rest_route('api', 'user', [
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'user_get'

    ]);
}

add_action('rest_api_init', 'register_user_get');

?>