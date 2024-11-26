<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];
try{
    $router = new RouteCollector();

    // filter check đăng nhập
    $router->filter('auth', function(){
        if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
            header('location: ' . BASE_URL . 'login');die;
        }
    });

    // khu vực cần quan tâm -----------
    // bắt đầu định nghĩa ra các đường dẫn
    $router->get('/', [App\Controllers\HomeController::class, 'index']);  // Trang chủ
    //định nghĩa đường dẫn trỏ đến Product Controller
    $router->get('list-product',[App\Controllers\ProductController::class, 'index']);
    $router->get('add-product',[App\Controllers\ProductController::class, 'addProduct']);
    $router->post('add_cartegori',[App\Controllers\ProductController::class, 'add_cartegori']);
    $router->post('update-cartegori',[App\Controllers\ProductController::class,'update_cartegori']);
    $router->get('get-product',[App\Controllers\ProductController::class,'get_product']);
    $router->post('post-product',[App\Controllers\ProductController::class,'post_product']);
    $router->post('delete_cartegory/{id}',[App\Controllers\ProductController::class,'delete_cartegori']);
    // <---------------------------------------------->
    // $router->post('post-product',[App\Controllers\ProductController::class, 'postProduct']);
    // $router->get('update-product/{id}',[App\Controllers\ProductController::class,'updateProduct']);
    // $router->post('post-product/{id}',[App\Controllers\ProductController::class,'addUpdate']);
    // $router->get('delete-product/{id}',[App\Controller\ProductController::class,'deleteProduct']);
    // khu vực cần quan tâm -----------
    //$router->get('test', [App\Controllers\ProductController::class, 'index']);

    # NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

    // Print out the value returned from the dispatched function
    echo $response;
}catch(Exception $e){
    var_dump($e->getMessage());die;
}


?>