@extends('layouts.frontend')

@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Breadcrumbs::render('article', $article) !!}
            </div>
        </div>

        <div class="row">
            <!--ymienic na 8 i dodac kolumn, ydjecie wtedz img+responsive-->
            <div class="col-md-12">
                <div class="post">
                    <!--
                    <div class="post-title" style='margin-top: 20px; margin-bottom: 20px'>
                        <h2>{{ $article->article_title }}</h2>
                    </div>
                    -->
                    <div class="post-body">
                        {!! $article->article_long_desc !!}
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection