<div style="padding: 15px">
<div class="row">
    <div class="col-sm-4 text-center">
        <div>
            <a href="{{ $discountCode->webep_discount_program_url }}" target="_blank">
                <img alt="{{ $discountCode->webep_discount_title }}" src="{{ $discountCode->webep_discount_program_logo_url }}" style="max-height: 60px">
            </a>
        </div>
    </div>
    <div class="col-sm-8 text-center">
        <a href="{{ $discountCode->webep_discount_program_url }}" target="_blank"><h4 style="font-size: 28px"><b>{{ $discountCode->webep_discount_title }}</b></h4></a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-12 text-center">
        <h2 style="margin-top: -10px">Jak wykorzystać kod rabatowy?</h2>
    </div>
</div>

<div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <b>Twój KOD RABATOWY TO:</b>
            <h2><span class="label label-primary">{{ $discountCode->webep_discount_code }}</span></h2>
        </div>
        <hr>
        <div class="col-xs-8 col-xs-offset-2" style="margin-top: 10px">
            <h4>Skopiuj powyższy kod i wklej go podczas składania zamówienia w odpowiednie miejsce w koszyku sklepu internetowego</h4>
            <br>
            <a href="{{ $discountCode->webep_discount_program_url }}" target="_blank" class="btn btn-ads btn-block btn-lg btn-product hvr-shadow-radial">
                <i class="fa fa-scissors"></i> Przejdź do sklepu i wykorzystaj rabat
            </a>
        </div>
        
    </div>
</div>
</div>
