<?php

use Phroute\Phroute\RouteCollector;
$url = !isset($_GET['url']) ? "/" : $_GET['url'];
try{
    $router = new RouteCollector();

 
    $router->filter('auth', function(){
        if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
            header('location: ' . BASE_URL . 'login');
            die;
        }
    
    });
    $router->filter('admin', function() {
        // Kiểm tra nếu người dùng đã đăng nhập và có role là admin (role = 1)
        if (isset($_SESSION['auth']) && $_SESSION['auth']['role'] != 1) {
            // Nếu người dùng không phải là admin, chuyển hướng về trang khác (userpage chẳng hạn)
            header('location: ' . BASE_URL . 'userpage');
            die;
        }
    });
    $router->get('login',[App\Controllers\ProductController::class,'login']);
    // $router->post('check',App\Controllers\ProductController::class,'checkUser');

    $router->get('userpage',[App\Controllers\ProductController::class,'userpage']);
    $router->get('product_page',[App\Controllers\ProductController::class,'product_page']);
    $router->get('detailProduct',[App\Controllers\ProductController::class,'detailProduct']);
    
    $router->get('/', [App\Controllers\ProductController::class, 'indes']);
    $router->get('list-user',[App\Controllers\ProductController::class, 'index']);
    $router->get('add-product',[App\Controllers\ProductController::class, 'addProduct']);
    $router->post('add_cartegori',[App\Controllers\ProductController::class, 'add_cartegori']);
    $router->post('update-cartegori',[App\Controllers\ProductController::class,'update_cartegori']);
    $router->get('get-product',[App\Controllers\ProductController::class,'get_product']);
    $router->post('post-product',[App\Controllers\ProductController::class,'post_product']);
    $router->post('delete_cartegory/{id}',[App\Controllers\ProductController::class,'delete_cartegori']);
    $router->post('update_user',[App\Controllers\ProductController::class,'update_user']);
    $router->post('delete_user',[App\Controllers\ProductController::class,'delete_user']);
    $router->post('update-product',[App\Controllers\ProductController::class,'update_product']);
    $router->post('delete-product',[App\Controllers\ProductController::class,'delete_product']);
  
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

 
    echo $response;
}catch(Exception $e){
    var_dump($e->getMessage());die;
}


?>