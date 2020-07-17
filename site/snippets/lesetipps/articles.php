<?php
    $count = 1;
    foreach ($lesetipps as $lesetipp) :
?>
<article class="flex flex-col md:flex-row">
    <div class="flex-none flex justify-center">
        <a class="mb-6 md:mb-0" href="<?= $lesetipp->url() ?>">
            <?= $lesetipp->getBookCover('rounded-lg shadow-cover') ?>
        </a>
    </div>
    <div class="flex-1 md:ml-10 relative">
        <?php
            if ($lesetipp->hasAward()->bool()) :
            $award = $lesetipp->getAward();
        ?>
        <?= useSVG($award['awardtitle'], 'js-tippy w-auto h-16 absolute right-0', $award['identifier'], 'style="top: -1rem"') ?>
        <?php endif ?>
        <time datetime="<?= $lesetipp->date()->toDate('Y-m-d') ?>"><?= $lesetipp->date()->toDate('d.m.Y') ?></time>
        <h3><a class="link" href="<?= $lesetipp->url() ?>"><?= $lesetipp->title()->html() ?></a></h3>
        <p class="lg:text-lg">
            <?= $lesetipp->text()->excerpt(300) ?><br>
            <?= $lesetipp->moreLink('link font-bold font-small-caps text-sm outline-none') ?>
        </p>
    </div>
</article>
<?php
    e($count < $perPage && $count != $lesetipps->count(), '<hr class="max-w-sm">');
    $count++;

    endforeach;
?>
