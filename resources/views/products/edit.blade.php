@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
            Back
        </a>
        <form method="post" action="{{ route('products.update', $product) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Preces nosaukums</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="amount">Daudzums</label>
                <input type="number" class="form-control" name="amount" id="amount" value="{{ $product->amount }}">
            </div>
            <div class="form-group">
                <label for="amount">Izmērs</label>
                <input type="text" class="form-control" name="size" id="size" value="{{ $product->size }}">
            </div>
            <div class="form-group">
                <label for="price">Cena par vienu vienību</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
