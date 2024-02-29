<x-mylayouts.layout-default>


    <h1>Details Page</h1>

    <div class="row">

        <div class="col-md-12">
            <img style="width: 200px; height: 200px" src="{{ $data->getImage() }}" alt="image">
            <p>{{ $data->title }}</p>
            <p>${{ $data->getPrice() }}</p>


            <form class="form-group" action="{{ route('cart.store') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="number" name="quantity" value="1">
                <button type="submit">Add to cart</button>

                <input type="hidden" name="product_id" value="{{ $data->id }}">
            </form>


            <p>${{ $data->short_description }}</p>
            <p>${{ $data->full_description }}</p>
            {{-- <p><a href="{{ $data->getLink($data->id) }}">View</a></p> --}}
        </div>

    </div>


</x-mylayouts.layout-default>