/* skip-link-focus-fix.js - https://git.io/vWdr2 */
!function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1)}();

/* Noframe.js https://dollarshaveclub.github.io/reframe.js/ */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):e.noframe=t()}(this,function(){"use strict";return function(e,t){var o="string"==typeof e?document.querySelectorAll(e):e;"length"in o||(o=[o]);for(var i=0;i<o.length;i+=1){var n=o[i],r=void 0!==t&&document.querySelector(t),f=r?document.querySelector(t):n.parentElement,d=n.offsetHeight,a=n.offsetWidth,u=n.style,l=a+"px";if(r)l=window.getComputedStyle(f,null).getPropertyValue("max-width"),u.width="100%",u.maxHeight="calc("+l+" * "+d+" / "+a+")";else{var m=void 0;u.display="block",u.marginLeft="auto",u.marginRight="auto";var h=l;m=a>f.offsetWidth?(h=f.offsetWidth)*d/a:a*(d/a),u.maxHeight=m+"px",u.width=h}var c=100*d/a;u.height=c+"vw",u.maxWidth="100%"}}}),noframe("iframe");

/* Manage Class Funtions https://www.sitepoint.com/add-remove-css-class-vanilla-js/ */
function addClass(e,l){elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.add(l)}function removeClass(e,l){elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.remove(l)}
// // Modal
// const modalTriggers=document.querySelectorAll(".s-modal-trigger"),bodyBlackout=document.querySelector(".s-modal-bg"),allModals=document.querySelectorAll(".s-modal");modalTriggers.forEach(e=>{e.addEventListener("click",()=>{const{popupTrigger:l}=e.dataset,o=document.querySelector(`[data-s-modal="${l}"]`);o.classList.add("-visible"),bodyBlackout.classList.add("-blacked-out"),o.querySelector(".s-modal-close").addEventListener("click",()=>{o.classList.remove("-visible"),bodyBlackout.classList.remove("-blacked-out")})})}),bodyBlackout.addEventListener("click",()=>{bodyBlackout.classList.remove("-blacked-out"),allModals.forEach(function(e,l){e.classList.remove("-visible")})});


jQuery(document).ready(function($) {
  var $categories = $('.widget_product_categories');

  if ($categories.length <= 0) {
      return;
  }

  $categories.find('ul.children').closest('li').prepend('<span class="cat-menu-close"><i class="flaticon-downwards-pointer"></i> </span>');

  $categories.find('li.current-cat-parent, li.current-cat, li.current-cat-ancestor').addClass('opened').children('.children').show();

  $categories.on('click', '.cat-menu-close', function (e) {
      e.preventDefault();
      $(this).closest('li').children('.children').slideToggle();
      $(this).closest('li').toggleClass('opened');
  })

});
