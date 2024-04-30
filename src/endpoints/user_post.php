<?php


function teste($data){
    $nome = $data['nome'];

    if(empty($nome)){
        $response = new WP_Error('error', 'está vazio', ['status' => 406]);
        return rest_ensure_response($response);
    }

}


function register_api_user_post(){
    register_rest_route('api', 'user', [
        'methods' => 'POST',
        'callback' => 'teste'
    ]);
}

add_action('rest_api_init', 'register_api_user_post');


?>