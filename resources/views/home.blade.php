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
<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-4 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url(images/about.jpg);">
                    <a href='template_default/images/video.mp4'
                        class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
<selection/>
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
<section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <h2 class="mb-4">Our Satisfied Customer Reviews</h2>
                    <p>Shopping with this online grocery store has been a game-changer. 
                       The service is consistently reliable, and the fresh produce is always top quality. 
                       I also appreciate the easy-to-navigate website and regular promotions. 
                       It’s made grocery shopping so much easier!”
                       Highly recommend!"</p>
                </div>
            </div>

            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url('template_default/images/person_1.jpg')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">“I’ve been using this online grocery store for a few months now, 
                                                               and I couldn’t be happier! The selection is fantastic, 
                                                               and I always find what I need. The delivery is prompt, 
                                                               and the groceries always arrive in perfect condition. 
                                                               Plus, the user-friendly website makes shopping a breeze. 
                                                               Highly recommend!”</p>
                                    <p class="name">Paul Law</p>
                                    <span class="position">Marketing Director</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url('template_default/images/person_2.jpg')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">Excellent experience from start to finish. 
                                                               The grocery store offers a great range of products, 
                                                               including some hard-to-find items. The delivery was prompt, 
                                                               and everything arrived well-packaged and in excellent condition. 
                                                               Customer support is outstanding too. 
                                                               Will definitely be ordering again!”</p>
                                    <p class="name">James Rose</p>
                                    <span class="position">Creative Director</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url('template_default/images/person_3.jpg')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">“I was skeptical about ordering groceries online, but this store has exceeded my expectations. 
                                                               The quality of the products is top-notch, and I appreciate the detailed product descriptions. 
                                                               The delivery was seamless and the customer service team was incredibly helpful when I had a question. 
                                                               Five stars!”</p>
                                    <p class="name">Michael Thor</p>
                                    <span class="position">Financial Analyst</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url('template_default/images/person_4.jpg')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5 pl-4 line">“I’ve tried several online grocery services, and this one is by far the best. 
                                                               The website is intuitive, and the checkout process is smooth. 
                                                               I love the variety of options available, and the eco-friendly packaging is a nice touch. 
                                                               Delivery is always on time, and the fresh items are perfect every time.”
</p>
                                    <p class="name">Clarke Kent </p>
                                    <span class="position">IT Specialist</span>
                                </div>
                            </div>
                        </div>
        </div>
        </div>
    </section>
    <br>
</x-mylayouts.layout-default>
