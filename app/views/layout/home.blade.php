<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý xe hơi - Renaxs</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
  <!-- Back Button -->
  <div class="p-4 bg-gray-800">
    <a href="/" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
      <i class="fas fa-arrow-left mr-2"></i> Trở về trang web
    </a>
  </div>

  <!-- Main Layout -->
  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-blue-800 to-blue-600 h-screen p-6">
      <h1 class="text-2xl font-bold text-white mb-6"><i class="fas fa-car-side"></i> Quản lý xe hơi</h1>
      <ul>
        <li class="mb-4">
          <a href="#" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-800 transition">
            <i class="fas fa-chart-line mr-2"></i> Dashboard
          </a>
        </li>
        <li class="mb-4">
          <a href="{{route('list-product')}}" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-800 transition">
            <i class="fas fa-user mr-2"></i> Người dùng
          </a>
        </li>
        <li class="mb-4">
          <a href="#" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-800 transition">
            <i class="fas fa-comments mr-2"></i> Bình luận
          </a>
        </li>
        <li class="mb-4">
          <a href="#" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-800 transition">
            <i class="fas fa-box mr-2"></i> Sản phẩm
          </a>
        </li>
        <li>
          <a href="{{route('add-product')}}" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-800 transition">
            <i class="fas fa-tags mr-2"></i> Loại hàng
          </a>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    @yield('content')
</body>
</html>