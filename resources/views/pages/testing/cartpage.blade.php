<x-mylayouts.layout-default>




    <h1>Cart Page</h1>


    @if($cart_data->isEmpty())
    <x-core.cart-empty />
    @else


    <div class="row">


        @foreach ($cart_data as $data)

        <div class="col-md-4">
            <img style="width: 200px; height: 200px" src="{{$data->getImage()}}" alt="image">
            <p>{{ $data->title}}</p>
            <p>{{$data->getPrice()}}</p>
            <!-- <p><a href="{{ $data->getLink() }}">View</a></p> -->


            <p>Quantity: <input type="text" name="quantity" value="{{ $data->pivot->quantity }}"></p>

            <form action="{{ route('cart.destroy', ['id' => $data->pivot->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Remove</button>
            </form>


        </div>
        @endforeach


    </div>

    @endif

    <P>Cart Subtotal: ${{ $cart_data->getSubtotal() }}</P>
    <P>Cart Total: ${{ $cart_data->getTotal() }}</P>

</x-mylayouts.layout-default>