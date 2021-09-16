<?php 


spl_autoload_register(function ($classe){
    require $classe . '.php';
});

$myApp = new Connection("mysql:host=127.0.0.1;dbname=test_pdo", "user", "");
$myApp->connect();

$_query =  $myApp->insertPost( new Post("my Tilte 3", "my content 3..", "2021-08-29 11:37:05", "Amine"));

 if($_query)
 {
    $data = $myApp->getPost();
    print_r( $data );
 }

 
?>