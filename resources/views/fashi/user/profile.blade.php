@extends('master')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="#"><i class="fa fa-home"></i>{{ trans('header.home') }}</a>
                        <span>{{ trans('text.profile') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form method="POST" class="checkout-form" action="{{ route('user.update') }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6">
                        <h4>{{ trans('text.profile_user') }}</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name">{{ trans('text.name') }}<span>*</span></label>
                                <input type="text" class="mb-3 @error ('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $user->name }}">
                                @error ('name')
                                    <span>
                                        <strong class="error-color">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <label for="address">{{ trans('text.street_address') }}<span>*</span></label>
                                <input type="text" class="mb-3 @error ('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') ?? $user->address }}">
                                @error ('address')
                                    <span>
                                        <strong class="error-color">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="email">{{ trans('text.email') }}<span>*</span></label>
                                <input type="text" class="mb-3 @error ('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $user->email }}">
                                @error ('email')
                                    <span>
                                        <strong class="error-color">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="phone">{{ trans('text.phone') }}<span>*</span></label>
                                <input type="text" class="mb-3 @error ('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') ?? $user->phone}}">
                                @error ('phone')
                                    <span>
                                        <strong class="error-color">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="order-btn pl-3 pr-3">
                                <button type="submit" class="site-btn place-btn">{{ trans('text.update') }}</button>
                            </div>
                            <div class="order-btn pl-3 pr-5">
                                <a href="{{ route('user.view.change.password') }}"><button type="button" class="site-btn place-btn">{{ trans('text.change_password') }}</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>{{ trans('text.history_order') }}</h4>
                            @foreach ($orders as $order)
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>{{ trans('text.order') }}<span>{{ trans('text.total') }}</span></li>
                                        @php $totalPrice = 0; @endphp
                                        @foreach ($order->orderDetails as $orderDetail)
                                            <li class="fw-normal">{{ $orderDetail->productDetail->product->name }} x {{ $orderDetail->quantity }} ({{ $orderDetail->productDetail->color }}) <span>${{ $subTotal = $orderDetail->productDetail->product->price * $orderDetail->quantity }}</span></li>
                                            @php $totalPrice += $subTotal; @endphp
                                        @endforeach
                                        <li class="total-price">{{ trans('text.total') }}<span>${{ $totalPrice }}</span></li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
