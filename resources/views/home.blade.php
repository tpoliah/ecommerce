<x-mylayouts.layout-default>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Special Deals</h2>
                    <p>Here are some products that are on sale just for you.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            @foreach ($specialDealProducts as $product)

<div class="col-sm-6 col-md-6 col-lg-3 ftco-animate">
    <div class="product">
        <a href="{{ $product->getLink() }}" class="img-prod"><img class="img-fluid"
                src="{{ $product->getImage() }}" alt="Colorlib Template">
            {{-- <span class="status">30%</span> --}}
            <div class="overlay"></div>
        </a>
        <div class="text py-3 px-3">
            <h3><a href="{{ $product->getLink() }}">{{ $product->title }}</a></h3>
            <div class="d-flex">
                <div class="pricing">
                    <p class="price">
                        {{-- <span class="mr-2 price-dc">$120.00</span> --}}

                        <span class="price-sale">${{ $product->getPrice() }}</span>
                    </p>
                </div>
                <div class="rating">
                    <p class="text-right">
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                </div>
            </div>
            <p class="bottom-area d-flex px-3">
                <a href="{{ route('cart.addfromstorepage', ['id' => $product->id]) }}" 
                    class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                            class="ion-ios-add ml-1"></i></span></a>
                <a href="{{ $product->getLink() }}" class="buy-now text-center py-2">View<span><i
                            class="ion-ios-cart ml-1"></i></span></a>
            </p>
        </div>
    </div>
</div>
@endforeach
            </div>
        </div>
    </section>
<br>
</x-mylayouts.layout-default>
