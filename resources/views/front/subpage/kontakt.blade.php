@extends('layouts.frontend')

@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Breadcrumbs::render('kontakt') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="post">
                    <div class="post-title">
                        <h2>Kontakt z nami</h2>
                    </div>
                    <div class="post-body">
                        <p>
                            Jeśli masz jakieś pytania, lub chciał byś się podzielić z nami ciekwaymi pomysłami na prezent, napisz na adres: kontakt@wymyslprezent.pl
                        </p>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection