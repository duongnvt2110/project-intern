/*!
 * Bootstrap Confirmation1
 * Copyright 2013 Nimit Suwannagate <ethaizone@hotmail.com>
 * Copyright 2014-2016 Damien "Mistic" Sorel <http://www.strangeplanet.fr>
 * Licensed under the Apache License, Version 2.0 (the "License")
 */

(function ($) {
  'use strict';

  // Confirmation1 extends popover.js
  if (!$.fn.popover) throw new Error('Confirmation1 requires popover.js');

  // Confirmation1 PUBLIC CLASS DEFINITION
  // ===============================
  var Confirmation11 = function (element, options) {
    options.trigger = 'click';

    this.init('Confirmation1', element, options);

    // keep trace of selectors
    this.options._isDelegate = false;
    if (options.selector) { // container of buttons
      this.options._selector = this._options._selector = options._root_selector +' '+ options.selector;
    }
    else if (options._selector) { // children of container
      this.options._selector = options._selector;
      this.options._isDelegate = true;
    }
    else { // standalone
      this.options._selector = options._root_selector;
    }

    var that = this;

    if (!this.options.selector) {
      // store copied attributes
      this.options._attributes = {};
      if (this.options.copyAttributes) {
        if (typeof this.options.copyAttributes === 'string') {
          this.options.copyAttributes = this.options.copyAttributes.split(' ');
        }
      }
      else {
        this.options.copyAttributes = [];
      }

      this.options.copyAttributes.forEach(function(attr) {
        this.options._attributes[attr] = this.$element.attr(attr);
      }, this);

      // cancel original event
      this.$element.on(that.options.trigger, function(e, ack) {
        if (!ack) {
          e.preventDefault();
          e.stopPropagation();
          e.stopImmediatePropagation();
        }
      });

      // manage singleton
      this.$element.on('show.bs.Confirmation1', function(e) {
        if (that.options.singleton) {
          // close all other popover already initialized
          $(that.options._selector).not($(this)).filter(function() {
            return $(this).data('bs.Confirmation1') !== undefined;
          }).Confirmation1('hide');
        }
      });
    }

    if (!this.options._isDelegate) {
      // manage popout
      this.eventBody = false;
      this.uid = this.$element[0].id || this.getUID('group_');

      this.$element.on('shown.bs.Confirmation1', function(e) {
        if (that.options.popout && !that.eventBody) {
          var $this = $(this);
          that.eventBody = $('body').on('click.bs.Confirmation1.'+that.uid, function(e) {
            if ($(that.options._selector).is(e.target)) {
              return;
            }

            // close all popover already initialized
            $(that.options._selector).filter(function() {
              return $(this).data('bs.Confirmation1') !== undefined;
            }).Confirmation1('hide');

            $('body').off('click.bs.'+that.uid);
            that.eventBody = false;
          });
        }
      });
    }
  };

  Confirmation1.DEFAULTS = $.extend({}, $.fn.popover.Constructor.DEFAULTS, {
    placement: 'top',
    title: 'Are you sure?',
    html: true,
    popout: false,
    singleton: false,
    copyAttributes: 'href target',
    template:
      '<div class="popover Confirmation1">' +
        '<div class="arrow"></div>' +
        '<h3 class="popover-title"></h3>' +
        '<div class="popover-content text-center">'+
          '<div class="btn-group">'+
            '<a class="btn" data-apply="Confirmation1"></a>'+
            '<a class="btn" data-dismiss="Confirmation1"></a>'+
          '</div>'+
        '</div>'+
      '</div>'
  });

  Confirmation1.prototype = $.extend({}, $.fn.popover.Constructor.prototype);

  Confirmation1.prototype.constructor = Confirmation1;

  Confirmation1.prototype.getDefaults = function () {
    return Confirmation1.DEFAULTS;
  };

  Confirmation1.prototype.setContent = function () {
    var that = this,
        $tip = this.tip(),
        o = this.options;

    $tip.find('.popover-title')[o.html ? 'html' : 'text'](this.getTitle());

    // configure 'ok' button
    $tip.find('[data-apply="Confirmation1"]')
      .addClass(o.btnOkClass)
      .html(o.btnOkLabel)
      .attr(this.options._attributes)
      .prepend($('<i></i>').addClass(o.btnOkIcon), ' ')
      .off('click')
      .one('click', function(e) {
        that.getOnConfirm.call(that).call(that.$element);
        that.$element.trigger('confirmed.bs.Confirmation1');
        that.$element.trigger(that.options.trigger, [true]);
        that.$element.Confirmation1('hide');
      });

    // configure 'cancel' button
    $tip.find('[data-dismiss="Confirmation1"]')
      .addClass(o.btnCancelClass)
      .html(o.btnCancelLabel)
      .prepend($('<i></i>').addClass(o.btnCancelIcon), ' ')
      .off('click')
      .one('click', function(e) {
        that.getOnCancel.call(that).call(that.$element);
        if (that.inState) that.inState.click = false; // Bootstrap 3.3.5
        that.$element.trigger('canceled.bs.Confirmation1');
        that.$element.Confirmation1('hide');
      });

    $tip.removeClass('fade top bottom left right in');

    // IE8 doesn't accept hiding via the `:empty` pseudo selector, we have to do
    // this manually by checking the contents.
    if (!$tip.find('.popover-title').html()) {
      $tip.find('.popover-title').hide();
    }
  };

  Confirmation1.prototype.getOnConfirm = function() {
    if (this.$element.attr('data-on-confirm')) {
      return getFunctionFromString(this.$element.attr('data-on-confirm'));
    }
    else {
      return this.options.onConfirm;
    }
  };

  Confirmation1.prototype.getOnCancel = function() {
    if (this.$element.attr('data-on-cancel')) {
      return getFunctionFromString(this.$element.attr('data-on-cancel'));
    }
    else {
      return this.options.onCancel;
    }
  };

  /*
   * Generates an anonymous function from a function name
   * function name may contain dots (.) to navigate through objects
   * root context is window
   */
  function getFunctionFromString(functionName) {
    var context = window,
        namespaces = functionName.split('.'),
        func = namespaces.pop();

    for (var i=0, l=namespaces.length; i<l; i++) {
      context = context[namespaces[i]];
    }

    return function() {
      context[func].call(this);
    };
  }


  // Confirmation1 PLUGIN DEFINITION
  // =========================

  var old = $.fn.Confirmation1;

  $.fn.Confirmation1 = function (option) {
    var options = (typeof option == 'object' && option) || {};
    options._root_selector = this.selector;

    return this.each(function () {
      var $this = $(this),
          data  = $this.data('bs.Confirmation1');

      if (!data && option == 'destroy') {
        return;
      }
      if (!data) {
        $this.data('bs.Confirmation1', (data = new Confirmation1(this, options)));
      }
      if (typeof option == 'string') {
        data[option]();
        
        if (option == 'hide' && data.inState) { //data.inState doesn't exist in Bootstrap < 3.3.5
          data.inState.click = false;
        }
      }
    });
  };

  $.fn.Confirmation1.Constructor = Confirmation1;


  // Confirmation1 NO CONFLICT
  // ===================

  $.fn.Confirmation1.noConflict = function () {
    $.fn.Confirmation1 = old;
    return this;
  };

}(jQuery));
