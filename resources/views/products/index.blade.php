@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
            Pievienot jaunu produktu
        </a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Preces nosaukums</th>
                <th scope="col">Preces izmērs</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>{{ $product->size }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                            Labot
                        </a>
                        <form method="post" action="{{ route('products.destroy', $product) }}"
                              style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                Dzēst
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
