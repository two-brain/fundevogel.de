<?php

/*
 * Including config partials
 */

include kirby()->roots()->config() . '/security.php';
include kirby()->roots()->config() . '/license.php';
include kirby()->roots()->config() . '/routes.php';
include kirby()->roots()->config() . '/languages.php';


/*
 * General settings
 */

c::set('panel.stylesheet', 'assets/panel.css');
c::set('textarea.buttons', array(
  // 'h1',
  'h2',
  'h3',
  // 'h4',
  // 'h5',
  // 'h6',
  'bold',
  'italic',
  'ulist',
  // 'olist',
  'blockquote',
  'link'
  // 'email'
));


/*
 * Development settings
 */

c::set('debug', true);
c::set('thumbs.driver', 'im');
c::set('plugin.html.minifier.active', false);
