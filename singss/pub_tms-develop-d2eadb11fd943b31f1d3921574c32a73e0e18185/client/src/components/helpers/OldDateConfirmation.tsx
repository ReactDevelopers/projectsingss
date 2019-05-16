import * as React from 'react';
import SweetAlert from 'react-bootstrap-sweetalert';
import store from '../../store';
import { acceptOldDateConfirmation , rejectOldDateConfirmation } from '../../actions/OldDateConfirmation';
import * as moment from "moment";
export interface OldDateConfirmationProps {

	show: boolean;
    title: any;
    confirmBtnText: string;
    confirmBtnBsStyle: string;
    showCancel: boolean;
    cancelBtnBsStyle: string;
    //danger: boolean;
    info: boolean;
    success: boolean;
    message: string;
    callBack?: Function | null;
    date: moment.Moment | null;
    params: object;
}

export const  defaultAlertData = {

    show: false,
    title: '',
    showCancel: true, 
    confirmBtnBsStyle: "info",
    cancelBtnBsStyle: "default",
    confirmBtnText: "Yes",
    info:true,
    message:'You have selected a past date for this course run, do you wish to proceed?',
    success:false,
    date: null,
    params: {}
};

export default class OldDateConfirmation extends React.Component<OldDateConfirmationProps > {

	constructor(props: OldDateConfirmationProps) {

		super(props);

		this.onConfirmed = this.onConfirmed.bind(this);
        this.onCancel = this.onCancel.bind(this);        
	}

	onConfirmed() {

        if (typeof this.props.callBack === 'function') {
            this.props.callBack(this.props.params);
        }
		store.dispatch(acceptOldDateConfirmation());
	}

	onCancel() {

		store.dispatch(rejectOldDateConfirmation());
	}

	render() {

		let alertdata =  { ...this.props };

		if(alertdata['message'] !== undefined){

          delete alertdata['message'];
        }

      
        if(alertdata['CallBack'] !== undefined){

          delete alertdata['CallBack'];
        }

		return (

			<SweetAlert {...alertdata } onConfirm={this.onConfirmed} onCancel={this.onCancel}>
				{this.props.message}
			</SweetAlert>
		);
	}
}