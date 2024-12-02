@extends('layout.main')

@section('content')

<!-- Product Detail Start -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <!-- Product Image Gallery -->
            @php
                if ($product && isset($product->images) && !is_null($product->images)) {
                    $imagesArray = explode(',', $product->images); 
                } else {
                    $imagesArray = [];
                }
            @endphp
            <div id="mainImage" class="mb-3">
                @if(count($imagesArray) > 0)
                    <img id="largeImage" width="600px" src="{{ trim($imagesArray[0], '""[]') }}" class="img-fluid" alt="Product Image" style="border-radius: 0;">
                @else
                    <p>No images available</p>
                @endif
            </div>
            <div id="thumbnailImages" class="d-flex">
                @foreach ($imagesArray as $image)
                    @php
                        $image = str_replace(['[', ']', '"'], '', $image); 
                    @endphp
                    <img src="{{ $image }}" class="img-thumbnail me-2" width="100px" alt="Thumbnail Image" onclick="changeImage('{{ $image }}')" style="border-radius: 0; cursor: pointer;">
                @endforeach
            </div>
        </div>
        <div class="col-lg-6">
            <h2>{{ $product->name_product ?? 'Product not found' }}</h2>
            <p class="text-muted">Category: {{ $product->title ?? 'N/A' }}</p>
         
            @php
                $colors = [];
                if ($product && isset($product->color) && !is_null($product->color)) {
                    $colors = explode(',', $product->color); 
                }
            @endphp
            <p><strong>Color:</strong></p>
            <div class="d-flex flex-wrap">
                @foreach ($colors as $color)
                    @php
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

            <form action="{{ route('addToCart') }}?id={{$product->id}}" method="POST">
                @csrf
                <input type="hidden" id="coler" name="color">
               <input type="hidden" value="{{ trim($imagesArray[0], '""[]') }}" name="images">
               <input type="hidden" value="{{$product->name_product}}" name="nameProduct">
               <input type="hidden" value="{{$product->price}}" name="price">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" class="form-control" name="quantity" value="1" min="1">
                </div>

                <!-- Display Services Instead of Dropdown -->
                <div class="mb-3">
                    <label for="service" class="form-label">Services Available:</label>
               @foreach ( $servise as $index )
               <p><strong>{{$index->name}}</strong></p>
               @endforeach
                    
                    

                </div>

                <button type="submit" name="add" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>

    <!-- Product Description -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Product Description</h3>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{trim( $imagesArray[0] ,'""[]')}}" width="600px" class="img-fluid" alt="Description Image 1" style="border-radius: 0;">
                    <p class="mt-3">This is the first image description that explains this part of the product.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{trim( $imagesArray[0] ,'""[]')}}" width="600px" class="img-fluid" alt="Description Image 2" style="border-radius: 0;">
                    <p class="mt-3">This is the second image description that explains this part of the product.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Related Products</h3>
            <div class="row">
                @foreach ( $productxsmax as $sp )
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ json_decode($sp->images)[0] }}" height="180px" class="card-img-top" alt="Related Product" style="border-radius: 0;">
                        <div class="card-body">
                            <h5 class="card-title">{{$sp->name_product}}</h5>
                            <p class="card-text">${{$sp->price}}</p>
                            <a href="{{route('detailProduct')}}?id={{$sp->id}}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Product Reviews -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Product Reviews</h3>

            <!-- Display existing reviews with overflow: auto -->
            <div id="reviews" class="mt-3" style="max-height: 300px; overflow: auto;">
                @foreach ($productxs as $review)
                <div class="border p-3 mb-3">
                    <div><strong>{{$review->name}}</strong> - <span class="text-muted">{{$review->review_date}}</span></div>
                    <div class="mt-2">{{$review->review}}</div>
                    <div class="mt-2">
                        <strong>Rating:</strong>
                        <span class="text-warning">
                            @for ($i=1;$i<=$review->rating;$i++)
                             &#9733;
                            @endfor
                        </span>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Add Review Form -->
            <div class="mt-4">
                <h4>Leave a Review</h4>
                <form action="{{route("reviewProduct/".$product->id_if)}}" method="POST">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating" required>
                            <option value="1">1 - Poor</option>
                            <option value="2">2 - Fair</option>
                            <option value="3">3 - Good</option>
                            <option value="4">4 - Very Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Review</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>
                    <button type="submit" name="review" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- Product Detail End -->

<script>
    // Function to handle the color selection
    function changeColor($coler) {
        document.getElementById('coler').value=$coler;
    }

    // Function to change the main image when clicking on thumbnail
    function changeImage(imageSrc) {
        document.getElementById('largeImage').src = imageSrc;
    }
</script>

@endsection
