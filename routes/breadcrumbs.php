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

// Home > Blog
Breadcrumbs::register('news', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News', route('news'));
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