@if (isset($article))
<script>
    $(function() {
        $("#blog-article-thumb").backstretch("{{ url($article->getThumbLarge()) }}");
    });

</script>

<section id="blog-article-thumb">
    <div class="container text-center">
        <h1 class="hero-title brand-font" style="margin-top: 200px; border-radius: 5px 5px 5px 5px; padding: 15px; background-color:rgba(0, 0, 0, 0.7); color:#fff">{{ $article->article_title }}</h1>
    </div>
</section>
@endif