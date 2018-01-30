function ai_insert (insertion, selector, insertion_code) {
  jQuery (selector).each (function (index, element) {

    if (typeof jQuery(this).attr ('id') != 'undefined') {
      selector_string = '#' + jQuery(this).attr ('id');
    } else
    if (typeof jQuery(this).attr ('class') != 'undefined') {
      selector_string = '.' + jQuery(this).attr ('class').replace (' ', '.');
    } else
    selector_string = '';

    var insertion_function = insertion;
    var ai_code = jQuery (insertion_code);

    jQuery ('.ai-selector-counter', ai_code).text (index + 1);
    jQuery ('.ai-debug-name.ai-main', ai_code).text (insertion.toUpperCase () + ' ' + jQuery(this).prop ('tagName').toLowerCase() + selector_string);

    jQuery(this)[insertion_function] (ai_code);
  });
}

function ai_insert_viewport (element) {

  var ai_debug = typeof ai_debugging !== 'undefined';

  if (ai_debug) console.log ('AI VIEWPORT INSERTION: class', element.attr ('class'));

  var visible = element.is(':visible');
  var block   = element.data ('block');

  if (visible) {
    var insertion_code = element.data ('code');
    var insertion_type = element.data ('insertion');
    var selector       = element.data ('selector');

    if (typeof insertion_code != 'undefined') {
      if (typeof insertion_type != 'undefined' && typeof selector != 'undefined') {

        var selector_exists = jQuery (selector).length
        if (ai_debug) console.log ('AI VIEWPORT VISIBLE: block', block, insertion_type, selector, selector_exists ? '' : 'NOT FOUND');

        ai_insert (insertion_type, selector, atob (insertion_code));
        if (selector_exists) element.removeClass ('ai-viewports');
      } else {

          if (ai_debug) console.log ('AI VIEWPORT VISIBLE: block', block);

          var ai_code = jQuery(atob (insertion_code));
          element.after (ai_code);
          element.removeClass ('ai-viewports');
        }
    }
  } else {
      if (ai_debug) console.log ('AI VIEWPORT NOT VISIBLE: block', block);

      var debug_bar = element.prev ();
      if (debug_bar.hasClass ('ai-debug-bar') && debug_bar.hasClass ('ai-debug-script')) {
        debug_bar.removeClass ('ai-debug-script')
        debug_bar.addClass ('ai-debug-viewport-invisible')
      }
    }
}

(function($){
  // Insert remaining elements that depend on viewports
  $(document).ready (function() {
    $('.ai-viewports').each (function (index, element) {
      ai_insert_viewport ($(this));
    });
  });
})(jQuery);
