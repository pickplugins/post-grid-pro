const { addFilter } = wp.hooks;

/*

Query Parameters

*/

const queryPramsPro = {
	postType: {
		value: ["post"],
		multiple: false,
		id: "postType",
		label: "Post types",
		description: "Select Post Types to Query",
	},
	s: {
		value: "",
		multiple: false,
		id: "s",
		label: "Keyword",
		description: "Search keyword, ex: hello",
	},
	postStatus: {
		value: [],
		multiple: false,
		id: "postStatus",
		label: "Post status",
		description: "Query post by post status",
	},
	order: {
		value: "",
		multiple: false,
		id: "order",
		label: "Order",
		description: "Post query order",
	},
	orderby: {
		value: [],
		multiple: false,
		id: "orderby",
		label: "Orderby",
		description: "Post query orderby",
	},
	metaKey: {
		value: "",
		multiple: false,
		id: "metaKey",
		label: "Meta fields key",
		description: "Post query by meta fields key",
	},

	// Category Parameters
	cat: {
		value: "",
		multiple: false,
		id: "cat",
		label: "Category ID",
		description: "Post query by Category ID",
	},
	categoryName: {
		value: "",
		multiple: false,
		id: "categoryName",
		label: "Category Name",
		description: "Post query by Category Name",
	},
	categoryAnd: {
		value: [],
		multiple: false,
		id: "categoryAnd",
		label: "Category And",
		description: "Post query by Category IDs",
	},
	categoryIn: {
		value: [],
		multiple: false,
		id: "categoryIn",
		label: "Category In",
		description: "Post query by Category IDs",
	},
	categoryNotIn: {
		value: [],
		multiple: false,
		id: "categoryNotIn",
		label: "Category Not In",
		description: "Post query by excluded Category IDs",
	},

	// Tag Parameters

	tag: {
		val: "",
		multiple: false,
		id: "tag",
		label: "Tags",
		description: "Post query by Tag slug",
	},
	tagId: {
		val: "",
		multiple: false,
		id: "tagId",
		label: "Tag Id",
		description: "Post query by Tag ID",
	},
	tagAnd: {
		val: [],
		multiple: false,
		id: "tagAnd",
		label: "Tag And",
		description: "Post query by Tag Ids",
	},
	tagIn: {
		val: [],
		multiple: false,
		id: "tagIn",
		label: "Tag In",
		description: "Post query by Tag ids",
	},
	tagNotIn: {
		val: [],
		multiple: false,
		id: "tagNotIn",
		label: "Tag Not In",
		description: "Post query by excluded Tag ids",
	},
	tagSlugAnd: {
		val: [],
		multiple: false,
		id: "tagSlugAnd",
		label: "Tag Slug And",
		description: "Post query by Tags slug",
	},
	tagSlugIn: {
		val: [],
		multiple: false,
		id: "tagSlugIn",
		label: "Tag Slug In",
		description: "Post query by excluded Tags slug",
	},

	taxQuery: {
		val: [],
		multiple: false,
		id: "taxQuery",
		label: "Tax Query",
		description: "Taxonomies query arguments",
	},
	taxQueryRelation: {
		val: "OR",
		multiple: false,
		id: "taxQueryRelation",
		label: "Tax Query Relation",
		description: "Taxonomies query relation",
	},

	// // Date Parameters
	dateQuery: {
		val: [],
		multiple: false,
		id: "dateQuery",
		label: "Date Query",
		description: "Post query by date",
	},
	year: {
		val: "",
		multiple: false,
		id: "year",
		label: "Year",
		description: "Post query by year",
	},
	monthnum: {
		val: "",
		multiple: false,
		id: "monthnum",
		label: "Month",
		description: "Post query by month",
	},
	w: {
		val: "",
		multiple: false,
		id: "w",
		label: "Week",
		description: "Post query by week",
	},
	day: {
		val: "",
		multiple: false,
		id: "day",
		label: "Day",
		description: "Post query by day",
	},
	hour: {
		val: "",
		multiple: false,
		id: "hour",
		label: "Hour",
		description: "Post query by hour",
	},
	minute: {
		val: "",
		multiple: false,
		id: "minute",
		label: "Miniute",
		description: "Post query by miniute",
	},
	second: {
		val: "",
		multiple: false,
		id: "second",
		label: "Second",
		description: "Post query by second",
	},
	m: {
		val: "",
		multiple: false,
		id: "m",
		label: "Month",
		description: "Post query by month",
	},

	// // Author Parameters
	author: {
		val: "",
		multiple: false,
		id: "author",
		label: "Author",
		description: "Post query by Author ID",
	},
	authorName: {
		val: "",
		multiple: false,
		id: "authorName",
		label: "Author Name",
		description: "Post query by Author Name",
	},
	authorIn: {
		val: [],
		multiple: false,
		id: "authorIn",
		label: "Author In",
		description: "Post query by Author IDs",
	},
	authorNotIn: {
		val: [],
		multiple: false,
		id: "authorNotIn",
		label: "Author Not In",
		description: "Post query by exluded Author IDs",
	},

	p: {
		val: "",
		multiple: false,
		id: "p",
		label: "Post id",
		description: "Post query by single post id",
	},
	name: {
		val: "",
		multiple: false,
		id: "name",
		label: "Name",
		description: "Post query by post slug",
	},
	pageId: {
		val: "",
		multiple: false,
		id: "pageId",
		label: "Page Id",
		description: "Post query by single page id",
	},
	pagename: {
		val: "",
		multiple: false,
		id: "pagename",
		label: "Page name",
		description: "Post query by page slug",
	},
	postParent: {
		val: "",
		multiple: false,
		id: "postParent",
		label: "Post Parent",
		description: "Add '$id' to Post query by post parent id",
	},
	postParentIn: {
		val: [],
		multiple: false,
		id: "postParentIn",
		label: "Post Parent In",
		description: "Post query by post parent ids",
	},
	postParentNotIn: {
		val: [],
		multiple: false,
		id: "postParentNotIn",
		label: "Post Parent Not In",
		description: "Post query by excluded post parent ids",
	},
	postIn: {
		val: [],
		multiple: false,
		id: "postIn",
		label: "Post In",
		description: "Post query by multiple post ids, comma separated.",
	},
	postNotIn: {
		val: [],
		multiple: false,
		id: "postNotIn",
		label: "Post Not In",
		description: "Post query by excluded post ids",
	},
	postNameIn: {
		val: [{ slug: "" }],
		multiple: false,
		id: "postNameIn",
		label: "Post Name In",
		description: "Post query by post slugs",
	},

	hasPassword: {
		val: "",
		multiple: false,
		id: "hasPassword",
		label: "Has Password",
		description: "Post query for posts with passwords",
	},
	postPassword: {
		val: "",
		multiple: false,
		id: "postPassword",
		label: "Post Password",
		description: "Post query for posts with particular passwords",
	},

	commentCount: {
		val: { compare: "=" },
		multiple: false,
		id: "commentCount",
		label: "Comment Count",
		description: "Post query by comment count",
	},

	nopaging: {
		val: "",
		multiple: false,
		id: "nopaging",
		label: "No Paging",
		description: "Enable show all posts or use pagination",
	},
	postsPerPage: {
		val: "",
		multiple: false,
		id: "postsPerPage",
		label: "Posts Per Page",
		description: "Number of post to show per page",
	},
	paged: {
		val: "",
		multiple: false,
		id: "paged",
		label: "Paged",
		description: "Pagination start with",
	},
	offset: {
		val: "",
		multiple: false,
		id: "offset",
		label: "Offset",
		description: "Number of post to displace or pass over",
	},
	postsPerArchivePage: {
		val: "",
		multiple: false,
		id: "postsPerArchivePage",
		label: "Posts Per Archive Page",
		description: "",
	},
	ignoreStickyPosts: {
		val: "",
		multiple: false,
		id: "ignoreStickyPosts",
		label: "Ignore Sticky Posts",
		description: "Ignore post from post query",
	},

	metaKey: {
		val: "",
		multiple: false,
		id: "metaKey",
		label: "Meta Key",
		description: "Post query by custom field key",
	},
	metaValue: {
		val: "",
		multiple: false,
		id: "metaValue",
		label: "Meta Value",
		description: "Post query by custom field value",
	},
	metaValueNum: {
		val: "",
		multiple: false,
		id: "metaValueNum",
		label: "Meta Value Num",
		description: "Post query by custom field value for number types",
	},
	metaCompare: {
		val: "",
		multiple: false,
		id: "metaCompare",
		label: "Meta Compare",
		description: "Meta query compare",
	},
	metaQuery: {
		val: [],
		multiple: false,
		id: "metaQuery",
		label: "Meta Query",
		description: "Advance meta fields query",
	},

	perm: {
		val: "readable",
		multiple: false,
		id: "perm",
		label: "Perm",
		description: "User permission parameter",
	},
	postMimeType: {
		val: [],
		multiple: false,
		id: "postMimeType",
		label: "Post Mime Type",
		description: "Post query by allwed post mime types",
	},
	cacheResults: {
		val: false,
		multiple: false,
		id: "cacheResults",
		label: "Cache Results",
		description: "Enable Post information cache",
	},
	updatePostMetaCache: {
		val: false,
		multiple: false,
		id: "updatePostMetaCache",
		label: "Update Post Meta Cache",
		description: "Enable Post meta information cache",
	},
	updatePostTermCache: {
		val: false,
		multiple: false,
		id: "updatePostTermCache",
		label: "Update Post Term Cache",
		description: "Enable Post term information cache",
	},
};

addFilter("queryPrams", "post-grid/queryPrams", function (options) {
	return queryPramsPro;
});

// addFilter("cssProps", "post-grid/cssProps", function (options) {
// 	return cssPropsPro;
// });

/*

pagination Types
*/

const paginationTypesPro = {
	none: { label: "None", value: "none" },
	normal: { label: "Normal Pagination", value: "normal" },
	ajax: { label: "Ajax Pagination", value: "ajax" },
	next_previous: { label: "Next-Previous", value: "next_previous" },
	loadmore: { label: "Load More", value: "loadmore" },
	infinite: { label: "Infinite Load", value: "infinite" },
	filterable: { label: "Filterable", value: "filterable" },
};

addFilter("paginationTypes", "post-grid/paginationTypes", function (options) {
	return paginationTypesPro;
});

const gridLayoutsPro = [
	{
		thumb: "",
		title: "3 Col, 0 Gap",
		data: {
			options: {
				gridTemplateColumns: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				gridTemplateRows: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				colGap: { val: 1, unit: "em" },
				rowGap: { val: 1, unit: "em" },
				itemCss: [],
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: "1", unit: "fr" },
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: "0", unit: "em" },
					Mobile: { val: "0", unit: "em" },
					Tablet: { val: "0", unit: "em" },
				},
				rowGap: {
					Desktop: { val: "0", unit: "em" },
					Mobile: { val: "0", unit: "em" },
					Tablet: { val: "0", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},
		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect x="11.5" y="14.5" width="73.3231" height="91" stroke="black" />
				<path
					d="M25.0611 73.9162C25.0611 72.5868 26.1387 71.5092 27.468 71.5092H69.1885C70.5178 71.5092 71.5954 72.5868 71.5954 73.9162V73.9162C71.5954 75.2455 70.5178 76.3231 69.1885 76.3231H27.468C26.1387 76.3231 25.0611 75.2455 25.0611 73.9162V73.9162Z"
					fill="black"
				/>
				<path
					d="M25.0611 81.6184C25.0611 80.2891 26.1387 79.2115 27.468 79.2115H69.1885C70.5178 79.2115 71.5954 80.2891 71.5954 81.6184V81.6184C71.5954 82.9477 70.5178 84.0254 69.1885 84.0254H27.468C26.1387 84.0254 25.0611 82.9477 25.0611 81.6184V81.6184Z"
					fill="black"
				/>
				<path
					d="M25.0611 89.3206C25.0611 87.9913 26.1387 86.9137 27.468 86.9137H55.7663C57.0956 86.9137 58.1732 87.9913 58.1732 89.3206V89.3206C58.1732 90.65 57.0956 91.7276 55.7663 91.7276H27.468C26.1387 91.7276 25.0611 90.65 25.0611 89.3206V89.3206Z"
					fill="black"
				/>
				<path
					d="M20.2402 21.2314V65.1079H76.083V21.2314H20.2402ZM24.2289 25.2202H72.0942V52.9546L61.5613 42.3595L60.1279 40.926L51.0908 49.9631L39.6231 38.3707L38.1896 36.9372L24.2289 50.8979V25.2202ZM64.1167 29.209C61.9119 29.209 60.1279 30.993 60.1279 33.1978C60.1279 35.4025 61.9119 37.1865 64.1167 37.1865C66.3214 37.1865 68.1054 35.4025 68.1054 33.1978C68.1054 30.993 66.3214 29.209 64.1167 29.209ZM38.1896 42.6088L56.5131 61.1192H24.2289V56.5695L38.1896 42.6088ZM60.1279 46.5975L72.0942 58.5638V61.1192H62.1846L53.8954 52.7677L60.1279 46.5975Z"
					fill="black"
				/>
				<rect x="85.4359" y="14.5" width="73.3231" height="91" stroke="black" />
				<path
					d="M98.9971 73.9162C98.9971 72.5868 100.075 71.5092 101.404 71.5092H143.124C144.454 71.5092 145.531 72.5868 145.531 73.9162V73.9162C145.531 75.2455 144.454 76.3231 143.124 76.3231H101.404C100.075 76.3231 98.9971 75.2455 98.9971 73.9162V73.9162Z"
					fill="black"
				/>
				<path
					d="M98.9971 81.6184C98.9971 80.2891 100.075 79.2115 101.404 79.2115H143.124C144.454 79.2115 145.531 80.2891 145.531 81.6184V81.6184C145.531 82.9477 144.454 84.0254 143.124 84.0254H101.404C100.075 84.0254 98.9971 82.9477 98.9971 81.6184V81.6184Z"
					fill="black"
				/>
				<path
					d="M98.9971 89.3206C98.9971 87.9913 100.075 86.9137 101.404 86.9137H129.702C131.032 86.9137 132.109 87.9913 132.109 89.3206V89.3206C132.109 90.65 131.032 91.7276 129.702 91.7276H101.404C100.075 91.7276 98.9971 90.65 98.9971 89.3206V89.3206Z"
					fill="black"
				/>
				<path
					d="M94.1761 21.2314V65.1079H150.019V21.2314H94.1761ZM98.1649 25.2202H146.03V52.9546L135.497 42.3595L134.064 40.926L125.027 49.9631L113.559 38.3707L112.126 36.9372L98.1649 50.8979V25.2202ZM138.053 29.209C135.848 29.209 134.064 30.993 134.064 33.1978C134.064 35.4025 135.848 37.1865 138.053 37.1865C140.257 37.1865 142.041 35.4025 142.041 33.1978C142.041 30.993 140.257 29.209 138.053 29.209ZM112.126 42.6088L130.449 61.1192H98.1649V56.5695L112.126 42.6088ZM134.064 46.5975L146.03 58.5638V61.1192H136.121L127.831 52.7677L134.064 46.5975Z"
					fill="black"
				/>
				<rect x="159.372" y="14.5" width="73.3231" height="91" stroke="black" />
				<path
					d="M172.933 73.9162C172.933 72.5868 174.01 71.5092 175.34 71.5092H217.06C218.39 71.5092 219.467 72.5868 219.467 73.9162V73.9162C219.467 75.2455 218.39 76.3231 217.06 76.3231H175.34C174.01 76.3231 172.933 75.2455 172.933 73.9162V73.9162Z"
					fill="black"
				/>
				<path
					d="M172.933 81.6184C172.933 80.2891 174.01 79.2115 175.34 79.2115H217.06C218.39 79.2115 219.467 80.2891 219.467 81.6184V81.6184C219.467 82.9477 218.39 84.0254 217.06 84.0254H175.34C174.01 84.0254 172.933 82.9477 172.933 81.6184V81.6184Z"
					fill="black"
				/>
				<path
					d="M172.933 89.3206C172.933 87.9913 174.01 86.9137 175.34 86.9137H203.638C204.967 86.9137 206.045 87.9913 206.045 89.3206V89.3206C206.045 90.65 204.967 91.7276 203.638 91.7276H175.34C174.01 91.7276 172.933 90.65 172.933 89.3206V89.3206Z"
					fill="black"
				/>
				<path
					d="M168.112 21.2314V65.1079H223.955V21.2314H168.112ZM172.101 25.2202H219.966V52.9546L209.433 42.3595L208 40.926L198.963 49.9631L187.495 38.3707L186.061 36.9372L172.101 50.8979V25.2202ZM211.988 29.209C209.784 29.209 208 30.993 208 33.1978C208 35.4025 209.784 37.1865 211.988 37.1865C214.193 37.1865 215.977 35.4025 215.977 33.1978C215.977 30.993 214.193 29.209 211.988 29.209ZM186.061 42.6088L204.385 61.1192H172.101V56.5695L186.061 42.6088ZM208 46.5975L219.966 58.5638V61.1192H210.056L201.767 52.7677L208 46.5975Z"
					fill="black"
				/>
			</svg>
		),
	},

	{
		title: "3 Col 1 Gap",
		data: {
			options: {
				gridTemplateColumns: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				gridTemplateRows: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				colGap: { val: 1, unit: "em" },
				rowGap: { val: 1, unit: "em" },
				itemCss: [],
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: "1", unit: "fr" },
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: "1", unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				rowGap: {
					Desktop: { val: "1", unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},

		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect x="12.5" y="16.5" width="70.0917" height="87" stroke="black" />
				<path
					d="M25.4498 73.3111C25.4498 72.0396 26.4805 71.0089 27.7521 71.0089H67.6586C68.9301 71.0089 69.9608 72.0396 69.9608 73.3111V73.3111C69.9608 74.5827 68.9301 75.6134 67.6585 75.6134H27.7521C26.4805 75.6134 25.4498 74.5827 25.4498 73.3111V73.3111Z"
					fill="black"
				/>
				<path
					d="M25.4498 80.6785C25.4498 79.407 26.4805 78.3762 27.7521 78.3762H67.6586C68.9301 78.3762 69.9608 79.407 69.9608 80.6785V80.6785C69.9608 81.95 68.9301 82.9808 67.6585 82.9808H27.7521C26.4805 82.9808 25.4498 81.95 25.4498 80.6785V80.6785Z"
					fill="black"
				/>
				<path
					d="M25.4498 88.0458C25.4498 86.7743 26.4805 85.7435 27.7521 85.7435H54.8199C56.0915 85.7435 57.1222 86.7743 57.1222 88.0458V88.0458C57.1222 89.3174 56.0915 90.3481 54.8199 90.3481H27.7521C26.4805 90.3481 25.4498 89.3174 25.4498 88.0458V88.0458Z"
					fill="black"
				/>
				<path
					d="M20.8384 22.917V64.8858H74.2533V22.917H20.8384ZM24.6538 26.7324H70.4379V53.2609L60.363 43.1264L58.9919 41.7553L50.3478 50.3994L39.3786 39.3111L38.0075 37.9399L24.6538 51.2937V26.7324ZM62.8072 30.5477C60.6984 30.5477 58.9919 32.2542 58.9919 34.3631C58.9919 36.4719 60.6984 38.1784 62.8072 38.1784C64.9161 38.1784 66.6226 36.4719 66.6226 34.3631C66.6226 32.2542 64.9161 30.5477 62.8072 30.5477ZM38.0075 43.3649L55.5342 61.0705H24.6538V56.7186L38.0075 43.3649ZM58.9919 47.1802L70.4379 58.6263V61.0705H60.9592L53.0304 53.0821L58.9919 47.1802Z"
					fill="black"
				/>
				<rect x="87.4345" y="16.5" width="70.0917" height="87" stroke="black" />
				<path
					d="M100.384 73.3111C100.384 72.0396 101.415 71.0089 102.687 71.0089H142.593C143.865 71.0089 144.895 72.0396 144.895 73.3111V73.3111C144.895 74.5827 143.865 75.6134 142.593 75.6134H102.687C101.415 75.6134 100.384 74.5827 100.384 73.3111V73.3111Z"
					fill="black"
				/>
				<path
					d="M100.384 80.6785C100.384 79.407 101.415 78.3762 102.687 78.3762H142.593C143.865 78.3762 144.895 79.407 144.895 80.6785V80.6785C144.895 81.95 143.865 82.9808 142.593 82.9808H102.687C101.415 82.9808 100.384 81.95 100.384 80.6785V80.6785Z"
					fill="black"
				/>
				<path
					d="M100.384 88.0458C100.384 86.7743 101.415 85.7435 102.687 85.7435H129.754C131.026 85.7435 132.057 86.7743 132.057 88.0458V88.0458C132.057 89.3174 131.026 90.3481 129.754 90.3481H102.687C101.415 90.3481 100.384 89.3174 100.384 88.0458V88.0458Z"
					fill="black"
				/>
				<path
					d="M95.7729 22.917V64.8858H149.188V22.917H95.7729ZM99.5883 26.7324H145.372V53.2609L135.298 43.1264L133.926 41.7553L125.282 50.3994L114.313 39.3111L112.942 37.9399L99.5883 51.2937V26.7324ZM137.742 30.5477C135.633 30.5477 133.926 32.2542 133.926 34.3631C133.926 36.4719 135.633 38.1784 137.742 38.1784C139.851 38.1784 141.557 36.4719 141.557 34.3631C141.557 32.2542 139.851 30.5477 137.742 30.5477ZM112.942 43.3649L130.469 61.0705H99.5883V56.7186L112.942 43.3649ZM133.926 47.1802L145.372 58.6263V61.0705H135.894L127.965 53.0821L133.926 47.1802Z"
					fill="black"
				/>
				<rect x="162.369" y="16.5" width="70.0917" height="87" stroke="black" />
				<path
					d="M175.319 73.3111C175.319 72.0396 176.35 71.0089 177.621 71.0089H217.528C218.799 71.0089 219.83 72.0396 219.83 73.3111V73.3111C219.83 74.5827 218.799 75.6134 217.528 75.6134H177.621C176.35 75.6134 175.319 74.5827 175.319 73.3111V73.3111Z"
					fill="black"
				/>
				<path
					d="M175.319 80.6785C175.319 79.407 176.35 78.3762 177.621 78.3762H217.528C218.799 78.3762 219.83 79.407 219.83 80.6785V80.6785C219.83 81.95 218.799 82.9808 217.528 82.9808H177.621C176.35 82.9808 175.319 81.95 175.319 80.6785V80.6785Z"
					fill="black"
				/>
				<path
					d="M175.319 88.0458C175.319 86.7743 176.35 85.7435 177.621 85.7435H204.689C205.96 85.7435 206.991 86.7743 206.991 88.0458V88.0458C206.991 89.3174 205.96 90.3481 204.689 90.3481H177.621C176.35 90.3481 175.319 89.3174 175.319 88.0458V88.0458Z"
					fill="black"
				/>
				<path
					d="M170.707 22.917V64.8858H224.122V22.917H170.707ZM174.523 26.7324H220.307V53.2609L210.232 43.1264L208.861 41.7553L200.217 50.3994L189.248 39.3111L187.877 37.9399L174.523 51.2937V26.7324ZM212.676 30.5477C210.567 30.5477 208.861 32.2542 208.861 34.3631C208.861 36.4719 210.567 38.1784 212.676 38.1784C214.785 38.1784 216.492 36.4719 216.492 34.3631C216.492 32.2542 214.785 30.5477 212.676 30.5477ZM187.877 43.3649L205.403 61.0705H174.523V56.7186L187.877 43.3649ZM208.861 47.1802L220.307 58.6263V61.0705H210.828L202.899 53.0821L208.861 47.1802Z"
					fill="black"
				/>
			</svg>
		),
	},

	{
		title: "3 Col 2 Gap",
		data: {
			options: {
				gridTemplateColumns: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				gridTemplateRows: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				colGap: { val: 1, unit: "em" },
				rowGap: { val: 1, unit: "em" },
				itemCss: [],
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: "1", unit: "fr" },
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: "2", unit: "em" },
					Tablet: { val: "2", unit: "em" },
					Mobile: { val: "2", unit: "em" },
				},
				rowGap: {
					Desktop: { val: "2", unit: "em" },
					Tablet: { val: "2", unit: "em" },
					Mobile: { val: "2", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},

		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect x="13.5" y="19.5" width="66.0524" height="82" stroke="black" />
				<path
					d="M25.6855 73.0548C25.6855 71.8555 26.6578 70.8833 27.857 70.8833H65.4961C66.6954 70.8833 67.6676 71.8555 67.6676 73.0548V73.0548C67.6676 74.2541 66.6954 75.2263 65.4961 75.2263H27.857C26.6578 75.2263 25.6855 74.2541 25.6855 73.0548V73.0548Z"
					fill="black"
				/>
				<path
					d="M25.6855 80.0035C25.6855 78.8043 26.6578 77.8321 27.857 77.8321H65.4961C66.6954 77.8321 67.6676 78.8043 67.6676 80.0035V80.0035C67.6676 81.2028 66.6954 82.175 65.4961 82.175H27.857C26.6578 82.175 25.6855 81.2028 25.6855 80.0035V80.0035Z"
					fill="black"
				/>
				<path
					d="M25.6855 86.9523C25.6855 85.7531 26.6578 84.7809 27.857 84.7809H53.387C54.5862 84.7809 55.5584 85.7531 55.5584 86.9523V86.9523C55.5584 88.1516 54.5862 89.1238 53.387 89.1238H27.857C26.6578 89.1238 25.6855 88.1516 25.6855 86.9523V86.9523Z"
					fill="black"
				/>
				<path
					d="M21.3362 25.524V65.1083H71.7162V25.524H21.3362ZM24.9348 29.1226H68.1176V54.1439L58.6151 44.5852L57.3219 43.292L49.1689 51.445L38.823 40.9866L37.5298 39.6934L24.9348 52.2884V29.1226ZM60.9205 32.7212C58.9314 32.7212 57.3219 34.3307 57.3219 36.3197C57.3219 38.3088 58.9314 39.9183 60.9205 39.9183C62.9095 39.9183 64.519 38.3088 64.519 36.3197C64.519 34.3307 62.9095 32.7212 60.9205 32.7212ZM37.5298 44.8101L54.0607 61.5097H24.9348V57.4051L37.5298 44.8101ZM57.3219 48.4087L68.1176 59.2044V61.5097H59.1774L51.6991 53.9752L57.3219 48.4087Z"
					fill="black"
				/>
				<rect x="89.4753" y="19.5" width="66.0524" height="82" stroke="black" />
				<path
					d="M101.661 73.0548C101.661 71.8555 102.633 70.8833 103.832 70.8833H141.471C142.671 70.8833 143.643 71.8555 143.643 73.0548V73.0548C143.643 74.2541 142.671 75.2263 141.471 75.2263H103.832C102.633 75.2263 101.661 74.2541 101.661 73.0548V73.0548Z"
					fill="black"
				/>
				<path
					d="M101.661 80.0035C101.661 78.8043 102.633 77.8321 103.832 77.8321H141.471C142.671 77.8321 143.643 78.8043 143.643 80.0035V80.0035C143.643 81.2028 142.671 82.175 141.471 82.175H103.832C102.633 82.175 101.661 81.2028 101.661 80.0035V80.0035Z"
					fill="black"
				/>
				<path
					d="M101.661 86.9523C101.661 85.7531 102.633 84.7809 103.832 84.7809H129.362C130.562 84.7809 131.534 85.7531 131.534 86.9523V86.9523C131.534 88.1516 130.562 89.1238 129.362 89.1238H103.832C102.633 89.1238 101.661 88.1516 101.661 86.9523V86.9523Z"
					fill="black"
				/>
				<path
					d="M97.3116 25.524V65.1083H147.692V25.524H97.3116ZM100.91 29.1226H144.093V54.1439L134.59 44.5852L133.297 43.292L125.144 51.445L114.798 40.9866L113.505 39.6934L100.91 52.2884V29.1226ZM136.896 32.7212C134.907 32.7212 133.297 34.3307 133.297 36.3197C133.297 38.3088 134.907 39.9183 136.896 39.9183C138.885 39.9183 140.494 38.3088 140.494 36.3197C140.494 34.3307 138.885 32.7212 136.896 32.7212ZM113.505 44.8101L130.036 61.5097H100.91V57.4051L113.505 44.8101ZM133.297 48.4087L144.093 59.2044V61.5097H135.153L127.674 53.9752L133.297 48.4087Z"
					fill="black"
				/>
				<rect x="165.389" y="19.5" width="66.0524" height="82" stroke="black" />
				<path
					d="M177.575 73.0548C177.575 71.8555 178.547 70.8833 179.746 70.8833H217.385C218.585 70.8833 219.557 71.8555 219.557 73.0548V73.0548C219.557 74.2541 218.585 75.2263 217.385 75.2263H179.746C178.547 75.2263 177.575 74.2541 177.575 73.0548V73.0548Z"
					fill="black"
				/>
				<path
					d="M177.575 80.0035C177.575 78.8043 178.547 77.8321 179.746 77.8321H217.385C218.585 77.8321 219.557 78.8043 219.557 80.0035V80.0035C219.557 81.2028 218.585 82.175 217.385 82.175H179.746C178.547 82.175 177.575 81.2028 177.575 80.0035V80.0035Z"
					fill="black"
				/>
				<path
					d="M177.575 86.9523C177.575 85.7531 178.547 84.7809 179.746 84.7809H205.276C206.476 84.7809 207.448 85.7531 207.448 86.9523V86.9523C207.448 88.1516 206.476 89.1238 205.276 89.1238H179.746C178.547 89.1238 177.575 88.1516 177.575 86.9523V86.9523Z"
					fill="black"
				/>
				<path
					d="M173.225 25.524V65.1083H223.605V25.524H173.225ZM176.824 29.1226H220.007V54.1439L210.504 44.5852L209.211 43.292L201.058 51.445L190.712 40.9866L189.419 39.6934L176.824 52.2884V29.1226ZM212.81 32.7212C210.821 32.7212 209.211 34.3307 209.211 36.3197C209.211 38.3088 210.821 39.9183 212.81 39.9183C214.799 39.9183 216.408 38.3088 216.408 36.3197C216.408 34.3307 214.799 32.7212 212.81 32.7212ZM189.419 44.8101L205.95 61.5097H176.824V57.4051L189.419 44.8101ZM209.211 48.4087L220.007 59.2044V61.5097H211.067L203.588 53.9752L209.211 48.4087Z"
					fill="black"
				/>
			</svg>
		),
	},

	{
		title: "2 Col 0 Gap",
		data: {
			options: {
				gridTemplateColumns: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				gridTemplateRows: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				colGap: { val: 1, unit: "em" },
				rowGap: { val: 1, unit: "em" },
				itemCss: [],
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: "1", unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: "0", unit: "em" },
					Tablet: { val: "0", unit: "em" },
					Mobile: { val: "0", unit: "em" },
				},
				rowGap: {
					Desktop: { val: "0", unit: "em" },
					Tablet: { val: "0", unit: "em" },
					Mobile: { val: "0", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},
		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect x="38.5" y="8.5" width="83.0175" height="103" stroke="black" />
				<path
					d="M53.8952 75.7313C53.8952 74.2286 55.1134 73.0104 56.6161 73.0104H103.778C105.281 73.0104 106.499 74.2286 106.499 75.7313C106.499 77.234 105.281 78.4522 103.778 78.4522H56.6161C55.1134 78.4522 53.8952 77.234 53.8952 75.7313Z"
					fill="black"
				/>
				<path
					d="M53.8952 84.4382C53.8952 82.9355 55.1134 81.7173 56.6161 81.7173H103.778C105.281 81.7173 106.499 82.9355 106.499 84.4382C106.499 85.9409 105.281 87.1591 103.778 87.1591H56.6161C55.1134 87.1591 53.8952 85.9409 53.8952 84.4382Z"
					fill="black"
				/>
				<path
					d="M53.8952 93.1451C53.8952 91.6424 55.1134 90.4242 56.6161 90.4242H88.6054C90.1081 90.4242 91.3263 91.6424 91.3263 93.1451C91.3263 94.6478 90.1081 95.866 88.6054 95.866H56.6161C55.1134 95.866 53.8952 94.6478 53.8952 93.1451Z"
					fill="black"
				/>
				<path
					d="M48.4454 16.1747V65.7742H111.572V16.1747H48.4454ZM52.9545 20.6837H107.063V52.0357L95.1563 40.0585L93.5359 38.4381L83.3201 48.6539L70.3566 35.5495L68.7361 33.929L52.9545 49.7107V20.6837ZM98.0449 25.1928C95.5526 25.1928 93.5359 27.2095 93.5359 29.7018C93.5359 32.1941 95.5526 34.2109 98.0449 34.2109C100.537 34.2109 102.554 32.1941 102.554 29.7018C102.554 27.2095 100.537 25.1928 98.0449 25.1928ZM68.7361 40.3403L89.4496 61.2651H52.9545V56.122L68.7361 40.3403ZM93.5359 44.8494L107.063 58.3765V61.2651H95.8609L86.4905 51.8243L93.5359 44.8494Z"
					fill="black"
				/>
				<rect x="122.08" y="8.5" width="83.0175" height="103" stroke="black" />
				<path
					d="M137.475 75.7313C137.475 74.2286 138.693 73.0104 140.196 73.0104H187.358C188.861 73.0104 190.079 74.2286 190.079 75.7313C190.079 77.234 188.861 78.4522 187.358 78.4522H140.196C138.693 78.4522 137.475 77.234 137.475 75.7313Z"
					fill="black"
				/>
				<path
					d="M137.475 84.4382C137.475 82.9355 138.693 81.7173 140.196 81.7173H187.358C188.861 81.7173 190.079 82.9355 190.079 84.4382C190.079 85.9409 188.861 87.1591 187.358 87.1591H140.196C138.693 87.1591 137.475 85.9409 137.475 84.4382Z"
					fill="black"
				/>
				<path
					d="M137.475 93.1451C137.475 91.6424 138.693 90.4242 140.196 90.4242H172.185C173.688 90.4242 174.906 91.6424 174.906 93.1451C174.906 94.6478 173.688 95.866 172.185 95.866H140.196C138.693 95.866 137.475 94.6478 137.475 93.1451Z"
					fill="black"
				/>
				<path
					d="M132.025 16.1747V65.7742H195.152V16.1747H132.025ZM136.534 20.6837H190.643V52.0357L178.736 40.0585L177.116 38.4381L166.9 48.6539L153.936 35.5495L152.316 33.929L136.534 49.7107V20.6837ZM181.625 25.1928C179.132 25.1928 177.116 27.2095 177.116 29.7018C177.116 32.1941 179.132 34.2109 181.625 34.2109C184.117 34.2109 186.134 32.1941 186.134 29.7018C186.134 27.2095 184.117 25.1928 181.625 25.1928ZM152.316 40.3403L173.029 61.2651H136.534V56.122L152.316 40.3403ZM177.116 44.8494L190.643 58.3765V61.2651H179.441L170.07 51.8243L177.116 44.8494Z"
					fill="black"
				/>
			</svg>
		),
	},

	{
		title: "2 Col 1 Gap",
		data: {
			options: {
				gridTemplateColumns: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				gridTemplateRows: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				colGap: { val: 1, unit: "em" },
				rowGap: { val: 1, unit: "em" },
				itemCss: [],
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: "1", unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: "1", unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				rowGap: {
					Desktop: { val: "1", unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},
		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect
					x="37.5"
					y="9.5"
					width="81.7632"
					height="101.447"
					stroke="black"
				/>
				<path
					d="M52.6579 75.7202C52.6579 74.2399 53.8579 73.0399 55.3382 73.0399H101.796C103.277 73.0399 104.477 74.2399 104.477 75.7202V75.7202C104.477 77.2005 103.277 78.4005 101.796 78.4005H55.3382C53.8579 78.4005 52.6579 77.2005 52.6579 75.7202V75.7202Z"
					fill="black"
				/>
				<path
					d="M52.6579 84.297C52.6579 82.8168 53.8579 81.6168 55.3382 81.6168H101.796C103.277 81.6168 104.477 82.8168 104.477 84.297V84.297C104.477 85.7773 103.277 86.9773 101.796 86.9773H55.3382C53.8579 86.9773 52.6579 85.7773 52.6579 84.297V84.297Z"
					fill="black"
				/>
				<path
					d="M52.6579 92.8739C52.6579 91.3936 53.8579 90.1936 55.3382 90.1936H86.8499C88.3302 90.1936 89.5302 91.3936 89.5302 92.8739V92.8739C89.5302 94.3542 88.3302 95.5542 86.8499 95.5542H55.3382C53.8579 95.5542 52.6579 94.3542 52.6579 92.8739V92.8739Z"
					fill="black"
				/>
				<path
					d="M47.2895 17.0526V65.9117H109.474V17.0526H47.2895ZM51.7312 21.4944H105.032V52.3783L93.303 40.5799L91.7068 38.9837L81.6435 49.047L68.8735 36.1382L67.2773 34.542L51.7312 50.088V21.4944ZM96.1485 25.9361C93.6934 25.9361 91.7068 27.9227 91.7068 30.3778C91.7068 32.8329 93.6934 34.8196 96.1485 34.8196C98.6036 34.8196 100.59 32.8329 100.59 30.3778C100.59 27.9227 98.6036 25.9361 96.1485 25.9361ZM67.2773 40.8575L87.6815 61.4699H51.7312V56.4036L67.2773 40.8575ZM91.7068 45.2993L105.032 58.6245V61.4699H93.997L84.7666 52.1701L91.7068 45.2993Z"
					fill="black"
				/>
				<rect
					x="124.737"
					y="9.5"
					width="81.7632"
					height="101.447"
					stroke="black"
				/>
				<path
					d="M139.895 75.7202C139.895 74.2399 141.095 73.0399 142.575 73.0399H189.033C190.513 73.0399 191.713 74.2399 191.713 75.7202V75.7202C191.713 77.2005 190.513 78.4005 189.033 78.4005H142.575C141.095 78.4005 139.895 77.2005 139.895 75.7202V75.7202Z"
					fill="black"
				/>
				<path
					d="M139.895 84.297C139.895 82.8168 141.095 81.6168 142.575 81.6168H189.033C190.513 81.6168 191.713 82.8168 191.713 84.297V84.297C191.713 85.7773 190.513 86.9773 189.033 86.9773H142.575C141.095 86.9773 139.895 85.7773 139.895 84.297V84.297Z"
					fill="black"
				/>
				<path
					d="M139.895 92.8739C139.895 91.3936 141.095 90.1936 142.575 90.1936H174.087C175.567 90.1936 176.767 91.3936 176.767 92.8739V92.8739C176.767 94.3542 175.567 95.5542 174.087 95.5542H142.575C141.095 95.5542 139.895 94.3542 139.895 92.8739V92.8739Z"
					fill="black"
				/>
				<path
					d="M134.526 17.0526V65.9117H196.711V17.0526H134.526ZM138.968 21.4944H192.269V52.3783L180.54 40.5799L178.944 38.9837L168.88 49.047L156.11 36.1382L154.514 34.542L138.968 50.088V21.4944ZM183.385 25.9361C180.93 25.9361 178.944 27.9227 178.944 30.3778C178.944 32.8329 180.93 34.8196 183.385 34.8196C185.84 34.8196 187.827 32.8329 187.827 30.3778C187.827 27.9227 185.84 25.9361 183.385 25.9361ZM154.514 40.8575L174.918 61.4699H138.968V56.4036L154.514 40.8575ZM178.944 45.2993L192.269 58.6245V61.4699H181.234L172.003 52.1701L178.944 45.2993Z"
					fill="black"
				/>
			</svg>
		),
	},

	{
		title: "2 Col 2 Gap",
		data: {
			options: {
				gridTemplateColumns: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				gridTemplateRows: [
					{ val: 1, unit: "fr" },
					{ val: 1, unit: "fr" },
				],
				colGap: { val: 1, unit: "em" },
				rowGap: { val: 1, unit: "em" },
				itemCss: [],
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: "1", unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: "2", unit: "em" },
					Tablet: { val: "2", unit: "em" },
					Mobile: { val: "2", unit: "em" },
				},
				rowGap: {
					Desktop: { val: "2", unit: "em" },
					Tablet: { val: "2", unit: "em" },
					Mobile: { val: "2", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},
		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect x="34.5" y="9.5" width="81.4017" height="101" stroke="black" />
				<path
					d="M49.5895 75.4288C49.5895 73.955 50.7842 72.7603 52.258 72.7603H98.5133C99.9871 72.7603 101.182 73.955 101.182 75.4288V75.4288C101.182 76.9026 99.9871 78.0974 98.5133 78.0974H52.258C50.7842 78.0974 49.5895 76.9026 49.5895 75.4288V75.4288Z"
					fill="black"
				/>
				<path
					d="M49.5895 83.9683C49.5895 82.4944 50.7842 81.2997 52.258 81.2997H98.5133C99.9871 81.2997 101.182 82.4944 101.182 83.9683V83.9683C101.182 85.4421 99.9871 86.6368 98.5133 86.6368H52.258C50.7842 86.6368 49.5895 85.4421 49.5895 83.9683V83.9683Z"
					fill="black"
				/>
				<path
					d="M49.5895 92.5077C49.5895 91.0338 50.7842 89.8391 52.258 89.8391H83.6322C85.106 89.8391 86.3007 91.0338 86.3007 92.5077V92.5077C86.3007 93.9815 85.106 95.1762 83.6322 95.1762H52.258C50.7842 95.1762 49.5895 93.9815 49.5895 92.5077V92.5077Z"
					fill="black"
				/>
				<path
					d="M44.2446 17.0175V65.6632H106.157V17.0175H44.2446ZM48.6669 21.4398H101.735V52.1889L90.0572 40.442L88.4679 38.8528L78.4486 48.8721L65.7343 36.0197L64.1451 34.4304L48.6669 49.9086V21.4398ZM92.8902 25.8622C90.4459 25.8622 88.4679 27.8401 88.4679 30.2845C88.4679 32.7289 90.4459 34.7068 92.8902 34.7068C95.3346 34.7068 97.3126 32.7289 97.3126 30.2845C97.3126 27.8401 95.3346 25.8622 92.8902 25.8622ZM64.1451 40.7184L84.4602 61.2408H48.6669V56.1966L64.1451 40.7184ZM88.4679 45.1408L101.735 58.4078V61.2408H90.7482L81.558 51.9816L88.4679 45.1408Z"
					fill="black"
				/>
				<rect x="127.867" y="9.5" width="81.4017" height="101" stroke="black" />
				<path
					d="M142.957 75.4288C142.957 73.955 144.152 72.7603 145.625 72.7603H191.881C193.354 72.7603 194.549 73.955 194.549 75.4288V75.4288C194.549 76.9026 193.354 78.0974 191.881 78.0974H145.625C144.152 78.0974 142.957 76.9026 142.957 75.4288V75.4288Z"
					fill="black"
				/>
				<path
					d="M142.957 83.9683C142.957 82.4944 144.152 81.2997 145.625 81.2997H191.881C193.354 81.2997 194.549 82.4944 194.549 83.9683V83.9683C194.549 85.4421 193.354 86.6368 191.881 86.6368H145.625C144.152 86.6368 142.957 85.4421 142.957 83.9683V83.9683Z"
					fill="black"
				/>
				<path
					d="M142.957 92.5077C142.957 91.0338 144.152 89.8391 145.625 89.8391H177C178.473 89.8391 179.668 91.0338 179.668 92.5077V92.5077C179.668 93.9815 178.473 95.1762 177 95.1762H145.625C144.152 95.1762 142.957 93.9815 142.957 92.5077V92.5077Z"
					fill="black"
				/>
				<path
					d="M137.612 17.0175V65.6632H199.525V17.0175H137.612ZM142.034 21.4398H195.102V52.1889L183.424 40.442L181.835 38.8528L171.816 48.8721L159.102 36.0197L157.512 34.4304L142.034 49.9086V21.4398ZM186.258 25.8622C183.813 25.8622 181.835 27.8401 181.835 30.2845C181.835 32.7289 183.813 34.7068 186.258 34.7068C188.702 34.7068 190.68 32.7289 190.68 30.2845C190.68 27.8401 188.702 25.8622 186.258 25.8622ZM157.512 40.7184L177.827 61.2408H142.034V56.1966L157.512 40.7184ZM181.835 45.1408L195.102 58.4078V61.2408H184.115L174.925 51.9816L181.835 45.1408Z"
					fill="black"
				/>
			</svg>
		),
	},
	{
		title: "3 Col, nth(1)-2 Offset 1 Gap",
		data: {
			options: {
				itemCss: {
					Desktop: [
						{
							"grid-column-start": "1",
							"grid-column-end": "3",
							"grid-row-start": "",
							"grid-row-end": "",
						},
					],
				},
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: 1, unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				rowGap: {
					Desktop: { val: 1, unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},

		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect x="12.5" y="16.5" width="145" height="87" stroke="black" />
				<path
					d="M24 73.3111C24 72.0396 25.0308 71.0089 26.3023 71.0089H138.698C139.969 71.0089 141 72.0396 141 73.3111V73.3111C141 74.5827 139.969 75.6134 138.698 75.6134H26.3023C25.0308 75.6134 24 74.5827 24 73.3111V73.3111Z"
					fill="black"
				/>
				<path
					d="M24 80.6785C24 79.407 25.0308 78.3762 26.3023 78.3762H138.698C139.969 78.3762 141 79.407 141 80.6785V80.6785C141 81.95 139.969 82.9808 138.698 82.9808H26.3023C25.0308 82.9808 24 81.95 24 80.6785V80.6785Z"
					fill="black"
				/>
				<path
					d="M24 88.0458C24 86.7743 25.0308 85.7435 26.3023 85.7435H104.951C106.222 85.7435 107.253 86.7743 107.253 88.0458V88.0458C107.253 89.3174 106.222 90.3481 104.951 90.3481H26.3023C25.0308 90.3481 24 89.3174 24 88.0458V88.0458Z"
					fill="black"
				/>
				<path
					d="M58 22.9171V64.8859H111.415V22.9171H58ZM61.8153 26.7324H107.6V53.261L97.5246 43.1265L96.1535 41.7553L87.5093 50.3995L76.5402 39.3111L75.1691 37.94L61.8153 51.2937V26.7324ZM99.9688 30.5477C97.8599 30.5477 96.1535 32.2542 96.1535 34.3631C96.1535 36.472 97.8599 38.1784 99.9688 38.1784C102.078 38.1784 103.784 36.472 103.784 34.3631C103.784 32.2542 102.078 30.5477 99.9688 30.5477ZM75.1691 43.3649L92.6958 61.0705H61.8153V56.7186L75.1691 43.3649ZM96.1535 47.1803L107.6 58.6263V61.0705H98.1208L90.192 53.0821L96.1535 47.1803Z"
					fill="black"
				/>
				<rect x="162.369" y="16.5" width="70.0917" height="87" stroke="black" />
				<path
					d="M175.319 73.3111C175.319 72.0396 176.35 71.0089 177.621 71.0089H217.528C218.799 71.0089 219.83 72.0396 219.83 73.3111C219.83 74.5827 218.799 75.6134 217.528 75.6134H177.621C176.35 75.6134 175.319 74.5827 175.319 73.3111Z"
					fill="black"
				/>
				<path
					d="M175.319 80.6785C175.319 79.407 176.35 78.3762 177.621 78.3762H217.528C218.799 78.3762 219.83 79.407 219.83 80.6785C219.83 81.95 218.799 82.9808 217.528 82.9808H177.621C176.35 82.9808 175.319 81.95 175.319 80.6785Z"
					fill="black"
				/>
				<path
					d="M175.319 88.0458C175.319 86.7743 176.35 85.7435 177.621 85.7435H204.689C205.96 85.7435 206.991 86.7743 206.991 88.0458C206.991 89.3174 205.96 90.3481 204.689 90.3481H177.621C176.35 90.3481 175.319 89.3174 175.319 88.0458Z"
					fill="black"
				/>
				<path
					d="M170.707 22.917V64.8858H224.122V22.917H170.707ZM174.523 26.7324H220.307V53.2609L210.232 43.1264L208.861 41.7553L200.217 50.3994L189.248 39.3111L187.877 37.9399L174.523 51.2937V26.7324ZM212.676 30.5477C210.567 30.5477 208.861 32.2542 208.861 34.3631C208.861 36.4719 210.567 38.1784 212.676 38.1784C214.785 38.1784 216.492 36.4719 216.492 34.3631C216.492 32.2542 214.785 30.5477 212.676 30.5477ZM187.877 43.3649L205.403 61.0705H174.523V56.7186L187.877 43.3649ZM208.861 47.1802L220.307 58.6263V61.0705H210.828L202.899 53.0821L208.861 47.1802Z"
					fill="black"
				/>
			</svg>
		),
	},

	{
		title: "3 Col, nth(2)-2 Offset 1 Gap",
		data: {
			options: {
				itemCss: {
					Desktop: [
						{
							"grid-column-start": "",
							"grid-column-end": "",
							"grid-row-start": "",
							"grid-row-end": "",
						},
						{
							"grid-column-start": "2",
							"grid-column-end": "4",
							"grid-row-start": "",
							"grid-row-end": "",
						},
					],
				},
			},
			styles: {
				gridTemplateColumns: {
					Desktop: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Tablet: [
						{ val: 1, unit: "fr" },
						{ val: 1, unit: "fr" },
					],
					Mobile: [{ val: 1, unit: "fr" }],
				},
				gridTemplateRows: {},
				colGap: {
					Desktop: { val: 1, unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				rowGap: {
					Desktop: { val: 1, unit: "em" },
					Tablet: { val: "1", unit: "em" },
					Mobile: { val: "1", unit: "em" },
				},
				textAlign: {},
				color: {},
				bgColor: {},
				padding: {},
				margin: {},
			},
		},
		icon: (
			<svg
				width="245"
				height="120"
				viewBox="0 0 245 120"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect x="88.5" y="16.5" width="145" height="87" stroke="black" />
				<path
					d="M100 73.3111C100 72.0396 101.031 71.0089 102.302 71.0089H214.698C215.969 71.0089 217 72.0396 217 73.3111C217 74.5827 215.969 75.6134 214.698 75.6134H102.302C101.031 75.6134 100 74.5827 100 73.3111Z"
					fill="black"
				/>
				<path
					d="M100 80.6785C100 79.407 101.031 78.3762 102.302 78.3762H214.698C215.969 78.3762 217 79.407 217 80.6785C217 81.95 215.969 82.9808 214.698 82.9808H102.302C101.031 82.9808 100 81.95 100 80.6785Z"
					fill="black"
				/>
				<path
					d="M100 88.0458C100 86.7743 101.031 85.7435 102.302 85.7435H180.951C182.222 85.7435 183.253 86.7743 183.253 88.0458C183.253 89.3174 182.222 90.3481 180.951 90.3481H102.302C101.031 90.3481 100 89.3174 100 88.0458Z"
					fill="black"
				/>
				<path
					d="M134 22.9171V64.8859H187.415V22.9171H134ZM137.815 26.7324H183.6V53.261L173.525 43.1265L172.153 41.7553L163.509 50.3995L152.54 39.3111L151.169 37.94L137.815 51.2937V26.7324ZM175.969 30.5477C173.86 30.5477 172.153 32.2542 172.153 34.3631C172.153 36.472 173.86 38.1784 175.969 38.1784C178.078 38.1784 179.784 36.472 179.784 34.3631C179.784 32.2542 178.078 30.5477 175.969 30.5477ZM151.169 43.3649L168.696 61.0705H137.815V56.7186L151.169 43.3649ZM172.153 47.1803L183.6 58.6263V61.0705H174.121L166.192 53.0821L172.153 47.1803Z"
					fill="black"
				/>
				<rect x="12.5" y="16.5" width="70.0917" height="87" stroke="black" />
				<path
					d="M25.4498 73.3111C25.4498 72.0396 26.4805 71.0089 27.7521 71.0089H67.6586C68.9301 71.0089 69.9608 72.0396 69.9608 73.3111C69.9608 74.5827 68.9301 75.6134 67.6586 75.6134H27.7521C26.4805 75.6134 25.4498 74.5827 25.4498 73.3111Z"
					fill="black"
				/>
				<path
					d="M25.4498 80.6785C25.4498 79.407 26.4805 78.3762 27.7521 78.3762H67.6586C68.9301 78.3762 69.9608 79.407 69.9608 80.6785C69.9608 81.95 68.9301 82.9808 67.6586 82.9808H27.7521C26.4805 82.9808 25.4498 81.95 25.4498 80.6785Z"
					fill="black"
				/>
				<path
					d="M25.4498 88.0458C25.4498 86.7743 26.4805 85.7435 27.7521 85.7435H54.8199C56.0915 85.7435 57.1222 86.7743 57.1222 88.0458C57.1222 89.3174 56.0915 90.3481 54.8199 90.3481H27.7521C26.4805 90.3481 25.4498 89.3174 25.4498 88.0458Z"
					fill="black"
				/>
				<path
					d="M20.8384 22.917V64.8858H74.2533V22.917H20.8384ZM24.6538 26.7324H70.4379V53.2609L60.363 43.1264L58.9919 41.7553L50.3478 50.3994L39.3786 39.3111L38.0075 37.9399L24.6538 51.2937V26.7324ZM62.8072 30.5477C60.6984 30.5477 58.9919 32.2542 58.9919 34.3631C58.9919 36.4719 60.6984 38.1784 62.8072 38.1784C64.9161 38.1784 66.6226 36.4719 66.6226 34.3631C66.6226 32.2542 64.9161 30.5477 62.8072 30.5477ZM38.0075 43.3649L55.5342 61.0705H24.6538V56.7186L38.0075 43.3649ZM58.9919 47.1802L70.4379 58.6263V61.0705H60.9592L53.0304 53.0821L58.9919 47.1802Z"
					fill="black"
				/>
			</svg>
		),
	},
];

addFilter("gridLayouts", "post-grid/gridLayouts", function (options) {
	return gridLayoutsPro;
});

const queryPresetsPro = [
	{
		label: "Latest Posts by Publish Date",
		key: "preset1",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "DESC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["date"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
	{
		label: "Oldest Posts by Publish Date",
		key: "preset2",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "ASC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["date"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
	{
		label: "Latest Posts by Modified Date",
		key: "preset3",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "DESC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["modified"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
	{
		label: "Oldest Posts by Modified Date",
		key: "preset4",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "ASC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["modified"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
	{
		label: "Alphabetical Order A-Z",
		key: "preset5",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "ASC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["name"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
	{
		label: "Alphabetical Order Z-A",
		key: "preset6",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "DESC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["name"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
	{
		label: "Most Commented Posts",
		key: "preset7",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "DESC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["name"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
	{
		label: "Random 10 Posts",
		key: "preset8",
		value: {
			items: [
				{
					val: ["post"],
					multiple: false,
					id: "postType",
					label: "Post Types",
					description: "Select Post Types to Query",
				},
				{
					val: ["publish"],
					multiple: false,
					id: "postStatus",
					label: "Post status",
					description: "Query post by post status",
				},
				{
					val: "DESC",
					multiple: false,
					id: "order",
					label: "Order",
					description: "Post query order",
				},
				{
					val: ["rand"],
					multiple: false,
					id: "orderby",
					label: "Orderby",
					description: "Post query orderby",
				},
				{
					val: "10",
					multiple: false,
					id: "postsPerPage",
					label: "Posts Per Page",
					description: "",
				},
			],
		},
	},
];

addFilter("queryPresets", "post-grid/queryPresets", function (options) {
	return queryPresetsPro;
});
