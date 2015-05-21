// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.Wptuts', {
        init : function(ed, url) {
            ed.addButton('fancybutton', {
                title : 'Add fancy buttons to editor',
                cmd : 'fancybutton',
                image : url + '/recent.jpg'
            });
 
            ed.addCommand('fancybutton', function() {
                var number = prompt("How many posts you want to show ? "),
                    shortcode;
                if (number !== null) {
                    number = parseInt(number);
                    if (number > 0 && number <= 20) {
                        shortcode = '[recent-post number="' + number + '"/]';
                        ed.execCommand('mceInsertContent', 0, shortcode);
                    }
                    else {
                        alert("The number value is invalid. It should be from 0 to 20.");
                    }
                }
            });
        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'wptuts', tinymce.plugins.Wptuts );
})();