<div class="container">
    <?php
        $images = $article->getImages();
        $hasGallery = count($images) > 2;
    ?>
    <div class="flex flex-col lg:flex-row justify-center">
        <?php if ($images && !$hasGallery) : ?>
        <div class="js-lightbox lg:mt-10 mb-8 lg:mb-0 lg:ml-12 lg:flex lg:flex-col flex-none text-center">
            <?php foreach ($images as $image) : ?>
            <div class="inline-block <?php e(count($images) === 2, 'last:ml-6 lg:last:ml-0 lg:last:mt-6 ') ?>rounded-lg group overflow-hidden select-none">
                <?= $image->createImage('h-auto' . r(count($images) === 1, ' w-40 ', ' w-24 xs:w-40 ') . 'sm:w-48 xl:w-56 rounded-lg transition-transform duration-350 transform group-hover:scale-110 cursor-pointer', 'news.article.image', true) ?>
            </div>
            <?php endforeach ?>
        </div>
        <?php endif ?>
        <div class="flex-initial<?php e(!$hasGallery, ' lg:order-first', ' order-first') ?>">
            <time datetime="<?= $article->date()->toDate('Y-m-d') ?>">
                <?= $article->date()->toDate('d.m.Y') ?>
                <?php e($article->subtitle()->isNotEmpty(), '&mdash; ' . $article->subtitle()->html()) ?>
            </time>
            <h3><?= $article->title()->html() ?></h3>
            <?= $article->text()->kt() ?>
        </div>
    </div>
</div>
<?php
    if ($hasGallery) {
        $heading = false;
        snippet('components/gallery', compact('heading', 'images'));
    }
?>
