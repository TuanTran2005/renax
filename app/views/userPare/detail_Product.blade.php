@extends('layout.main')

@section('content')


 <!-- Product Detail Start -->
 <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <!-- Product Image Gallery -->
                <div id="mainImage" class="mb-3">
                    <img id="largeImage" src="{{($product->images)[0]}}" class="img-fluid" alt="Product Image">
                </div>
                <div id="thumbnailImages" class="d-flex">
                   @foreach (explode(',',$product->images) as $image )
                   
                                
                    <img src="{{$image}}" class="img-thumbnail me-2" alt="Thumbnail Image" onclick="changeImage({{$image}})">
                    
                 @endforeach  
            </div>
            </div>
            <div class="col-lg-6">
                <h2>{{$product->name_product}}</h2>
                <p class="text-muted">Category: Car Parts</p>
                <p class="lead">This is a detailed description of the product that explains its features and advantages.</p>

                <div class="mb-3">
                    <span class="h4">Price: $199.99</span>
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

    <!-- Comments Section Start -->
    <div class="container py-5">
        <h3>Customer Reviews</h3>
        <div class="mb-3">
            <textarea class="form-control" rows="4" placeholder="Leave a comment..."></textarea>
            <button class="btn btn-primary mt-3">Submit Review</button>
        </div>
        <div class="comments-list">
            <div class="comment mb-3">
                <strong>John Doe</strong>
                <p>This product is amazing! Really improved my car's performance.</p>
            </div>
            <div class="comment mb-3">
                <strong>Jane Smith</strong>
                <p>Great value for money. Highly recommend!</p>
            </div>
        </div>
    </div>

 <!-- Comments Section End -->
    <script>
        function changeImage(src) {
            document.getElementById('largeImage').src = src;
        }
    </script>
@endsection
