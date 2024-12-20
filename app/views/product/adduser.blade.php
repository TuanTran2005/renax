@extends("layout.home")
@section('content')


<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-yellow-400">
      <i class="fas fa-users mr-2"></i> Quản lý người dùng
    </h2>

    <!-- Search and Filter -->
    <div class="flex justify-between items-center mb-6">
      <div>
        <input type="text" placeholder="Tìm kiếm người dùng..." 
          class="bg-gray-700 text-white p-2 rounded shadow focus:outline-none focus:ring focus:ring-blue-500">
      </div>
      <div>
        <select class="bg-gray-700 text-white p-2 rounded shadow">
          <option value="all">Tất cả trạng thái</option>
          <option value="active">Hoạt động</option>
          <option value="inactive">Bị khóa</option>
        </select>
      </div>
    </div>

    <!-- User Table -->
    <table class="w-full bg-gray-700 rounded shadow-lg overflow-hidden mb-8">
      <thead>
        <tr class="bg-gray-800 text-left">
          <th class="p-4 text-yellow-300">Tên</th>
          <th class="p-4 text-yellow-300">Email</th>
          <th class="p-4 text-yellow-300">Vai trò</th>
          <th class="p-4 text-yellow-300">Trạng thái</th>
          <th class="p-4 text-yellow-300">Hành động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $products  as $product )
        
       
        <tr class="bg-gray-600 hover:bg-gray-500 transition">
          <td class="p-4">{{$product->name}}</td>
          <td class="p-4">{{$product->email}}</td>
          <td class="p-4">{{$product->role}}</td>
          <td class="p-4 text-green-400"><i class="fas fa-check-circle"></i> {{$product->status}}</td>
          <td class="p-4">
            <button class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-700 transition">Xem</button>
            <button class="bg-red-600 px-4 py-2 rounded text-white hover:bg-red-700 transition">Xóa</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex justify-between items-center">
      <span>Hiển thị 1-10 của 50 kết quả</span>
      <div class="flex space-x-2">
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">&lt;</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">1</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">2</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">3</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">&gt;</button>
      </div>
    </div>
  </main>
  @endsection