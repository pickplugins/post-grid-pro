
const { addFilter } = wp.hooks;








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