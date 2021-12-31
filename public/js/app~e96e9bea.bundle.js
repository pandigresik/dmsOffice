/*! For license information please see app~e96e9bea.bundle.js.LICENSE.txt */
(self.webpackChunk=self.webpackChunk||[]).push([[562],{7098:(t,e,a)=>{"use strict";a.d(e,{ZT:()=>o,pi:()=>i,ev:()=>r});var n=function(t,e){return(n=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var a in e)Object.prototype.hasOwnProperty.call(e,a)&&(t[a]=e[a])})(t,e)};function o(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Class extends value "+String(e)+" is not a constructor or null");function a(){this.constructor=t}n(t,e),t.prototype=null===e?Object.create(e):(a.prototype=e.prototype,new a)}var i=function(){return(i=Object.assign||function(t){for(var e,a=1,n=arguments.length;a<n;a++)for(var o in e=arguments[a])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t}).apply(this,arguments)};Object.create;function r(t,e,a){if(a||2===arguments.length)for(var n,o=0,i=e.length;o<i;o++)!n&&o in e||(n||(n=Array.prototype.slice.call(e,0,o)),n[o]=e[o]);return t.concat(n||e)}Object.create},3890:(t,e,a)=>{"use strict";var n;a(1826);window.main=a(5883).Z,window.elementGenerator=a(9298).Z,n=function(){window.main.initFormatInput(),$(document).on("select2:open",(function(){var t=document.querySelectorAll(".select2-container--open .select2-search__field");t[t.length-1].focus()}))},"loading"!==document.readyState?n():document.addEventListener?document.addEventListener("DOMContentLoaded",n):document.attachEvent("onreadystatechange",(function(){"complete"===document.readyState&&n()}))},4073:()=>{window.CKEDITOR_BASEPATH="/vendor/ckeditor/"},1826:(t,e,a)=>{window._=a(9870);try{window.Popper=a(886).default,window.$=window.jQuery=a(7346),window.moment=a(8387),window.toastr=a(6625),window.bootbox=a(906),a(4283),a(2045),a(650),a(6661),a(5185),a(2608),a(4529),a(7674),a(4347)}catch(t){}window.$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),window.axios=a(3195),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest"},9298:(t,e,a)=>{"use strict";a.d(e,{Z:()=>s});var n=a(9870),o=a.n(n);function i(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,n)}return a}function r(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?i(Object(a),!0).forEach((function(e){c(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):i(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function c(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}function l(t,e){for(var a=0;a<e.length;a++){var n=e[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}const s=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,a,n;return e=t,(a=[{key:"input",value:function(t,e){var a=[];if(o().forEach(t,(function(t,e){a.push(e+"='"+t+"'")})),o().isEmpty(e)){if(t.elements){var n=[];for(var i in t.elements)n.push('<div class="form-group col-sm-6"><input data-position="'.concat(t.elements[i],'" ').concat(o().join(a," ")," /></div>"));return'<div class="row">'.concat(o().join(n," "),"</div>")}return'<div class="row"><div class="form-group col-sm-12"><input '.concat(o().join(a," ")," /></div></div>")}return this.dropdown(a,e)}},{key:"dropdown",value:function(t,e){var a=[];return o().forEach(e,(function(t){a.push('<option value="'.concat(t.value,'">').concat(t.text,"</option>"))})),'<div class="row"><div class="form-group col-sm-12"><select '.concat(o().join(t," "),">").concat(o().join(a," "),"</select></div></div>")}},{key:"inputSearch",value:function(t,e){var a,n={type:"text",style:"width:100%",placeholder:"Search "+(t.title||"")},o=null!==(a=t.listItem)&&void 0!==a?a:null;o&&delete e.listItem;var i=e.localOption;delete e.localOption;var c=r(r({},n),e);switch(t.elmsearch){case"daterange":c.class="form-control datetime",c["data-optiondate"]=JSON.stringify(i.daterange);break;case"datesingle":c.class="form-control datetime";break;case"time":c.class="form-control datetime",c["data-optiondate"]=JSON.stringify(i.time);break;case"numberrange":c.class="form-control inputmask",c["data-optionmask"]=JSON.stringify(i.number.decimal),c.elements=["from","to"];break;case"decimal":c.class="form-control inputmask",c["data-optionmask"]=JSON.stringify(i.number.decimal);break;case"currency":c.class="form-control inputmask",c["data-optionmask"]=JSON.stringify(i.number.currency);break;case"dropdown":c.class="form-control";break;default:c.class="form-control"}return this.input(c,o)}}])&&l(e.prototype,a),n&&l(e,n),t}())},5883:(t,e,a)=>{"use strict";a.d(e,{Z:()=>b});var n=a(9870),o=a.n(n),i=a(7346),r=a.n(i),c=(a(94),a(4487),a(1833),a(4073),a(9312),a(1718),a(906)),l=a.n(c),s=a(6681),u=a(3531),d=a(8061),f=a(9028),p=a(6474);function v(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,n)}return a}function m(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?v(Object(a),!0).forEach((function(e){h(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):v(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function h(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}function y(t,e){for(var a=0;a<e.length;a++){var n=e[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}const b=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,a,n;return e=t,(a=[{key:"setWorkflow",value:function(t){this.workflow=t}},{key:"setButtonCaller",value:function(t){r()(".button-caller").removeClass("button-caller"),r()(t).addClass("button-caller")}},{key:"executeWorkflow",value:function(){if(!o().isEmpty(this.workflow)){var t=this.workflow.shift();r()(t.element).trigger("click")}}},{key:"getAjaxData",value:function(t,e,a,n){r().ajax({url:t,data:a,dataType:"json",type:e,beforeSend:function(){},success:function(t){}}).done((function(t){void 0!==n&&n(t)}))}},{key:"alertDialog",value:function(t,e,a){l().alert({title:t,message:e,buttons:{ok:{label:"OK",className:"btn-primary btn-sm"}},callback:function(t){void 0!==a&&a(t)}})}},{key:"resetForm",value:function(t){var e=r()(t).closest("form"),a=r()(t).data("exclude");e.find("input,textarea").not(r()(t)).not(a).val(""),e.find("select").not(r()(t)).not(a).each((function(){r()(this).val(r()(this).find("option:first").val())}))}},{key:"getHtmlData",value:function(t,e,a,n){var o=this;r().ajax({url:t,data:a,dataType:"html",type:e,beforeSend:function(){o.showLoading(!0)},success:function(t){o.showLoading(!1)}}).done((function(t){void 0!==n&&n(t)}))}},{key:"showLoading",value:function(t){if(t)this.bootboxInfo=l().alert("Please wait ......");else try{var e=this;setTimeout((function(){e.bootboxInfo.modal("hide")}),500)}catch(t){}}},{key:"loadContent",value:function(t,e,a,n,o){var i=r()(n),c=this;r().ajax({url:t,data:e,dataType:"html",type:a,beforeSend:function(){i.html("Loading ......")},success:function(t){i.html(t)}}).done((function(){c.initFormatInput(i),void 0!==o&&o(),c.executeWorkflow()}))}},{key:"getContentView",value:function(t,e,a){var n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:function(){};this.loadContent(t,e,"GET",a,n)}},{key:"postContentView",value:function(t,e,a){var n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:function(){};this.loadContent(t,e,"POST",a,n)}},{key:"defaultValidateOption",value:function(){return{errorElement:"em",errorPlacement:function(t,e){t.addClass("invalid-feedback"),"checkbox"===e.prop("type")?t.insertAfter(e.parent("label")):t.insertAfter(e)},highlight:function(t){r()(t).addClass("is-invalid").removeClass("is-valid")},unhighlight:function(t){r()(t).addClass("is-valid").removeClass("is-invalid")}}}},{key:"checkAll",value:function(t,e){var a=r()(t).is(":checked")?1:0;r()(t).closest(e).find(":checkbox").not(t).prop("checked",a)}},{key:"initFormatInput",value:function(t){var e=this,a=void 0===t?r()("form"):t,n=a.prop("tagName"),o=a;("FORM"===n?a:a.find("form")).each((function(){var t=r()(this).find("div.form-error-validate-container"),a=r()(this).data("error-container"),n={submitHandler:function(t){var a,n=null!==(a=r()(t).data("submitable"))&&void 0!==a?a:1;r()(t).find(".inputmask").each((function(){if(r()(this).data("unmask")){var t=r()(this).data("optionmask")||{},e=r()(this).inputmask("unmaskedvalue");","===t.radixPoint&&(e=e.replace(",",".")),r()(this).inputmask("remove"),r()(this).val(e)}})),r()(t).find(".datetime").each((function(){if(void 0!==r()(this).data("daterangepicker")){var t=e.getValueDateSQL(r()(this));r()(this).data("daterangepicker").remove(),r()(this).val(t)}})),n&&t.submit()}},o=m(m({},e.defaultValidateOption()),n);void 0!==a&&(o.errorLabelContainer=t),r()(this).validate(o)})),e.initDatetime(o),e.initInputmask(o),e.initSelect(o),e.initEditor(o),e.initCalendar(o)}},{key:"initFormatInputWithoutValidate",value:function(t){var e=this,a=void 0===t?r()("form"):t;e.initDatetime(a),e.initInputmask(a),e.initSelect(a),e.initEditor(a),e.initCalendar(a)}},{key:"initInputFile",value:function(t){var e=[];t.find(".upload-file").each((function(){var t=r()(this).data("optionupload")||{},a=m(m({},{showDeleteButtonOnImages:!0,text:{chooseFile:"Custom Placeholder Copy",browse:"Custom Button Copy",selectedCount:"Custom Files Selected Copy"}}),t);e.push((0,p.Z)(r()(this).attr("id"),a))}))}},{key:"initInputmask",value:function(t){t.find(".inputmask").each((function(){var t=r()(this).data("optionmask")||{},e=r()(this).attr("type");void 0!==e&&(o().find(["text","url","search","tel","password"],e)||r()(this).attr("type","text")),r()(this).inputmask(t)}))}},{key:"initDatetime",value:function(t){t.find(".datetime").each((function(){var t=r()(this).data("optiondate")||{},e=m(m({},{locale:{format:"DD MMM YYYY"},singleDatePicker:!0,timePicker:!1,showDropdowns:!0,autoApply:!0}),t);!1===t.hideDatePicker?r()(this).daterangepicker(e).on("show.daterangepicker",(function(t,e){e.container.find(".calendar-table").hide()})):r()(this).daterangepicker(e)}))}},{key:"initEditor",value:function(t){t.find(".editor").each((function(){var t=r()(this).data("optioneditor")||{};r()(this).ckeditor(t)}))}},{key:"initSelect",value:function(t){var e=this;t.find(".select2").each((function(){var t=r()(this).data("optionselect")||{},a=r()(this).find("option").eq(0),n=m(m({},{width:"100%",allowClear:!0,placeholder:r()(this).data("placeholder")||"Choose option"}),t);if(r()(this).data("ajax")){var o=r()(this),i=o.data("url"),c=o.data("repository");void 0===i?console.log("url select2 "+r()(this).attr("name")+" belum diset"):n.ajax={url:i,type:"get",dataType:"json",delay:500,data:function(t){return{q:r().trim(t.term),page:t.page,repository:c}},processResults:function(t){return t.page=t.from||1,{results:t.data,pagination:{more:!!t.next_page_url}}},cache:!0}}var l=r()(this).data("hasicon")||!1,s=r()(this).data("astable")||!1,u=r()(this).data("ascard")||!1,d=r()(this).data("selectascard")||!1;l&&(n.templateSelection=e.formatText,n.templateResult=e.formatText),s&&(a.prop("disabled",1),n.templateSelection=e.formatTable,n.templateResult=e.formatTable),u&&(d&&(n.templateSelection=e.formatCard),n.templateResult=e.formatCard),r()(this).select2(n)}))}},{key:"formatText",value:function(t){var e,a=null!==(e=r()(t.element).data("icon"))&&void 0!==e?e:t.text;return r()('<span><i class="'+a+'"></i> '+t.text+"</span>")}},{key:"formatTable",value:function(t){var e=t.text.split(" | "),a=Math.ceil(12/e.length);a<2&&(a=2);var n="col-md-"+a,o=[];for(var i in e)o.push('<div class="'.concat(n,'">').concat(e[i],"</div>"));return r()('<div class="row">'.concat(o.join(""),"</div>"))}},{key:"formatCard",value:function(t){var e,a=t.text.split(" | "),n=[];for(var o in a)e=a[o].split("::"),n.push('<tr><td class="p-2">'.concat(e[0],'</td><td class="text-right p-2">').concat(e[1],"</td></tr>"));return r()('<div class="pr-3"><table class="table table-sm table-dark"><tbody>'.concat(n.join(""),"</tbody></table></div>"))}},{key:"initCalendar",value:function(t){t.find(".calendar").each((function(){var t=document.getElementById(r()(this).attr("id")),e=r()(this).data("eventurl"),a={plugins:[u.ZP,d.ZP,f.Z],initialView:"dayGridMonth",height:650,showNonCurrentDates:!1,eventSources:[{url:e,type:"POST",data:{},error:function(){alert("there was an error while fetching events!")},color:"none",textColor:"black"}],header:{left:"prev,next today",center:"title",right:"dayGridMonth,timeGridWeek,listWeek"},html:!0,eventRender:function(t,e){if(!o().isEmpty(t.className)){var a=e.find(".fc-title");a.html(a.text()),r()("td.fc-day[data-date='"+t.start.format("YYYY-MM-DD")+"']").addClass(t.className.join(" "))}}},n=r()(this).data("optioncalendar")||{},i=m(m({},a),n);new s.faS(t,i).render()}))}},{key:"popupModal",value:function(t,e,a){var n=r()(t).data("json"),o=r()(t).data("url"),i=r()(t).data("title")||"",c=this,s=void 0===r()(t).data("size")?"extra-large":r()(t).data("size");this.getHtmlData(o,e,n,(function(t){var e={size:s,title:i,message:t,scrollable:!0};l().dialog(e).on("shown.coreui.modal",(function(t){var e=r()(t.target);c.initFormatInput(e)}))}))}},{key:"loadDetailPage",value:function(t,e,a){var n=r()(t).data("json"),i=r()(t).data("url"),c=r()(t).data("ref"),l=r()(c),s=r()(t).data("target");if(void 0===n){if(o().isEmpty(r()(t).val()))return void r()(s).html("");n={id:r()(t).val()}}l.length&&(l.length>1?l.each((function(){n[r()(this).attr("name")]=r()(this).val()})):n.ref=l.val()),this.getHtmlData(i,e,n,(function(t){r()(s).html(t),void 0!==a&&a(t)}))}},{key:"redirectUrl",value:function(t){var e=r()(t).data("url"),a=r()(t).closest("tr").data("json"),n=r()(t).data("tipe")||"post";void 0===a&&(a=r()(t).data("json"));var o="_blank";void 0!==r()(t).data("target")&&(o=r()(t).data("target")),r().redirect(e,a,n,o)}},{key:"loadContentTab",value:function(t){var e=r()(t).data("url"),a=r()(t).data("json"),n=r()(t).data("href"),i=r()(n);o().isEmpty(i.html())&&this.getContentView(e,{key:a},i)}},{key:"clickElm",value:function(t,e){var a=r()(t).data();if(void 0!==a){for(var n in a)r()(e).data(n,a[n]);var o=r()(e).data("href");switch(this._clearHtmlData(r()(o)),r()(e).data("action")){case"add":r()(e).find("i").removeClass("fa-pencil"),r()(e).find("i").addClass("fa-plus");break;default:r()(e).find("i").removeClass("fa-plus"),r()(e).find("i").addClass("fa-pencil")}}r()(e).click()}},{key:"_clearHtmlData",value:function(t){t.html("")}},{key:"editRecord",value:function(t){var e=r()(t).closest("tr").data("key"),a=r()(t).data("url");this.postContentView(a,{key:e})}},{key:"refresh",value:function(t){t?window.location.href=t:window.reloadPage()}},{key:"setRequiredElm",value:function(t){var e=r()(t).data("parent"),a=r()(t).data("target"),n=r()(t).closest(e).find(a).not(r()(t));r()(t).is(":checked")?n.prop("required",!0):n.prop("required",!1)}},{key:"autofocus",value:function(t){var e=r()(t).offset();r()(document).scrollTop(e.top-100)}},{key:"autofocusCarousel",value:function(t){var e=r()(t).offset(),a=r()(t).closest(".carousel-item");a.length&&(a.hasClass("active")?r()(document).scrollTop(e.top-100):(a.siblings(".active").removeClass("active"),a.addClass("active"),setTimeout((function(){e=r()(t).offset(),r()(document).scrollTop(e.top-100)}),500)))}},{key:"getValueDateSQL",value:function(t){var e=null;try{var a=r()(t).data("daterangepicker"),n="YYYY-MM-DD",i=a.locale.format;o().includes(i,"YYYY")?(n="YYYY-MM-DD",o().includes(i,"HH")&&(n+=" HH:mm:ss")):n="HH:mm:ss",e=a.singleDatePicker?a.startDate.format(n):"".concat(a.startDate.format(n),"__").concat(a.endDate.format(n))}catch(t){console.error(t)}return e}},{key:"generateFormField",value:function(t,e){var a=[];for(var n in e)a.push("<input type='hidden' name='".concat(t,"[").concat(n,"]' value='").concat(e[n],"' >"));return a}}])&&y(e.prototype,a),n&&y(e,n),t}())},7425:()=>{},9452:()=>{},6994:(t,e,a)=>{"use strict";var n,o=function(){return void 0===n&&(n=Boolean(window&&document&&document.all&&!window.atob)),n},i=function(){var t={};return function(e){if(void 0===t[e]){var a=document.querySelector(e);if(window.HTMLIFrameElement&&a instanceof window.HTMLIFrameElement)try{a=a.contentDocument.head}catch(t){a=null}t[e]=a}return t[e]}}(),r=[];function c(t){for(var e=-1,a=0;a<r.length;a++)if(r[a].identifier===t){e=a;break}return e}function l(t,e){for(var a={},n=[],o=0;o<t.length;o++){var i=t[o],l=e.base?i[0]+e.base:i[0],s=a[l]||0,u="".concat(l," ").concat(s);a[l]=s+1;var d=c(u),f={css:i[1],media:i[2],sourceMap:i[3]};-1!==d?(r[d].references++,r[d].updater(f)):r.push({identifier:u,updater:h(f,e),references:1}),n.push(u)}return n}function s(t){var e=document.createElement("style"),n=t.attributes||{};if(void 0===n.nonce){var o=a.nc;o&&(n.nonce=o)}if(Object.keys(n).forEach((function(t){e.setAttribute(t,n[t])})),"function"==typeof t.insert)t.insert(e);else{var r=i(t.insert||"head");if(!r)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");r.appendChild(e)}return e}var u,d=(u=[],function(t,e){return u[t]=e,u.filter(Boolean).join("\n")});function f(t,e,a,n){var o=a?"":n.media?"@media ".concat(n.media," {").concat(n.css,"}"):n.css;if(t.styleSheet)t.styleSheet.cssText=d(e,o);else{var i=document.createTextNode(o),r=t.childNodes;r[e]&&t.removeChild(r[e]),r.length?t.insertBefore(i,r[e]):t.appendChild(i)}}function p(t,e,a){var n=a.css,o=a.media,i=a.sourceMap;if(o?t.setAttribute("media",o):t.removeAttribute("media"),i&&"undefined"!=typeof btoa&&(n+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),t.styleSheet)t.styleSheet.cssText=n;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(n))}}var v=null,m=0;function h(t,e){var a,n,o;if(e.singleton){var i=m++;a=v||(v=s(e)),n=f.bind(null,a,i,!1),o=f.bind(null,a,i,!0)}else a=s(e),n=p.bind(null,a,e),o=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(a)};return n(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;n(t=e)}else o()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=o());var a=l(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var n=0;n<a.length;n++){var o=c(a[n]);r[o].references--}for(var i=l(t,e),s=0;s<a.length;s++){var u=c(a[s]);0===r[u].references&&(r[u].updater(),r.splice(u,1))}a=i}}}}},t=>{"use strict";var e=e=>t(t.s=e);t.O(0,[421,567,876,313,64,245,753,573,87,837,800,10,958,321,569,751,738],(()=>(e(3890),e(7425),e(9452))));t.O()}]);