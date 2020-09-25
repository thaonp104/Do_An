@extends('master')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <!-- ./home.html -->
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i>{{ trans('header.home') }}</a>
                        <!-- ./shop.html -->
                        <a href="#">{{ trans('header.shop') }}</a>
                        <span>{{ trans('text.details') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('fashi.user.sidebar-left')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{ $product->images->first() ? $product->images->first()->link_to_image : '' }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->images as $image)
                                        <div class="pt active" data-imgbigurl="{{ $image->link_to_image }}"><img src="{{ $image->link_to_image }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->categories->first()->name }}</span>
                                    <h3>{{ $product->name }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{ $product->description }}</p>
                                    <h4>${{ $product->price }}<span>${{ $product->price }}</span></h4>
                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        @foreach ($product->productDetails as $productDetailColor)
                                            <div class="cc-item">
                                                <input type="radio" id="cc-{{ $productDetailColor->color }}">
                                                <label for="cc-{{ $productDetailColor->color }}" class="cc-{{ $productDetailColor->color }}"></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    @foreach ($product->productDetails->unique('size') as $productDetailSize)
                                        <div class="sc-item">
                                            <input type="radio" id="sm-size">
                                            <label for="sm-size">{{ $productDetailSize->size }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    <a href="#" class="primary-btn pd-cart">{{ trans('text.add_to_cart') }}</a>
                                </div>
                                <ul class="pd-tags">
                                    <a href="{{ route('product.category.index', $product->categories->first()->id) }}"><li><span class="text-uppercase">{{ trans('text.category') }}:</span> {{ $product->categories->first()->name }}</li></a>
                                </ul>
                                <div class="pd-share">
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="text-uppercase active" data-toggle="tab" href="#tab-3" role="tab">{{ trans('text.customer_reviews') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ trans('text.comments') }}</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{ asset('bower_components/bower_fashi_shop/img/product-single/avatar-2.png') }}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>{{-- Roy Banks --}}<span>{{-- 27 Aug 2019 --}}</span></h5>
                                                    <div class="at-reply">{{-- Nice ! --}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>{{-- Your Rating --}}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>{{ trans('text.leave_comment') }}</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="{{ trans('text.name') }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="{{ trans('text.email') }}">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="{{ trans('text.messges') }}"></textarea>
                                                        <button type="submit" class="site-btn">{{ trans('text.send_message') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ trans('text.related_products') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($product->images as $image)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ $image->link_to_image }}" alt="">
                                <div class="sale">{{ trans('text.sale') }}</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ {{ trans('text.quick_view') }}</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ $product->categories->first()->name }}</div>
                                <a href="#">
                                    <h5>{{ $product->name }}</h5>
                                </a>
                                <div class="product-price">
                                    {{ $product->price }}
                                    <span>{{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
@endsection
