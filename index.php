<?php

require 'vendor/autoload.php';

use Faker\Factory;

// Initialize Faker
$faker = Factory::create();

// Number of blog posts to generate
$numberOfPosts = 3;

// Array to store blog posts
$blogPosts = [];

function generateRealisticContent($faker) {
    $content = '';

    // Add an introduction paragraph
    $content .= "<p>{$faker->paragraph(5)}</p>";

    // Add a subheading and more paragraphs
    $content .= "<h3>{$faker->sentence(4)}</h3>";
    $content .= "<p>{$faker->paragraph(6)}</p>";

    // Add a bullet-point list
    $content .= "<h4>{$faker->sentence(3)}</h4>";
    $content .= "<ul>";
    for ($i = 0; $i < 5; $i++) {
        $content .= "<li>{$faker->sentence(6)}</li>";
    }
    $content .= "</ul>";

    // Add a blockquote
    $content .= "<blockquote>{$faker->sentence(10)}</blockquote>";

    // Add another subheading and paragraphs
    $content .= "<h3>{$faker->sentence(5)}</h3>";
    $content .= "<p>{$faker->paragraph(7)}</p>";

    // Add a conclusion paragraph
    $content .= "<p>{$faker->paragraph(4)}</p>";

    return $content;
}

// Generate blog posts
for ($i = 0; $i < $numberOfPosts; $i++) {
    $blogPost = [
        'title' => $faker->sentence(6),
        'content' => generateRealisticContent($faker),
        'excerpt' => $faker->paragraph(2) . ' ' . $faker->sentence(),
        'featured_image' => $faker->imageUrl(800, 400, 'nature', true),
        'category' => $faker->randomElement(['Technology', 'Travel', 'Food', 'Health', 'Lifestyle']),
        'author' => $faker->name,
        'date' => $faker->date('F j, Y'),
    ];

    $blogPosts[] = $blogPost;
}


foreach ($blogPosts as $post) {
    echo "<article style='margin-bottom: 40px; border-bottom: 1px solid #ccc; padding-bottom: 20px;'>";
    echo "Blog Title: <h2 style='color: blue;'>{$post['title']}</h2>";
    echo "<img src='{$post['featured_image']}' alt='Featured Image' style='width: 100%; max-width: 800px; height: auto; margin-bottom: 20px;'>";
    echo "<p><strong>Category:</strong> {$post['category']}</p>";
    echo "<p><strong>Author:</strong> {$post['author']}</p>";
    echo "<p><strong>Date:</strong> {$post['date']}</p>";
    echo "<p><strong>Excerpt:</strong> {$post['excerpt']}</p>";
    echo "<div>{$post['content']}</div>";
    echo "</article>";
}


?>