!function(){"use strict";var t={n:function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,{a:n}),n},d:function(e,n){for(var o in n)t.o(n,o)&&!t.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:n[o]})},o:function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r:function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})}},e={};t.r(e);var n=window.wp.i18n,o=window.wp.domReady,r=t.n(o),i=window.wc.wcSettings;r()((()=>{const t=document.querySelector(".wc-actions");if(t){const e=document.querySelector(".wc-actions .button-primary");e&&(e.classList.remove("button"),e.classList.remove("button-primary"));const o=document.createElement("a");o.classList.add("button"),o.classList.add("button-primary"),o.setAttribute("href",(0,i.getAdminLink)("admin.php?page=wc-admin")),o.innerText=(0,n.__)("Continue setup","woocommerce"),t.appendChild(o)}})),(window.wc=window.wc||{}).onboardingProductImportNotice=e}();