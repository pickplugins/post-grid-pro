
const { addFilter } = wp.hooks;


/*

link To Arguments
*/

let imageFilterArgsPro = [

    { label: 'Blur', value: 'blur', val: '', unit: 'px' },
    { label: 'Brightness', value: 'brightness', val: '10', unit: '%' },
    { label: 'Contrast', value: 'contrast', val: '10', unit: '%' },
    { label: 'Grayscale', value: 'grayscale', val: '10', unit: '%' },
    { label: 'Hue-rotate', value: 'hue-rotate', val: '10', unit: 'deg' },
    { label: 'Invert', value: 'invert', val: '10', unit: '%' },
    { label: 'Opacity', value: 'opacity', val: '10', unit: '%' },
    { label: 'Saturate', value: 'saturate', val: '10', unit: '%' },
    { label: 'Sepia', value: 'sepia', val: '10', unit: '%' },

];

addFilter('imageFilterArgs', 'post-grid/imageFilterArgs', function (options) {

    return imageFilterArgsPro;
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