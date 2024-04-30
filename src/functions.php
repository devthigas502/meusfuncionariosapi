<?php 




$dir = get_template_directory();
require_once $dir . '/endpoints/user_post.php'; 
require_once $dir . '/endpoints/user_get.php'; 

# removendo rotas iniciais
remove_action('rest_api_init', 'create_initial_rest_routes', 99);

# mudando o prefixo da rota
function change_name_route(){
    return 'json';
}

# change_name_route função de callback
add_filter('rest_url_prefix', 'change_name_route');


function token_expire(){
    return time() + (60 * 60 * 24);
}

add_action('jwt_auth_expire', 'token_expire');

?>