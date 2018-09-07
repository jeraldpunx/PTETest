<?php

// Admin Dashboard
Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

// Admin > Questions
Breadcrumbs::register('questions', function($breadcrumbs)
{
    $breadcrumbs->push('Questions', route('admin.questions.index'));
});

// Admin > Questions > Create
Breadcrumbs::register('questions.create', function($breadcrumbs)
{
    $breadcrumbs->parent('questions');
    $breadcrumbs->push('Create', route('admin.questions.create'));
});

// // Home > Blog
// Breadcrumbs::register('blog', function($breadcrumbs)
// {
//     $breadcrumbs->parent('home');
//     $breadcrumbs->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::register('category', function($breadcrumbs, $category)
// {
//     $breadcrumbs->parent('blog');
//     $breadcrumbs->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Page]
// Breadcrumbs::register('page', function($breadcrumbs, $page)
// {
//     $breadcrumbs->parent('category', $page->category);
//     $breadcrumbs->push($page->title, route('page', $page->id));
// });