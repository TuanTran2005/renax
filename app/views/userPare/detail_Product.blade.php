@extends('layout.main')

@section('content')

 <!-- Product Detail Start -->
 <div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <!-- Product Image Gallery -->
            @php
                // Kiểm tra nếu $product không phải là false và có thuộc tính 'images'
                if ($product && isset($product->images) && !is_null($product->images)) {
                    // Chuyển chuỗi hình ảnh thành mảng nếu 'images' là một chuỗi phân tách bằng dấu phẩy
                    $imagesArray = explode(',', $product->images); 
                } else {
                    // Nếu không có hình ảnh, khởi tạo mảng rỗng
                    $imagesArray = [];
                }
            @endphp
            <div id="mainImage" class="mb-3">
                <!-- Kiểm tra mảng hình ảnh trước khi hiển thị -->
                @if(count($imagesArray) > 0)
                    <img id="largeImage" width="600px" src="{{ trim($imagesArray[0], '""[]') }}" class="img-fluid" alt="Product Image">
                @else
                    <p>No images available</p>
                @endif
            </div>
            <div id="thumbnailImages" class="d-flex">
                @foreach ($imagesArray as $image)
                    @php
                        // Loại bỏ dấu ngoặc vuông và dấu nháy nếu có
                        $image = str_replace(['[', ']', '"'], '', $image); 
                    @endphp
                    <img src="{{ $image }}" class="img-thumbnail me-2" width="100px" alt="Thumbnail Image" onclick="changeImage('{{ $image }}')">
                @endforeach
            </div>
        </div>
        <div class="col-lg-6">
            <h2>{{ $product->name_product ?? 'Product not found' }}</h2>
            <p class="text-muted">Category: {{ $product->title ?? 'N/A' }}</p>

            @php
                // Kiểm tra nếu $product có thuộc tính 'color'
                $colors = [];
                if ($product && isset($product->color) && !is_null($product->color)) {
                    $colors = explode(',', $product->color); // Mảng các màu sắc
                }
            @endphp
            <p><strong>Color:</strong></p>
            <div class="d-flex flex-wrap">
                @foreach ($colors as $color)
                    @php
                        // Loại bỏ dấu ngoặc vuông và dấu nháy nếu có
                        $color = str_replace(['[', ']', '"'], '', $color);
                    @endphp
                    <div 
                        style="width: 20px; height: 20px; margin-right: 10px; border-radius: 50%; background-color: {{ $color }}; cursor: pointer;" 
                        onclick="changeColor('{{ $color }}')" 
                        title="Select {{ $color }}"
                        class="mb-2"></div>
                @endforeach
            </div>

            <p><strong>Fuel Type:</strong> {{ $product->fuel_type ?? 'N/A' }}</p>
            <p class="lead">This is a detailed description of the product that explains its features and advantages.</p>

            <div class="mb-3">
                <span class="h4">Price: ${{ $product->price ?? '0.00' }}</span>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" id="quantity" class="form-control" value="1" min="1">
            </div>

            <button class="btn btn-primary">Add to Cart</button>
        </div>
    </div>
</div>
<!-- Product Detail End -->

<script>
    function changeImage(src) {
        document.getElementById('largeImage').src = src;
    }
    function changeColor(color) {
        console.log("Color selected:", color);
    }
</script>

@endsection
