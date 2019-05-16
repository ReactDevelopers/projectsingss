
declare module 'react-redux-sweetalert' {

	import React = require("react");

	interface sweetalertRT {
		
		title: string;
		text?: string;
		type?: string;
		customClass?: string;
		showCancelButton?: boolean;
		showConfirmButton?: boolean;
		confirmButtonText?: string;
		confirmButtonColor?: string;
		cancelButtonText?: string;
		imageUrl?: string;
		imageSize?: string;
		html?: boolean;
		animation?: boolean|string;
		inputType?: string;
		inputValue?: string;
		inputPlaceholder?: string;
		showLoaderOnConfirm?: boolean;
		timer?: number;
		closeOnConfirm?: boolean;
		closeOnCancel?: boolean;
		allowEscapeKey?: boolean;
		allowOutsideClick?: boolean;
		onConfirm?: Function;
		onCancel?: Function;
		onClose?: Function;
		onEscapeKey?: Function;
		onOutsideClick?: Function;
	}
	export default class ReduxSweetAlert extends React.Component<sweetalertRT, any> {}
}

