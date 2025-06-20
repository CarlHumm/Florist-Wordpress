<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['is_front'] = true;
$args = array(
    // Get post type project
    'post_type' => 'service',
    // Get all posts
    'posts_per_page' => 3,
    // Order by post date
    'orderby' => array(
        'date' => 'ASC'
    ));

$occassions = array(
    // Get post type project
    'post_type' => 'occassion',
    // Get all posts
    'posts_per_page' => -1,
    // Order by post date
    'orderby' => array(
        'date' => 'ASC'
        ));

$testimonials = array(
    // Get post type project
    'post_type' => 'testimonial',
    // Get all posts
    'posts_per_page' => -1,
    // Order by post date
    'orderby' => array(
        'date' => 'ASC'
        ));

        $posts = array(
            // Get post type project
            'post_type' => 'post',
            // Get all posts
            'posts_per_page' => 3,
            // Order by post date
            'orderby' => array(
                'date' => 'ASC'
                ));

$context['post'] = $post;
$context['posts'] = Timber::get_posts($posts);
$context['services'] = Timber::get_posts($args);
$context['occassions'] = Timber::get_posts($occassions);
$context['testimonials'] = Timber::get_posts($testimonials);

Timber::render('front-page.twig', $context);