import * as React from 'react';
import {  Col } from 'react-bootstrap';

export interface ColWithErrorProps {
    errors?: Array<object>;
    elementName: string;
    componentClass?: React.ReactType;
    lg?: number;
    lgHidden?: boolean;
    lgOffset?: number;
    lgPull?: number;
    lgPush?: number;
    md?: number;
    mdHidden?: boolean;
    mdOffset?: number;
    mdPull?: number;
    mdPush?: number;
    sm?: number;
    smHidden?: boolean;
    smOffset?: number;
    smPull?: number;
    smPush?: number;
    xs?: number;
    xsHidden?: boolean;
    xsOffset?: number;
    xsPull?: number;
    xsPush?: number;
}

export default class ColWithError extends React.Component<ColWithErrorProps> { 
    
    public errors: Array<object> | undefined;
    public elementName: string | undefined;

    constructor(pops: ColWithErrorProps ) {
        super(pops);
        this.getElementError = this.getElementError.bind(this);
    }
    
    render() {

        let props = {...this.props};

        if (typeof props.errors !== 'undefined' ) {
            this.errors = props.errors;
            delete props.errors;
        }

        if (typeof props.elementName !== 'undefined' ) {
            
            this.elementName = props.elementName;
            delete props.elementName;
        }

        return (
            <Col {...props} >

                {this.props.children}
                {this.getErrorMessage()}

            </Col>
        );
    }

    isError(): string | null {

        if (this.errors !== undefined && this.elementName !== undefined ) {

            if (this.errors[this.elementName] !== undefined) {
              return 'error';  
            }
        }

        return null;
    }

    getElementError(): Array<object> {

        if (this.errors !== undefined  && this.props.elementName !== undefined ) {

            if (this.errors[this.props.elementName] !== undefined) {
                
                return this.errors[this.props.elementName];
            }
        }
        return [];
    }
    getErrorMessage(): string | React.ReactElement<HTMLElement> {

        if (this.isError() && this.elementName !== undefined ) {

            let errors = this.getElementError();
            return <span className="help-block">{errors.join(', ')}</span>;
        }
        return '';
    }   
}