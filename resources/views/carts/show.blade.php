<div>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-star"></span> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} {{ trans('view.book') }}<span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-cart" role="menu">
        @if(Session::has('cart'))
            @foreach($cart->items as $product)
            <li>
                <span class="item">
                    <span class="item-left">
                        <img src="{{ $product['item']['cover'] }}" alt="" width="50px" height="50px" />
                        <span class="item-info">
                            <span>{{ $product['item']['title'] }}</span>
                        </span>
                    </span>
                    <span class="item-right" id="removeBookToCart">
                        <a href="{{ route('book.removeToCart', ['id' => $product['item']['id']]) }}">{{ trans('view.remove') }}</a>
                    </span>
                </span>
            </li>
            @endforeach
        <li class="divider"></li>
        <li><a class="text-center" href="#">{{ trans('view.go_create_plan') }}</a></li>
        @else
            <li><a class="text-center" href="#">{{ trans('view.cart_is_null') }}</a></li>
        @endif
    </ul>
</div>
