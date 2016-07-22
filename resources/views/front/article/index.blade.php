@extends('layouts.frontend')

@section('content')   

<style>
    body, .footer {
            background-color: #f0f0f0;
    }
</style>

<section class="category-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Breadcrumbs::render('blog') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="list-results">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach ($articles as $article)
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div style="height: 570px; background-color:#fff; border-radius: 5px; margin-bottom: 30px">
                                        <a href="{{ url($article->getLink()) }}" title="{{ $article->article_title }}" class="blog-link">
                                        @if (strlen($article->article_thumb))
                                            <div class="thumbnail-kenburn">
                                                <div class="overflow-hidden">
                                                    <img src="{{ url($article->getThumb()) }}" class="img-responsive">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="blog-box text-center" style="margin-top: -20px;padding: 30px;">
                                            <small><i>Opublikowano: {{ $article->getCreatedAtHumanDiff() }}</i></small>
                                            <h3 style="line-height: 1.4em">{{ $article->article_title }}</h3>
                                            <br>
                                            <p>{{ $article->article_short_desc }}</p>
                                        </div>
                                        </a>
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