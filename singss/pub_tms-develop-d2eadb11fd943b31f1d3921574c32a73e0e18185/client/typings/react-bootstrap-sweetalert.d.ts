
declare module 'react-bootstrap-sweetalert' {

	import React = require("react");

	interface sweetalertT {
		type?: string;
		title: any;
		text?:string;
		onCancel?: Function;
		onConfirm?: Function;
		btnSize?: string;
		confirmBtnText?: string;
		confirmBtnBsStyle?: string;
		show?: boolean;
		showCancel?: boolean;
		cancelBtnBsStyle?: string;
		danger?: boolean;
		success?: boolean;
	}
	export default class Sweetalert extends React.Component<sweetalertT, any> {}
}

