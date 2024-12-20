@extends('layout.home')

@section('content')
<main class="flex-1 p-6">
      <!-- Dashboard -->
      <h2 class="text-2xl font-bold mb-6 text-yellow-400">
        <i class="fas fa-chart-bar mr-2"></i> Dashboard
      </h2>
      <div class="grid grid-cols-2 gap-6">
        <div class="bg-green-600 p-6 rounded shadow-lg">
          <h3 class="text-lg font-bold"><i class="fas fa-users mr-2"></i> Người dùng</h3>
          <p class="text-3xl mt-2">15,876</p>
        </div>
        <div class="bg-red-600 p-6 rounded shadow-lg">
          <h3 class="text-lg font-bold"><i class="fas fa-comments mr-2"></i> Bình luận</h3>
          <p class="text-3xl mt-2">5,421</p>
        </div>
        <div class="bg-purple-600 p-6 rounded shadow-lg">
          <h3 class="text-lg font-bold"><i class="fas fa-box mr-2"></i> Sản phẩm</h3>
          <p class="text-3xl mt-2">2,134</p>
        </div>
        <div class="bg-yellow-500 p-6 rounded shadow-lg">/-strong/-heart:>:o:-((:-h <h3 class="text-lg font-bold"><i class="fas fa-tags mr-2"></i> Loại hàng</h3>
          <p class="text-3xl mt-2">8</p>
        </div>
      </div>

      <!-- Table Example (User Management) -->
      <h2 class="text-2xl font-bold mt-10 mb-6 text-cyan-400">
        <i class="fas fa-users mr-2"></i> Quản lý người dùng
      </h2>
      <table class="w-full bg-gray-700 rounded shadow-lg overflow-hidden">
        <thead>
          <tr class="bg-gray-800 text-left">
            <th class="p-4 text-yellow-300">Tên</th>
            <th class="p-4 text-yellow-300">Email</th>
            <th class="p-4 text-yellow-300">Trạng thái</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-600 hover:bg-gray-500 transition">
            <td class="p-4">Nguyễn Văn A</td>
            <td class="p-4">a@gmail.com</td>
            <td class="p-4 text-green-400"><i class="fas fa-check-circle"></i> Hoạt động</td>
          </tr>
          <tr class="bg-gray-700 hover:bg-gray-600 transition">
            <td class="p-4">Trần Văn B</td>
            <td class="p-4">b@gmail.com</td>
            <td class="p-4 text-red-400"><i class="fas fa-ban"></i> Bị khóa</td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
  @endsection