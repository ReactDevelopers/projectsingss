import * as React from 'react';
import SweetAlert from 'react-bootstrap-sweetalert';
import store from '../../store';
import { serverResponse } from '../../app-interface';

import { deleteConfirmationCancel, 
    deleteConfirmationBeforeDelete, 
    deleteConfirmationDeletedSuccess,
    deleteConfirmationDeletedFail
} from  '../../actions/DeleteConfirmation'; 

export enum requestStatus {
    "process",
    "completed",
    "not_initiate"
}

export const  defaultAlertData = {

    show: false,
    title: 'Alert!',
    showCancel: true, 
    confirmBtnBsStyle: "danger",
    cancelBtnBsStyle: "default",
    confirmBtnText: "Yes, Delete It",
    danger:true,
    message:'Are you sure you want to delete?',
    param: {},
    requestStatus:requestStatus.not_initiate, 
    success:false,   
};

export interface DeleteConfirmationProps extends React.Props<SweetAlert> {
	
	show: boolean;
    title: any;
    confirmBtnText: string;
    confirmBtnBsStyle: string;
    showCancel: boolean;
    cancelBtnBsStyle: string;
    danger: boolean;
    success: boolean;
    message: string;
    param: object;
    requestStatus: requestStatus;
    onDelete?: (param: object) => Promise<any>;
}



class DeleteConfirmation extends React.Component<DeleteConfirmationProps > {

	constructor(props: DeleteConfirmationProps) {

		super(props);

		this.onConfirmDelete = this.onConfirmDelete.bind(this);
        this.onCancelDelete = this.onCancelDelete.bind(this);        
	}

	onConfirmDelete(): void {
        
        if(typeof this.props.onDelete === "function" ) {

            if(this.props.requestStatus === requestStatus.not_initiate && this.props.showCancel === true ) {
                
                store.dispatch(deleteConfirmationBeforeDelete());
                this.props.onDelete(this.props.param)
                .then( (resposne: serverResponse) => {
                    
                    if(resposne.status) {   
                        store.dispatch(deleteConfirmationDeletedSuccess(resposne.message));
                    }else{

                        store.dispatch(deleteConfirmationDeletedFail(resposne.message));
                    }
                })
                .catch((resposne: serverResponse) =>{

                    store.dispatch(deleteConfirmationDeletedFail("Internal Server Error."));
                })
            }
        }

        if(this.props.requestStatus === requestStatus.completed ) {

            store.dispatch(deleteConfirmationCancel());
        }
    }

	onCancelDelete(): void {

        store.dispatch(deleteConfirmationCancel());
    }

	render() {

		let alertdata =  { ...this.props };

		if(alertdata['message'] !== undefined){

          delete alertdata['message'];
        }

        if(alertdata['param'] !== undefined){

          delete alertdata['param'];
        }

        if(alertdata['deleted'] !== undefined){

          delete alertdata['deleted'];
        }

        if(alertdata['onDelete'] !== undefined){

          delete alertdata['onDelete'];
        }

		return (

			<SweetAlert {...alertdata } onConfirm={this.onConfirmDelete} onCancel={this.onCancelDelete}>{this.props.message}</SweetAlert>
		);
	}
}

export default DeleteConfirmation;