
const { addFilter } = wp.hooks;


/*

link To Arguments
*/

const metaKeyTypeArgsPro = {
    string: { label: 'String', value: 'string', },
    object: { label: 'Object', value: 'object', },
    array: { label: 'Array', value: 'array', },

    acfText: { label: 'ACF Text', value: 'acfText', },
    acfTextarea: { label: 'ACF Textarea', value: 'acfTextarea', },
    acfNumber: { label: 'ACF Number', value: 'acfNumber', },
    acfRange: { label: 'ACF Range', value: 'acfRange', },
    acfEmail: { label: 'ACF Email', value: 'acfEmail', },
    acfUrl: { label: 'ACF URL', value: 'acfUrl', },
    acfPassword: { label: 'ACF Password', value: 'acfPassword', },
    //acfWysiwyg: { label: 'ACF WYSIWYG', value: 'acfWysiwyg',  },


    acfSelect: { label: 'ACF Select', value: 'acfSelect', },
    acfCheckbox: { label: 'ACF Checkbox', value: 'acfCheckbox', },
    acfRadio: { label: 'ACF Radio', value: 'acfRadio', },

    acfImage: { label: 'ACF Image', value: 'acfImage', },
    acfFile: { label: 'ACF File', value: 'acfFile', },
    acfTaxonomy: { label: 'ACF Taxonomy', value: 'acfTaxonomy', },
    acfPostObject: { label: 'ACF Post Object', value: 'acfPostObject', },
    acfPageLink: { label: 'ACF Page Link', value: 'acfPageLink', },
    acfLink: { label: 'ACF Link', value: 'acfLink', },
    acfUser: { label: 'ACF User', value: 'acfUser', },
    acfButtonGroup: { label: 'ACF Button Group', value: 'acfButtonGroup', },
    // acfBoolen: { label: 'ACF Boolen', value: 'acfBoolen',  },
    // acfTimePicker: { label: 'ACF TimePicker', value: 'acfTimePicker',  },
    // acfDatePicker: { label: 'ACF DatePicker', value: 'acfDatePicker',  },
    // acfDateTimePicker: { label: 'ACF DateTimePicker', value: 'acfDateTimePicker',  },
    // acfColorPicker: { label: 'ACF ColorPicker', value: 'acfColorPicker',  },
    // acfGoogleMap: { label: 'ACF Google Map', value: 'acfGoogleMap',  },
};

addFilter('metaKeyTypeArgs', 'post-grid/metaKeyTypeArgs', function (options) {

    return metaKeyTypeArgsPro;
});





/*

link To Arguments
*/

const limitByArgsPro = {
    'none': { label: 'Choose..', value: '' },
    word: { label: 'Word', value: 'word' },
    character: { label: 'Character', value: 'character' },
};

addFilter('limitByArgs', 'post-grid/post-title/limitByArgs', function (options) {

    return limitByArgsPro;
});