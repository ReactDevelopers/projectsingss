import * as React from 'react';
import { Alert } from 'react-bootstrap';

interface MessageState {

    message: string;
    isError: boolean;
}

class Message extends React.Component<MessageState> {

    constructor(props: MessageState) {

        super(props);
    }

    public render() {   
        
        if (this.props.message) {

            return (
                    
             <Alert bsStyle={this.props.isError ? 'danger' : 'success'}>
                <strong>{this.props.isError ? 'Error!' : 'Success'}</strong> {this.props.message}
             </Alert>           
            );
        }
        return ('');

    }
}
export default Message;