$(document).ready( function () {
    'use strict';
    var guitarList = ['Baldwin', 'Charvel', 'Columbus', 'Cort', 'Fender', 'Gibson'];
    $('#guitars').autocomplete({
        source: guitarList,
        select: function(event, ui) {
			console.log(event);
            console.log(ui);
            $('#chosenGuitars').append(ui.item.value + "\n"); 
        }
    });
});
