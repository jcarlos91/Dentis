/**
 * Created by jcruz on 06/11/15.
 */

var overlay = function(container, options) {
    this.$container = container;
    this.options = options;
    if(this.$container.length > 0) {
        this.init();
    }
};

overlay.prototype = {
    defaults: {
        message: 'Cargando...'
    },
    init: function(){
        this.config = $.extend({}, this.defaults, this.options);
        this.overlayElement = this.$container;
    },
    show: function (message) {
        if (undefined == message) {
            message = this.config.message;
        }
        this.overlayElement.find('#overlayMessage').html(message);
        this.overlayElement.show();
    },
    hide: function () {
        $(this.overlayElement).hide();
    }
};


$(function(){
    var __overlayCircle =
        '<style>.sk-circle{top: 40%; position: relative;} .sk-circle .sk-child:before {background: #FFF}</style>' +
        '<div id="body-overlay" style="background: rgb(51, 51, 51); width: 100%; height: 100%; position: fixed; top: 0; opacity: .9; z-index: 1000; bottom: 0; text-align: center; display: none">' +
        '<div class="sk-circle">' +
        '<div class="sk-circle1 sk-child"></div>' +
        '<div class="sk-circle2 sk-child"></div>' +
        '<div class="sk-circle3 sk-child"></div>' +
        '<div class="sk-circle4 sk-child"></div>' +
        '<div class="sk-circle5 sk-child"></div>' +
        '<div class="sk-circle6 sk-child"></div>' +
        '<div class="sk-circle7 sk-child"></div>' +
        '<div class="sk-circle8 sk-child"></div>' +
        '<div class="sk-circle9 sk-child"></div>' +
        '<div class="sk-circle10 sk-child"></div>' +
        '<div class="sk-circle11 sk-child"></div>' +
        '<div class="sk-circle12 sk-child"></div>' +
        '</div>' +
        '<div id="overlayMessage" style="color:#FFF;position: fixed;top: 55%;width: 100%;"></div>' +
        '</div>';

    $('body').append(__overlayCircle);
    var bodyOverlay = new overlay($("#body-overlay"));

    $('.use-body-overlay').on('click', function(e){
        //var elementType = $(this).get(0).tagName.toLowerCase();
        //if (elementType == 'a') {
        //    var href = $(this).prop('href');
        //    if (href == '#' || href == 'javascript:void(0);' || href == 'void(0);' || href.indexOf('#') != -1) {
        //        return;
        //    }
        //}
        //if ($(this).data('modal') || $(this).data('toggle')) {
        //    return;
        //}
        //
        //if (elementType == 'button' || elementType == 'input' && $(this).attr('type') == 'submit') {
        //    return;
        //}
        var message = '';
        if ($(this).data('overlay-message')) {
            message = $(this).data('overlay-message');
        }
        if(($(this).is('button') || $(this).is('input')) && $(this).attr('type') == 'submit') {
            var form = $(this).closest('form');
            if (form[0].checkValidity()) {
                bodyOverlay.show(message);
            }
        } else {
            bodyOverlay.show(message);
        }
    });

    //$('form').each(function(key, form){
    //    $(form).on('submit', function(e) {
    //        if ($(this)[0].checkValidity()) {
    //            //overlay.show();
    //        }
    //    });
    //
    //});

    $('div.modal-pasoc').attrchange({
        trackValues: true,
        callback: function (event) {
            if (event.newValue == 'display: none;') {
                bodyOverlay.hide();
            }
        }
    });
});


