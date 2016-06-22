@extends('layouts.frontend')

@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if (count($cechyChilds))
                    <div>
                        <div class="section-header">
                            <h1 class="brand-font">Pomysł na prezent dla</h1>
                        </div>
                        <div class="row">
                            @foreach($cechyChilds as $cechaChild)
                                <div class="col-xs-6 col-sm-4 col-md-3">
                                    <div class="shortcut">
                                        <a href="{{ url($cechaChild->link) }}" title="Pomysł na prezent dla {{ $cechaChild->name }}"><i class="{{ $cechaChild->icon }}"></i></a>
                                        <a href="{{ url($cechaChild->link) }}" title="Pomysł na prezent dla  {{ $cechaChild->name }}"><h3>{{ $cechaChild->name }}</h3></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                    <div>
                        <div class="section-header">
                            <h2 class="brand-font">Nasze propozycje prezentów</h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 bottom-5">
                                <div class="text-center">
                                    <a href="{{ url('dla-przyszlej-mamy') }}" title="Prezent dla przyszłej mamy" class=""><img src="{{ url('categoryimages/dla-przyszlej-mamy.jpg') }}" alt="Prezent dla przyszłej mamy" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 bottom-5">
                                <div class="text-center">
                                    <a href="{{ url('dla-czytajacych-ksiazki') }}" title="Prezent dla czytająych książki" class=""><img src="{{ url('categoryimages/dla-czytajacych-ksiazki-3.jpg') }}" alt="Prezent dla czytająych książki" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 bottom-5">
                                <div class="text-center">
                                    <a href="{{ url('na-osiemnaste-urodziny') }}" title="Prezent na osiemnaste urodziny" class=""><img src="{{ url('categoryimages/18-urodziny.jpg') }}" alt="Prezent na osiemnaste urodziny" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 bottom-5">
                                <div class="text-center">
                                    <a href="{{ url('na-wieczor-panienski-kawalerski') }}" title="Prezent na wieczór panieński, kawalerski" class=""><img src="{{ url('categoryimages/wieczor.jpg') }}" alt="Prezent na wieczór panieński, kawalerski" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 bottom-5">
                                <div class="text-center">
                                    <a href="{{ url('dla-babci-i-dziadka') }}" title="Prezent dla babci i dziadka" class=""><img src="{{ url('categoryimages/dziadkowie.jpg') }}" alt="Prezent dla babci i dziadka" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 bottom-5">
                                <div class="text-center">
                                    <a href="{{ url('na-rocznice-slubu') }}" title="Prezent na rocznicę ślubu" class=""><img src="{{ url('categoryimages/rocznica-slubu.jpg') }}" alt="Prezent na rocznicę ślubu" class="img-responsive"></a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
        @if (count($articles))
            <div class="row top-25">
                <div class="col-md-12 col-sm-12">
                        <div>
                            <div class="section-header">
                                <h2 class="brand-font">Ostatnio na naszym blogu</h2>
                            </div>
                            <div class="row">
                                @foreach ($articles as $article)
                                    <div class="col-xs-12 col-sm-4" >
                                        <div class="text-center">
                                            <a href="{{ url($article->getLink()) }}" title="{{ $article->article_title }}" class="blog-link">
                                                <h3 class="bottom-25">{{ $article->article_title }}</h3>
                                                <p>{{ $article->article_short_desc }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        @endif
        
    </div>
</section>
@include('front.partials.googleStructuredData.logo')
@include('front.partials.googleStructuredData.siteName')

@endsection
