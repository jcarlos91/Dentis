(function($){
    $.fn.numericPad = function(options) {
        var that = this;
        this.settings = $.extend(
            {
                length: 6,
                padCharacter: '0',
                padPosition: 'LEFT'
            },
            options);
        $(this).on('keydown', function(e){
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
            key == 8 ||
            key == 9 ||
            key == 13 ||
            key == 46 ||
            //key == 110 ||
            key == 190 ||
            (key >= 35 && key <= 40) ||
            (key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105));
        });

        $(this).on('change', function(e){
            var number = $(this).val();
            if(that.settings.padPosition == 'LEFT') {
                pad = Array(Math.max(that.settings.length - String(number).length + 1, 0)).join(that.settings.padCharacter) + number;
            }

            if(that.settings.padPosition == 'RIGHT') {
                pad = number + Array(Math.max(that.settings.length - String(number).length + 1, 0)).join(that.settings.padCharacter);
            }
            if($(this).val() != '') {
                $(this).val(pad);
            }
        });
    }
}(jQuery));