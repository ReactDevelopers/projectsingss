
declare module 'html-react-parser' {

	import React = require("react");

	interface ParserT {

		Parser: Function;
	}
	export default class Parser extends React.Component<ParserT, any> {}
}