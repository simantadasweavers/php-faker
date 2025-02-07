<?php

require 'vendor/autoload.php';

use Faker\Factory;

// Initialize Faker
$faker = Factory::create();

// Number of blog posts to generate
$numberOfPosts = 10;

// Array to store blog posts
$blogPosts = [];

// Generate blog posts
for ($i = 0; $i < $numberOfPosts; $i++) {
    $blogPost = [
        'title' => $faker->sentence(6),
        'content' => $faker->paragraphs(5, true),
        'excerpt' => $faker->paragraph(2) . ' ' . $faker->sentence(),
        'featured_image' => $faker->imageUrl(800, 400, 'nature', true),
        'category' => $faker->word,
    ];

    $blogPosts[] = $blogPost;
}

// Print blog posts
foreach ($blogPosts as $post) {
    echo "<h2>{$post['title']}</h2>";
    echo "<img src='{$post['featured_image']}' alt='Featured Image' style='width: 100%; max-width: 800px; height: auto;'>";
    echo "<p><strong>Category:</strong> {$post['category']}</p>";
    echo "<p><strong>Excerpt:</strong> {$post['excerpt']}</p>";
    echo "<p><strong>Content:</strong> {$post['content']}</p>";
    echo "<hr>";
}