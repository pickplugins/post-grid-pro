const { addFilter } = wp.hooks;

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

const visibleArgsPro = {
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

addFilter("visibleArgs", "post-grid/visibleArgs", function (options) {
	return visibleArgsPro;
});

const formVisbleArgsPro = {
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
	"pgFormvisibleArgs",
	"post-grid/pgFormvisibleArgs",
	function (options) {
		return formVisbleArgsPro;
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

	gridColumnStart: { id: "gridColumnStart", label: "Grid Column Start" },

	gridColumnEnd: { id: "gridColumnEnd", label: "Grid Column End" },
	gridRowStart: { id: "gridRowStart", label: "Grid Row Start" },

	gridRowEnd: { id: "gridRowEnd", label: "Grid Row End" },
	gridTemplateColumns: {
		id: "gridTemplateColumns",
		label: "Grid Template Columns",
	},
	gridTemplateRows: { id: "gridTemplateRows", label: "Grid Template Rows" },

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
	"focus-within": { label: "Focus-within", value: "focus-within" },
	target: { label: "target", value: "target" },
	visited: { label: "Visited", value: "visited" },
	selection: { label: "Selection", value: "selection" },

	"first-child": { label: "First-child", value: "first-child" },
	"last-child": { label: "Last-child", value: "last-child" },
	"first-letter": { label: "First-letter", value: "first-letter" },
	"first-line": { label: "First-line", value: "first-line" },
	//custom: { label: 'Custom', value: '' },
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
		description: "Parent term ID to retrieve direct-child terms of.",
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

// number counter
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

// icon position End

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
