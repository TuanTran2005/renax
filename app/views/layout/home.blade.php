<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý xe hơi - Renaxs</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background-color: #2d3748;
      padding: 20px;
      border-radius: 8px;
      max-width: 500px;
      width: 100%;
      color: white;
      max-height: 80vh; /* Giới hạn chiều cao modal */
      overflow-y: auto; /* Thêm thanh cuộn nếu nội dung vượt quá chiều cao */
    }
    .product-card {
      background-color: #2d3748;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      transition: transform 0.2s;
    }
    .product-card:hover {
      transform: translateY(-10px);
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 50;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #2d2d2d;
      padding: 20px;
      border-radius: 8px;
      width: 600px;
      margin: auto;
      position: relative;
    }

    .modal-header {
      font-size: 24px;
      color: #fcd34d;
      margin-bottom: 10px;
    }

    .modal-body {
      margin-bottom: 20px;
    }

    .modal-footer {
      display: flex;
      justify-content: flex-end;
    }

    .input-field {
      width: 100%;
      padding: 12px;
      margin-bottom: 12px;
      border-radius: 6px;
      background-color: #3b3b3b;
      color: white;
      border: 1px solid #555;
    }

    .input-field:focus {
      outline: none;
      border-color: #fcd34d;
      background-color: #4b4b4b;
    }

    .button {
      padding: 12px 20px;
      border-radius: 6px;
      border: none;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .button-add {
      background-color: #4CAF50;
      color: white;
    }

    .button-add:hover {
      background-color: #45a049;
    }

    .button-delete {
      background-color: #f44336;
      color: white;
    }

    .button-delete:hover {
      background-color: #e53935;
    }

    .button-cancel {
      background-color: #9e9e9e;
      color: white;
    }

    .button-cancel:hover {
      background-color: #757575;
    }
    .button-reset {
  background-color: #ffc107; /* Màu vàng */
  color: #fff;
  border: none;
  padding: 10px 15px;
  cursor: pointer;
  border-radius: 4px;
}

.button-reset:hover {
  background-color: #ffa000;
}
  </style>
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
          <a href="{{route('get-product')}}" class="block py-2 px-4 bg-blue-700 rounded hover:bg-blue-800 transition">
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