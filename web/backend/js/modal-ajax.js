/**
 * Created by jchr on 25/03/15.
 */
+function ($) {
    'use strict';

    // Modal Ajax
    var D  = $(document),
        MA = $.modalAjax = function () {};

    // Default options
    MA.DEFAULTS = {
        loading        : '<div id="modal-ajax-loading"><div></div></div>',
        error          : '<h4 class="text-center text-danger"><strong>{status}</strong> {statusText}</h4>',
        modal          : '#modal-ajax',
        replaceContent : true,
        method         : 'GET',
        data           : null
    };

    // Extend function
    $.extend(MA, {
        // Loader
        ajaxLoad: null,

        // Ajax load
        load: function (opts) {
            var options = $.extend({}, MA.DEFAULTS, opts);
            var $modal = $(options.modal);
            var $content = options.replaceContent ? $modal.find('.modal-content') : $modal;

            MA.cancel();

            // Validate modal
            if ($modal.length === 0) {
                alert('El modal no existe');
                return false;
            } else if ($content.length === 0) {
                alert('El contenido del modal no existe');
                return false;
            }

            // Validate url
            if (!options.url) {
                alert('La url no está definida');
                return false;
            }

            MA.showLoading();

            MA.ajaxLoad = $.ajax({
                url: options.url,
                error: function (jqXHR, textStatus) {
                    if (textStatus !== 'abort') {
                        $content.html(options.error.replace('{status}', jqXHR.status).replace('{statusText}', jqXHR.statusText));
                        $modal.modal('show');
                        MA.hideLoading();
                    }
                },
                success: function (data) {
                    $content.html(data);
                    $modal.modal('show');
                    MA.hideLoading();
                }
            });
        },

        // Cancel loading
        cancel: function () {
            MA.hideLoading();

            if (MA.ajaxLoad) {
                MA.ajaxLoad.abort();
            }

            MA.ajaxLoad = null;
        },

        // Show loading
        showLoading: function() {
            MA.hideLoading();

            $(MA.DEFAULTS.loading).click(MA.cancel).appendTo('body');

            // If user will press the escape-button, the request will be canceled
            D.bind('keydown.loading', function(e) {
                if ((e.which || e.keyCode) === 27) {
                    e.preventDefault();

                    MA.cancel();
                }
            });
        },

        // Hide loading
        hideLoading: function () {
            $('#modal-ajax-loading').remove();
        }
    });

    // jQuery plugin initialization
    $.fn.modalAjax = function (options) {
        return this.each(function () {
            var $this = $(this);
            var href  = $this.data('target') || $this.attr('href');
            var opts = $.extend({}, MA.DEFAULTS, options, {url: href});

            if ($this.data('modal')) opts.modal = $this.data('modal');

            // Click event
            $this.on('click', function (event) {
                event.preventDefault();

                MA.load(opts);
            });
        });
    };

}(jQuery);
