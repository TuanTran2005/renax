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
    $router->filter('auth', function () {
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
    $router->get('register',[App\Controllers\ProductController::class,'register']);
    $router->post('dangkys',[App\Controllers\ProductController::class,'adduser']);
    $router->get('dangxuat',[App\Controllers\ProductController::class,'dangxuat']);
    

    $router->get('userpage',[App\Controllers\ProductController::class,'userpage']);
    $router->get('product_page',[App\Controllers\ProductController::class,'product_page']);
    $router->get('detailProduct',[App\Controllers\ProductController::class,'detailProduct']);
    $router->get('mainPost',[App\Controllers\ProductController::class,'mainPost']);
    $router->get('post_detail',[App\Controllers\ProductController::class,'post_detail']);
    $router->get('service',[App\Controllers\ProductController::class,'service']);
   
 
    $router->get('cart',[App\Controllers\ProductController::class,'cartProduct']);
    $router->get('error',[App\Controllers\ProductController::class,'error']);
    if(!isset($_SESSION['auth'])){
        $router->post('addToCart',[App\Controllers\ProductController::class,'addToCartnex']);
    }
     if (isset($_SESSION['auth'])) { 
    $router->post('reviewProduct/{id}',[App\Controllers\ProductController::class,'review']);
    $router->post('addToCart',[App\Controllers\ProductController::class,'addToCart']);
    $router->get('bill',[App\Controllers\ProductController::class,'bill']);
    $router->get('pay',[App\Controllers\ProductController::class,'Pay']);
    $router->post('paypost',[App\Controllers\ProductController::class,'PayPost']);
    $router->get('removeFromCart',[App\Controllers\ProductController::class,'removeFromCart']);
    }

     if (isset($_SESSION['auth']) && $_SESSION['auth']['role']==1) {
    $router->post('add_service',[App\Controllers\ProductController::class,'add_service']);
    $router->get('car_services',[App\Controllers\ProductController::class,'car_services']);
    $router->post('delete_post',[App\Controllers\ProductController::class,'delete_post']);
    $router->post('addpost',[App\Controllers\ProductController::class,'addpost']);
    $router->get('post',[App\Controllers\ProductController::class,'post']);
    $router->get('order',[App\Controllers\ProductController::class,'order']);
    $router->get('useradmin', [App\Controllers\ProductController::class, 'indes']);
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
  }
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

 
    echo $response;
}catch(Exception $e){
    var_dump($e->getMessage());die;
}


?>