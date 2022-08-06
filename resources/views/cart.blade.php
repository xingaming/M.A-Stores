@if (Session::has('cart') != null)
    <div class="select-items">
        <table>
            <tbody>
                @foreach (Session::get('cart')->products as $item )
                <tr>
                    <td class="si-pic"><img src="assets/img/products/{{$item['productInfo']->img}}" alt=""></td>
                    <td class="si-text">
                        <div class="product-selected">
                            <p>{{number_format($item['productInfo']->price)}}₫ x {{$item['quanty']}}</p>
                            <h6>{{$item['productInfo']->name}}</h6>
                        </div>
                    </td>
                    <td class="si-close">
                        <i class="ti-close" data-id="{{$item['productInfo']->id}}"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>total:</span>
        <h5>{{number_format(Session::get('cart')->totalPrice)}}₫</h5>
        <input hidden type="number" id="total-quanty-cart" value="{{Session::get('cart')->totalQuanty}}">
    </div>
@endif

