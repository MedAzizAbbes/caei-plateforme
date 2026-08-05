<?php

$baseUrl = 'https://caei-afri.com/Digitalmoov/';

$files = [
    'assets/css/main.css',
    'assets/js/main.js',
    'assets/img/caei dm 01.png',
    'assets/img/caei dm cov.png',
    'assets/img/R1.jpg',
    'assets/img/8.avif',
    'assets/img/solution.png',
    'assets/img/ill-mission-raison-d-etre.png',
    'assets/img/icon-valeurs.png',
    'assets/img/tra.PNG',
    'assets/img/optim.PNG',
    'assets/img/projects/repairs-1.jpg',
    'assets/img/projects/design-1.jpg',
    'assets/img/projects/remodeling-2.jpg',
    'assets/img/projects/construction-2.jpg',
    'assets/img/projects/repairs-2.jpg',
    'assets/img/projects/design-2.jpg',
    'assets/img/projects/remodeling-3.jpg',
    'assets/img/projects/construction-3.jpg',
    'assets/img/projects/repairs-3.jpg',
    'assets/img/projects/design-3.jpg',
    'assets/img/testimonials/testimonials-1.jpg',
    'assets/img/testimonials/testimonials-2.jpg',
    'assets/img/testimonials/testimonials-3.jpg',
    'assets/img/testimonials/testimonials-4.jpg',
    'assets/img/testimonials/testimonials-5.jpg',
    'assets/img/blog/blog-1.jpg',
    'assets/img/blog/blog-2.jpg',
    'assets/img/blog/blog-3.jpg',
    'assets/img/1114916_Man_Woman_Job_1280x720.mp4'
];

foreach ($files as $file) {
    // Encoder les caractères comme les espaces ou accents dans l'URL si nécessaire
    $url = $baseUrl . str_replace(' ', '%20', $file);
    $dest = __DIR__ . '/public/digitalmoov/' . $file;
    
    $dir = dirname($dest);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    
    echo "Downloading $url ...\n";
    $content = @file_get_contents($url);
    if ($content !== false) {
        file_put_contents($dest, $content);
        echo "Saved to $dest (" . strlen($content) . " bytes)\n";
    } else {
        echo "FAILED to download $url\n";
    }
}
echo "Digital Moov asset download finished.\n";
