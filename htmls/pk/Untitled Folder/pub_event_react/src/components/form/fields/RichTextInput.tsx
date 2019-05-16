import { 
    Field, 
    Fields, 
    reduxForm, 
    ValidateCallback, 
    ConfigProps,  
    getFormSubmitErrors, 
    InjectedFormProps, 
    FormErrors, 
    FormAction, 
    FieldsProps, 
    WrappedFieldProps } from 'redux-form';

import * as React from 'react';
// import CKEditor, { CKEditorBase } from 'react-ckeditor-component';
// Require Editor JS files.
import 'froala-editor/js/froala_editor.pkgd.min.js';

// Require Editor CSS files.
import 'froala-editor/css/froala_style.min.css';
import 'froala-editor/css/froala_editor.pkgd.min.css';

// Require Font Awesome.
import 'font-awesome/css/font-awesome.css';

import FroalaEditor from 'react-froala-wysiwyg';
import {FieldGeneralProps} from '../FormInit';


export type WrappedRichTextFieldProps = {
    // label?: string,
    // className?: string,
    // elementclassName?: string,
    placeholder?: string,
    serverError?: string | undefined,
} & WrappedFieldProps & FieldGeneralProps;

/**
 * HTML Text Element With the Error Message
 * @param param0 
 */
class  DateInput extends React.Component<WrappedRichTextFieldProps>{


    constructor(props: WrappedRichTextFieldProps) {

        super(props);
        this.onChange = this.onChange.bind(this);
    }


    onChange(data: string) {

        this.props.input.onChange(data);
    }
    render() {
        
        const {input, placeholder, serverError, meta: { touched , error, submitting}  } = this.props;
        const hasError = !!error && !!touched || !!serverError;      
        
        return (
        <>
            <FroalaEditor 
            tag='textarea'
            model={input.value}
            onModelChange={this.onChange}
            config={{
                placeholderText:placeholder,
                imageUpload: false,
                fontFamily: {
                "calibri" : 'Calibri',
                "Roboto,sans-serif": 'Roboto',
                "Oswald,sans-serif": 'Oswald',
                "Montserrat,sans-serif": 'Montserrat',
                "Open Sans Condensed',sans-serif": 'Open Sans Condensed'
                
                },
                fontFamilySelection: true,
                toolbarButtons: [
                    'fullscreen', 
                    'bold', 
                    'italic', 
                    'underline', 
                    'strikeThrough', 
                    'subscript', 
                    'superscript', 
                    '|', 
                    'fontFamily', 
                    'fontSize', 
                    'color', 'inlineStyle', 'paragraphStyle', '|', 
                    'paragraphFormat', 'align', 'formatOL', 'formatUL', 
                    'outdent', 'indent', 
                    'quote', '-', 
                    'insertLink', 
                    //'insertImage', 
                    //'insertVideo', 
                    //'embedly', 'insertFile', 
                    'insertTable', '|', 'emoticons', 
                    'specialCharacters', 
                    'insertHR', 
                    'selectAll', 
                    'clearFormatting', '|', 'print', 
                    'spellChecker', 'help', 
                    'html', '|', 'undo', 'redo'
                ]
            }}
            />
            {hasError && <span className="help-block">{serverError? serverError : error }</span>}
        </>
        );
    }

}
export default DateInput; 