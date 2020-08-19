<?php

##
# THUMBNAILS
##

return [
    # General thumbnail settings
    'driver' => 'im',
    'quality' => 85,
    'interlace' => true,

    # Thumbnail presets
    'presets' => [
        # Fullscreen sizes
        'full-width' => ['width' => 768],
        'full-height' => ['width' => null, 'height' => 640],

        # Generic cover
        'cover' => ['width' => 460],
        'cover.blurry' => ['width' => 460, 'blur' => true],
        'cover.460' => ['width' => 460],
        'cover.420' => ['width' => 420],
        'cover.340' => ['width' => 340],
        'cover.260' => ['width' => 260],

        # News
        # Hero image
        'news.hero' => ['width' => 960],
        'news.hero.blurry' => ['width' => 960, 'blur' => true],
        'news.hero.960' => ['width' => 960],
        'news.hero.768' => ['width' => 768],
        'news.hero.640' => ['width' => 640],
        'news.hero.480' => ['width' => 480],
        'news.hero.320' => ['width' => 320],
        'news.hero.240' => ['width' => 240],
        # Article thumbnail
        'news.article.image' => ['width' => 224, 'crop' => true],
        'news.article.image.blurry' => ['width' => 224, 'crop' => true, 'blur' => true],
        'news.article.image.224' => ['width' => 224, 'crop' => true],
        'news.article.image.192' => ['width' => 192, 'crop' => true],
        'news.article.image.128' => ['width' => 128, 'crop' => true],

        # Fundevogel
        'about.cover' => ['width' => 460, 'height' => 400, 'crop' => true],
        'about.cover.blurry' => ['width' => 460, 'height' => 400, 'crop' => true, 'blur' => true],
        'about.cover.460' => ['width' => 460, 'height' => 400, 'crop' => true],
        'about.cover.420' => ['width' => 420, 'height' => 360, 'crop' => true],
        'about.cover.340' => ['width' => 340, 'height' => 294, 'crop' => true],
        'about.cover.260' => ['width' => 260, 'height' => 224, 'crop' => true],
        # Team avatar images
        'about.team' => ['width' => 120, 'height' => 120, 'crop' => true],
        'about.team.blurry' => ['width' => 120, 'height' => 120, 'crop' => true, 'blur' => true],
        'about.team.120' => ['width' => 120, 'height' => 120, 'crop' => true],

        # Assortment
        # Navigation images
        'assortment.navigation' => ['width' => 440, 'height' => 320, 'crop' => true,],
        'assortment.navigation.blurry' => ['width' => 440, 'height' => 320, 'crop' => true, 'blur' => true],
        'assortment.navigation.440' => ['width' => 440, 'height' => 320, 'crop' => true,],
        'assortment.navigation.400' => ['width' => 400, 'height' => 300, 'crop' => true,],
        'assortment.navigation.346' => ['width' => 346, 'height' => 250, 'crop' => true,],
        'assortment.navigation.282' => ['width' => 282, 'height' => 204, 'crop' => true,],
        'assortment.navigation.202' => ['width' => 202, 'height' => 146, 'crop' => true,],

        # Lesetipps
        # Reading list cover images
        'lesetipps.pdf' => ['width' => 200, 'quality' => 100],
        'lesetipps.pdf.blurry' => ['width' => 200, 'quality' => 100, 'blur' => true],
        'lesetipps.pdf.200' => ['width' => 200, 'quality' => 100],
        'lesetipps.pdf.160' => ['width' => 160, 'quality' => 100],
        'lesetipps.pdf.128' => ['width' => 128, 'quality' => 100],
        # Cover images
        'lesetipps.article.cover-normal' => ['width' => 300],
        'lesetipps.article.cover-normal.blurry' => ['width' => 300, 'blur' => true],
        'lesetipps.article.cover-normal.300' => ['width' => 300],
        'lesetipps.article.cover-normal.240' => ['width' => 240],
        'lesetipps.article.cover-normal.160' => ['width' => 160],
        'lesetipps.article.cover-square' => ['width' => 300, 'crop' => true],
        'lesetipps.article.cover-square.blurry' => ['width' => 300, 'crop' => true, 'blur' => true],
        'lesetipps.article.cover-square.300' => ['width' => 300, 'crop' => true],
        'lesetipps.article.cover-square.240' => ['width' => 240, 'crop' => true],
        'lesetipps.article.cover-square.160' => ['width' => 160, 'crop' => true],
        # Lesepeter mascot image
        'lesepeter.mascot' => ['width' => 150],
        'lesepeter.mascot.150' => ['width' => 150],
        'lesepeter.mascot.112' => ['width' => 112],

        # Calendar
        # Annual event thumbnail images
        'calendar.single.preview' => ['width' => 160, 'crop' => true],
        'calendar.single.preview.blurry' => ['width' => 160, 'crop' => true, 'blur' => true],
        'calendar.single.preview.160' => ['width' => 160, 'crop' => true],
        # Gallery slide images
        'calendar.single.gallery' => ['width' => 312],
        'calendar.single.gallery.blurry' => ['width' => 312, 'blur' => true],
        'calendar.single.gallery.312' => ['width' => 312],
        'calendar.single.gallery.288' => ['width' => 288],
        'calendar.single.gallery.200' => ['width' => 200],
        'calendar.single.gallery.120' => ['width' => 120],
    ],

    'sizes' => [
        'cover' => [460, 420, 340, 260],
        'news.hero' => [960, 768, 640, 480, 320, 240],
        'news.article.image' => [224, 192, 128],
        'about.cover' => [460, 420, 340, 260],
        'about.team' => [120],
        'assortment.navigation' => [440, 400, 346, 282, 202],
        'lesetipps.pdf' => [200, 160, 128],
        'lesetipps.article.cover-normal' => [300, 240, 160],
        'lesetipps.article.cover-square' => [300, 240, 160],
        'lesepeter.mascot' => [150, 112],
        'calendar.single.preview' => [160],
        'calendar.single.gallery' => [312, 288, 200, 120],
    ]
];
