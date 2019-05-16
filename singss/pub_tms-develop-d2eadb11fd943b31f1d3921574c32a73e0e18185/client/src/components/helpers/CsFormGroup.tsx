import * as React from 'react';
import { Sizes, FormGroup } from 'react-bootstrap';

export interface CsFormGroupProps extends React.HTMLProps<FormGroup> {
    bsClass?: string;
    bsSize?: Sizes;
    controlId?: string;
    validationState?: 'success' | 'warning' | 'error' | null;
    errors?: Array<object>;
    elementName?: string;
    displayerror?: boolean;
}



export default class CsFormGroup extends React.Component<CsFormGroupProps> { 
    
    public errors: Array<object> | undefined;
    public elementName: string | undefined;

    constructor(pops: CsFormGroupProps) {
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

        if (typeof props.bsClass === 'undefined') {

            props.bsClass = 'form-group';         
        }

        props.bsClass += ' row';

        if (this.isError() ) {

            props.bsClass += ' has-error';
        }

        return (
            <FormGroup {...props} >

                {this.props.children}
                {this.props.displayerror !== undefined && this.props.displayerror ? this.getErrorMessage() : ''}

            </FormGroup>
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
            return <span className="form-control-feedback">{errors.join(', ')}</span>;
        }
        return '';
    }   
}