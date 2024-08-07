<x-mylayouts.layout-default>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ $data->getImage() }}" class="image-popup"><img src="{{ $data->getImage() }}"
                            class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $data->title }}</h3>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">100% <span
                                    style="color: #bbb;">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 Units <span style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    <p class="price"><span>${{ $data->getPrice() }}</span></p>


                    <div>{{ $data->short_description }}</div>
                    <div>{{ $data->full_description }}</div>

                    {{-- <p>A small river named Duden flows by their place and supplies it with the necessary
                        regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word "and" and the Little Blind Text should turn around and return to its own, safe country.
                        But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their.
                    </p> --}}


                    <form class="form-group" action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mt-4">

                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn details-quantity-control"
                                        id="details-minus" data-type="minus" data-field="">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn details-quantity-control"
                                        id="details-plus" data-type="plus" data-field="">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <p style="color: #000;">80 pieces available</p>
                            </div>
                        </div>


                        <input type="hidden" name="product_id" value="{{ $data->id }}">

                        <button type="submit" class="btn btn-black py-3 px-5">Add to Cart</button>
                    </form>



                    {{-- <p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p> --}}



                </div>
            </div>
        </div>
    </section>

<!-- related-products -->
@include('pages.default.related-products')


</x-mylayouts.layout-default>