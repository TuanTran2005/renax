<?php

use Phroute\Phroute\RouteCollector;
$url = !isset($_GET['url']) ? "/" : $_GET['url'];
try{
    $router = new RouteCollector();

 
    $router->filter('auth', function () {
        if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
            header('location: ' . BASE_URL . 'login');
            die;
        }
    });
    $router->filter('admin', function () {
        // Kiểm tra xem người dùng đã đăng nhập và có quyền admin (role = 1)
        if (isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 1) {
            return; // Người dùng là admin, không làm gì cả
        } else {
            // Nếu người dùng không phải admin, chuyển hướng đến trang khác (ví dụ trang userpage)
            header('Location: ' . BASE_URL . 'userpage');
            exit();
        }
    });
    $router->post('check',[App\Controllers\ProductController::class,'check']);
    $router->get('login',[App\Controllers\ProductController::class,'login']);
    

    $router->get('userpage',[App\Controllers\ProductController::class,'userpage']);
    $router->get('product_page',[App\Controllers\ProductController::class,'product_page']);
    $router->get('detailProduct',[App\Controllers\ProductController::class,'detailProduct']);
    $router->post('reviewProduct/{id}',[App\Controllers\ProductController::class,'review']);
    $router->get('cart',[App\Controllers\ProductController::class,'cartProduct']);
    $router->post('addToCart',[App\Controllers\ProductController::class,'addToCart']);

    $router->get('/', [App\Controllers\ProductController::class, 'indes'],['before'=>'auth|admin']);
    $router->get('list-user',[App\Controllers\ProductController::class, 'index'],['before'=>'auth|admin']);
    $router->get('add-product',[App\Controllers\ProductController::class, 'addProduct'],['before'=>'auth|admin']);
    $router->post('add_cartegori',[App\Controllers\ProductController::class, 'add_cartegori'],['before'=>'auth|admin']);
    $router->post('update-cartegori',[App\Controllers\ProductController::class,'update_cartegori'],['before'=>'auth|admin']);
    $router->get('get-product',[App\Controllers\ProductController::class,'get_product'],['before'=>'auth|admin']);
    $router->post('post-product',[App\Controllers\ProductController::class,'post_product'],['before'=>'auth|admin']);
    $router->post('delete_cartegory/{id}',[App\Controllers\ProductController::class,'delete_cartegori'],['before'=>'auth|admin']);
    $router->post('update_user',[App\Controllers\ProductController::class,'update_user'],['before'=>'auth|admin']);
    $router->post('delete_user',[App\Controllers\ProductController::class,'delete_user'],['before'=>'auth|admin']);
    $router->post('update-product',[App\Controllers\ProductController::class,'update_product'],['before'=>'auth|admin']);
    $router->post('delete-product',[App\Controllers\ProductController::class,'delete_product'],['before'=>'auth|admin']);
  
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

 
    echo $response;
}catch(Exception $e){
    var_dump($e->getMessage());die;
}


?>