
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Delivery option</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>
                            {{ $product->name }}
                    </td>
                    <td>
                        {{ $product->size }}
                    </td>
                    <td>
                        <form action="/">
                        @foreach($deliveries as $delivery)
                                @if($product->size=='XL')
                                    {{ $price = '$' . number_format($delivery->price*2/100,2) }}
                                @elseif($product->size=='S')
                                    {{ $price = '$' . number_format($delivery->price*0.5/100,2) }}
                                @else
                                    {{ $price = '$' . number_format($delivery->price/100,2) }}
                                @endif
                                <input type="radio" id="{{ $delivery->name }}" name="{{ $delivery->name }}" value="30">
                                <label for="{{ $delivery->name }}">{{ $delivery->name }} ({{ $price }})</label><br>
                        @endforeach
                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

