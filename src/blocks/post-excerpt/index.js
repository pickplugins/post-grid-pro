
const { addFilter } = wp.hooks;







/*

link To Arguments
*/

const excerptSourceArgsPro = {
    auto: { label: 'Auto', value: 'auto' },
    excerpt: { label: 'Excerpt', value: 'excerpt' },
    content: { label: 'Content', value: 'content' },
    meta: { label: 'Custom Fields', value: 'meta' },
};

addFilter('excerptSourceArgs', 'post-grid/post-title/excerptSourceArgs', function (options) {

    return excerptSourceArgsPro;
});