<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Save</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::has('cart') != null)
                                <tr>
                                    @foreach (Session::get('cart')->products as $item)
                                        <td class="cart-pic first-row"><img
                                                src="assets/img/products/{{ $item['productInfo']->img }}" alt="">
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $item['productInfo']->name }}</h5>
                                        </td>
                                        <td class="p-price first-row">{{ $item['productInfo']->price }}</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input id="quanty-item-{{ $item['productInfo']->id }}"
                                                        type="text" value="{{ $item['quanty'] }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">{{ number_format($item['price']) }}₫</td>
                                        <td class="close-td first-row"><i class="ti-save"
                                                onclick="SaveListItemCart({{ $item['productInfo']->id }})"></i></td>
                                        <td class="close-td first-row"><i class="ti-close"
                                                onclick="DeleteListItemCart({{ $item['productInfo']->id }})"></i></td>

                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">Total
                                        Price<span>{{ Session::get('cart')->totalPrice }}₫</span></li>
                                </ul>
                                <a href="{{ url('/form') }}" class="proceed-btn"> CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
