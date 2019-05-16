import * as React from 'react';

// import { Form, FormGroup,Col,FormControl,Button} from 'react-bootstrap';
import {AppState, AppProps} from '../app-interface';
// import { Link } from 'react-router-dom';
// 

export interface NotFoundProps extends AppProps {}

class NotFound extends React.Component<NotFoundProps,AppState> {


	constructor(props:NotFoundProps) {

		super(props);

	}
	public render() {

		return ('NotFound');
	}
}

export default NotFound;