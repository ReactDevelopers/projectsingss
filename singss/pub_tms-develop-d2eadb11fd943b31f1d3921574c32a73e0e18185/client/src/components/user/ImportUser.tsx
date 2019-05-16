import * as React from 'react';

import { AppState, AppProps,serverResponse } from '../../app-interface';
import Template from '../helpers/Template';
import Dropzone from 'react-dropzone';
import Api from '../../api/Api';
import SweetAlert from 'react-bootstrap-sweetalert';
import store from '../../store';
import { pageOverlayLoader } from '../../actions/Page';
let Parser = require('html-react-parser');

export interface ImportUserProps extends AppProps {

    import_files?: Array<Blob>;
    data: {
        joiners: string;
        movers: string;
        leavers: string;
    }
}

export interface ImportUserState extends AppState {

    import_files?: Array<Blob>;
    showSweetAlert?: boolean;
    data: {
        joiners: string;
        movers: string;
        leavers: string;
    }
}

export interface importSuccessResponse extends serverResponse{
    data: {
        joiners: string;
        movers: string;
        leavers: string;
    }
}


export default class ImportUser extends React.Component<ImportUserProps, ImportUserState> {

    constructor(props: ImportUserProps) {

        super(props);
        
    }

    componentWillMount() {

       this.setState({'import_files':[],'message':'',showSweetAlert:false});
       console.log("this.state");
       console.log(this.state);
    }
    onDrop(files: Array<Blob>) {

        // console.log("files");
        // console.log(files);
        var formData = new FormData();
        let api = new Api();
        store.dispatch(pageOverlayLoader());
        formData.append('user_file',files[0]);
        api.getFetch('user/import',{body:formData},true)
        .then((response:importSuccessResponse) => {
            store.dispatch(pageOverlayLoader());
            
            if(response.status) {

                let m = "Joiners: "+response.data.joiners;
                m += "<br> Leavers: "+response.data.leavers;
                m += "<br> Movers: "+response.data.movers;
                response.message = m;
            }
            
            this.setState({...response,showSweetAlert:true});
        })
        .catch( (response:any) => {

            store.dispatch(pageOverlayLoader());
            this.setState(response);
        });
    }

    public render() {

        return (

            <Template page="user_import" user={this.props.user} history={this.props.history} showLoaderBar={this.props.showLoaderBar} showOverlayLoader={this.props.showOverlayLoader} >
            <section>
                <div className="dropzone">
                  <Dropzone onDrop={this.onDrop.bind(this)} multiple={false}>
                    <p>Try dropping some files here, or click to select files to upload.</p>
                  </Dropzone>
                </div>
            </section>

            {(() => {

                if(typeof this.state.message !== "undefined" && this.state.message )  {

                    return <SweetAlert show={this.state.showSweetAlert} title={<span>Alert !</span>} onConfirm={() => this.setState({ showSweetAlert: false })}>
                    {Parser(this.state.message)}
                    </SweetAlert>
                }else{

                    return null;
                }
            })()}
               
           </Template>
        );
    }
    
}