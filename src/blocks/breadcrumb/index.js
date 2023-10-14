
const { addFilter } = wp.hooks;


/*

link To Arguments
*/

const linkElementsArgsPro = [


    {
        id: 'text', label: 'Text', customText: 'You are here: ', url: '',

        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            text: 'You are here: ',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },


    {
        id: 'homePage', label: 'Home Page Link', customText: '%s', url: '',

        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },

    {
        id: 'frontPage', label: 'Front Page Link', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },

    {
        id: 'postsPage', label: 'Posts Page Link', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },

    {
        id: 'postTitle', label: 'Post Title', customText: '%s', url: '',

        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postAuthor', label: 'Post Author', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },


    {
        id: 'postDate', label: 'Post Date', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            format: 'Y-m-d',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postDay', label: 'Post Day', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            format: '',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postMonth', label: 'Post Month', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            format: '',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },

    {
        id: 'postYear', label: 'Post Year', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            format: '',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postAncestors', label: 'Post Ancestors', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
            count: '',
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postId', label: 'Post Id', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postCategory', label: 'Post Category', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postTag', label: 'Post Tag', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },
    {
        id: 'postCategories', label: 'Post Categories', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
            maxCount: 3,

        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'postTags', label: 'Post Tags', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
            maxCount: 3,

        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },


    {
        id: 'postTerm', label: 'Post Term', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            taxonomy: '',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },

    {
        id: 'postTerms', label: 'Post Terms', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            taxonomy: '',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },




    {
        id: 'termTitle', label: 'Term Title', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'termParents', label: 'Term Parents', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
            count: 0,

        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },
    {
        id: 'termAncestors', label: 'Term Ancestors', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            taxonomy: '',
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },

    },


    {
        id: 'wcShop', label: 'WooCommerce Shop', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },
    {
        id: 'wcAccount', label: 'WooCommerce Account', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },
    {
        id: 'wcCart', label: 'WooCommerce Cart', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },
    {
        id: 'wcCheckout', label: 'WooCommerce Checkout', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },


    {
        id: 'searchText', label: 'Search Text', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },

    {
        id: 'archiveTitle', label: 'Archive Title', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },

    {
        id: '404Text', label: '404 Text', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },


    {
        id: 'dateText', label: 'Date Text', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
            format: 'Y-m-d',
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },
    {
        id: 'monthText', label: 'Month Text', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
            format: 'Y-m',
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },

    {
        id: 'yearText', label: 'Year Text', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
            format: 'Y',
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },

    {
        id: 'authorName', label: 'Author Name', customText: '%s', url: '',
        siteIcon: { library: 'fontAwesome', srcType: "class", /*class, html, img, svg */ iconSrc: '', },
        options: {
            showSeparator: true,
        },
        styles: {
            textAlign: {},
            color: {},
            bgColor: {},
            padding: {},
            margin: {},
            display: {},
        },
    },





];

addFilter('linkElementsArgs', 'post-grid/linkElementsArgs', function (options) {

    return linkElementsArgsPro;
});





