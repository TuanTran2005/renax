@extends('layout.home')
@section('content')
  <!-- Main Content -->
  <main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
    <i class="fa-brands fa-shopify" style="color: #1e40af;"></i> Quản lý Sản Phẩm
    </h2>

    <button onclick="openModal('addProductModal')" class="bg-green-500 px-4 py-2 rounded hover:bg-green-500 text-white transition mb-4">
      Thêm Sản Phẩm
    </button>

    <!-- Product Table -->
    <table class="w-full bg-white rounded shadow-lg overflow-hidden mb-8">
      <thead>
        <tr class="bg-blue-100 text-left">
          <th class="p-4 text-blue-800">Tên Sản Phẩm</th>
          <th class="p-4 text-blue-800">Giá</th>
          <th class="p-4 text-blue-800">Loại</th>
          <th class="p-4 text-blue-800">Số lượng</th>
          <th class="p-4 text-blue-800">Trạng thái</th>
          <th class="p-4 text-blue-800">Nhiên Liệu</th>
          <th class="p-4 text-blue-800">Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $products as $product )
        
        
        <tr class="hover:bg-blue-50 transition">
          <td class="p-4">{{$product->name_product}}</td>
          <td class="p-4">{{$product->price}} VNĐ</td>
          <td class="p-4">{{$product->category_id }}</td>
          <td class="p-4">{{$product->quantity }}</td>
          <td class="p-4">{{$product->status }}</td>
          <td class="p-4 ">
          {{$product->fuel }}
          </td>
          <td class="p-4">
            <button onclick="openreview('viewProductModal','{{$product->id_pr }}','{{$product->id_if }}','{{$product->color}}','{{$product->seat_number}}','{{$product->move}}','{{$product->consumption}}','{{$product->fuel}}','{{ json_decode($product->images, true)[0] ?? '' }}')" class="bg-yellow-200 px-4 py-2 rounded hover:bg-yellow-300 text-yellow-800 transition">Xem</button>
            <button onclick="openUpdate('editProductModal','{{$product->id_pr }}','{{$product->id_if }}','{{$product->name_product}}','{{$product->color}}','{{$product->seat_number}}','{{$product->move}}','{{$product->consumption}}','{{$product->fuel}}','{{ json_decode($product->images, true)[0] ?? '' }}','{{$product->images}}','{{$product->category_id }}','{{$product->title}}','{{$product->price}}','{{$product->quantity}}','{{$product->status}}')" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Sửa</button>
            <button onclick="openDelete('deleteProductModal','{{$product->id_pr }}')" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>

  <!-- Add Product Modal -->
  <div id="addProductModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
  <div class="modal-content bg-white text-gray-800 w-1/3 max-h-screen p-6 rounded-lg shadow-lg overflow-y-auto">
    <h2 class="text-2xl font-bold text-blue-800 mb-4">Thêm Sản Phẩm Mới</h2>
    <form action="{{route('post-product')}}" method="post" enctype="multipart/form-data">
      <!-- Form fields here -->
      <div class="mb-4">
        <label for="productName" class="block text-sm font-semibold text-gray-700">Tên Sản Phẩm</label>
        <input type="text" id="productName" name="product_name" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập tên sản phẩm">
      </div>
      <div class="mb-4">
        <label for="productPrice" class="block text-sm font-semibold text-gray-700">Giá</label>
        <input type="text" id="productPrice" name="product_price" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập giá sản phẩm">
      </div>
      <div class="mb-4">
        <label for="productType" class="block text-sm font-semibold text-gray-700">Loại</label>
       <select name="product_manufacturer" id="">
        @foreach ($productx as $roou )
        
        
        <option value="{{$roou->id}}">{{$roou->name_category}}</option>
        @endforeach
       </select>
      </div>
      <div class="mb-4">
        <label for="productTitle" class="block text-sm font-semibold text-gray-700">Tiêu Đề</label>
        <input type="text" id="productTitle" name="product_title" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập tiêu đề sản phẩm">
      </div>
      <div class="mb-4">
        <label for="productConsumption" class="block text-sm font-semibold text-gray-700">Sự Tiêu Thụ</label>
        <input type="text" id="productConsumption" name="product_consumption" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập sự tiêu thụ (lít/100km)">
      </div>
      <div class="mb-4">
        <label for="productSeats" class="block text-sm font-semibold text-gray-700">Số Chỗ Ngồi</label>
        <input type="number" id="productSeats" name="product_seat_count" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập số chỗ ngồi">
      </div>
      <div class="mb-4">
        <label for="productFuel" class="block text-sm font-semibold text-gray-700">Nhiên Liệu</label>
        <input type="text" id="productFuel" name="product_fuel" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập loại nhiên liệu">
      </div>
      <div class="mb-4">
        <label for="productMovement" class="block text-sm font-semibold text-gray-700">Di Chuyển</label>
        <input type="text" id="productMovement" name="edit_product_move" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập loại di chuyển (2WD/4WD)">
      </div>
      <div class="mb-4">
        <label for="productColor" class="block text-sm font-semibold text-gray-700">Màu</label>
        <input type="text" id="productColor" name="product_color" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập màu sản phẩm">
      </div>
      <div class="mb-4">
        <label for="productImage" class="block text-sm font-semibold text-gray-700">Ảnh Sản Phẩm</label>
        <input type="file" id="productImage" name="product_image[]" multiple class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập URL ảnh sản phẩm">
      </div>
      <div class="mb-4">
        <label for="productQuantity" class="block text-sm font-semibold text-gray-700">Số lượng</label>
        <input type="number" id="productQuantity" name="product_quantity" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập tên sản phẩm">
      </div>
      <div class="mb-4">
        <label for="productSatust" class="block text-sm font-semibold text-gray-700">Trạng thái</label>
        <select name="product_satust" id="productSatust" class="w-full px-4 py-2 rounded border border-gray-300">
          <option value="still">still</option>
          <option value="hidden">hidden</option>
        </select>
      </div>
      <div class="flex justify-end space-x-4">
        <button onclick="closeModal('addProductModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
        <button type="submit" name="them" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Thêm</button>
      </div>
    </form>
  </div>
</div>


  <!-- Edit Product Modal -->
  <div id="editProductModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
  <div class="modal-content bg-white text-gray-800 w-1/3 max-h-screen p-6 rounded-lg shadow-lg overflow-y-auto">
    <h2 class="text-2xl font-bold text-blue-800 mb-4">Chỉnh Sửa Sản Phẩm</h2>
    <form action="{{ route('update-product') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="product_id" id="editProductId">
      <input type="hidden" name="product_idif" id="editProductIdIf">
      <input type="hidden" name="img" id="img">
      <div class="mb-4">
        <label for="editProductName" class="block text-sm font-semibold text-gray-700">Tên Sản Phẩm</label>
        <input type="text" id="editProductName" name="product_name" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập tên sản phẩm">
      </div>
      <div class="mb-4">
        <label for="editProductPrice" class="block text-sm font-semibold text-gray-700">Giá</label>
        <input type="number" id="editProductPrice" name="product_price" min="100" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập giá sản phẩm">
      </div>
      <div class="mb-4">
        <label for="editProductType"  class="block text-sm font-semibold text-gray-700">Loại</label>
        <select id="loaihang" name="product_category" class="w-full px-4 py-2 rounded border border-gray-300">
          @foreach ($productx as $roou)
            <option value="{{ $roou->id }}">{{ $roou->name_category }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-4">
        <label for="editProductTitle" class="block text-sm font-semibold text-gray-700">Tiêu Đề</label>
        <input type="text" id="editProductTitle" name="product_title" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập tiêu đề sản phẩm">
      </div>
      <div class="mb-4">
        <label for="editProductConsumption" class="block text-sm font-semibold text-gray-700">Sự Tiêu Thụ</label>
        <input type="text" id="editProductConsumption" name="product_consumption" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập sự tiêu thụ (lít/100km)">
      </div>
      <div class="mb-4">
        <label for="editProductSeats" class="block text-sm font-semibold text-gray-700">Số Chỗ Ngồi</label>
        <input type="number" id="editProductSeats" name="product_seat_count" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập số chỗ ngồi">
      </div>
      <div class="mb-4">
        <label for="editProductFuel" class="block text-sm font-semibold text-gray-700">Nhiên Liệu</label>
        <input type="text" id="editProductFuel" name="product_fuel" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập loại nhiên liệu">
      </div>
      <div class="mb-4">
        <label for="editProductMovement" class="block text-sm font-semibold text-gray-700">Di Chuyển</label>
        <input type="text" id="editProductMovement" name="product_move" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập loại di chuyển (2WD/4WD)">
      </div>
      <div class="mb-4">
        <label for="editProductColor" class="block text-sm font-semibold text-gray-700">Màu</label>
        <input type="text" id="editProductColor" name="product_color" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập màu sản phẩm">
      </div>
      <div>
                    <label class="block ">Ảnh hiện tại:</label>
                    <div id="imageContainer"  style="  display: flex; flex-wrap: wrap;"></div>
                    
                </div>
      <div class="mb-4">
        <label for="editProductImage" class="block text-sm font-semibold text-gray-700">Ảnh Sản Phẩm</label>
        <input type="file" id="editProductImage" name="product_image[]" multiple class="w-full px-4 py-2 rounded border border-gray-300">
      </div>
      <div class="mb-4">
        <label for="productQuantity" class="block text-sm font-semibold text-gray-700">Số lượng</label>
        <input type="number" id="editProductQuantity" name="editProductQuantity" class="w-full px-4 py-2 rounded border border-gray-300" placeholder="Nhập tên sản phẩm">
      </div>
      <div class="mb-4">
        <label for="productSatust" class="block text-sm font-semibold text-gray-700">Trạng thái</label>
        <select name="editProductSatust" id="editProductSatust" class="w-full px-4 py-2 rounded border border-gray-300">
          <option value="still">still</option>
          <option value="hidden">hidden</option>
        </select>
      </div>
      <div class="flex justify-end space-x-4">
        <button onclick="closeModal('editProductModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
        <button type="submit" name="capnhat" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Cập nhật</button>
      </div>
    </form>
  </div>
</div>


  <!-- View Product Modal -->
  <div id="viewProductModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Thông Tin Sản Phẩm</h2>
      <div class="mb-4">
        <p><strong>Product ID:</strong><span id="idpk"></span></p>
        <p><strong>View ID:</strong> <span id="idif"></span></p>
        <p><strong>Màu sắc:</strong> <span id="coler"></span></p>
        <p><strong>Số ghế:</strong> <span id="seat_number"></span></p>
        <p><strong>Di chuyển:</strong> <span id="move"></span></p>
        <p><strong>Tiêu thụ:</strong> <span id="consumption"></span></p>
        <p><strong>Nhiên liệu:</strong> <span id="fuel"></span></p>
        <p><strong>Ảnh:</strong> <img id="img" src="https://example.com/xe-oto.jpg" alt="Xe Ô Tô X1" class="w-full h-auto rounded-lg"></p>
      </div>
      <div class="flex justify-end">
        <button onclick="closeModal('viewProductModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Đóng</button>
      </div>
    </div>
  </div>

  <!-- Delete Product Modal -->
  <div id="deleteProductModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
      <h2 class="text-xl font-semibold text-red-600 mb-4">Xóa Sản Phẩm</h2>
      <p class="mb-6">Bạn có chắc chắn muốn xóa sản phẩm này?</p>
      <div class="flex justify-end space-x-4">
        <form action="{{route('delete-product')}}" method="post">
          <input type="hidden" id="delete_product" name="delete_product">
        <button onclick="closeModal('deleteProductModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
        <button type="submit" name="xoa" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
      </form>
    </div>
    </div>
  </div>

  <script>
    // Open Modal
    function openModal(modalId) {
      document.getElementById(modalId).classList.remove("hidden");
    }
    function openreview(modalId,idpk,idif,coler,seat_number,move,consumption,fuel,img,images) {
   document.getElementById('idpk').innerHTML=idpk;
   document.getElementById('idif').innerHTML=idif;
   document.getElementById('coler').innerHTML=coler;
   document.getElementById('seat_number').innerHTML=seat_number;
   document.getElementById('move').innerHTML=move;
   document.getElementById('consumption').innerHTML=consumption;
   document.getElementById('fuel').innerHTML=fuel;
   document.getElementById('img').src=img;
      document.getElementById(modalId).classList.remove("hidden");
    }
    function openUpdate(modalId,idpk,idif,nameproduct,coler,seat_number,move,consumption,fuel,img,images,category_id,title,price,quantity,status ) {
   document.getElementById('editProductId').value=idpk;
   document.getElementById('editProductIdIf').value=idif;
   document.getElementById('loaihang').value=category_id ;
   document.getElementById('editProductName').value=nameproduct;
   document.getElementById('editProductColor').value=coler;
   document.getElementById('editProductSeats').value=seat_number;
   document.getElementById('editProductMovement').value=move;
   document.getElementById('editProductConsumption').value=consumption;
   document.getElementById('editProductFuel').value=fuel;
   document.getElementById('editProductTitle').value=title;
   document.getElementById('editProductPrice').value=price;
   document.getElementById('editProductQuantity').value=quantity;
   document.getElementById('editProductSatust').value=status;
   document.getElementById('img').value=images;
   const anh=JSON.parse(images);
   const imageContainer=document.getElementById('imageContainer');
   imageContainer.innerHTML = '';
   anh.forEach(imagePath => {
    const imgElement = document.createElement('img');
    imgElement.src = imagePath;
    imgElement.alt = "Image";
    imgElement.className = "w-32 h-32 object-cover mb-4 rounded-sm p-3 ";
    imageContainer.appendChild(imgElement);
   });
      document.getElementById(modalId).classList.remove("hidden");
    }
    function openDelete(modalId,id) {
      document.getElementById('delete_product').value=id;
      document.getElementById(modalId).classList.remove("hidden");
    }

 
    function closeModal(modalId) {
      document.getElementById(modalId).classList.add("hidden");
    }
  </script>

@endsection