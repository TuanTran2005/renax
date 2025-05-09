<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Quản lý xe hơi</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex">
  <aside class="w-64 bg-gradient-to-b from-blue-200 to-green-200 min-h-screen p-6 flex flex-col shadow-md">
  <h1 class="text-2xl font-bold mb-6 flex items-center text-blue-800">
  <a href="{{route('/')}}"><img src="imgs/Untitled_Project-removebg-preview.png" alt=""  width="100px"></a>
  Quản lý
</h1>
    <ul class="flex-1">
      <li class="mb-4">
        <a href="{{route('useradmin')}}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
          <i class="fas fa-chart-line mr-2"></i> Dashboard
        </a>
      </li>
      <li class="mb-4">
        <a href="{{route('list-user')}}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
          <i class="fas fa-user mr-2"></i> Người dùng
        </a>
      </li>
      <li class="mb-4">
        <a href="{{route('get-product')}}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
          <i class="fas fa-box mr-2"></i> Sản phẩm
        </a>
      </li>
      <li class="mb-4">
        <a href="{{route('add-product')}}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
          <i class="fas fa-tags mr-2"></i> Loại hàng
        </a>
      </li>
      <li class="mb-4">
        <a href="{{route('car_services')}}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
          <i class="fas fa-tools mr-2"></i> Dịch vụ
        </a>
      </li>
      <li class="mb-4">
        <a href="{{route('order')}}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
        <i class="fas fa-file-invoice mr-2"></i> Hóa đơn
        </a>
      </li>
      <li class="mb-4">
    <a href="{{ route('post') }}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
        <i class="fas fa-newspaper mr-2"></i> Bài viết
    </a>
</li>
<li class="mb-4">
    <a href="{{route('service-invoice')}}" class="block py-2 px-4 bg-blue-100 rounded hover:bg-blue-200 text-blue-800 transition">
        <i class="fas fa-file-invoice mr-2"></i> Hóa đơn dịch vụ
    </a>
</li>

    </ul>
    <div class="mt-4">
      <a href="{{route('dangxuat')}}" class="block py-2 px-4 bg-red-100 rounded hover:bg-red-200 text-red-800 text-center transition">
        <i class="fas fa-sign-out-alt mr-2"></i> Logout
      </a>
    </div>
  </aside>

    @yield('content')
</body>
</html>