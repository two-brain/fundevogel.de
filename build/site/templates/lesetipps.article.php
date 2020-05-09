<?php snippet('header') ?>

<article class="">
    <header class="container">
        <time datetime="<?= $page->date()->toDate('Y-m-d') ?>"><?= $page->date()->toDate('d.m.Y') ?></time>
        <h2><?= $page->title()->html() ?></h2>
        <?= $page->text()->kt() ?>
    </header>
    <aside class="my-20 overflow-hidden">
        <?= $site->useSeparator('orange-light', 'top') ?>
        <div class="pt-12 pb-8 lg:pb-4 bg-orange-light">
            <div class="container xl:px-0">
                <div class="flex flex-col md:flex-row">
                    <div class="flex-none flex justify-center">
                        <div class="flex items-center mb-6">
                            <div class="group relative">
                                <span class="lesetipp-plus absolute z-30" style="left: -1.25rem; top: -1.25rem">
                                    <?= $site->useSVG('Mehr anzeigen', 'w-10 h-10 p-2 text-white fill-current bg-red-medium rounded-full', 'plus') ?>
                                </span>
                                <div class="inset-0 w-full h-full absolute opacity-0 group-hover:opacity-100 rounded-lg bg-orange-medium cursor-context-menu transition-all z-25 spread-out">
                                    <div class="pt-16 px-8">
                                        <div class="mb-4 flex text-sm">
                                            <?= $site->useSVG('Kategorien', 'w-8 h-8 flex-none -mt-1 mr-4 text-white fill-current', 'category') ?>
                                            <div class="leading-tight">
                                                <?php foreach ($page->categories()->split() as $category): ?>
                                                <a href="<?= url('lesetipps', ['params' => ['kategorie' => rawurlencode($category)]]) ?>">
                                                    <span><?= $category ?></span>
                                                </a>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 flex text-sm">
                                            <?= $site->useSVG('Themen', 'w-8 h-8 flex-none -mt-px mr-4 text-white fill-current', 'tag') ?>
                                            <div class="flex flex-wrap">
                                                <?php foreach ($tags = $page->tags()->split() as $tag) : ?>
                                                        <a href="<?= url('lesetipps', ['params' => ['thema' => rawurlencode($tag)]]) ?>">
                                                            <span><?= $tag ?></span>
                                                        </a>
                                                        <?php e(A::last($tags) === $tag, '', ',&nbsp;') ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="rounded-lg shadow-cover" src="<?= $thumb->url() ?>" title="<?= $cover->titleAttribute()->html() ?>" alt="<?= $cover->altAttribute()->html() ?>" width="<?= $thumb->width() ?>" height="<?= $thumb->height() ?>">
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 md:ml-10">
                        <div class="lg:text-lg">
                            <?= $page->verdict()->kt() ?>
                        </div>
                        <div class="flex flex-col my-8 text-sm">
                            <div class="flex md:flex-col lg:flex-row">
                                <div class="mb-4 flex-1 flex items-center">
                                    <?= $site->useSVG('AutorIn', 'w-10 h-10 p-2 text-white fill-current bg-orange-medium rounded-full', 'author') ?>
                                    <span class="ml-4">
                                        <?= $page->autor()->html() ?>
                                    </span>
                                </div>
                                <div class="mb-4 flex-1 flex items-center">
                                    <?= $site->useSVG('AutorIn', 'w-10 h-10 p-2 text-white fill-current bg-orange-medium rounded-full', 'illustrator') ?>
                                    <span class="ml-4">
                                        <?= $page->participants()->html() ?>
                                    </span>
                                </div>
                            </div>
                            <div class="flex md:flex-col lg:flex-row">
                                <div class="mb-4 flex-1 flex items-center">
                                    <?= $site->useSVG('Verlag', 'w-10 h-10 p-2 text-white fill-current bg-orange-medium rounded-full', 'publisher') ?>
                                    <span class="ml-4">
                                        <?= $page->verlag()->html() ?>
                                    </span>
                                </div>
                                <div class="mb-4 flex-1 flex items-center">
                                    <?= $site->useSVG('ISBN', 'w-10 h-10 p-2 text-white fill-current bg-orange-medium rounded-full') ?>
                                    <span class="ml-4">
                                        <?= $page->isbn()->html() ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex md:flex-col lg:flex-row justify-between items-center">
                            <div class="flex md:mb-8 lg:mb-0">
                                <div class="mr-6 sm:mr-8 text-center leading-tight">
                                    <span class="block text-lg sm:text-2xl text-orange-dark font-bold"><?= $age ?></span>
                                    <span class="block text-sm sm:text-lg"><?= $period ?></span>
                                </div>
                                <div class="mr-6 md:mr-8 text-center leading-tight">
                                    <span class="block text-lg sm:text-2xl text-orange-dark font-bold">83</span>
                                    <span class="block text-sm sm:text-lg">Seiten</span>
                                </div>
                                <div class="mr-6 md:mr-8 text-center leading-tight">
                                    <span class="block text-lg sm:text-2xl text-orange-dark font-bold"><?= $page->preis()->html() ?> €</span>
                                    <span class="block text-sm sm:text-lg">Ladenpreis</span>
                                </div>
                            </div>
                            <div class="flex-none">
                                <a class="py-3 px-5 sm:py-4 sm:px-6 rounded-full bg-red-light hover:bg-red-medium transition-all" href="<?php e($page->shop()->isNotEmpty(), $page->shop(), $site->shop()) ?>" target="_blank">
                                    <span class="sketch text-xl sm:text-3xl">Zum Shop !</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $site->useSeparator('orange-light', 'bottom') ?>
    </aside>
    <?php if ($page->conclusion()->isNotEmpty()) : ?>
    <section class="container">
        <?= $page->conclusion()->kt() ?>
    </section>
    <?php endif ?>
</article>

<?php snippet('navigation/prevnext') ?>

<?php snippet('footer') ?>
