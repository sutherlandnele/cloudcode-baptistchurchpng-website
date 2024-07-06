/* @license GPL-2.0-or-later https://www.drupal.org/licensing/faq */
(function(Drupal){'use strict';Drupal.behaviors.openchurchTheme={attach:function(context,settings){document.addEventListener("scroll",(event)=>{let scroll=window.scrollY;if(scroll>50)document.querySelector('header').classList.add('scrolled');else document.querySelector('header').classList.remove('scrolled');});}};}(Drupal));;
