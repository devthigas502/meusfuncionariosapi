<?php


function register_user_get(){
    echo "teste";
}


add_action('rest_api_init', 'register_user_get');

?>