( function() {
    
  $('[data-toggle="tooltip"]').tooltip();

  var container, button, menu, links, i, len;

  container = document.getElementById( 'site-navigation' );
  if ( ! container ) {
    return;
  }

  button = container.getElementsByTagName( 'button' )[0];
  if ( 'undefined' === typeof button ) {
    return;
  }

  menu = container.getElementsByTagName( 'ul' )[0];

  // Hide menu toggle button if menu is empty and return early.
  if ( 'undefined' === typeof menu ) {
    button.style.display = 'none';
    return;
  }

  menu.setAttribute( 'aria-expanded', 'false' );
  if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
    menu.className += ' nav-menu';
  }

  button.onclick = function() {
    if ( -1 !== container.className.indexOf( 'toggled' ) ) {
      container.className = container.className.replace( ' toggled', '' );
      button.setAttribute( 'aria-expanded', 'false' );
      menu.setAttribute( 'aria-expanded', 'false' );
    } else {
      container.className += ' toggled';
      button.setAttribute( 'aria-expanded', 'true' );
      menu.setAttribute( 'aria-expanded', 'true' );
    }
  };

  // Get all the link elements within the menu.
  links    = menu.getElementsByTagName( 'a' );

  // Each time a menu link is focused or blurred, toggle focus.
  for ( i = 0, len = links.length; i < len; i++ ) {
    links[i].addEventListener( 'focus', toggleFocus, true );
    links[i].addEventListener( 'blur', toggleFocus, true );
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    var self = this;

    // Move up through the ancestors of the current link until we hit .nav-menu.
    while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

      // On li elements toggle the class .focus.
      if ( 'li' === self.tagName.toLowerCase() ) {
        if ( -1 !== self.className.indexOf( 'focus' ) ) {
          self.className = self.className.replace( ' focus', '' );
        } else {
          self.className += ' focus';
        }
      }

      self = self.parentElement;
    }
  }

  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */
  ( function( container ) {
    var touchStartFn, i,
      parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

    if ( 'ontouchstart' in window ) {
      touchStartFn = function( e ) {
        var menuItem = this.parentNode, i;

        if ( ! menuItem.classList.contains( 'focus' ) ) {
          e.preventDefault();
          for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
            if ( menuItem === menuItem.parentNode.children[i] ) {
              continue;
            }
            menuItem.parentNode.children[i].classList.remove( 'focus' );
          }
          menuItem.classList.add( 'focus' );
        } else {
          menuItem.classList.remove( 'focus' );
        }
      };

      for ( i = 0; i < parentLink.length; ++i ) {
        parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
      }
    }
  }( container ) );
} )();


/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function() {
  var isIe = /(trident|msie)/i.test( navigator.userAgent );

  if ( isIe && document.getElementById && window.addEventListener ) {
    window.addEventListener( 'hashchange', function() {
      var id = location.hash.substring( 1 ),
        element;

      if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
        return;
      }

      element = document.getElementById( id );

      if ( element ) {
        if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false );
  }
})();

/*
 Sticky-kit v1.1.2 | WTFPL | Leaf Corcoran 2015 | http://leafo.net
*/
(function(){var b,f;b=this.jQuery||window.jQuery;f=b(window);b.fn.stick_in_parent=function(d){var A,w,J,n,B,K,p,q,k,E,t;null==d&&(d={});t=d.sticky_class;B=d.inner_scrolling;E=d.recalc_every;k=d.parent;q=d.offset_top;p=d.spacer;w=d.bottoming;null==q&&(q=0);null==k&&(k=void 0);null==B&&(B=!0);null==t&&(t="is_stuck");A=b(document);null==w&&(w=!0);J=function(a,d,n,C,F,u,r,G){var v,H,m,D,I,c,g,x,y,z,h,l;if(!a.data("sticky_kit")){a.data("sticky_kit",!0);I=A.height();g=a.parent();null!=k&&(g=g.closest(k));
if(!g.length)throw"failed to find stick parent";v=m=!1;(h=null!=p?p&&a.closest(p):b("<div />"))&&h.css("position",a.css("position"));x=function(){var c,f,e;if(!G&&(I=A.height(),c=parseInt(g.css("border-top-width"),10),f=parseInt(g.css("padding-top"),10),d=parseInt(g.css("padding-bottom"),10),n=g.offset().top+c+f,C=g.height(),m&&(v=m=!1,null==p&&(a.insertAfter(h),h.detach()),a.css({position:"",top:"",width:"",bottom:""}).removeClass(t),e=!0),F=a.offset().top-(parseInt(a.css("margin-top"),10)||0)-q,
u=a.outerHeight(!0),r=a.css("float"),h&&h.css({width:a.outerWidth(!0),height:u,display:a.css("display"),"vertical-align":a.css("vertical-align"),"float":r}),e))return l()};x();if(u!==C)return D=void 0,c=q,z=E,l=function(){var b,l,e,k;if(!G&&(e=!1,null!=z&&(--z,0>=z&&(z=E,x(),e=!0)),e||A.height()===I||x(),e=f.scrollTop(),null!=D&&(l=e-D),D=e,m?(w&&(k=e+u+c>C+n,v&&!k&&(v=!1,a.css({position:"fixed",bottom:"",top:c}).trigger("sticky_kit:unbottom"))),e<F&&(m=!1,c=q,null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),
h.detach()),b={position:"",width:"",top:""},a.css(b).removeClass(t).trigger("sticky_kit:unstick")),B&&(b=f.height(),u+q>b&&!v&&(c-=l,c=Math.max(b-u,c),c=Math.min(q,c),m&&a.css({top:c+"px"})))):e>F&&(m=!0,b={position:"fixed",top:c},b.width="border-box"===a.css("box-sizing")?a.outerWidth()+"px":a.width()+"px",a.css(b).addClass(t),null==p&&(a.after(h),"left"!==r&&"right"!==r||h.append(a)),a.trigger("sticky_kit:stick")),m&&w&&(null==k&&(k=e+u+c>C+n),!v&&k)))return v=!0,"static"===g.css("position")&&g.css({position:"relative"}),
a.css({position:"absolute",bottom:d,top:"auto"}).trigger("sticky_kit:bottom")},y=function(){x();return l()},H=function(){G=!0;f.off("touchmove",l);f.off("scroll",l);f.off("resize",y);b(document.body).off("sticky_kit:recalc",y);a.off("sticky_kit:detach",H);a.removeData("sticky_kit");a.css({position:"",bottom:"",top:"",width:""});g.position("position","");if(m)return null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),h.remove()),a.removeClass(t)},f.on("touchmove",l),f.on("scroll",l),f.on("resize",
y),b(document.body).on("sticky_kit:recalc",y),a.on("sticky_kit:detach",H),setTimeout(l,0)}};n=0;for(K=this.length;n<K;n++)d=this[n],J(b(d));return this}}).call(this);


/*!
Waypoints - 4.0.1
Copyright © 2011-2016 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blob/master/licenses.txt
*/
!function(){"use strict";function t(o){if(!o)throw new Error("No options passed to Waypoint constructor");if(!o.element)throw new Error("No element option passed to Waypoint constructor");if(!o.handler)throw new Error("No handler option passed to Waypoint constructor");this.key="waypoint-"+e,this.options=t.Adapter.extend({},t.defaults,o),this.element=this.options.element,this.adapter=new t.Adapter(this.element),this.callback=o.handler,this.axis=this.options.horizontal?"horizontal":"vertical",this.enabled=this.options.enabled,this.triggerPoint=null,this.group=t.Group.findOrCreate({name:this.options.group,axis:this.axis}),this.context=t.Context.findOrCreateByElement(this.options.context),t.offsetAliases[this.options.offset]&&(this.options.offset=t.offsetAliases[this.options.offset]),this.group.add(this),this.context.add(this),i[this.key]=this,e+=1}var e=0,i={};t.prototype.queueTrigger=function(t){this.group.queueTrigger(this,t)},t.prototype.trigger=function(t){this.enabled&&this.callback&&this.callback.apply(this,t)},t.prototype.destroy=function(){this.context.remove(this),this.group.remove(this),delete i[this.key]},t.prototype.disable=function(){return this.enabled=!1,this},t.prototype.enable=function(){return this.context.refresh(),this.enabled=!0,this},t.prototype.next=function(){return this.group.next(this)},t.prototype.previous=function(){return this.group.previous(this)},t.invokeAll=function(t){var e=[];for(var o in i)e.push(i[o]);for(var n=0,r=e.length;r>n;n++)e[n][t]()},t.destroyAll=function(){t.invokeAll("destroy")},t.disableAll=function(){t.invokeAll("disable")},t.enableAll=function(){t.Context.refreshAll();for(var e in i)i[e].enabled=!0;return this},t.refreshAll=function(){t.Context.refreshAll()},t.viewportHeight=function(){return window.innerHeight||document.documentElement.clientHeight},t.viewportWidth=function(){return document.documentElement.clientWidth},t.adapters=[],t.defaults={context:window,continuous:!0,enabled:!0,group:"default",horizontal:!1,offset:0},t.offsetAliases={"bottom-in-view":function(){return this.context.innerHeight()-this.adapter.outerHeight()},"right-in-view":function(){return this.context.innerWidth()-this.adapter.outerWidth()}},window.Waypoint=t}(),function(){"use strict";function t(t){window.setTimeout(t,1e3/60)}function e(t){this.element=t,this.Adapter=n.Adapter,this.adapter=new this.Adapter(t),this.key="waypoint-context-"+i,this.didScroll=!1,this.didResize=!1,this.oldScroll={x:this.adapter.scrollLeft(),y:this.adapter.scrollTop()},this.waypoints={vertical:{},horizontal:{}},t.waypointContextKey=this.key,o[t.waypointContextKey]=this,i+=1,n.windowContext||(n.windowContext=!0,n.windowContext=new e(window)),this.createThrottledScrollHandler(),this.createThrottledResizeHandler()}var i=0,o={},n=window.Waypoint,r=window.onload;e.prototype.add=function(t){var e=t.options.horizontal?"horizontal":"vertical";this.waypoints[e][t.key]=t,this.refresh()},e.prototype.checkEmpty=function(){var t=this.Adapter.isEmptyObject(this.waypoints.horizontal),e=this.Adapter.isEmptyObject(this.waypoints.vertical),i=this.element==this.element.window;t&&e&&!i&&(this.adapter.off(".waypoints"),delete o[this.key])},e.prototype.createThrottledResizeHandler=function(){function t(){e.handleResize(),e.didResize=!1}var e=this;this.adapter.on("resize.waypoints",function(){e.didResize||(e.didResize=!0,n.requestAnimationFrame(t))})},e.prototype.createThrottledScrollHandler=function(){function t(){e.handleScroll(),e.didScroll=!1}var e=this;this.adapter.on("scroll.waypoints",function(){(!e.didScroll||n.isTouch)&&(e.didScroll=!0,n.requestAnimationFrame(t))})},e.prototype.handleResize=function(){n.Context.refreshAll()},e.prototype.handleScroll=function(){var t={},e={horizontal:{newScroll:this.adapter.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.adapter.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};for(var i in e){var o=e[i],n=o.newScroll>o.oldScroll,r=n?o.forward:o.backward;for(var s in this.waypoints[i]){var a=this.waypoints[i][s];if(null!==a.triggerPoint){var l=o.oldScroll<a.triggerPoint,h=o.newScroll>=a.triggerPoint,p=l&&h,u=!l&&!h;(p||u)&&(a.queueTrigger(r),t[a.group.id]=a.group)}}}for(var c in t)t[c].flushTriggers();this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}},e.prototype.innerHeight=function(){return this.element==this.element.window?n.viewportHeight():this.adapter.innerHeight()},e.prototype.remove=function(t){delete this.waypoints[t.axis][t.key],this.checkEmpty()},e.prototype.innerWidth=function(){return this.element==this.element.window?n.viewportWidth():this.adapter.innerWidth()},e.prototype.destroy=function(){var t=[];for(var e in this.waypoints)for(var i in this.waypoints[e])t.push(this.waypoints[e][i]);for(var o=0,n=t.length;n>o;o++)t[o].destroy()},e.prototype.refresh=function(){var t,e=this.element==this.element.window,i=e?void 0:this.adapter.offset(),o={};this.handleScroll(),t={horizontal:{contextOffset:e?0:i.left,contextScroll:e?0:this.oldScroll.x,contextDimension:this.innerWidth(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:e?0:i.top,contextScroll:e?0:this.oldScroll.y,contextDimension:this.innerHeight(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};for(var r in t){var s=t[r];for(var a in this.waypoints[r]){var l,h,p,u,c,d=this.waypoints[r][a],f=d.options.offset,w=d.triggerPoint,y=0,g=null==w;d.element!==d.element.window&&(y=d.adapter.offset()[s.offsetProp]),"function"==typeof f?f=f.apply(d):"string"==typeof f&&(f=parseFloat(f),d.options.offset.indexOf("%")>-1&&(f=Math.ceil(s.contextDimension*f/100))),l=s.contextScroll-s.contextOffset,d.triggerPoint=Math.floor(y+l-f),h=w<s.oldScroll,p=d.triggerPoint>=s.oldScroll,u=h&&p,c=!h&&!p,!g&&u?(d.queueTrigger(s.backward),o[d.group.id]=d.group):!g&&c?(d.queueTrigger(s.forward),o[d.group.id]=d.group):g&&s.oldScroll>=d.triggerPoint&&(d.queueTrigger(s.forward),o[d.group.id]=d.group)}}return n.requestAnimationFrame(function(){for(var t in o)o[t].flushTriggers()}),this},e.findOrCreateByElement=function(t){return e.findByElement(t)||new e(t)},e.refreshAll=function(){for(var t in o)o[t].refresh()},e.findByElement=function(t){return o[t.waypointContextKey]},window.onload=function(){r&&r(),e.refreshAll()},n.requestAnimationFrame=function(e){var i=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||t;i.call(window,e)},n.Context=e}(),function(){"use strict";function t(t,e){return t.triggerPoint-e.triggerPoint}function e(t,e){return e.triggerPoint-t.triggerPoint}function i(t){this.name=t.name,this.axis=t.axis,this.id=this.name+"-"+this.axis,this.waypoints=[],this.clearTriggerQueues(),o[this.axis][this.name]=this}var o={vertical:{},horizontal:{}},n=window.Waypoint;i.prototype.add=function(t){this.waypoints.push(t)},i.prototype.clearTriggerQueues=function(){this.triggerQueues={up:[],down:[],left:[],right:[]}},i.prototype.flushTriggers=function(){for(var i in this.triggerQueues){var o=this.triggerQueues[i],n="up"===i||"left"===i;o.sort(n?e:t);for(var r=0,s=o.length;s>r;r+=1){var a=o[r];(a.options.continuous||r===o.length-1)&&a.trigger([i])}}this.clearTriggerQueues()},i.prototype.next=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints),o=i===this.waypoints.length-1;return o?null:this.waypoints[i+1]},i.prototype.previous=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints);return i?this.waypoints[i-1]:null},i.prototype.queueTrigger=function(t,e){this.triggerQueues[e].push(t)},i.prototype.remove=function(t){var e=n.Adapter.inArray(t,this.waypoints);e>-1&&this.waypoints.splice(e,1)},i.prototype.first=function(){return this.waypoints[0]},i.prototype.last=function(){return this.waypoints[this.waypoints.length-1]},i.findOrCreate=function(t){return o[t.axis][t.name]||new i(t)},n.Group=i}(),function(){"use strict";function t(t){this.$element=e(t)}var e=window.jQuery,i=window.Waypoint;e.each(["innerHeight","innerWidth","off","offset","on","outerHeight","outerWidth","scrollLeft","scrollTop"],function(e,i){t.prototype[i]=function(){var t=Array.prototype.slice.call(arguments);return this.$element[i].apply(this.$element,t)}}),e.each(["extend","inArray","isEmptyObject"],function(i,o){t[o]=e[o]}),i.adapters.push({name:"jquery",Adapter:t}),i.Adapter=t}(),function(){"use strict";function t(t){return function(){var i=[],o=arguments[0];return t.isFunction(arguments[0])&&(o=t.extend({},arguments[1]),o.handler=arguments[0]),this.each(function(){var n=t.extend({},o,{element:this});"string"==typeof n.context&&(n.context=t(this).closest(n.context)[0]),i.push(new e(n))}),i}}var e=window.Waypoint;window.jQuery&&(window.jQuery.fn.waypoint=t(window.jQuery)),window.Zepto&&(window.Zepto.fn.waypoint=t(window.Zepto))}();

var BH = (function($) {
  /* fix vertical when not overflow
  call fullscreenFix() if .fullscreen content changes */
  function fullscreenFix(){
      var h = $('body').height();
      // set .fullscreen height
      $(".content-b").each(function(i){
          if($(this).innerHeight() > h){
              $(this).closest(".fullscreen").addClass("overflow");
          }
      });
  }
  $(window).resize(fullscreenFix);
  fullscreenFix();

    function menuMobile(){
      $(".fa-bars").on('touch click' , function() {
      $('.main-navigation').css('display','block');
      $('.main-navigation > ul').addClass('mobile');
      $('.fa-bars').css('display','none');
      $('.fa-times').css('display','inline-block');
    });

  $(".fa-times").on('touch click' , function() {
    $('.main-navigation').css('display','none');
    $('.main-navigation > ul').removeClass('mobile');
    $('.fa-bars').css('display','inline-block');
    $('.fa-times').css('display','none');
  });
    }

    // Find all YouTube videos
    var $allVideos = $("iframe[src^='//www.youtube.com']"),

        // The element that is fluid width
        $fluidEl = $("body");

    // Figure out and save aspect ratio for each video
    $allVideos.each(function() {

      $(this)
        .data('aspectRatio', this.height / this.width)

        // and remove the hard coded width/height
        .removeAttr('height')
        .removeAttr('width');

    });

    // When the window is resized
    $(window).resize(function() {

      var newWidth = $fluidEl.width();

      // Resize all videos according to their own aspect ratio
      $allVideos.each(function() {

        var $el = $(this);
        $el
          .width(newWidth)
          .height(newWidth * $el.data('aspectRatio'));

      });

    // Kick off one resize to fix all videos on page load
    }).resize();
// Card hover effects

// $('.card').on({
//   mouseover: function() {
//     if($(this).hasClass('clubs')) {
//           $(this).find('.card-img-top').addClass('animated infinite pulse');
//         } else if($(this).hasClass('rest')) {
//           $(this).find('.card-img-top').css('transform', 'scale(1.1)');
//           $(this).find('.card-circle').stop().fadeOut(1500);
//         } else {
//           $(this).find('svg').css('opacity', '1');
//         }
//   },
//   mouseout: function(){
//     if($(this).hasClass('clubs')) {
//           $(this).find('.card-img-top').removeClass('animated infinite pulse');
//         } else if($(this).hasClass('rest')) {
//           $(this).find('.card-img-top').css('transform', 'scale(1)');
//           $(this).find('.card-circle').stop().fadeIn(2000);
//         } else {
//           $(this).find('svg').css('opacity', '0');
//         }
//     }
// });

var $faqs = $('#accordion');

  $('.collapse', $faqs).on('shown.bs.collapse hide.bs.collapse', function () {
    console.log(this);
    $(this)
      .parent()
      .find('svg')
      .toggleClass('fa-plus-hexagon')
      .toggleClass('fa-minus-hexagon');
  });


  $('#nav-icon1').click(function(){
    $(this).toggleClass('open');
    $('#overlay').toggleClass('nav-active');
  });
  /* resize background images */
  function backgroundResize(){
      var windowH = $(window).height();
      $(".background").each(function(i){
          var path = $(this);
          // variables
          var contW = path.width();
          var contH = path.height();
          var imgW = path.attr("data-img-width");
          var imgH = path.attr("data-img-height");
          var ratio = imgW / imgH;
          // overflowing difference
          var diff = parseFloat(path.attr("data-diff"));
          diff = diff ? diff : 0;
          // remaining height to have fullscreen image only on parallax
          var remainingH = 0;
          if(path.hasClass("parallax")){
              var maxH = contH > windowH ? contH : windowH;
              remainingH = windowH - contH;
          }
          // set img values depending on cont
          imgH = contH + remainingH + diff;
          imgW = imgH * ratio;
          // fix when too large
          if(contW > imgW){
              imgW = contW;
              imgH = imgW / ratio;
          }
          //
          path.data("resized-imgW", imgW);
          path.data("resized-imgH", imgH);
          path.css("background-size", imgW + "px " + imgH + "px");
      });
  }
  $(window).ready(backgroundResize);
  $(window).resize(backgroundResize);
  $(window).focus(backgroundResize);
  backgroundResize();

  function debounce () {
      var rtime;
      var timeout = false;
      var delta   = 200;

      $(this).resize(function() {
          rtime = new Date();
          if (timeout === false) {
              timeout = true;
              setTimeout(resizeEnd, delta);
          }
      });

      function resizeEnd() {
          if (new Date() - rtime < delta) {
              setTimeout(resizeEnd, delta);
          } else {
              timeout = false;

                          backgroundResize();

          }
      }
  }
    function appendVenueTablesDropdown() {
    	var venue_name = getParameter('nightclub');
        var venue_type = 'nightclubs';
        var $selectVenueTableType = $('.formOpen').find('.selectVenueTableType');

        if(!venue_name) {
          venue_name = getParameter('restaurant');
          venue_type = 'restaurants';
        }

        getVenueTables(venue_name, venue_type).done(function(response) {

            var venue_table_types = JSON.parse(response);

            $selectVenueTableType.empty();

            if (venue_table_types) {
                var listitems = '<option value="" selected="selected">-- Select Table --</option>';
                for(index in venue_table_types) {
                    var table = venue_table_types[index];
                    listitems += '<option value="' + table.name + '">' + table.name + '</option>';
                }
                if(listitems) {
                    $selectVenueTableType.html(listitems);
                }
            }
        });
        
        $('.selectRestaurant, .selectNightclub').change(function() {

            var $this = $(this);
            var $selectVenueTableType = $this.parents('.nf-form-content').find('.selectVenueTableType');

            var venue_type = ($this.hasClass('selectRestaurant')) ? 'restaurants' : 'nightclubs';

            getVenueTables($this.find(':selected').data('slug'), venue_type).done(function(response) {

                var venue_table_types = JSON.parse(response);

                $selectVenueTableType.empty();

                if (venue_table_types) {
                    var listitems = '<option value="" selected="selected">-- Select Table --</option>';
                    for(index in venue_table_types) {
                        var table = venue_table_types[index];
                        listitems += '<option value="' + table.name + '">' + table.name + '</option>';
                    }
                    if(listitems) {
                        $selectVenueTableType.html(listitems);
                    }
                }
            });
        });
    }
    function getVenueTables(venue_name, venue_type) {

        return $.ajax({
            type: "POST",
            url: ajax_obj.ajax_url,
            data: {
                action :'get_venue_tables',
                venue_name : venue_name,
                venue_type: venue_type
            }
        });
    }
    function setVenueSelectOptionsValues() {
        $('.selectVenue option').each(function(index) {
            var $this = $(this);
            if (index !== 0) {
                $this.data("slug", $this.val());
                $this.val($this.text());
            }
        });
    }
    function getParameter(theParameter) {
      var params = window.location.search.substr(1).split('&');

      for (var i = 0; i < params.length; i++) {
        var p=params[i].split('=');
    	if (p[0] == theParameter) {
    	  return decodeURIComponent(p[1]);
    	}
      }
      return false;
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day, month, year].join('/');
    }

    function preselectNightclub() {
        var nightclub = getParameter('nightclub');
        var eventDate = getParameter('date');

        if(nightclub) {
            $('.selectNightclub').val(nightclub);
        }

        if(eventDate) {
            $('.dateNightclubEvent').val(formatDate(eventDate));
        }

    }

    function arrowDownFp(){
      var $arrow = $('.arrow-down-fp');
      $arrow.on('click touch', function(){
        $('html, body').animate({
            scrollTop: $(".weekSchedule").offset().top - 90
        }, 1000);
      })
    }

    function arrowDownNormal(){
      var $arrow = $('.arrow-down-normal');
      $arrow.on('click touch', function(){
        $('html, body').animate({
            scrollTop: $(".contentPage").offset().top - 90
        }, 1000);
      })
    }

    function arrowUpFp(){
      var $arrow = $('.arrow-up-fp');
      if ($arrow.length) {
          var scrollTrigger = 2200, // px
              backToTop = function () {
                  var scrollTop = $(window).scrollTop();
                  if (scrollTop > scrollTrigger) {
                      $arrow.addClass('show');
                  } else {
                      $arrow.removeClass('show');
                  }
              };
          backToTop();
          $(window).on('scroll', function () {
              backToTop();
          });
          $arrow.on('click', function (e) {
              e.preventDefault();
              $('html,body').animate({
                  scrollTop: 0
              }, 1000);
          });
      }
    }


    function stickyBlog(){
      $(".widget-area").stick_in_parent({
        offset_top: 90
      }
      );
    }

    function eventsHP(){
      var $activeDayButton = $('.weekSchedule__days .day');
      $activeDayButton.on('click touch', function(){
        var $this = $(this);
        $this.siblings('div').removeClass('active');
        $this.addClass('active');
        if($this.hasClass('active')){
                $('.eventSchedule').removeClass('animated zoomIn active');
                $('.scheduled4-'+ $this.attr("data-scheduled4")).addClass('animated tada active');
        }
      });
    }
    function buttonActive(){
      var $buttonNightClub = $('#nightclub');
      var $buttonRestaurant = $('#restaurant');
      var $buttonCityTour = $('#citytour');
      var $nightclubForm = $('#nf-form-3-cont');
      var $restaurantForm = $('#nf-form-4-cont');
      var $citytourForm = $('#nf-form-5-cont');
      $buttonNightClub.addClass('buttonActive');
      $nightclubForm.addClass('formOpen');
      $buttonNightClub.on('click touch', function(){
        $(this).siblings('button').removeClass('buttonActive');
        $(this).addClass('buttonActive');
        $citytourForm.removeClass('formOpen');
        $restaurantForm.removeClass('formOpen');
        $nightclubForm.addClass('formOpen animate-faster fadeIn');
      });
      $buttonRestaurant.on('click touch', function(){
        $(this).siblings('button').removeClass('buttonActive');
        $(this).addClass('buttonActive');
        $nightclubForm.removeClass('formOpen');
        $citytourForm.removeClass('formOpen');
        $restaurantForm.addClass('formOpen animate-faster fadeIn');
      });
      $buttonCityTour.on('click touch', function(){
        $(this).siblings('button').removeClass('buttonActive');
        $(this).addClass('buttonActive');
        $nightclubForm.removeClass('formOpen');
        $restaurantForm.removeClass('formOpen');
        $citytourForm.addClass('formOpen animate-faster fadeIn');
      });
    }
    function waypointHP(){

    $('.latestArticles__list').waypoint(function() {
        $('.latestArticles__list').addClass('triggered');
    }, { offset: '70%' });
    }
    function lineSingle(){

      var line = $('.single-nightclubs .contentPage').width();
      var lineRestaurants = $('.single-restaurants .contentPage').width();


      var $lineRight = $('.single-nightclubs .contentPage .lineFirst');
      var $lineRestaurants = $('.single-restaurants .contentPage .lineFirst');


      var title = $('.single-nightclubs .contentPage h2').width();
      var titleRestaurants = $('.single-restaurants .contentPage h2').width();

      var $lineWidth = line - title;
      var $lineWidthRestaurants = lineRestaurants - titleRestaurants;

      $lineRight.css('right', "-" + $lineWidth + 'px');
      $lineRestaurants.css('right', "-" + $lineWidthRestaurants + 'px');
    }
    /**
     * StickyHeader
     */
     function initStickyHeader() {
     $(window).scroll(function() {
        if ($(this).scrollTop() > $('.header').height() - 700){
            $('#site-navigation').addClass("sticky");
          }
          else{
            $('#site-navigation').removeClass("sticky");
          }
        });
      };
     function disableAuthorLink() {
         $(document).on('click', '.author > a', function(event) {
             event.preventDefault();
         });
     }
    function ready() {
        setTimeout(function() {
            preselectNightclub();
            appendVenueTablesDropdown();
            setVenueSelectOptionsValues();
        }, 1000);
        arrowDownFp();
        arrowDownNormal();
        arrowUpFp();
        initStickyHeader();
        buttonActive();
        eventsHP();
        stickyBlog();
        waypointHP();
        lineSingle();
        menuMobile()
        disableAuthorLink();
    }

    return {
        ready: ready
    };

})(jQuery);

jQuery(BH.ready());
