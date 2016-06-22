@extends('layouts.frontend')

@section('content')   
<section class="category-wrapper">
    <div class="container">
            <div class="row" style="margin-bottom: -35px">
                <div class="col-md-12">
                    {!! Breadcrumbs::render('kodyRabatowe') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1 class='product-list-title'>Kody rabatowe na prezenty</h1>
                </div>
            </div>
            
            <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="list-results">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach ($discountCodes as $discountCode)
                            <div class="item-ads">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a href="{{ route('front.kodyrabatowe.wykorzystaj', $discountCode->webep_discount_id) }}" target="_blank">
                                            <img alt="{{ $discountCode->webep_discount_title }}" src="{{ $discountCode->webep_discount_program_logo_url }}" class="img-responsive" style="max-height: 100px">
                                        </a>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="item-title">
                                            <a href="{{ route('front.kodyrabatowe.wykorzystaj', $discountCode->webep_discount_id) }}" target="_blank"><h4>{{ $discountCode->webep_discount_title }}</h4></a>
                                        </div>
                                        <div class="item-meta">
                                            @if ($discountCode->webep_discount_date_to)
                                            <ul>
                                                <li class="item-date"><i class="fa fa-clock-o"></i> KOD RABATOWY WAŻNY DO: <b>{{ $discountCode->getExpiredDate() }}</b></li>
                                            </ul>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="item-action" style="margin-top: 10px">
                                            @if (is_null($discountCode->webep_discount_code))
                                                <a href="{{ route('front.kodyrabatowe.wykorzystaj', $discountCode->webep_discount_id) }}" target="_blank" class="btn btn-ads btn-block btn-lg btn-product hvr-shadow-radial">
                                                    <i class="fa fa-scissors"></i> Sprawdź promocję
                                                </a>
                                            @else
                                                <a href="{{ route('front.kodyrabatowe.wykorzystaj', $discountCode->webep_discount_id) }}" class="btn btn-ads btn-block btn-lg btn-product hvr-shadow-radial get-discount-code" data-dsc="{{ $discountCode->webep_discount_id }}">
                                                    <i class="fa fa-eye"></i>  Pokaż kod
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</section>
@endsection