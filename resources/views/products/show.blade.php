@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p>
            Izmērs: <b>{{ $product->size }}</b>
        </p>
        <p>
            Daudzums: <b>{{ $product->amount }}</b>
        </p>
        <p>
            Cena: <b>{{ $product->formatMoney() }}</b>
        </p>
        @foreach($deliveries as $delivery)
            <input type="radio" id="delivery" name="{{ $delivery->name }}" value="delivery">
            <label for="male">{{ $delivery->name}} {{$delivery->formatMoney() }}</label><br>
        @endforeach
    </div>
@endsection
