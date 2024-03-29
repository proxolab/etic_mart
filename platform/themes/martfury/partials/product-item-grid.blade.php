@if ($product)
    <div class="ps-product__thumbnail">
        <a href="{{ $product->url }}">
            <img src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
        </a>
        @if ($product->isOutOfStock())
            <span class="ps-product__badge out-stock">{{ __('Out Of Stock') }}</span>
        @else
            @if ($product->productLabels->count())
                @foreach ($product->productLabels as $label)
                    <span class="ps-product__badge" @if ($label->color) style="background-color: {{ $label->color }}" @endif>{{ $label->name }}</span>
                @endforeach
            @else
                @if ($product->front_sale_price !== $product->price)
                    <div class="ps-product__badge">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
                @endif
            @endif
        @endif
    </div>
    <div class="ps-product__container">
        <div class="ps-product__content">
            <a class="ps-product__title" href="{{ $product->url }}">{{ $product->name }}</a>
            @if (is_plugin_active('marketplace') && $product->store->id)
                <p class="ps-product__vendor">
                    <span>{{ __('Sold by') }}: </span>
                    <a href="{{ $product->store->url }}" class="text-uppercase">{{ $product->store->name }}</a>
                </p>
            @endif
            @if (EcommerceHelper::isReviewEnabled())
                @if ($product->reviews_count > 0)
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="width: {{ $product->reviews_avg * 20 }}%"></div>
                        </div>
                        <span class="rating_num">({{ $product->reviews_count }})</span>
                    </div>
                @endif
            @endif
            <div class="ps-product__desc">
                {!! clean($product->description) !!}
            </div>
        </div>
        <div class="ps-product__shopping">
            <p class="ps-product__price @if ($product->front_sale_price !== $product->price) sale @endif">{{ format_price($product->front_sale_price_with_taxes) }} @if ($product->front_sale_price !== $product->price) <del>{{ format_price($product->price_with_taxes) }} </del> @endif</p>
            @if (EcommerceHelper::isCartEnabled())
                <a class="ps-btn add-to-cart-button" data-id="{{ $product->id }}" href="{{ route('public.cart.add-to-cart') }}">{{ __('Add to cart') }}</a>
            @endif
            <ul class="ps-product__actions">
                <li><a class="js-add-to-wishlist-button" href="{{ route('public.wishlist.add', $product->id) }}"><i class="icon-heart"></i> {{ __('Wishlist') }}</a></li>
                <li><a class="js-add-to-compare-button" href="{{ route('public.compare.add', $product->id) }}"><i class="icon-chart-bars"></i>
                    {{ __('Compare') }}</a></li>
            </ul>
        </div>
    </div>
@endif
