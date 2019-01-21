var configurator = {
    add: function(element, name){
        element = $(element);
        //if (name == undefined) {
        //    this.showNameInputDialog(element);
        //} else {
            var prototype = element.data('prototype');
            var idSearch = element.attr('id');
            var totalItems = 0;
            $('div').each(function () {
                var id = $(this).attr('id');
                var match = idSearch + '\_[0-9]*$';
                if (id != undefined) {
                    if (idSearch.indexOf('fieldDefinition') > -1) {
                        var definition = id.match(match);
                        if (null !== definition) {
                            match = definition[0] + '[\_0-9a-zA-Z]*';
                            totalItems = $('#' + definition[0]).find('input,select').length / 2;
                            return 0;
                        }
                    }
                    if (id.match(match)) {
                        totalItems++;
                    }
                }
            });

            prototype = prototype.replace(/__name__/g, totalItems);
            prototype = prototype.replace(/[0-9]{1,2}\]\[key\]/g, totalItems+'][field][key]');
            prototype = prototype.replace(/[0-9]{1,2}\]\[value\]/g, totalItems+'][field][value]');
            prototype = prototype.replace(/[0-9]{1,2}\]\[type\]/g, totalItems+'][field][type]');
            prototype = prototype.replace(/[0-9]{1,2}\]\[description\]/g, totalItems+'][field][description]');
            var mainElement = element.parent();
            /*if (null === elementContainer) {
                elementContainer = $('<div></div>');
                mainElement.prepend(elementContainer);
            }*/
            prototype = '<div class="panel-body" style="border: 1px solid #CCC; margin-top: 30px;">' +
                '<a href="javascript:void(0);" onclick="configurator.remove(this)" style="position: relative; top: -25px; right: -100.5%; background: #FFF;">' +
                '<span class="glyphicon glyphicon-remove-circle"></span>' +
                '</a>'
                    + prototype +
                '</div>';

            mainElement.after(prototype);

        //}
    },
    showNameInputDialog: function(element) {
        var name = prompt('Selecciona la clave del nuevo elemento');
        if (null !== name && name.match('[a-zA-Z\_]*')) {
            this.add(element, name);
        } else {
            alert('El nombre no puede estar vacío y solamente puede contener mayusculas, minusculas y guión bajo(_)');
        }
    },
    remove: function(element){
        $(element).parent().remove();
    }
};