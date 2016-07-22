@extends('layouts.frontend')

@section('content')
    <section class="category-wrapper">
        <div class="container">
            <div class="row" style="margin-bottom: -35px">
                <div class="col-md-12">
                    {!! Breadcrumbs::render('categoryProducts', $category) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1 class='product-list-title'>Prezenty {{ strtolower($category->getName()) }}</h1>
                </div>
            </div>
            
            <hr>
            
            @if (count($products))
            <div class="row">
                <div class="col-sm-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div style="margin: 20px 0;">
                                    @include('front.product.orderbyDropdown')
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                {!! $products->links() !!}
                            </div>
                        </div>
                    </div>
                    <div class="search-results-box">
                        <div class="row">

                        </div>
                    </div>
                    <div class="list-results">
                        <div class="row">
                            @foreach ($products as $product)
                                {{-- */$productLink = $product->getLink(isset($category->link) ? $category->link : '');/* --}}
                                <div class="col-md-3">
                                    <div class="item-ads-grid">
                                        @if ($product->product_discount > 0)
                                            <div class="item-badge-grid featured-ads">
                                                <a href="{{ $productLink }}" title="{{ $product->product_name }}">OBNIŻKA -{{ $product->product_discount }}%</a>
                                            </div>
                                        @endif
                                        <div class="item-img-grid">
                                <div class="text-center thumbnail-kenburn">
                                    <div class="overflow-hidden">
                                            <a href="{{ $productLink }}" title="{{ $product->product_name }}">
                                                <img alt="{{ $product->product_name }}" src="{{ $product->getImage() }}" class="img-responsive img-center">
                                            </a>
                                    </div>
                                </div>
                                            

                                        </div>
                                        <div class="item-title text-center" style="height: 55px">
                                            <a href="{{ $productLink }}" title="{{ $product->product_name }}"><h4>{{ $product->product_name }}</h4></a>
                                        </div>
                                        <div class="product-footer">
                                            <div style="height: 50px">
                                                @if ($product->product_discount > 0)
                                                    <div class="text-center" style="height: 15px">
                                                        <h6 style="margin-top:0px">Poprzednia cena <s>@price($product->product_previous_price)</s></h6>
                                                    </div>
                                                @endif

                                                <div class="item-price-grid text-center" style="{{ $product->product_discount == 0 ? 'padding-top: 10px' : 'color: #398110' }}">
                                                    <h3 class="price">Cena od @price($product->getPrice())</h3>
                                                </div>
                                            </div>
                                            <div class="item-action-grid text-center">
                                                <a href="{{ $productLink }}" title="{{ $product->product_name }}" class="btn btn-ads btn-block btn-sm btn-product hvr-shadow-radial">
                                                    <i class="fa fa-eye"></i> Podgląd
                                                </a>
                                                <!--
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Save Favorite" class="btn btn-default btn-sm"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="detail.html" data-toggle="tooltip" data-placement="top" title="Show Details" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>  
            </div>
            @else
            <div class="row">
                <div class="col-md-12">
                    <div class="post">
                        <div class="post-body">
                            <p>
                                Bardzo przepraszamy ale w tej chwili nie mamy żadnych propozycji prezentów dla tej kategorii, cały czas pracujemy nad znalezieniem jak najlepszych pomysłów.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection