@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Order Detail') }}</div>

                @php
                    $total_price = 0;
                @endphp

                <div class="card-body">
                    <h5 class="card-title">Order ID {{ $order->id }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>
                    @if($order->is_paid == true)
                        <p class="card-text">Paid</p>
                    @else
                        <p class="card-text">Unpaid</p>
                    @endif
                    <hr>
                    @foreach($order->transactions as $transaction)
                        <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                        @php
                            $total_price += $transaction->product->price * $transaction->amount;
                        @endphp
                    @endforeach
                    <hr>
                    <p>Total: Rp {{$total_price}}</p>
                    <hr>
                    @if($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                        <form action="{{ route('submit_payment_receipt',$order) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Upload Your Payment Receipt</label>
                                <input type="file" name="payment_receipt" id="payment_receipt" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Order</title>
</head>
<body>
    <p>ID: {{ $order->id }}</p>
<p>User: {{ $order->user->name }}</p>
@foreach($order->transactions as $transaction)
    <p>Product: {{ $transaction->product->name }}</p>
    <p>Amount: {{ $transaction->amount }}</p>
@endforeach

@if($order->is_paid == false && $order->payment_receipt == null)
    <form action="{{ route('submit_payment_receipt',$order) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <label for="payment_receipt">Upload Your Payment Receipt</label>
        <br>
        <input type="file" name="payment_receipt" id="payment_receipt">
        <br>
        <button type="submit">Submit Payment</button>
    </form>
@endif
</body>

</html> --}}
