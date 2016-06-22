<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Strona główna', route('mainpage'));
});

//subpage category
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->name, route('categoryShow', $category->link));
});

Breadcrumbs::register('categoryProducts', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('home');
    $name = $category->getName();
    $breadcrumbs->push('Pomysły na prezent '. strtolower($name), route('categoryShow', $category->link));
});

Breadcrumbs::register('product', function($breadcrumbs, $category, $product)
{
    $breadcrumbs->parent('categoryProducts', $category);
    $breadcrumbs->push($product->product_name, '');
});

/*subpages*/
Breadcrumbs::register('misja', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Misja', '');
});

Breadcrumbs::register('kontakt', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Kontakt z nami', '');
});

/*kody rabatowe*/
Breadcrumbs::register('kodyRabatowe', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Kody rabatowe', route('front.kodyrabatowe.index'));
});

/***BLOG***/
//blog - strona glowna
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('BLOG', route('front.blog.article.index'));
});

Breadcrumbs::register('article', function($breadcrumbs, $article)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($article->article_title, '');
});