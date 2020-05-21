/* eslint-disable max-len */

/*
 * IMPORTS
 */

import barba from '@barba/core';
import InfiniteScroll from 'infinite-scroll';
import Layzr from 'layzr.js';
import macy from 'macy';
import svg4everybody from 'svg4everybody';
import tippy, {roundArrow} from 'tippy.js';
import {tns} from 'tiny-slider/src/tiny-slider.module';

import featureDetection from './modules/jsDetect';
import toggleMenu from './modules/toggleMenu';
import baguetteBox from './vendor/baguetteBox.js';


/*
 * App Class
 */
class App {
    static start() {
        return new App();
    }

    constructor() {
        Promise
            .all([
                App.domReady(),
            ])
            .then(this.init.bind(this));
    }

    static domReady() {
        return new Promise((resolve) => {
            document.addEventListener('DOMContentLoaded', resolve);
        });
    }

    static showPage() {
        document.body.classList.add('app:is-ready');
        console.info('🚀 App:ready');
    }

    init() {
        console.info('🚀 App:init');

        featureDetection();

        // eslint-disable-next-line new-cap
        const lazyLoading = Layzr({
            normal: 'data-layzr',
            threshold: 250,
        });

        lazyLoading
            .update()
            .check()
            .handlers(true);

        const baguetteBoxSelector = '.js-lightbox';
        const baguetteBoxOptions = {
            animation: 'fadeIn',
            overlayBackgroundColor: 'rgba(255,249,196,1)',
        };

        function reloadBaguettebox() {
            baguetteBox.destroy();
            baguetteBox.run(baguetteBoxSelector, baguetteBoxOptions);
        }

        // Avoid 'blank page' on JS error
        try {
            barba.hooks.before(() => {
                barba.wrapper.classList.add('app:is-animating');
            });
            // barba.hooks.beforeLeave(() => {
            // });
            // barba.hooks.leave(() => {
            // });
            // barba.hooks.afterLeave(() => {
            // });
            barba.hooks.beforeEnter((data) => {
                svg4everybody({
                    polyfill: true,
                });

                tippy(data.next.container.querySelectorAll('.js-tippy'), {
                    theme: 'fundevogel orange',
                    duration: [350, 150],
                    offset: [0, 20],
                    arrow: roundArrow,
                    plugins: [],
                    content(reference) {
                        const title = reference.getAttribute('title');
                        reference.removeAttribute('title');
                        return title;
                    },
                });

                lazyLoading
                    .update()
                    .check();

                baguetteBox.run(baguetteBoxSelector, baguetteBoxOptions);

                const toggle = data.next.container.querySelector('.js-toggle');

                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleMenu();
                }, false);

                if (data.next.namespace === 'grid-list' || data.next.namespace === 'calendar') {
                    macy({
                        container: data.next.container.querySelector('#macy'),
                        trueOrder: false,
                        columns: 3,
                        margin: 16,
                        breakAt: {
                            767: 1,
                            1279: 2,
                        },
                    });
                }
            });
            barba.hooks.enter((data) => {
                window.scrollTo(0, 0);

                const toggle = data.current.container.querySelector('.js-toggle');
                const isOpen = toggle.classList.contains('is-active');

                if (isOpen) {
                    toggleMenu();
                }
            });
            // barba.hooks.afterEnter(() => {
            // });
            barba.hooks.after(() => {
                barba.wrapper.classList.remove('app:is-animating');
            });

            barba.init({
                debug: true,
                views: [
                    {
                        namespace: 'news',
                        beforeEnter(data) {
                            const infiniteScroll = new InfiniteScroll(data.next.container.querySelector('.js-list'), {
                                hideNav: '.js-hide',
                                button: '.js-more',
                                path: '.js-target',
                                append: '.js-article',
                                scrollThreshold: 750,
                                history: false,
                            });

                            infiniteScroll.on('append', () => {
                                lazyLoading.update();
                                reloadBaguettebox();
                            });
                        },
                        // afterEnter() {
                        // },
                        // beforeLeave() {
                        // },
                        // afterLeave() {
                        // },
                    },
                    {
                        namespace: 'fundevogel',
                        beforeEnter(data) {
                            tns({
                                container: data.next.container.querySelector('.js-slider'),
                                mode: 'gallery',
                                speed: 1000,
                                // lazyload: true,
                                autoplay: true,
                                autoplayTimeout: 3500,
                                autoplayHoverPause: true,
                                autoplayButtonOutput: false,
                                nav: false,
                                controls: false,
                            });
                        },
                        // afterEnter() {
                        // },
                        // beforeLeave() {
                        // },
                        // afterLeave() {
                        // },
                    },
                ],
            });
        } catch (err) {
            console.error(err);
        }

        App.showPage();
    }
}

App.start();
