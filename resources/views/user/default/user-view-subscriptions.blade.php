@if(empty($active_subscription))

<x-core.empty-user-subscriptions />

@else


<div class="container my-5">
    <div class="card card-body">
        <div class="text-center">
            <h1>Active Subscription</h1>
            <h3>{{ $active_subscription->subscription_title }}</h3>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Current Period Start</th>
                    <th>Current Period End</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($billing_data->take(4) as $data)

                <tr>
                    <td>{{ CustomHelper::dateToReadable($data->pivot->subscription_billing_start) }}</td>
                    <td>{{ CustomHelper::dateToReadable($data->pivot->subscription_billing_expiry) }}</td>
                    <td>{{ $data->pivot->subscription_billing_status }}</td>
                </tr>
                @endforeach --}}

            </tbody>
        </table>
        <div class="text-center">

            @if($can_activate)
            <form action="{{ route('user.subscriptions.update', ['id' => $active_subscription->pivot->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-success btn-lg" type="submit">Activate</button>
            </form>
            <p>Keep all your benefits before the subscription ends</p>
            @else
            <form action="{{ route('user.subscriptions.destroy', ['id' => $active_subscription->pivot->id]) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Cancel Subscription</button>
            </form>
            @endif


            <small class="text-center">Subscriptions will be cancelled at end of cycle</small>

        </div>
    </div>
</div>

@endif