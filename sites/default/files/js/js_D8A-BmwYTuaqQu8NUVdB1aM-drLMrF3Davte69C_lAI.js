/* @license GPL-2.0-or-later https://www.drupal.org/licensing/faq */
(function(Drupal){'use strict';Drupal.behaviors.openchurchTheme={attach:function(context,settings){document.addEventListener("scroll",(event)=>{let scroll=window.scrollY;if(scroll>50)document.querySelector('header').classList.add('scrolled');else document.querySelector('header').classList.remove('scrolled');});}};}(Drupal));;
(function($,Drupal,debounce){$.fn.drupalGetSummary=function(){const callback=this.data('summaryCallback');if(!this[0]||!callback)return '';const result=callback(this[0]);return result?result.trim():'';};$.fn.drupalSetSummary=function(callback){const self=this;if(typeof callback!=='function'){const val=callback;callback=function(){return val;};}return (this.data('summaryCallback',callback).off('formUpdated.summary').on('formUpdated.summary',()=>{self.trigger('summaryUpdated');}).trigger('summaryUpdated'));};Drupal.behaviors.formSingleSubmit={attach(){function onFormSubmit(e){const $form=$(e.currentTarget);const formValues=new URLSearchParams(new FormData(e.target)).toString();const previousValues=$form.attr('data-drupal-form-submit-last');if(previousValues===formValues)e.preventDefault();else $form.attr('data-drupal-form-submit-last',formValues);}$(once('form-single-submit','body')).on('submit.singleSubmit','form:not([method~="GET"])',onFormSubmit);}};function triggerFormUpdated(element){$(element).trigger('formUpdated');}function fieldsList(form){return [].map.call(form.querySelectorAll('[name][id]'),(el)=>el.id);}Drupal.behaviors.formUpdated={attach(context){const $context=$(context);const contextIsForm=context.tagName==='FORM';const $forms=$(once('form-updated',contextIsForm?$context:$context.find('form')));let formFields;if($forms.length)$.makeArray($forms).forEach((form)=>{const events='change.formUpdated input.formUpdated ';const eventHandler=debounce((event)=>{triggerFormUpdated(event.target);},300);formFields=fieldsList(form).join(',');form.setAttribute('data-drupal-form-fields',formFields);$(form).on(events,eventHandler);});if(contextIsForm){formFields=fieldsList(context).join(',');const currentFields=$(context).attr('data-drupal-form-fields');if(formFields!==currentFields)triggerFormUpdated(context);}},detach(context,settings,trigger){const $context=$(context);const contextIsForm=context.tagName==='FORM';if(trigger==='unload')once.remove('form-updated',contextIsForm?$context:$context.find('form')).forEach((form)=>{form.removeAttribute('data-drupal-form-fields');$(form).off('.formUpdated');});}};Drupal.behaviors.fillUserInfoFromBrowser={attach(context,settings){const userInfo=['name','mail','homepage'];const $forms=$(once('user-info-from-browser','[data-user-info-from-browser]'));if($forms.length)userInfo.forEach((info)=>{const $element=$forms.find(`[name=${info}]`);const browserData=localStorage.getItem(`Drupal.visitor.${info}`);if(!$element.length)return;const emptyValue=$element[0].value==='';const defaultValue=$element.attr('data-drupal-default-value')===$element[0].value;if(browserData&&(emptyValue||defaultValue))$element.each(function(index,item){item.value=browserData;});});$forms.on('submit',()=>{userInfo.forEach((info)=>{const $element=$forms.find(`[name=${info}]`);if($element.length)localStorage.setItem(`Drupal.visitor.${info}`,$element[0].value);});});}};const handleFragmentLinkClickOrHashChange=(e)=>{let url;if(e.type==='click')url=e.currentTarget.location?e.currentTarget.location:e.currentTarget;else url=window.location;const hash=url.hash.substring(1);if(hash){const $target=$(`#${hash}`);$('body').trigger('formFragmentLinkClickOrHashChange',[$target]);setTimeout(()=>$target.trigger('focus'),300);}};const debouncedHandleFragmentLinkClickOrHashChange=debounce(handleFragmentLinkClickOrHashChange,300,true);$(window).on('hashchange.form-fragment',debouncedHandleFragmentLinkClickOrHashChange);$(document).on('click.form-fragment','a[href*="#"]',debouncedHandleFragmentLinkClickOrHashChange);})(jQuery,Drupal,Drupal.debounce);;
