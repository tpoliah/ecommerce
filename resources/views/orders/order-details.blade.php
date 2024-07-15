<x-mylayouts.layout-default>


    <div class="container my-5" style="border: 1px; border-color: #114A2B">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row d-flex m-0 bg-dark text-white" style="padding-top: 5rem; padding-bottom:5rem;">
                            <div class="col-md-6">
                                <a class="navbar-brand ml-4" style="font-size: 180%;">Food Hub TT</a>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mr-4">Invoice #{{ $order->order_no }}</p>
                                <p class="font-weight-light mr-4">Due by:
                                    {{ CustomHelper::dateToReadable($order->created_at) }}</p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">Customer Information</p>
                                <p class="mb-1">Name: {{ $user->name }}</p>
                                <p class="mb-1">Address: {{ $address->line_1 }}</p>
                                <p class="mb-1">City: {{ $address->city }}</p>
                                <p class="mb-1">Tel: {{ $address->contact }}</p>
                                <p class="mb-1">Email: {{ $address->email }}</p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>
                                <!-- <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                            <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p> -->
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Credit Card </p>
                                <p class="mb-1"><span class="text-muted">Name: </span> {{ $user->name }} </p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table"
                                    style="border-collapse: collapse;
                                    border: 1.2px solid #114A2B;">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">LineID</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php($count = 1)
                                        @foreach ($orderProducts as $data)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td><img style="width: 80px; height: 80px"
                                                        src="{{ $data->product->getImage() }}" alt="Image">
                                                </td>
                                                <td>{{ $data->product->title }}</td>
                                                <td>{{ $data->quantity }}</td>
                                                <td>${{ $data->price }}</td>
                                                <td>${{ CustomHelper::formatPrice($data->price * $data->quantity) }}
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right text-light">
                                <div class="mb-2 font-weight-bold">Total</div>
                                <div class="h2 text-light font-weight-light">
                                    ${{ CustomHelper::formatPrice($order->total) }}
                                </div>
                            </div>

                            <div class="py-3 px-5 text-right text-light">
                                <div class="mb-2 font-weight-bold">Discount</div>
                                <div class="h2 text-light font-weight-light">
                                    {{ CustomHelper::calculateOrderDiscount($order->subtotal, $order->total) }}%
                                </div>
                            </div>


                            <div class="py-3 px-5 text-right text-light">
                                <div class="mb-2 font-weight-bold">Subtotal</div>
                                <div class="h2 text-light font-weight-light">
                                    ${{ CustomHelper::formatPrice($order->subtotal) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-mylayouts.layout-default>