<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});
// Home > About
Breadcrumbs::register('product.view', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Post', route('product.view'));
});

Breadcrumbs::register('post', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Post', route('home'));
});

Breadcrumbs::register('post.review', function($breadcrumbs)
{
    $breadcrumbs->parent('post');
    $breadcrumbs->push('Review', route('post.review'));
});

Breadcrumbs::register('post.product', function($breadcrumbs)
{
    $breadcrumbs->parent('post');
    $breadcrumbs->push('Product', route('post.product'));
});

// Home > Blog
Breadcrumbs::register('news', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News', route('news'));
});

Breadcrumbs::register('news.category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('news');
    $breadcrumbs->push(strlen($category) != mb_strlen($category, 'utf-8') ? $category : ucwords(strtolower($category)), route('news.category'));
});

Breadcrumbs::register('news.view', function($breadcrumbs, $news)
{
    $breadcrumbs->parent('news');
    $breadcrumbs->push($news->title, route('news.view'));
});

Breadcrumbs::register('product', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($product['title'], route('product'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});