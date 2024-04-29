<?php namespace ProcessWire;

if(!defined("PROCESSWIRE")) die();

/** @var Wire $wire */

/**
 * ProcessWire Bootstrap API Ready
 * ===============================
 * This ready.php file is called during ProcessWire bootstrap initialization process.
 * This occurs after the current page has been determined and the API is fully ready
 * to use, but before the current page has started rendering. This file receives a
 * copy of all ProcessWire API variables.
 *
 */

//  webp image support
 if($page->template != 'admin') {
    $wire->addHookAfter('Pageimage::url', function($event) {
      static $n = 0;
      if(++$n === 1) $event->return = $event->object->webp()->url();
      $n--;
    });
  }

  // platform link custom field to get current page's children
  $wire->addHookAfter('InputfieldPage::getSelectablePages', function($event) {
    if($event->object->hasField == 'platforms') {
      $event->return = $event->arguments('page')->children('template=platform-links');
    }
  });