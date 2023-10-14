
const { addFilter } = wp.hooks;


/*

icon Positon Args
*/

const iconPositonArgsPro = {
    none: { label: 'Choose Position', value: '' },
    beforeFronttext: { label: 'Before Front text', value: 'beforeFronttext' },
    afterFronttext: { label: 'After Front text', value: 'afterFronttext' },
    beforeItems: { label: 'Before Items', value: 'beforeItems' },
    afterItems: { label: 'After Items', value: 'afterItems' },
    beforeItem: { label: 'Before Each Items', value: 'beforeItem' },
    afterItem: { label: 'After Each Items', value: 'afterItem' },
};

addFilter('iconPositonArgs', 'post-grid/iconPositonArgs', function (options) {

    return iconPositonArgsPro;
});




