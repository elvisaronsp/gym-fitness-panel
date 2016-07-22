@extends('layouts.frontend')

@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Breadcrumbs::render('product', $category, $product) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="row post">
                    <div class="col-md-6">
                        <div class="post-price">
                            @price($product->getPrice())
                        </div>
                        <div class="post-title text-center">
                            <h2>{{ $product->product_name }}</h2>
                        </div>
                        <div class="post-images text-center">
                            <a href="{{ $product->getImage() }}" class='fancybox'>
                                <img alt="" class="img-rounded" src="{{ $product->getImage() }}" style="max-width: 500px"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="post-body">
                            <h4><strong>Opis prezentu</strong></h4>
                            @if (strlen($product->getDescription()))
                            <p>
                            {!! preg_replace("/<img[^>]+\>/i", "", html_entity_decode($product->getDescription())) !!}
                            </p>
                            @else
                            <p><i>Przepraszamy, dla tego prezentu nie dodaliśmy jeszcze żadnego opisu. Kliknij przycisk <b>SPRAWDŹ GDZIE KUPIĆ</b>, aby zdobyć więcej informacji o tym produkcie.</i></p>
                            <br>
                            @endif
                        </div>
                        <div class="post-footer">
                            <div class="row">
                                <div class="col-xs-4 text-right">    
                                    <i class="fa fa-arrow-right text-warning" style="font-size: 8em"></i>
                                    <!--
                                    <br><br>
                                    <button class="btn btn-warning" data-target="#sendMessageModal" data-toggle="modal"><i class="fa fa-envelope"></i> <span class="hidden-xs hidden-sm">Send Message</span></button>
                                    -->
                                </div>
                                <div class="col-xs-8" style="margin-top: 45px">    
                                    <a href="{{ route('front.product.whereCanBuy', $product->product_id) }}" target="_blank" class="btn btn-lg btn-ads btn-block btn-product hvr-shadow-radial"><b><i class="fa fa-shopping-cart"></i> SPRAWDŹ GDZIE KUPIĆ</b></a>
                                </div> 

                                
                                <!--
                                <div class="col-xs-6">    
                                    <button class="btn btn-info"><i class="fa fa-whatsapp"></i> <span class="hidden-xs hidden-sm">0823 4223 4234</span></button>
                                    <button class="btn btn-warning" data-target="#sendMessageModal" data-toggle="modal"><i class="fa fa-envelope"></i> <span class="hidden-xs hidden-sm">Send Message</span></button>
                                </div>
                                <div class="col-xs-6">
                                    <div class="item-action pull-right">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Save Favorite" class="btn btn-success btn"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Show Details" class="btn btn-info btn"><i class="fa fa-share-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                -->
                            </div>
                            
                            @if ($product->DiscountCode && !is_null($product->DiscountCode->webep_discount_code))
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 text-center">    
                                    <p style="font-size: 18px; font-style: italic">Chcesz otrzymać zniżkę na ten produkt?</p>
                                    <a href="{{ route('front.kodyrabatowe.wykorzystaj', $product->DiscountCode->webep_discount_id) }}" target="_blank" class="btn btn-md btn-info hvr-shadow-radial get-discount-code" data-dsc="{{ $product->DiscountCode->webep_discount_id }}">
                                        <b><i style="font-size: 20px">%</i> Kliknij i odbierz kod rabatowy</b>
                                    </a>
                                </div> 
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
                
                <!--
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header">
                            <h2>More From John Doe</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="item-ads-grid">
                                    <div class="item-badge-grid featured-ads">
                                        <a href="#">Featured Ads</a>
                                    </div>
                                    <div class="item-img-grid">
                                        <img alt="" src="assets/img/products/product-1.jpg" class="img-responsive img-center">
                                    </div>
                                    <div class="item-title">
                                        <a href="detail.html"><h4>Lenovo A326 Black 4GB RAM</h4></a>
                                    </div>
                                    <div class="item-meta">
                                        <ul>
                                            <li class="item-date"><i class="fa fa-clock-o"></i> Today 10.35 am</li>
                                            <li class="item-cat"><i class="fa fa-bars"></i> <a href="category.html">Electronics</a> , <a href="category.html">Smartphone</a></li>
                                            <li class="item-location"><a href="category.html"><i class="fa fa-map-marker"></i> Manchester</a></li>
                                            <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <div class="item-price-grid pull-left">
                                            <h3>$ 100</h3>
                                            <span>Negotiable</span>
                                        </div>
                                        <div class="item-action-grid pull-right">
                                            <ul>
                                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Save Favorite" class="btn btn-default btn-sm"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="detail.html" data-toggle="tooltip" data-placement="top" title="Show Details" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item-ads-grid highlight-ads">
                                    <div class="item-badge-grid hot-ads">
                                        <a href="#">Featured Ads</a>
                                    </div>
                                    <div class="item-img-grid">
                                        <img alt="" src="assets/img/products/product-2.jpg" class="img-responsive img-center">
                                    </div>
                                    <div class="item-title">
                                        <a href="detail.html"><h4>Samsung Galaxy Grand Prime 530 8GB Grey</h4></a>
                                    </div>
                                    <div class="item-meta">
                                        <ul>
                                            <li class="item-date"><i class="fa fa-clock-o"></i> Today 10.35 am</li>
                                            <li class="item-cat"><i class="fa fa-bars"></i> <a href="category.html">Electronics</a> , <a href="category.html">Smartphone</a></li>
                                            <li class="item-location"><a href="category.html"><i class="fa fa-map-marker"></i> Manchester</a></li>
                                            <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <div class="item-price-grid pull-left">
                                            <h3>$ 100</h3>
                                            <span>Negotiable</span>
                                        </div>
                                        <div class="item-action-grid pull-right">
                                            <ul>
                                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Save Favorite" class="btn btn-default btn-sm"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="detail.html" data-toggle="tooltip" data-placement="top" title="Show Details" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item-ads-grid">
                                    <div class="item-badge-grid premium-ads">
                                        <a href="#">Featured Ads</a>
                                    </div>
                                    <div class="item-img-grid">
                                        <img alt="" src="assets/img/products/product-6.jpg" class="img-responsive img-center">
                                    </div>
                                    <div class="item-title">
                                        <a href="detail.html"><h4>Samsung Tab 3 V 116</h4></a>
                                    </div>
                                    <div class="item-meta">
                                        <ul>
                                            <li class="item-date"><i class="fa fa-clock-o"></i> Today 10.35 am</li>
                                            <li class="item-cat"><i class="fa fa-bars"></i> <a href="category.html">Electronics</a> , <a href="category.html">Smartphone</a></li>
                                            <li class="item-location"><a href="category.html"><i class="fa fa-map-marker"></i> Manchester</a></li>
                                            <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <div class="item-price-grid pull-left">
                                            <h3>$ 100</h3>
                                            <span>Negotiable</span>
                                        </div>
                                        <div class="item-action-grid pull-right">
                                            <ul>
                                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Save Favorite" class="btn btn-default btn-sm"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="detail.html" data-toggle="tooltip" data-placement="top" title="Show Details" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div
        </div>
    </div>
</section>
@endsection