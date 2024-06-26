const { addFilter } = wp.hooks;

/*

link To Arguments Terms
*/

const linkToArgTermsPro = {
	noUrl: { label: "No URL", value: "" },
	termUrl: { label: "Term URL", value: "termUrl" },

	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter("linkToArgTerms", "post-grid/linkToArgTerms", function (options) {
	return linkToArgTermsPro;
});
const pgDateCountdownTypesPro = {
	fixed: { label: "Fixed", value: "fixed" },
	everGreen: { label: "Ever Green", value: "everGreen" },
	scheduled: { label: "Scheduled", value: "scheduled" },
};

addFilter(
	"pgDateCountdownTypes",
	"post-grid/pgDateCountdownTypes",
	function (options) {
		return pgDateCountdownTypesPro;
	}
);

/*

isProFeature
*/

addFilter("isProFeature", "post-grid/isProFeature", function (options) {
	return false;
});

/*

icon Positon Args
*/

const cssPropsPro = {
	animationName: { id: "animationName", label: "Animation Name" },
	alignContent: { id: "alignContent", label: "Align Content" },
	alignItems: { id: "alignItems", label: "Align Items" },
	alignSelf: { id: "alignSelf", label: "Align Self" },
	aspectRatio: { id: "aspectRatio", label: "Aspect Ratio" },

	backfaceVisibility: {
		id: "backfaceVisibility",
		label: "Backface Visibility",
	},
	//background: { id: 'background', label: 'Background' },
	backgroundAttachment: {
		id: "backgroundAttachment",
		label: "Background Attachment",
	},
	backgroundBlendMode: {
		id: "backgroundBlendMode",
		label: "Background Blend Mode",
	},
	backgroundClip: { id: "backgroundClip", label: "Background Clip" },
	backgroundColor: { id: "backgroundColor", label: "Background Color" },
	backgroundImage: { id: "backgroundImage", label: "Background Image" },
	backgroundOrigin: { id: "backgroundOrigin", label: "Background Origin" },
	backgroundRepeat: { id: "backgroundRepeat", label: "Background Repeat" },
	backgroundPosition: {
		id: "backgroundPosition",
		label: "Background Position",
	},
	backgroundSize: { id: "backgroundSize", label: "Background Size" },
	border: { id: "border", label: "Border" },
	borderTop: { id: "borderTop", label: "Border Top" },
	borderRight: { id: "borderRight", label: "Border Right" },
	borderBottom: { id: "borderBottom", label: "Border Bottom" },
	borderLeft: { id: "borderLeft", label: "Border Left" },

	borderCollapse: { id: "borderCollapse", label: "Border Collapse" },
	borderImage: { id: "borderImage", label: "Border Image" },
	borderRadius: { id: "borderRadius", label: "Border Radius" },
	borderSpacing: { id: "borderSpacing", label: "Border Spacing" },
	backdropFilter: { id: "backdropFilter", label: "Backdrop Filter" },

	bottom: { id: "bottom", label: "Bottom" },
	boxShadow: { id: "boxShadow", label: "Box Shadow" },
	boxSizing: { id: "boxSizing", label: "Box Sizing" },
	clear: { id: "clear", label: "Clear" },
	clip: { id: "clip", label: "Clip" },
	// clipPath: { id: 'clipPath', label: 'Clip Path' },
	color: { id: "color", label: "Color" },
	columnCount: { id: "columnCount", label: "Column Count" },
	columnRule: { id: "columnRule", label: "Column Rule" },

	content: { id: "content", label: "Content" },
	counterIncrement: {
		id: "counterIncrement",
		label: "Counter Increment",
	},
	counterReset: { id: "counterReset", label: "Counter Reset" },
	counterSet: { id: "counterSet", label: "Counter Set" },

	cursor: { id: "cursor", label: "Cursor" },
	display: { id: "display", label: "Display" },
	direction: { id: "direction", label: "Direction" },

	flexBasis: { id: "flexBasis", label: "Flex Basis" },

	flexDirection: { id: "flexDirection", label: "Flex Direction" },
	flexDirection: { id: "flexDirection", label: "Flex Direction" },
	flexFlow: { id: "flexFlow", label: "Flex Flow" },
	flexGrow: { id: "flexGrow", label: "Flex Grow" },
	flexShrink: { id: "flexShrink", label: "Flex Shrink" },
	flexWrap: { id: "flexWrap", label: "Flex Wrap" },

	float: { id: "float", label: "Float" },
	filter: { id: "filter", label: "Filter" },
	fontSize: { id: "fontSize", label: "Font Size" },
	fontFamily: { id: "fontFamily", label: "Font Family" },
	fontStretch: { id: "fontStretch", label: "Font Stretch" },
	fontStyle: { id: "fontStyle", label: "Font Style" },
	fontVariantCaps: { id: "fontVariantCaps", label: "Font VariantCaps" },
	fontWeight: { id: "fontWeight", label: "Font Weight" },

	userSelect: { id: "userSelect", label: "User Select" },
	gridAutoFlow: { id: "gridAutoFlow", label: "Grid Auto Flow" },

	gridColumnStart: { id: "gridColumnStart", label: "Grid Column Start" },

	gridColumnEnd: { id: "gridColumnEnd", label: "Grid Column End" },
	gridRowStart: { id: "gridRowStart", label: "Grid Row Start" },

	gridRowEnd: { id: "gridRowEnd", label: "Grid Row End" },
	gridTemplateColumns: {
		id: "gridTemplateColumns",
		label: "Grid Template Columns",
	},
	gridTemplateRows: { id: "gridTemplateRows", label: "Grid Template Rows" },
	gridAutoColumns: { id: "gridAutoColumns", label: "Grid Auto Columns" },

	height: { id: "height", label: "Height" },
	left: { id: "left", label: "Left" },
	letterSpacing: { id: "letterSpacing", label: "Letter Spacing" },
	lineHeight: { id: "lineHeight", label: "Line Height" },
	listStyle: { id: "listStyle", label: "List Style" },
	margin: { id: "margin", label: "Margin" },
	marginTop: { id: "marginTop", label: "Margin Top" },
	marginRight: { id: "marginRight", label: "Margin Right" },
	marginBottom: { id: "marginBottom", label: "Margin Bottom" },
	marginLeft: { id: "marginLeft", label: "Margin Left" },
	maxHeight: { id: "maxHeight", label: "Max Height" },
	maxWidth: { id: "maxWidth", label: "Max Width" },
	minHeight: { id: "minHeight", label: "Min Height" },
	minWidth: { id: "minWidth", label: "Min Width" },

	justifyContent: { id: "justifyContent", label: "Justify Content" },

	opacity: { id: "opacity", label: "Opacity" },
	objectFit: { id: "objectFit", label: "Object Fit" },

	outline: { id: "outline", label: "Outline" },
	overflow: { id: "overflow", label: "Overflow" },
	overflowX: { id: "overflowX", label: "OverflowX" },
	overflowY: { id: "overflowY", label: "OverflowY" },
	order: { id: "order", label: "Order" },

	padding: { id: "padding", label: "Padding" },

	paddingTop: { id: "paddingTop", label: "Padding Top" },
	paddingRight: { id: "paddingRight", label: "Padding Right" },
	paddingBottom: { id: "paddingBottom", label: "Padding Bottom" },
	paddingLeft: { id: "paddingLeft", label: "Padding Left" },
	placeItems: { id: "placeItems", label: "Place Items" },

	perspective: { id: "perspective", label: "Perspective" },
	position: { id: "position", label: "Position" },
	right: { id: "right", label: "Right" },
	gap: { id: "gap", label: "Gap" },
	columnGap: { id: "columnGap", label: "Column gap" },
	rowGap: { id: "rowGap", label: "Row Gap" },

	textAlign: { id: "textAlign", label: "Text Align" },
	top: { id: "top", label: "Top" },
	transform: { id: "transform", label: "Transform" },
	transition: { id: "transition", label: "Transition" },
	verticalAlign: { id: "verticalAlign", label: "Vertical Align" },
	visibility: { id: "visibility", label: "Visibility" },
	width: { id: "width", label: "Width" },
	zIndex: { id: "zIndex", label: "Z-Index" },
	textDecoration: { id: "textDecoration", label: "Text Decoration" },
	textIndent: { id: "textIndent", label: "Text Indent" },
	textJustify: { id: "textJustify", label: "Text Justify" },
	textOverflow: { id: "textOverflow", label: "Text Overflow" },
	textShadow: { id: "textShadow", label: "Text Shadow" },
	transformOrigin: { id: "transformOrigin", label: "Transform Origin" },
	textTransform: { id: "textTransform", label: "Text Transform" },
	wordBreak: { id: "wordBreak", label: "Word Break" },
	wordSpacing: { id: "wordSpacing", label: "Word Spacing" },
	wordWrap: { id: "wordWrap", label: "Word Wrap" },
	writingMode: { id: "writingMode", label: "Writing Mode" },
};

addFilter("cssProps", "post-grid/cssProps", function (options) {
	return cssPropsPro;
});

const sudoScourceArgsPro = {
	styles: { label: "Idle", value: "styles" },
	hover: { label: "Hover", value: "hover" },
	after: { label: "After", value: "after" },
	before: { label: "Before", value: "before" },
	active: { label: "Active", value: "active" },
	focus: { label: "Focus", value: "focus" },
	"focus-within": {
		label: "Focus-within",
		value: "focus-within",
	},
	target: { label: "target", value: "target" },
	visited: { label: "Visited", value: "visited" },
	selection: { label: "Selection", value: "selection" },
	":marker": { label: "Marker", value: ":marker" },
	"nth-child(even)": {
		label: "nth-child(even)",
		value: "nth-child(even)",
	},
	"nth-child(odd)": {
		label: "nth-child(odd)",
		value: "nth-child(odd)",
	},
	"nth-child(2)": {
		label: "nth-child(2)",
		value: "nth-child(2)",
	},
	"nth-child(3)": {
		label: "nth-child(3)",
		value: "nth-child(3)",
	},
	"nth-child(4)": {
		label: "nth-child(4)",
		value: "nth-child(4)",
	},
	"nth-child(5)": {
		label: "nth-child(5)",
		value: "nth-child(5)",
	},

	"first-child": { label: "First-child", value: "first-child" },
	"last-child": { label: "Last-child", value: "last-child" },
	"first-letter": {
		label: "First-letter",
		value: "first-letter",
	},
	"first-line": { label: "First-line", value: "first-line" },
	"hover::before": { label: "hover::before", value: "hover::before" },
	"hover::after": { label: "hover::after", value: "hover::after" },
	"hover::marker": {
		label: "hover::marker",
		value: "hover::marker",
	},
	"hover::first-letter": {
		label: "hover::first-letter",
		value: "hover::first-letter",
	},
	"hover:first-child": {
		label: "hover:first-child",
		value: "hover:first-child",
	},
	"hover:last-child": {
		label: "hover:last-child",
		value: "hover:last-child",
	},
	"hover:first-line": {
		label: "hover:first-line",
		value: "hover:first-line",
	},
	"hover:first-line": {
		label: "hover:first-line",
		value: "hover:first-line",
	},
	"hover:nth-child(odd)": {
		label: "hover:nth-child(odd)",
		value: "hover:nth-child(odd)",
	},
	"hover:nth-child(even)": {
		label: "hover:nth-child(even)",
		value: "hover:nth-child(even)",
	},
};

addFilter("sudoScourceArgs", "post-grid/sudoScourceArgs", function (options) {
	return sudoScourceArgsPro;
});

const altTextSrcArgsPro = {
	none: { label: "No Alt Text", value: "" },
	imgAltText: { label: "Image Alt Text", value: "imgAltText" },
	imgTitle: { label: "Image Title", value: "imgTitle" },
	imgCaption: { label: "Image Caption", value: "imgCaption" },
	imgDescription: { label: "Image Description", value: "imgDescription" },
	imgSlug: { label: "Image Slug", value: "imgSlug" },
	postTitle: { label: "Post Title", value: "postTitle" },
	postSlug: { label: "Post Slug", value: "postSlug" },
	excerpt: { label: "Post Excerpt", value: "excerpt" },
	customField: { label: "Post Custom Field", value: "customField" },
	custom: { label: "Custom", value: "custom" },
};

addFilter("altTextSrcArgs", "post-grid/altTextSrcArgs", function (options) {
	return altTextSrcArgsPro;
});

var transitionPropertiesPro = {
	all: { value: "all", label: "All" },

	"background-color": { value: "background-color", label: "Background Color" },
	color: { value: "color", label: "Color" },
	"box-shadow": { value: "box-shadow", label: "Box Shadow" },
	"font-size": { value: "font-size", label: "Font Size" },
	right: { value: "right", label: "Right" },
	top: { value: "top", label: "Top" },
	width: { value: "width", label: "Width" },
	height: { value: "height", label: "Height" },
	"font-weight": { value: "font-weight", label: "Font Weight" },
	left: { value: "left", label: "Left" },
	"z-index": { value: "z-index", label: "Z-Index" },
	margin: { value: "margin", label: "Margin" },
	padding: { value: "padding", label: "Padding" },
	"max-height": { value: "max-height", label: "Max Height" },
	"max-width": { value: "max-width", label: "Max Width" },
	"min-height": { value: "min-height", label: "Min Height" },
	"min-width": { value: "min-width", label: "Min Width" },
	opacity: { value: "opacity", label: "Opacity" },
	"align-content": { value: "align-content", label: "Align Content" },
	"align-items": { value: "align-items", label: "Align Items" },
	"align-self": { value: "align-self", label: "Align Self" },
	"backface-visibility": {
		value: "backface-visibility",
		label: "Backface Visibility",
	},
	//background: { value: 'background', label: 'Background' },
	"background-attachment": {
		value: "background-attachment",
		label: "Background Attachment",
	},
	"background-blendMode": {
		value: "background-blendMode",
		label: "Background Blend Mode",
	},
	"background-clip": { value: "background-clip", label: "Background Clip" },
	"background-image": { value: "background-image", label: "Background Image" },
	"background-origin": {
		value: "background-origin",
		label: "Background Origin",
	},
	"background-repeat": {
		value: "background-repeat",
		label: "Background Repeat",
	},
	"background-position": {
		value: "background-position",
		label: "Background Position",
	},
	"background-size": { value: "background-size", label: "Background Size" },
	border: { value: "border", label: "Border" },
	"border-collapse": { value: "border-collapse", label: "Border Collapse" },
	"border-image": { value: "border-image", label: "Border Image" },
	"border-radius": { value: "border-radius", label: "Border Radius" },
	"border-spacing": { value: "border-spacing", label: "Border Spacing" },
	"backdrop-filter": { value: "backdrop-filter", label: "Backdrop Filter" },
	bottom: { value: "bottom", label: "Bottom" },
	"box-sizing": { value: "box-sizing", label: "Box Sizing" },
	clear: { value: "clear", label: "Clear" },
	clip: { value: "clip", label: "Clip" },
	"clip-path": { value: "clip-path", label: "Clip Path" },
	"column-count": { value: "column-count", label: "Column Count" },
	content: { value: "content", label: "Content" },

	cursor: { value: "cursor", label: "Cursor" },
	display: { value: "display", label: "Display" },
	direction: { value: "direction", label: "Direction" },
	float: { value: "float", label: "Float" },
	filter: { value: "filter", label: "Filter" },
	"font-family": { value: "font-family", label: "Font Family" },
	"font-stretch": { value: "font-stretch", label: "Font Stretch" },
	"font-style": { value: "font-style", label: "Font Style" },
	"user-select": { value: "user-select", label: "User Select" },
	"font-variant-caps": {
		value: "font-variant-caps",
		label: "Font VariantCaps",
	},
	"letter-spacing": { value: "letter-spacing", label: "Letter Spacing" },
	"line-height": { value: "line-height", label: "Line Height" },
	"list-style": { value: "list-style", label: "ListStyle" },
	outline: { value: "outline", label: "Outline" },
	overflow: { value: "overflow", label: "Overflow" },
	"overflow-x": { value: "overflow-x", label: "OverflowX" },
	"overflow-y": { value: "overflow-y", label: "OverflowY" },
	perspective: { value: "perspective", label: "Perspective" },
	position: { value: "position", label: "Position" },
	"text-align": { value: "text-align", label: "Text Align" },
	transform: { value: "transform", label: "Transform" },
	transition: { value: "transition", label: "Transition" },
	"vertical-align": { value: "vertical-align", label: "Vertical Align" },
	visibility: { value: "visibility", label: "Visibility" },
	"text-decoration": { value: "text-decoration", label: "Text Decoration" },
	"text-indent": { value: "text-indent", label: "Text Indent" },
	"text-justify": { value: "text-justify", label: "Text Justify" },
	"text-overflow": { value: "text-overflow", label: "Text Overflow" },
	"text-shadow": { value: "text-shadow", label: "Text Shadow" },
	"text-transform": { value: "text-transform", label: "Text Transform" },
	"word-break": { value: "word-break", label: "Word Break" },
	"word-spacing": { value: "word-spacing", label: "Word Spacing" },
	"word-wrap": { value: "word-wrap", label: "Word Wrap" },
	"writing-mode": { value: "writing-mode", label: "Writing Mode" },
};

addFilter(
	"transitionProperties",
	"post-grid/transitionProperties",
	function (options) {
		return transitionPropertiesPro;
	}
);

// terms list

const termsQueryPramsBasic = {
	taxonomy: {
		value: "category",
		multiple: false,
		id: "taxonomy",
		label: "Taxonomy",
		description: "Select Taxonomy to Query",
		longDescription:
			"Taxonomy name, or array of taxonomy names, to which results should be limited.",
	},
	orderby: {
		value: "name",
		multiple: false,
		id: "orderby",
		label: "Order By",
		description: "Search keyword, ex: hello",
	},
	order: {
		value: "ASC",
		multiple: false,
		id: "order",
		label: "Order",
		description: "Whether to order terms in ascending or descending order.",
	},
	hide_empty: {
		value: true,
		multiple: false,
		id: "hide_empty",
		label: "Hide Empty",
		description: "Accepts true or false value.",
		longDescription:
			"Whether to hide terms not assigned to any posts. Accepts 1|true or 0|false.",
	},
	number: {
		value: false,
		multiple: false,
		id: "number",
		label: "Number",
		description: "Accepts 0 (all) or any positive number.",
		longDescription:
			"Maximum number of terms to return. Accepts ''|0 (all) or any positive number. Default ''|0 (all). Note that $number may not return accurate results when coupled with $object_ids.",
	},
	include: {
		value: "category",
		multiple: false,
		id: "include",
		label: "Include",
		description: "Comma-separated string of term IDs to include.",
		longDescription:
			"Array or comma/space-separated string of term IDs to include. Default empty array.",
		placeholder: "Comma-separated string of term IDs to include.",
	},
	exclude: {
		value: "",
		multiple: false,
		id: "exclude",
		label: "Exclude",
		description: "Comma-separated string of term IDs to exclude.",
		longDescription:
			"Array or comma/space-separated string of term IDs to exclude. If $include is non-empty, $exclude is ignored. Default empty array.",
		placeholder: "Comma-separated string of term IDs to exclude.",
	},

	// Category Parameters
	exclude_tree: {
		value: "",
		multiple: false,
		id: "exclude_tree",
		label: "Exclude Tree",
		description: "Comma-separated string of term IDs to exclude.",
		longDescription:
			"Array or comma/space-separated string of term IDs to exclude along with all of their descendant terms. If $include is non-empty, $exclude_tree is ignored. Default empty array.",
		placeholder: "Comma-separated string of term IDs to exclude.",
	},

	count: {
		value: false,
		multiple: false,
		id: "count",
		label: "count",
		description:
			"Whether to return a term count. If true, will take precedence over $fields.",
	},
	offset: {
		value: "",
		multiple: false,
		id: "offset",
		label: "Offset",
		description: "The number by which to offset the terms query.",
		longDescription: "The number by which to offset the terms query.",
	},
	// fields: {
	// 	value: "all",
	// 	multiple: false,
	// 	id: "fields",
	// 	label: "Fields",
	// 	description: "Post query by Category IDs" /*isPro: true*/,
	// },
	name: {
		value: "",
		multiple: false,
		id: "name",
		label: "Name",
		description: "Name or array of names to return term(s) for.",
		longDescription: "Comma-separated names to return term(s) for.",
	},

	// Tag Parameters

	slug: {
		value: "",
		multiple: false,
		id: "slug",
		label: "Slug",
		description: "Slug or array of slugs to return term(s) for.",
		longDescription: "Comma-separated slugs to return term(s) for.",
	},
	hierarchical: {
		value: true,
		multiple: false,
		id: "hierarchical",
		label: "Hierarchical",
		description: "Whether to include terms that have non-empty descendants.",
		longDescription:
			"Whether to include terms that have non-empty descendants (even if $hide_empty is set to true).",
	},
	search: {
		value: "",
		multiple: false,
		id: "search",
		label: "Search",
		description: "Search criteria to match terms.",
		longDescription:
			"Search criteria to match terms. Will be SQL-formatted with wildcards before and after.",
	},
	name__like: {
		value: "",
		multiple: false,
		id: "name__like",
		label: "Name like",
		description:
			"Retrieve terms with criteria by which a term is LIKE $name__like.",
		longDescription:
			"Retrieve terms with criteria by which a term is LIKE $name__like.",
	},
	description__like: {
		value: "",
		multiple: false,
		id: "description__like",
		label: "Description like",
		description:
			"Retrieve terms where the description is LIKE $description__like.",
		longDescription:
			"Retrieve terms where the description is LIKE $description__like.",
	},
	pad_counts: {
		value: false,
		multiple: false,
		id: "pad_counts",
		label: "Pad counts",
		description:
			'Whether to pad the quantity of a term’s children in the quantity of each term’s "count" object variable.',
		longDescription:
			'Whether to pad the quantity of a term’s children in the quantity of each term’s "count" object variable. Default false.',
	},
	get: {
		value: "",
		multiple: false,
		id: "get",
		label: "Get",
		description:
			"Whether to return terms regardless of ancestry or whether the terms are empty.",
		longDescription:
			"Whether to return terms regardless of ancestry or whether the terms are empty. Accepts 'all' or '' (disabled). Default ''.",
	},

	child_of: {
		value: "",
		multiple: false,
		id: "child_of",
		label: "Child of",
		description: "Term ID to retrieve child terms of.",
		longDescription:
			"Term ID to retrieve child terms of. If multiple taxonomies are passed, $child_of is ignored. Default 0.",
	},

	parent: {
		value: "",
		multiple: false,
		id: "parent",
		label: "Parent",
		description:
			"Add {ID} to add Parent term ID to retrieve direct-child terms of.",
		longDescription: "Parent term ID to retrieve direct-child terms of.",
	},

	childless: {
		value: false,
		multiple: false,
		id: "childless",
		label: "Childless",
		description: "True to limit results to terms that have no children.",
		longDescription:
			"True to limit results to terms that have no children. This parameter has no effect on non-hierarchical taxonomies. Default false.",
	},

	// // Date Parameters
	cache_domain: {
		value: "core",
		multiple: false,
		id: "cache_domain",
		label: "Cache domain",
		description:
			"Unique cache key to be produced when this query is stored in an object cache.",
		longDescription:
			"Unique cache key to be produced when this query is stored in an object cache. Default 'core'.",
	},
	update_term_meta_cache: {
		value: true,
		multiple: false,
		id: "update_term_meta_cache",
		label: "Update term meta Cache",
		description:
			"Whether to prime meta caches for matched terms. Default true.",
	},
	// meta_query: {
	// 	value: [],
	// 	multiple: false,
	// 	id: "meta_query",
	// 	label: "Meta query",
	// 	description: "Post query by month",
	// },
	meta_key: {
		value: "",
		multiple: false,
		id: "meta_key",
		label: "Meta key",
		description: "Comma-separated keys to return term(s) for.",
		longDescription: "Meta key or keys to filter by.",
	},
	meta_value: {
		value: "",
		multiple: false,
		id: "meta_value",
		label: "Meta value",
		description: "Comma-separated keys to return term(s) for.",
		longDescription: "Meta value or values to filter by.",
	},
};

addFilter("termsQueryPrams", "post-grid/term-list", function (options) {
	return termsQueryPramsBasic;
});
// terms list

// icon position Start

// category
const iconPositonArgsPro = {
	none: { label: "Choose Position", value: "" },
	beforeFronttext: { label: "Before Front text", value: "beforeFronttext" },
	afterFronttext: { label: "After Front text", value: "afterFronttext" },
	beforeItems: { label: "Before Items", value: "beforeItems" },
	afterItems: { label: "After Items", value: "afterItems" },
	beforeItem: { label: "Before Each Items", value: "beforeItem" },
	afterItem: { label: "After Each Items", value: "afterItem" },
};

addFilter("iconPositonArgs", "post-grid/iconPositonArgs", function (options) {
	return iconPositonArgsPro;
});

// icon position End

/*

link To Arguments

*/

const linkToArgsPro = {
	noUrl: { label: "No URL", value: "" },

	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter("linkToArgs", "post-grid/linkToArgs", function (options) {
	return linkToArgsPro;
});

/*

link To Arguments

*/

// Wrapper Tag Start
const flexWrapItemWrapperTagArgsPro = {
	none: { label: "Choose Tag", value: "" },
	h1: { label: "H1", value: "h1" },
	h2: { label: "H2", value: "h2" },
	h3: { label: "H3", value: "h3" },
	h4: { label: "H4", value: "h4" },
	h5: { label: "H5", value: "h5" },
	h6: { label: "H6", value: "h6" },
	span: { label: "SPAN", value: "span" },
	div: { label: "DIV", value: "div" },
	p: { label: "P", value: "p" },
	a: { label: "A", value: "a" },
};

addFilter(
	"postGridFlexWrapItemTags",
	"post-grid/flex-wrap-item",
	function (options) {
		return flexWrapItemWrapperTagArgsPro;
	}
);
// Wrapper Tag End

// wordpress-org plugin and theme Fields

const pluginFieldListPro = {
	name: { id: "name", label: "Plugin Name", prefix: "Plugin Name: " },
	version: { id: "version", label: "Version", prefix: "Version:" },
	author: { id: "author", label: "Author", prefix: "Author" },
	homepage: {
		id: "homepage",
		label: "Homepage",
		prefix: "Homepage:",
		isLinked: true,
		linkText: "Homepage",
	},
	download_link: {
		id: "download_link",
		label: "Download Link",
		prefix: "Download Link",
		isLinked: true,
		linkText: "Download",
	},
	rating: { id: "rating", label: "Rating", prefix: "Rating", type: "star" },

	requires: {
		id: "requires",
		label: "Require WP Version",
		prefix: "WP Version: ",
	},
	tested: {
		id: "tested",
		label: "Tested WP Version",
		prefix: "WP Tested Version: ",
	},
	requires_php: {
		id: "requires_php",
		label: "Require PHP Version",
		prefix: "PHP Version: ",
	},
	author_profile: {
		id: "author_profile",
		label: "Author Profile",
		prefix: "Author Profile",
	},

	contributors: {
		id: "contributors",
		label: "Contributors",
		prefix: "Contributors",
		isLinked: true,
	},

	requires_plugins: {
		id: "requires_plugins",
		label: "Require Plugins",
		prefix: "Require Plugins: ",
	},

	ratings: {
		id: "ratings",
		label: "Ratings",
		prefix: "Ratings",
		type: "star",
	},
	num_ratings: {
		id: "num_ratings",
		label: "Num Ratings",
		prefix: "Num Ratings",
		type: "star",
	},
	support_threads: {
		id: "support_threads",
		label: "Support Threads",
		prefix: "Support Threads",
	},
	support_threads_resolved: {
		id: "support_threads_resolved",
		label: "Support Threads Resolved",
		prefix: "Support Threads Resolved",
	},
	active_installs: {
		id: "active_installs",
		label: "Active Install",
		prefix: "Active Install: ",
	},
	last_updated: {
		id: "last_updated",
		label: "Last Update",
		prefix: "Last Update: ",
	},
	added: {
		id: "added",
		label: "Creation Time",
		prefix: "Creation Time: ",
	},

	tags: { id: "tags", label: "Tags", prefix: "Tags:" },

	banners: {
		id: "banners",
		label: "Thumbnail",
		prefix: "Thumbnail",
		size: "high",
		isLinked: false,
	},
};

addFilter(
	"wordpressOrgPluginFieldList",
	"post-grid/wordpress-org",
	function (options) {
		return pluginFieldListPro;
	}
);

const themeFieldListPro = {
	name: { id: "name", label: "Name", prefix: "Theme Name: " },
	version: { id: "version", label: "Version", prefix: "Version:" },
	author: { id: "author", label: "Author", prefix: "Author" },
	screenshot_url: { id: "screenshot_url", label: "Screenshot" },
	ratings: { id: "ratings", label: "Ratings", prefix: "Ratings" },

	rating: { id: "rating", label: "Rating", prefix: "Rating", type: "star" },
	homepage: {
		id: "homepage",
		label: "Homepage",
		prefix: "Homepage:",
		isLinked: true,
		linkText: "Homepage",
	},
	download_link: {
		id: "download_link",
		label: "Download Link",
		prefix: "Download Link",
		isLinked: true,
		linkText: "Download",
	},

	requires: {
		id: "requires",
		label: "Require WP Version",
		prefix: "WP Version: ",
	},
	requires_php: {
		id: "requires_php",
		label: "Require PHP Version",
		prefix: "PHP Version: ",
	},

	preview_url: {
		id: "preview_url",
		label: "Preview URL",
		prefix: "Preview URL",
		isLinked: true,
		linkText: "Preview",
	},
	num_ratings: {
		id: "num_ratings",
		label: "Number of Ratings",
	},
	reviews_url: {
		id: "reviews_url",
		label: "Reviews URL",
		isLinked: true,
		linkText: "Reviews",
	},
	last_updated: {
		id: "last_updated",
		label: "Last Update",
		prefix: "Last Update: ",
	},
	creation_time: {
		id: "creation_time",
		label: "Creation Time",
		prefix: "Creation Time: ",
	},

	tags: { id: "tags", label: "Tags", prefix: "Tags: " },

	is_commercial: {
		id: "is_commercial",
		label: "Is Commercial",
		prefix: "Is Commercial",
	},
	external_support_url: {
		id: "external_support_url",
		label: "External Support URL",
		prefix: "External Support URL",
		isLinked: true,
		linkText: "Support URL",
	},
	external_repository_url: {
		id: "external_repository_url",
		label: "External Sepository URL",
		prefix: "External Sepository URL",
		isLinked: true,
		linkText: "Repository",
	},
};

addFilter(
	"wordpressOrgThemeFieldList",
	"post-grid/wordpress-org",
	function (options) {
		return themeFieldListPro;
	}
);

// wordpress-org plugin and theme Fields

// class picker filter

var customTagsPro = {
	currentYear: {
		label: "Current Year",
		id: '{currentYear["y"]}',
		value: "2023",
	},
	currentMonth: {
		label: "Current Month",
		id: '{currentMonth["m"]}',
		value: "07",
	},
	currentDay: { label: "Current Day", id: '{currentDay["d"]}', value: "01" },
	currentDate: {
		label: "Current Date",
		id: '{currentDate["d- m - Y"]}',
		value: "01-01-2023",
	},
	currentTime: {
		label: "Current Time",
		id: '{currentTime["h: i:sa"]}',
		value: "06:00:00:am",
	},
	postPublishDate: {
		label: "Post Publish Date",
		id: '{postPublishDate["d-m-Y"]}',
		value: "01-01-2023",
	},
	postModifiedDate: {
		label: "Post Modified Date",
		id: '{postModifiedDate["d - m - Y"]}',
		value: "01-01-2023",
	},
	termId: { label: "Term Id", id: "{termId}", value: "123" },
	termTitle: {
		label: "Term Title",
		id: "{termTitle}",
		value: "Hello Term Title",
	},
	termDescription: {
		label: "Term Description",
		id: "{termDescription}",
		value: "Hello term description",
	},
	termPostCount: {
		label: "Term Post Count",
		id: "{termPostCount}",
		value: "123",
	},
	postTagTitle: {
		label: "Post Tag Title",
		id: "{postTagTitle}",
		value: "sports",
	},
	postTagsTitle: {
		label: "Post Tags Title",
		id: '{postTagsTitle["3, -"]}',
		value: "football , cricket",
	},
	postCategoryTitle: {
		label: "Post Category Title",
		id: "{postCategoryTitle}",
		value: "sports",
	},
	postCategoriesTitle: {
		label: "Post Categories Title",
		id: '{postCategoriesTitle["3"]}',
		value: "football , cricket",
	},
	postTermTitle: {
		label: "Post Term Title",
		id: '{postTermTitle["taxonomy"]}',
		value: "sports",
	},
	postTermsTitle: {
		label: "Post Terms Title",
		id: '{postTermsTitle["taxonomy, 3"]}',
		value: "football , cricket",
	},
	postSlug: { label: "Post Slug", id: "{postSlug}", value: "post-slug" },
	postId: { label: "Post ID", id: "{postID}", value: "123" },
	postStatus: { label: "Post Status", id: "{postStatus}", value: "published" },
	authorId: { label: "Author Id", id: "{authorId}", value: "123" },
	authorName: {
		label: "Author Name",
		id: "{authorName}",
		value: "hello author",
	},
	authorFirstName: {
		label: "Author FirstName",
		id: "{authorFirstName}",
		value: "first name",
	},
	authorLastName: {
		label: "Author Last Name",
		id: "{authorLastName}",
		value: "last name",
	},
	authorDescription: {
		label: "Author Description",
		id: "{authorDescription}",
		value: "Hello author description",
	},
	excerpt: { label: "Post Excerpt", id: "{excerpt}", value: "hello excerpt" },
	rankmathTitle: {
		label: "Rankmath Title",
		id: "{rankmathTitle}",
		value: "Rank Math Title",
	},
	// rankmathPermalink: {
	// 	label: "Rankmath Permalink",
	// 	id: '{rankmathPermalink}',
	// 	value: "",
	// },
	rankmathDescription: {
		label: "Rankmath Description",
		id: "{rankmathDescription}",
		value: "Rank Math Description",
	},
	rankmathFocusKeyword: {
		label: "Rankmath Focus Keyword",
		id: "{rankmathFocusKeyword}",
		value: "Rank Math Focus Keyword",
	},
	// rankmathFocusKeywords: {
	// 	label: "Rankmath Focus Keywords",
	// 	id: '{rankmathFocusKeywords[", "]}',
	// 	value: "",
	// },
	rankmathOrgname: {
		label: "Rankmath Org name",
		id: "{rankmathOrgname}",
		value: "Rank Math Org Name",
	},
	rankmathOrgurl: {
		label: "Rankmath Org URL",
		id: "{rankmathOrgurl}",
		value: "https://hello.world",
	},
	rankmathOrglogo: {
		label: "Rankmath Org logo",
		id: "{rankmathOrglogo}",
		value: "",
	},
	siteTitle: { label: "Site Title", id: "{siteTitle}", value: "WordPress" },
	siteDescription: {
		label: "Site Description",
		id: "{siteDescription}",
		value: "Hello site description",
	},
	// siteTagline: { label: "Site Tagline", id: '{siteTagline}', value: "" },
	postMeta: {
		label: "Post Meta",
		id: '{postMeta["metaKey"]}',
		value: "meta value",
	},
	separator: { label: "Separator", id: '{separator[" - "]}', value: "-" },
	searchTerms: {
		label: "Search Terms",
		id: "{searchTerms}",
		value: "hello search terms",
	},
	// counter: { label: "Counter", id: '{counter}', value: "" },
};

addFilter(
	"postGridClassPickerFilter",
	"post-grid/component/classPicker",
	function (options) {
		return customTagsPro;
	}
);

// class picker filter

/*
Post Taxonomies Block Filter Hook Start 
*/

// post taxonomies Icon

var postTaxonomiesIconPositionPro = {
	none: { label: "Choose Position", value: "" },
	beforeFronttext: { label: "Before Front text", value: "beforeFronttext" },
	afterFronttext: {
		label: "After Front text",
		value: "afterFronttext",
	},
	beforeItems: { label: "Before Items", value: "beforeItems" },
	afterItems: { label: "After Items", value: "afterItems" },
	beforeItem: {
		label: "Before Each Items",
		value: "beforeItem",
	},
	afterItem: { label: "After Each Items", value: "afterItem" },
};

addFilter(
	"postGridPostTaxonomiesIconPosition",
	"post-grid/post-taxonomies",
	function (options) {
		return postTaxonomiesIconPositionPro;
	}
);

// post-taxonomies link to

const postTaxonomiesLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	termUrl: { label: "Term URL", value: "termUrl" },

	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridPostTaxonomiesLinkTo",
	"post-grid/post-taxonomies",
	function (options) {
		return postTaxonomiesLinkToPro;
	}
);

/*
Post Tags Block Filter Hook Start 
*/

// post-tags icon position

var postTagsIconPositionPro = {
	none: { label: "Choose Position", value: "" },
	beforeFronttext: { label: "Before Front text", value: "beforeFronttext" },
	afterFronttext: {
		label: "After Front text",
		value: "afterFronttext",
	},
	beforeItems: { label: "Before Items", value: "beforeItems" },
	afterItems: { label: "After Items", value: "afterItems" },
	beforeItem: {
		label: "Before Each Items",
		value: "beforeItem",
	},
	afterItem: { label: "After Each Items", value: "afterItem" },
};

addFilter(
	"postGridPostTagsIconPosition",
	"post-grid/post-tags",
	function (options) {
		return postTagsIconPositionPro;
	}
);

// post-tags link to

const postTagsLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	termUrl: { label: "Term URL", value: "termUrl" },

	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter("postGridPostTagsLinkTo", "post-grid/post-tags", function (options) {
	return postTagsLinkToPro;
});

/*
Post Date Block Filter Hook Start 
*/

// post-date icon position

var postDateIconPositionPro = {
	none: { label: "Choose Position", value: "" },
	beforePostDate: { label: "Before Post Date", value: "beforePostDate" },
	afterPostDate: {
		label: "After Post Date",
		value: "afterPostDate",
	},
	beforePrefix: {
		label: "Before Prefix",
		value: "beforePrefix",
	},
	afterPrefix: { label: "After Prefix", value: "afterPrefix" },
	beforePostfix: {
		label: "Before PostFix",
		value: "beforePostfix",
	},
	afterPostfix: {
		label: "After PostFix",
		value: "afterPostfix",
	},
};

addFilter(
	"postGridPostDateIconPosition",
	"post-grid/post-date",
	function (options) {
		return postDateIconPositionPro;
	}
);

// post-date link to

const postDateLinkToPro = {
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	archiveDate: { label: "Date Archive", value: "archiveDate" },
	archiveYear: { label: "Year Archive", value: "archiveYear" },
	archiveMonth: { label: "Month Archive", value: "archiveMonth" },

	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter("postGridPostDateLinkTo", "post-grid/post-date", function (options) {
	return postDateLinkToPro;
});

/*
Number Counter Block Filter Hook Start 
*/

// number-counter icon position

const numberCounterIconPositionPro = {
	none: { label: "Choose Position", value: "" },

	beforePrefix: {
		label: "Before Prefix",
		value: "beforePrefix",
	},
	afterPrefix: { label: "After Prefix", value: "afterPrefix" },
	beforePostfix: {
		label: "Before PostFix",
		value: "beforePostfix",
	},
	afterPostfix: {
		label: "After PostFix",
		value: "afterPostfix",
	},
};

addFilter(
	"postGridNumberCounterIconPosition",
	"post-grid/number-counter",
	function (options) {
		return numberCounterIconPositionPro;
	}
);

/*
Form Wrap Block Filter Hook Start 
*/

// form wrap form type

var formWrapFormTypePro = {
	contactForm: {
		label: "Contact Form",
		description: "Contact Form",
		args: { id: "contactForm" },
	},
	loginForm: {
		label: "Login Form",
		description: "Login Form",
		args: { id: "loginForm" },
	},
	registerForm: {
		label: "Register Form",
		description: "Register Form",
		args: { id: "registerForm" },
	},

	postSubmitForm: {
		label: "Post Submit Form",
		description: "Post Submit Form",
		args: { id: "postSubmitForm" },
	},
	// postUpdateForm: { label: 'Post Update Form', description: 'Post Update Form', args: { id: 'postUpdateForm', } },
	termSubmitForm: {
		label: "Term Submit Form",
		description: "Term Submit Form",
		args: { id: "termSubmitForm" },
	},
	// termUpdateForm: { label: 'Term Update Form', description: 'Term Update Form', args: { id: 'termUpdateForm', } },
	// postMetaUpdate: { label: 'Post Meta Update', description: 'Post Meta Update', args: { id: 'postMetaUpdate', } },
	commentSubmit: {
		label: "Comment Submit Form",
		description: "Post Comment Submit Form",
		args: { id: "commentSubmit" },
	},
	// postCommentUpdateForm: { label: 'Post Comment Update Form', description: 'Post Comment Update Form', args: { id: 'postCommentUpdateForm', } },
	// fileUploadForm: { label: 'File Upload Form', description: 'File Upload Form', args: { id: 'fileUploadForm', } },
	//newsletterForm: { label: 'Newsletter Form', description: 'Newsletter Form', args: { id: 'newsletterForm', } },
	optInForm: {
		label: "Opt-In Form",
		description: "Opt-In Form",
		args: { id: "optInForm" },
	},

	postFilter: {
		label: "Post Filter",
		description: "Post Filter",
		args: { id: "postFilter" },
	},
	appointmentForm: {
		label: "Appointment Form",
		description: "Appointment Form",
		args: { id: "appointmentForm" },
	},
};

addFilter(
	"postGridFormWrapFormType",
	"post-grid/form-wrap",
	function (options) {
		return formWrapFormTypePro;
	}
);

// form wrap on process

const formWrapOnProcessPro = {
	sendMail: {
		label: "Send Mail",
		description: "Send Mail",
		args: { id: "sendMail", mailTo: "", bcc: "" },
	},
	emailBcc: {
		label: "Send BCC",
		description: "Send BCC",
		args: { id: "emailBcc", message: "" },
	},
	emailCopyUser: {
		label: "Email Copy User",
		description: "Email Copy User",
		args: { id: "emailCopyUser", message: "" },
	},
	autoReply: {
		label: "Auto Reply",
		description: "Auto Reply",
		args: { id: "autoReply", message: "" },
	},

	// Login Form
	loggedInUser: {
		label: "Logged in user",
		description: "Logged in user",
		args: { id: "loggedInUser", message: "" },
	},

	// Register Form
	registerUser: {
		label: "Register user",
		description: "Register user",
		args: { id: "registerUser", message: "" },
	},
	//registerUserMail: { label: 'Register user mail', description: 'Register user mail', args: { id: 'registerUserMail', mailTo: '', bcc: '', } },

	// Post Submit form
	postSubmit: {
		label: "Create Post",
		description: "Create Post",
		args: { id: "postSubmit", postType: "" },
	},
	commentSubmit: {
		label: "Comment Submit",
		description: "Comment Submit",
		args: { id: "commentSubmit", loginRequired: false },
	},
	termSubmit: {
		label: "Term Submit",
		description: "Term Submit",
		args: { id: "termSubmit", postType: "" },
	},

	// For All type form
	createEntry: {
		label: "Create Entry",
		description: "Create Entry",
		args: { id: "createEntry", message: "" },
	},
	newsletterSubmit: {
		label: "Newsletter Submit",
		description: "Newsletter Submit",
		args: { id: "newsletterSubmit", message: "" },
	},

	// third-parties
	fluentcrmAddContact: {
		label: "Fluentcrm - Add Contact",
		description: "Add to Fluentcrm Contacts list",
		args: { id: "fluentcrmAddContact", lists: [], tags: [], message: "" },
	},
	mailpickerAddContact: {
		label: "MailPicker - Add Contact",
		description: "Add to MailPicker subscriber list",
		args: { id: "mailpickerAddContact", lists: [], tags: [], message: "" },
	},
};

addFilter(
	"postGridFormWrapOnProcess",
	"post-grid/form-wrap",
	function (options) {
		return formWrapOnProcessPro;
	}
);

// form wrap after submit

const formWrapAfterSubmitPro = {
	showResponse: {
		label: "Show Response",
		description: "Show Response Message",
		args: { id: "showResponse", message: "" },
	},
	redirectToURL: {
		label: "Redirect To URL",
		description: "Redirect To URL",
		args: { id: "redirectToURL", value: "" },
	},
	refreshPage: {
		label: "Refresh Page",
		description: "Refresh Page",
		args: { id: "refreshPage", delay: "" },
	},

	//loggedOut: { label: 'Logged Out', description: 'Logged out current user', args: { id: 'loggedOut', message: '' } },
	//loggedIn: { label: 'Logged In', description: 'Logged in user', args: { id: 'loggedIn', message: '' } },
	loggedOut: {
		label: "Logged Out",
		description: "Logged out current user",
		args: { id: "loggedOut", redirect: "" },
	},

	hideForm: {
		label: "Hide Form",
		description: "Hide Form",
		args: { id: "hideForm", message: "" },
	},
	clearForm: {
		label: "Clear Form",
		description: "Clear Form",
		args: { id: "clearForm", message: "" },
	},
	hidePopup: {
		label: "Hide Popup",
		description: "Hide Popup",
		args: { id: "hidePopup", message: "" },
	},
};

addFilter(
	"postGridFormWrapAfterSubmit",
	"post-grid/form-wrap",
	function (options) {
		return formWrapAfterSubmitPro;
	}
);

// form wrap visible args

const formWrapVisibleArgsPro = {
	userLogged: {
		label: "User Logged",
		description: "Show when user logged-in(any user)",
		args: { id: "userLogged", value: "" },
	},
	userNotLogged: {
		label: "User Not Logged",
		description: "Show when user Not logged-in.",
		args: { id: "userNotLogged", value: "" },
	},
	userRoles: {
		label: "User Roles",
		description: "Show when user has specific roles.",
		args: { id: "userRoles", roles: [] },
	},

	isYears: {
		label: "is Years",
		description: "Show when specific Years",
		args: { id: "isYears", value: "", values: "", compare: "=" },
	},
	isMonths: {
		label: "is Months",
		description: "Show when specific months",
		args: { id: "isMonths", value: "", values: [], compare: "=" },
	},
	weekDays: {
		label: "is Week day",
		description: "Show when specific week days",
		args: { id: "weekDays", value: "", values: [], compare: "=" },
	},
	isHours: {
		label: "is Hours",
		description: "Show when specific hours",
		args: { id: "isHours", value: "", values: [], compare: "=" },
	},
	//isMinutes: { label: 'is Minutes', description: 'Show when specific Minutes', args: { id: 'isMinutes', value: '', values: [], compare: '=' }, isPro:true },
	isDate: {
		label: "is Date",
		description: "Show when specific date",
		args: { id: "isDate", value: "", values: [], compare: "=" },
	},

	// submitCount: { label: 'Submit Count', description: 'Visible under specific submit count', args: { id: 'submitCount', value: '' }, isPro:true },
};

addFilter(
	"postGridFormWrapVisibleArgs",
	"post-grid/form-wrap",
	function (options) {
		return formWrapVisibleArgsPro;
	}
);

/*
Popup Block Filter Hook Start 
*/

// popup visible args

const popupVisibleArgsPro = {
	initial: {
		label: "Initial",
		description: "Visble as soon as possible",
		args: { id: "initial", value: 5 },
	},
	delay: {
		label: "Delay",
		description: "Delay certain amount of time after page load.",
		args: { id: "delay", value: 1000 },
	},
	scrollParcent: {
		label: "Scroll Parcent",
		description: "After certain amount(parcent) of scroll",
		args: { id: "scrollParcent", min: "30", max: 50 },
	},
	scrollFixed: {
		label: "Scroll Fixed",
		description: "After fixed amount of scroll",
		args: { id: "scrollFixed", min: "30", max: 50 },
	},
	scrollEnd: {
		label: "Scroll End",
		description: "Scroll to end of page",
		args: { id: "scrollEnd", min: "30", max: 50 },
	},
	scrollElement: {
		label: "Scroll Element",
		description: "Scroll to certain element by class or id",
		args: { id: "scrollElement", value: "" },
	},
	clickFirst: {
		label: "Click First",
		description: "After first click on page",
		args: { id: "clickFirst", value: 1 },
	},
	clickCount: {
		label: "Click Count",
		description: "After certain amount of click on page",
		args: { id: "clickCount", value: 5 },
	},
	clickRight: {
		label: "Click Right",
		description: "on right click",
		args: { id: "clickRight", value: 0 },
	},
	onExit: {
		label: "On Exit",
		description: "before close browser tab.",
		args: { id: "onExit", value: 1 },
	},
	clickElement: {
		label: "Click Element",
		description: "After click an element by id or class",
		args: { id: "clickElement", value: "" },
	},
	dateCountdownExpired: {
		label: "Date Countdown Expired",
		description: "After expired from date countdown block",
		args: { id: "dateCountdownExpired", value: "", once: false },
	},

	// onHover: { label: 'On Hover', description: 'Display popup on hover an element', args: { id: 'onHover', value: '' } },
	// isDevice: { label: 'Device', description: 'Display popup based on device', args: { id: 'isDevice', value: '' } },
	// isDate: { label: 'Is Date', description: 'Display popup based on date', args: { id: 'isDate', value: '', start: '', end: '' } },
	// visitCount: { label: 'Visit Count', description: 'Display popup based on date', args: { id: 'visitCount', value: '', compair: '' } },
	// isCountries: { label: 'Is Country', description: 'Display popup based on countries', args: { id: 'isCountries', value: '' } },
	// isBrowsers: { label: 'Is browsers', description: 'Display popup based on browsers', args: { id: 'isBrowsers', value: '' } },

	cookieExist: {
		label: "Cookie Exist",
		description: "If certain cookie exist",
		args: { id: "cookieExist", value: "" },
	},
	cookieNotExist: {
		label: "Cookie Not Exist",
		description: "If certain cookie not exist",
		args: { id: "cookieNotExist", value: "" },
	},
	userLogged: {
		label: "User Logged",
		description: "Show when user logged-in(any user)",
		args: { id: "userLogged", value: "" },
	},
	userIds: {
		label: "User Ids",
		description: "If user with certain id loggedin",
		args: { id: "userIds", value: "" },
	},

	// postsIds: { label: 'Post Ids', description: 'Display popups on single post/page by ids', args: { id: 'postsIds', value: '' }, },
	// termIds: { label: 'Term Ids', description: 'Display popups on terms page by ids', args: { id: 'postsIds', value: '' }, },
	// authorIds: { label: 'Author Ids', description: 'Display popups on author page by ids', args: { id: 'postsIds', value: '' }, },
	// homePage: { label: 'Is Home', description: 'Display popups on home  page', args: { id: 'homePage', value: '' }, },

	// frontPage: { label: 'Is Home', description: 'Display popups on home  page', args: { id: 'frontPage', value: '' }, },
	// postsPage: { label: 'Is Posts Page', description: 'Display popups on blog  page', args: { id: 'postsPage', value: '' }, },
	// isDate: { label: 'Is Date Page', description: 'Display popups on date archive  page', args: { id: 'isDate', value: '' }, },
	// isMonth: { label: 'Is Date Page', description: 'Display popups on month archive  page', args: { id: 'isMonth', value: '' }, },
	// isYear: { label: 'Is Date Page', description: 'Display popups on year archive page', args: { id: 'isYear', value: '' }, },
	// is404: { label: 'Is Date Page', description: 'Display popups on 404 archive page', args: { id: 'is404', value: '' }, },

	// wcAccount: { label: 'Is WooCommerce Account', description: 'Display popups on WooCommerce my account page', args: { id: 'wcAccount', value: '' }, },
	// wcShop: { label: 'Is WooCommerce Shop', description: 'Display popups on WooCommerce shop page', args: { id: 'wcShop', value: '' }, },
	// searchPage: { label: 'Is Search page', description: 'Display popups on search page', args: { id: 'searchPage', value: '' }, },

	urlPrams: {
		label: "URL Prams",
		description:
			"If URL contain certain parameter(ex: domain.com/some-page?urlPram=pramVal)",
		args: { id: "urlPrams", value: "" },
	},
	referrerExist: {
		label: "Referrer Exist",
		description: "if visitor come from external website.",
		args: { id: "referrerExist", value: "" },
	},
};

addFilter("postGridPopupVisibleArgs", "post-grid/popup", function (options) {
	return popupVisibleArgsPro;
});

// popup entrance animation

const popupEntranceAnimatePro = {
	backInDown: { label: "backInDown", value: "backInDown" },
	backInLeft: { label: "backInLeft", value: "backInLeft" },
	backInRight: { label: "backInRight", value: "backInRight" },
	backInUp: { label: "backInUp", value: "backInUp" },
	bounceIn: { label: "bounceIn", value: "bounceIn" },
	bounceInDown: {
		label: "bounceInDown",
		value: "bounceInDown",
	},
	bounceInLeft: {
		label: "bounceInLeft",
		value: "bounceInLeft",
	},
	bounceInRight: {
		label: "bounceInRight",
		value: "bounceInRight",
	},
	bounceInUp: { label: "bounceInUp", value: "bounceInUp" },
	fadeIn: { label: "fadeIn", value: "fadeIn" },
	fadeInDown: { label: "fadeInDown", value: "fadeInDown" },
	fadeInDownBig: {
		label: "fadeInDownBig",
		value: "fadeInDownBig",
	},
	fadeInLeft: { label: "fadeInLeft", value: "fadeInLeft" },
	fadeInLeftBig: {
		label: "fadeInLeftBig",
		value: "fadeInLeftBig",
	},
	fadeInRight: { label: "fadeInRight", value: "fadeInRight" },
	fadeInRightBig: {
		label: "fadeInRightBig",
		value: "fadeInRightBig",
	},
	fadeInUp: { label: "fadeInUp", value: "fadeInUp" },
	fadeInUpBig: { label: "fadeInUpBig", value: "fadeInUpBig" },
	fadeInTopLeft: {
		label: "fadeInTopLeft",
		value: "fadeInTopLeft",
	},
	fadeInTopRight: {
		label: "fadeInTopRight",
		value: "fadeInTopRight",
	},
	fadeInBottomRight: {
		label: "fadeInBottomRight",
		value: "fadeInBottomRight",
	},
	fadeInBottomLeft: {
		label: "fadeInBottomLeft",
		value: "fadeInBottomLeft",
	},
	rotateIn: { label: "rotateIn", value: "rotateIn" },
	rotateInDownLeft: {
		label: "rotateInDownLeft",
		value: "rotateInDownLeft",
	},
	rotateInDownRight: {
		label: "rotateInDownRight",
		value: "rotateInDownRight",
	},
	rotateInUpLeft: {
		label: "rotateInUpLeft",
		value: "rotateInUpLeft",
	},
	rotateInUpRight: {
		label: "rotateInUpRight",
		value: "rotateInUpRight",
	},
	zoomIn: { label: "zoomIn", value: "zoomIn" },
	zoomInDown: { label: "zoomInDown", value: "zoomInDown" },
	zoomInLeft: { label: "zoomInLeft", value: "zoomInLeft" },
	zoomInRight: { label: "zoomInRight", value: "zoomInRight" },
	zoomInUp: { label: "zoomInUp", value: "zoomInUp" },
	slideInDown: { label: "slideInDown", value: "slideInDown" },
	slideInLeft: { label: "slideInLeft", value: "slideInLeft" },
	slideInRight: {
		label: "slideInRight",
		value: "slideInRight",
	},
	slideInUp: { label: "slideInUp", value: "slideInUp" },
};

addFilter(
	"postGridPopupEntranceAnimation",
	"post-grid/popup",
	function (options) {
		return popupEntranceAnimatePro;
	}
);

// popup close animation

const popupCloseAnimatePro = {
	backOutDown: { label: "backOutDown", value: "backOutDown" },
	backOutLeft: { label: "backOutLeft", value: "backOutLeft" },
	backOutRight: {
		label: "backOutRight",
		value: "backOutRight",
	},
	backOutUp: { label: "backOutUp", value: "backOutUp" },
	bounceOut: { label: "bounceOut", value: "bounceOut" },
	bounceOutDown: {
		label: "bounceOutDown",
		value: "bounceOutDown",
	},
	bounceOutLeft: {
		label: "bounceOutLeft",
		value: "bounceOutLeft",
	},
	bounceOutRight: {
		label: "bounceOutRight",
		value: "bounceOutRight",
	},
	bounceOutUp: { label: "bounceOutUp", value: "bounceOutUp" },
	fadeOut: { label: "fadeOut", value: "fadeOut" },
	fadeOutDown: { label: "fadeOutDown", value: "fadeOutDown" },
	fadeOutDownBig: {
		label: "fadeOutDownBig",
		value: "fadeOutDownBig",
	},
	fadeOutLeft: { label: "fadeOutLeft", value: "fadeOutLeft" },
	fadeOutLeftBig: {
		label: "fadeOutLeftBig",
		value: "fadeOutLeftBig",
	},
	fadeOutRight: {
		label: "fadeOutRight",
		value: "fadeOutRight",
	},
	fadeOutRightBig: {
		label: "fadeOutRightBig",
		value: "fadeOutRightBig",
	},
	fadeOutUp: { label: "fadeOutUp", value: "fadeOutUp" },
	fadeOutUpBig: {
		label: "fadeOutUpBig",
		value: "fadeOutUpBig",
	},
	fadeOutTopLeft: {
		label: "fadeOutTopLeft",
		value: "fadeOutTopLeft",
	},
	fadeOutTopRight: {
		label: "fadeOutTopRight",
		value: "fadeOutTopRight",
	},
	fadeOutBottomRight: {
		label: "fadeOutBottomRight",
		value: "fadeOutBottomRight",
	},
	fadeOutBottomLeft: {
		label: "fadeOutBottomLeft",
		value: "fadeOutBottomLeft",
	},
	rotateOut: { label: "rotateOut", value: "rotateOut" },
	rotateOutDownLeft: {
		label: "rotateOutDownLeft",
		value: "rotateOutDownLeft",
	},
	rotateOutDownRight: {
		label: "rotateOutDownRight",
		value: "rotateOutDownRight",
	},
	rotateOutUpLeft: {
		label: "rotateOutUpLeft",
		value: "rotateOutUpLeft",
	},
	rotateOutUpRight: {
		label: "rotateOutUpRight",
		value: "rotateOutUpRight",
	},
	zoomOut: { label: "zoomOut", value: "zoomOut" },
	zoomOutDown: { label: "zoomOutDown", value: "zoomOutDown" },
	zoomOutLeft: { label: "zoomOutLeft", value: "zoomOutLeft" },
	zoomOutRight: {
		label: "zoomOutRight",
		value: "zoomOutRight",
	},
	zoomOutUp: { label: "zoomOutUp", value: "zoomOutUp" },
	slideOutDown: {
		label: "slideOutDown",
		value: "slideOutDown",
	},
	slideOutLeft: {
		label: "slideOutLeft",
		value: "slideOutLeft",
	},
	slideOutRight: {
		label: "slideOutRight",
		value: "slideOutRight",
	},
	slideOutUp: { label: "slideOutUp", value: "slideOutUp" },
};

addFilter("postGridPopupCloseAnimation", "post-grid/popup", function (options) {
	return popupCloseAnimatePro;
});

/*
Icon/Button/Link Block Filter Hook Start 
*/

// icon link to

const iconLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	// termUrl: { label: "Term URL", value: "termUrl" },

	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter("postGridIconLinkTo", "post-grid/icon", function (options) {
	return iconLinkToPro;
});

// icon text source

const iconTextSourcePro = {
	siteTitle: { label: "Site Title", value: "siteTitle" },
	tagline: { label: "Tag line", value: "tagline" },
	siteUrl: { label: "Site URL", value: "siteUrl" },
	currentYear: { label: "Current Year", value: "currentYear" },
	currentDate: { label: "Current Date", value: "currentDate" },
	postTitle: { label: "Post Title", value: "postTitle" },
};

addFilter("postGridIconTextSource", "post-grid/icon", function (options) {
	return iconTextSourcePro;
});

/*
Date Countdown Block Filter Hook Start 
*/

// date-countdown expiredArgs

const dateCountdownExpiredArgsPro = {
	redirectURL: {
		label: "Redirect URL",
		description: "Redirect to a URL as soon as possible.",
		args: { id: "redirectURL", value: "", delay: "" },
	},
	wcHideCartButton: {
		label: "Hide Cart Button",
		description: "On Expired Cart Button will be hide.",
		args: { id: "wcHideCartButton" },
	},
	showExpiredMsg: {
		label: "Show Expired Message",
		description: "Visible as soon as possible",
		args: { id: "showExpiredMsg" },
	},
	hideCountdown: {
		label: "Hide Countdown",
		description: "Countdown will be hide.",
		args: { id: "hideCountdown" },
	},
	showElement: {
		label: "Show Element",
		description: "Visible as soon as possible.",
		args: { id: "showElement", value: "" },
	},
	showPopup: {
		label: "Show Popup",
		description: "Popup will be visible.",
		args: { id: "showPopup" },
	},
};

addFilter(
	"postGridDateCountdownExpiredArgs",
	"post-grid/date-countdown",
	function (options) {
		return dateCountdownExpiredArgsPro;
	}
);

// date-countdown startDate

var dateCountdownStartDateSourcePro = {
	none: { label: "Choose", value: "" },
	wc_sale_price_date_from: {
		label: "Sale Start Date",
		value: "wc_sale_price_date_from",
	},
};

addFilter(
	"postGridDateCountdownStartDate",
	"post-grid/date-countdown",
	function (options) {
		return dateCountdownStartDateSourcePro;
	}
);

// date-countdown endDate

var dateCountdownEndDateSourcePro = {
	none: { label: "Choose", value: "" },
	wc_sale_price_date_to: {
		label: "Sale End Date",
		value: "wc_sale_price_date_to",
	},
};

addFilter(
	"postGridDateCountdownEndDate",
	"post-grid/date-countdown",
	function (options) {
		return dateCountdownEndDateSourcePro;
	}
);

// // icon text source

// const iconTextSourcePro = {
// 	siteTitle: { label: "Site Title", value: "siteTitle" },
// 			tagline: { label: "Tag line", value: "tagline" },
// 			siteUrl: { label: "Site URL", value: "siteUrl" },
// 			currentYear: { label: "Current Year", value: "currentYear" },
// 			currentDate: { label: "Current Date", value: "currentDate", },
// 			postTitle: { label: "Post Title", value: "postTitle", },
// };

// addFilter(
// 	"postGridIconTextSource",
// 	"post-grid/icon",
// 	function (options) {
// 		return iconTextSourcePro;
// 	}
// );

/*
Image Block Filter Hook Start 
*/

// alt text

const imageAltTextSrcPro = {
	none: { label: "No Alt Text", value: "" },
	imgAltText: { label: "Image Alt Text", value: "imgAltText" },
	imgTitle: { label: "Image Title", value: "imgTitle" },
	imgCaption: { label: "Image Caption", value: "imgCaption" },
	imgDescription: { label: "Image Description", value: "imgDescription" },
	imgSlug: { label: "Image Slug", value: "imgSlug" },
	postTitle: { label: "Post Title", value: "postTitle" },
	postSlug: { label: "Post Slug", value: "postSlug" },
	excerpt: { label: "Post Excerpt", value: "excerpt" },
	customField: {
		label: "Post Custom Field",
		value: "customField",
	},
	custom: { label: "Custom", value: "custom" },
};

addFilter("postGridImageAltText", "post-grid/image", function (options) {
	return imageAltTextSrcPro;
});

// title text

const imageTitleTextSrcPro = {
	none: { label: "No Alt Text", value: "" },
	imgAltText: { label: "Image Alt Text", value: "imgAltText" },
	imgTitle: { label: "Image Title", value: "imgTitle" },
	imgCaption: { label: "Image Caption", value: "imgCaption" },
	imgDescription: { label: "Image Description", value: "imgDescription" },
	imgSlug: { label: "Image Slug", value: "imgSlug" },
	postTitle: { label: "Post Title", value: "postTitle" },
	postSlug: { label: "Post Slug", value: "postSlug" },
	excerpt: { label: "Post Excerpt", value: "excerpt" },
	customField: {
		label: "Post Custom Field",
		value: "customField",
	},
	custom: { label: "Custom", value: "custom" },
};

addFilter("postGridImageTitleText", "post-grid/image", function (options) {
	return imageTitleTextSrcPro;
});

// link to

const imageLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	// authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter("postGridImageLinkTo", "post-grid/image", function (options) {
	return imageLinkToPro;
});

/*
Featured Image Block Filter Hook Start 
*/

// alt text

const featuredImageAltTextSrcPro = {
	none: { label: "No Alt Text", value: "" },
	imgAltText: { label: "Image Alt Text", value: "imgAltText" },
	imgTitle: { label: "Image Title", value: "imgTitle" },
	imgCaption: { label: "Image Caption", value: "imgCaption" },
	imgDescription: { label: "Image Description", value: "imgDescription" },
	imgSlug: { label: "Image Slug", value: "imgSlug" },
	postTitle: { label: "Post Title", value: "postTitle" },
	postSlug: { label: "Post Slug", value: "postSlug" },
	excerpt: { label: "Post Excerpt", value: "excerpt" },
	customField: {
		label: "Post Custom Field",
		value: "customField",
	},
	custom: { label: "Custom", value: "custom" },
};

addFilter(
	"postGridFeaturedImageAltText",
	"post-grid/post-featured-image",
	function (options) {
		return featuredImageAltTextSrcPro;
	}
);

// title text

const featuredImageTitleTextSrcPro = {
	none: { label: "No Alt Text", value: "" },
	imgAltText: { label: "Image Alt Text", value: "imgAltText" },
	imgTitle: { label: "Image Title", value: "imgTitle" },
	imgCaption: { label: "Image Caption", value: "imgCaption" },
	imgDescription: { label: "Image Description", value: "imgDescription" },
	imgSlug: { label: "Image Slug", value: "imgSlug" },
	postTitle: { label: "Post Title", value: "postTitle" },
	postSlug: { label: "Post Slug", value: "postSlug" },
	excerpt: { label: "Post Excerpt", value: "excerpt" },
	customField: {
		label: "Post Custom Field",
		value: "customField",
	},
	custom: { label: "Custom", value: "custom" },
};

addFilter(
	"postGridFeaturedImageTitleText",
	"post-grid/post-featured-image",
	function (options) {
		return featuredImageTitleTextSrcPro;
	}
);

// link to

const FeaturedImageLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridFeaturedImageLinkTo",
	"post-grid/post-featured-image",
	function (options) {
		return FeaturedImageLinkToPro;
	}
);

/*
Total Sale Block Filter Hook Start 
*/

// woo-total-sale link to

const wooTotalSaleLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	// archiveDate: { label: "Date Archive", value: "archiveDate" },
	// archiveYear: { label: "Year Archive", value: "archiveYear" },
	// archiveMonth: { label: "Month Archive", value: "archiveMonth" },

	// authorUrl: { label: "Author URL", value: "authorUrl" },
	// authorLink: { label: "Author Link", value: "authorLink" },
	// authorMail: { label: "Author Mail", value: "authorMail" },
	// authorMeta: { label: "Author Meta", value: "authorMeta" },
	// customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridWooTotalSaleLinkTo",
	"post-grid/woo-total-sale",
	function (options) {
		return wooTotalSaleLinkToPro;
	}
);

/*
Woo Star Rate Block Filter Hook Start 
*/

// woo-star-rate radio options

const wooStarRateRadioOptionsPro = {
	pgNone: { label: "None", value: "" },
	pg01: {
		label: "123 customer reviews",
		value: "{review_count} customer reviews",
	},
	pg02: { label: "4.50/5.00", value: "{average_rating}/5.00" },
	pg03: {
		label: "4.50 out of 5.00",
		value: "{average_rating} out of 5.00",
	},
	pg04: {
		label: "4.50(123 reviews)",
		value: "{average_rating}({review_count} reviews)",
	},
	pg05: {
		label: "Custom",
		value: "custom",
	},
};

addFilter(
	"postGridWooStarRateRadioOptions",
	"post-grid/woo-star-rate",
	function (options) {
		return wooStarRateRadioOptionsPro;
	}
);

/*
Star Rate Block Filter Hook Start 
*/

// star-rate radio options

const starRateRadioOptionsPro = {
	pgNone: { label: "None", value: "" },
	pg01: {
		label: "123 customer reviews",
		value: "{rating_count} customer reviews",
	},
	pg02: { label: "4.50/5.00", value: "{average_rating}/5.00" },
	pg03: {
		label: "4.50 out of 5.00",
		value: "{average_rating} out of 5.00",
	},
	pg04: {
		label: "4.50(123 reviews)",
		value: "{average_rating}({rating_count} reviews)",
	},
	pg05: {
		label: "Custom",
		value: "custom",
	},
};

addFilter(
	"postGridStarRateRadioOptions",
	"post-grid/star-rate",
	function (options) {
		return starRateRadioOptionsPro;
	}
);

/*
Form Field Checkbox Block Filter Hook Start 
*/

// form-field-checkbox param source

const formFieldCheckboxParamSourcePro = {
	none: { label: "None", value: "" },
	taxonomy: { label: "Taxonomy", value: "taxonomy" },
	posts: { label: "Posts", value: "posts" },
	users: { label: "Users", value: "users" },
	countryNames: {
		label: "Country Names",
		value: "countryNames",
	},
	countryCodes: {
		label: "Country Codes",
		value: "countryCodes",
	},
	gender: { label: "Gender", value: "gender" },
	ageGroupsNum: {
		label: "Age Groups - Age",
		value: "ageGroupsNum",
	},
	ageGroupsKids: {
		label: "Age Groups - Kids",
		value: "ageGroupsKids",
	},
};

addFilter(
	"postGridFormFieldCheckboxParamSource",
	"post-grid/form-field-checkbox",
	function (options) {
		return formFieldCheckboxParamSourcePro;
	}
);

/*
Form Field Radio Block Filter Hook Start 
*/

// form-field-radio param source

const formFieldRadioParamSourcePro = {
	none: { label: "None", value: "" },
	taxonomy: { label: "Taxonomy", value: "taxonomy" },
	posts: { label: "Posts", value: "posts" },
	users: { label: "Users", value: "users" },
	countryNames: {
		label: "Country Names",
		value: "countryNames",
	},
	countryCodes: {
		label: "Country Codes",
		value: "countryCodes",
	},
	gender: { label: "Gender", value: "gender" },
	ageGroupsNum: {
		label: "Age Groups - Age",
		value: "ageGroupsNum",
	},
	ageGroupsKids: {
		label: "Age Groups - Kids",
		value: "ageGroupsKids",
	},
};

addFilter(
	"postGridFormFieldRadioParamSource",
	"post-grid/form-field-radio",
	function (options) {
		return formFieldRadioParamSourcePro;
	}
);

/*
Form Field Select Block Filter Hook Start 
*/

// form-field-select param source

const formFieldSelectParamSourcePro = {
	none: { label: "None", value: "" },
	taxonomy: { label: "Taxonomy", value: "taxonomy" },
	posts: { label: "Posts", value: "posts" },
	users: { label: "Users", value: "users" },
	countryNames: {
		label: "Country Names",
		value: "countryNames",
	},
	countryCodes: {
		label: "Country Codes",
		value: "countryCodes",
	},
	gender: { label: "Gender", value: "gender" },
	ageGroupsNum: {
		label: "Age Groups - Age",
		value: "ageGroupsNum",
	},
	ageGroupsKids: {
		label: "Age Groups - Kids",
		value: "ageGroupsKids",
	},
};

addFilter(
	"postGridFormFieldSelectParamSource",
	"post-grid/form-field-select",
	function (options) {
		return formFieldSelectParamSourcePro;
	}
);

/*
Post Comment Count Block Filter Hook Start 
*/

// post-comment-count icon position

const postCommentCountIconPositionPro = {
	none: { label: "Choose Position", value: "" },
	beforeCommentCount: {
		label: "Before Comment Count",
		value: "beforeCommentCount",
	},
	afterCommentCount: {
		label: "After Comment Count",
		value: "afterCommentCount",
	},
	beforePrefix: {
		label: "Before Prefix",
		value: "beforePrefix",
	},
	afterPrefix: { label: "After Prefix", value: "afterPrefix" },
	beforePostfix: {
		label: "Before PostFix",
		value: "beforePostfix",
	},
	afterPostfix: {
		label: "After PostFix",
		value: "afterPostfix",
	},
};

addFilter(
	"postGridPostCommentCountIconPosition",
	"post-grid/post-comment-count",
	function (options) {
		return postCommentCountIconPositionPro;
	}
);

// post-comment-count link to

const postCommentCountLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	archiveDate: { label: "Date Archive", value: "archiveDate" },
	archiveYear: { label: "Year Archive", value: "archiveYear" },
	archiveMonth: { label: "Month Archive", value: "archiveMonth" },

	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridPostCommentCountLinkTo",
	"post-grid/post-comment-count",
	function (options) {
		return postCommentCountLinkToPro;
	}
);

/*
Woo Product Info Block Filter Hook Start 
*/

// woo-product-info icon position

const wooProductInfoElementsArgsPro = {
	none: { label: "Choose Position", value: "" },
	beforeCommentCount: {
		label: "Before Comment Count",
		value: "beforeCommentCount",
	},
	afterCommentCount: {
		label: "After Comment Count",
		value: "afterCommentCount",
	},
	beforePrefix: {
		label: "Before Prefix",
		value: "beforePrefix",
	},
	afterPrefix: { label: "After Prefix", value: "afterPrefix" },
	beforePostfix: {
		label: "Before PostFix",
		value: "beforePostfix",
	},
	afterPostfix: {
		label: "After PostFix",
		value: "afterPostfix",
	},
};

addFilter(
	"postGridWooProductInfoElementsArgs",
	"post-grid/woo-product-info",
	function (options) {
		return wooProductInfoElementsArgsPro;
	}
);

/*
Post Excerpt Block Filter Hook Start 
*/

// post-excerpt excerpt link to

const postExcerptLinkToPro = {
	none: { label: "Choose", value: "" },
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridPostExcerptLinkTo",
	"post-grid/post-excerpt",
	function (options) {
		return postExcerptLinkToPro;
	}
);

// post-excerpt read more link to

const postExcerptReaMoreLinkToPro = {
	none: { label: "Choose", value: "" },
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridPostExcerptReadMoreLinkTo",
	"post-grid/post-excerpt",
	function (options) {
		return postExcerptReaMoreLinkToPro;
	}
);

/*
	// Terms List Block Filter Hook Start 
*/

// // terms-list icon position

const termsListIconPositionPro = {
	none: { label: "Choose Position", value: "" },
	beforeFronttext: { label: "Before Front text", value: "beforeFronttext" },
	afterFronttext: {
		label: "After Front text",
		value: "afterFronttext",
	},
	// beforeItems: { label: "Before Items", value: "beforeItems", isPro: true },
	// afterItems: { label: "After Items", value: "afterItems", isPro: true },
	beforeItem: {
		label: "Before Each Items",
		value: "beforeItem",
	},
	afterItem: { label: "After Each Items", value: "afterItem" },
};

addFilter(
	"postGridTermsListIconPosition",
	"post-grid/terms-list",
	function (options) {
		return termsListIconPositionPro;
	}
);

/*
	// Terms Field Block Filter Hook Start 
*/

// // terms-query-item link to

const termsQueryItemLinkToPro = {
	none: { label: "Choose", value: "" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	termUrl: { label: "Term URL", value: "termUrl" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridTermsQueryItemLinkTo",
	"post-grid/terms-query-item",
	function (options) {
		return termsQueryItemLinkToPro;
	}
);

// * terms-query-item term field

const termsQueryItemTermFieldPro = {
	termId: { label: "Term ID", value: "termId" },
	name: { label: "Name", value: "name" },
	slug: {
		label: "Slug",
		value: "slug",
		//  isPro: true
	},
	description: { label: "description", value: "description" },
	count: {
		label: "count",
		value: "count",
		// isPro: true
	},
	meta: {
		label: "meta",
		value: "meta",
		//  isPro: true
	},
};

addFilter(
	"postGridTermsQueryTermField",
	"post-grid/terms-query-item",
	function (options) {
		return termsQueryItemTermFieldPro;
	}
);

/*
	// Post Title Block Filter Hook Start 
*/

// // post-title link to

const postTitleLinkToPro = {
	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridPostTitleLinkTo",
	"post-grid/post-title",
	function (options) {
		return postTitleLinkToPro;
	}
);

const postTitleLimitByPro = {
	none: { label: "Choose..", value: "" },
	word: { label: "Word", value: "word" },
	character: { label: "Character", value: "character" },
};

addFilter(
	"postGridPostTitleLimitBy",
	"post-grid/post-title",
	function (options) {
		return postTitleLimitByPro;
	}
);

/*
Post Categories Block Filter Hook Start 
*/

// post-categories Icon

var postCategoriesIconPositionPro = {
	none: { label: "Choose Position", value: "" },
	beforeFronttext: { label: "Before Front text", value: "beforeFronttext" },
	afterFronttext: {
		label: "After Front text",
		value: "afterFronttext",
	},
	beforeItems: { label: "Before Items", value: "beforeItems" },
	afterItems: { label: "After Items", value: "afterItems" },
	beforeItem: {
		label: "Before Each Items",
		value: "beforeItem",
	},
	afterItem: { label: "After Each Items", value: "afterItem" },
};

addFilter(
	"postGridPostCategoriesIconPosition",
	"post-grid/post-categories",
	function (options) {
		return postCategoriesIconPositionPro;
	}
);

// post-categories link to

const postCategoriesLinkToPro = {
	noUrl: { label: "No URL", value: "" },
	termUrl: { label: "Term URL", value: "termUrl" },

	postUrl: { label: "Post URL", value: "postUrl" },
	homeUrl: { label: "Home URL", value: "homeUrl" },
	authorUrl: { label: "Author URL", value: "authorUrl" },
	authorLink: { label: "Author Link", value: "authorLink" },
	authorMail: { label: "Author Mail", value: "authorMail" },
	authorMeta: { label: "Author Meta", value: "authorMeta" },
	customField: { label: "Custom Field", value: "customField" },
	customUrl: { label: "Custom URL", value: "customUrl" },
};

addFilter(
	"postGridPostCategoriesLinkTo",
	"post-grid/post-categories",
	function (options) {
		return postCategoriesLinkToPro;
	}
);

/*
Number Counter Block Filter Hook Start 
*/
// number-counter source

const numberCounterSourcePro = {
	none: { label: "Choose", value: "" },
	total_sale: {
		label: "Total Sale",
		value: "total_sale",
	},
};

addFilter(
	"postGridNumberCounterSource",
	"post-grid/number-counter",
	function (options) {
		return numberCounterSourcePro;
	}
);

/*
Breadcrumb Block Filter Hook Start 
*/
// element source

const breadcrumbElementsSourcePro = [
	{
		id: "text",
		label: "Text",
		customText: "You are here: ",
		url: "",

		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			text: "You are here: ",
			showSeparator: true,
			isLink: false,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "homePage",
		label: "Home Page Link",
		customText: "%s",
		url: "",

		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			isLink: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "frontPage",
		label: "Front Page Link",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "postsPage",
		label: "Posts Page Link",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "postTitle",
		label: "Post Title",
		customText: "",
		url: "",

		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			isLink: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postAuthor",
		label: "Post Author",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "postDate",
		label: "Post Date",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			format: "Y-m-d",
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postDay",
		label: "Post Day",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			format: "",
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postMonth",
		label: "Post Month",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			format: "",
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "postYear",
		label: "Post Year",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			format: "",
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postAncestors",
		label: "Post Ancestors",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			count: "",
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postId",
		label: "Post Id",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postCategory",
		label: "Post Category",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postTag",
		label: "Post Tag",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postCategories",
		label: "Post Categories",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			maxCount: 3,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "postTags",
		label: "Post Tags",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			maxCount: 3,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "postTerm",
		label: "Post Term",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			taxonomy: "",
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "postTerms",
		label: "Post Terms",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			taxonomy: "",
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "termTitle",
		label: "Term Title",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "termParents",
		label: "Term Parents",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			count: 0,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "termAncestors",
		label: "Term Ancestors",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			taxonomy: "",
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "wcShop",
		label: "WooCommerce Shop",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "wcAccount",
		label: "WooCommerce Account",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "wcCart",
		label: "WooCommerce Cart",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "wcCheckout",
		label: "WooCommerce Checkout",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "searchText",
		label: "Search Text",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "archiveTitle",
		label: "Archive Title",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "404Text",
		label: "404 Text",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "dateText",
		label: "Date Text",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			format: "Y-m-d",
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
	{
		id: "monthText",
		label: "Month Text",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			format: "Y-m",
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "yearText",
		label: "Year Text",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
			format: "Y",
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},

	{
		id: "authorName",
		label: "Author Name",
		customText: "%s",
		url: "",
		siteIcon: {
			library: "fontAwesome",
			srcType: "class",
			/*class, html, img, svg */ iconSrc: "",
		},
		options: {
			showSeparator: true,
		},
		styles: {
			color: { Desktop: "" },
			backgroundColor: { Desktop: "" },
			padding: { Desktop: "" },
			margin: { Desktop: "" },
		},
	},
];

addFilter(
	"postGridBreadcrumbElementsSource",
	"post-grid/breadcrumb",
	function (options) {
		return breadcrumbElementsSourcePro;
	}
);

/*
Progress Bar Block Filter Hook Start 
*/
// progress-bar source

const progressBarSourcePro = {
	normal: {
		label: "Normal",
		value: "normal",
	},
	total_sale: {
		label: "Total Sale",
		value: "total_sale",
	},
	stock_quantity: {
		label: "Stock Quantity",
		value: "stock_quantity",
	},
};

addFilter(
	"postGridProgressBarSource",
	"post-grid/progress-bar",
	function (options) {
		return progressBarSourcePro;
	}
);

/*
Woo Product Info Item Block Filter Hook Start 
*/
// woo-product-info-item objectTypes

const wooProductInfoItemObjectTypesPro = {
	weight: { label: "Weight", value: "weight" },
	length: { label: "Length", value: "length" },
	width: { label: "Width", value: "width" },
	height: { label: "Height", value: "height" },
	dimensions: { label: "Dimensions", value: "dimensions" },
	taxonomy: { label: "Taxonomy", value: "taxonomy" },
	meta: { label: "Custom Meta", value: "meta",},
};

addFilter(
	"postGridWooProductInfoItemObjectTypes",
	"post-grid/woo-product-info-item",
	function (options) {
		return wooProductInfoItemObjectTypesPro;
	}
);

/*
Post Query Block Filter Hook Start 
*/
// post-query queryPrams

const postQueryQueryPramsPro = {
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
		value: [],
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
		value: [],
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
		description: "Add {ID} to Post query by post parent id",
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
		val: { compare: "=", value: 10 },
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
		value: [],
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

addFilter(
	"postGridPostQueryQueryPramsPro",
	"post-grid/post-query",
	function (options) {
		return postQueryQueryPramsPro;
	}
);
