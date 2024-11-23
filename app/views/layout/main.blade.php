<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Thêm Font Awesome để sử dụng icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        /* Định dạng sidebar */
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #ddd;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
        .active-link {
            background-color: #495057;
            font-weight: bold;
        }
        /* Định dạng phần login và header */
        .header-right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .header-right .dropdown-menu {
            min-width: 200px;
        }
        .header-right .icon {
            margin-left: 20px;
            cursor: pointer;
        }
        .icon:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
                <h4 class="text-center py-2">Admin Menu</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active-link" href="{{ BASE_URL }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ BASE_URL }}list-product">Quản lý sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ BASE_URL }}add-product">Thêm sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ BASE_URL }}order-management">Quản lý đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ BASE_URL }}user-management">Quản lý người dùng</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Header -->
                <header class="d-flex justify-content-between align-items-center py-3 mb-3 border-bottom">
                    <h1 class="h2">Admin Dashboard</h1>

                    <!-- Phần Login/Thông tin người dùng -->
                    <div class="header-right">
                        @if(isset($_SESSION['auth']) && !empty($_SESSION['auth']))
                            <!-- Nếu đã đăng nhập -->
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $_SESSION['auth']['username'] }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ BASE_URL }}logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        @else
                            <!-- Nếu chưa đăng nhập -->
                            <a href="{{ BASE_URL }}login" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Đăng nhập
                            </a>
                        @endif

                        <!-- Thêm icon thông báo -->
                        <div class="icon">
                            <i class="fas fa-bell"></i>
                        </div>
                    </div>
                </header>

                <!-- Nội dung chính -->
                <div class="content">
                    @yield('content') <!-- Nội dung trang sẽ được load ở đây -->
                </div>

                <footer class="text-center py-3">
                    <span>FPT POLYTECHNIC</span>
                </footer>
            </main>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
