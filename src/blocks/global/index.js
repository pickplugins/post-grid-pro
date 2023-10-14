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
