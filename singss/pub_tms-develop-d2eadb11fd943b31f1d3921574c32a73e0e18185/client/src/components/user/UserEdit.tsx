import * as React from 'react';
//
import { AppState, AppProps, serverResponse, matchState } from '../../app-interface';
import Template from '../helpers/Template';
// import Dropzone from 'react-dropzone';
import Api from '../../api/Api';
import appUrl from '../../helper';
// import { requestingToServer } from '../../actions/LoginAction';

import user from '../../models/user';
import department from '../../models/department';
import * as bs from 'react-bootstrap';
import Select from 'react-select';
import SweetAlert from 'react-bootstrap-sweetalert';

import store from '../../store';
import { push } from 'connected-react-router';
import CsFormGroup from '../helpers/CsFormGroup';
import ColWithError from '../helpers/ColWithError';

// import { pageOverlayLoader } from '../../actions/Page';
// let Parser = require('html-react-parser');

export interface UserEditProps extends AppProps {

  match: matchState;
}

export interface GetProfileReposne extends serverResponse {
  data: {
    user: user,
    departments: Array<{value: number, label: string}>, 
    roles: Array<{value: number, label: string}>
  };
}
export interface GetDepartmentReposne extends serverResponse {
  data: department [];
}

export interface UserEditState extends AppState {

  userData: user;
  departments: Array<SelectProps>;
  roles: Array<SelectProps>;
  showSweetAlert: boolean;
}

export interface SelectProps {
  value: number,
  label: string,
}

export default class UserEdit extends React.Component<UserEditProps, UserEditState> {

    public userId: number;

    constructor(props: UserEditProps) {

        super(props);
        
        this.userId = this.props.match.params.id !== undefined ? this.props.match.params.id : 0;
        this.getData = this.getData.bind(this);
        this.getData(this.userId);
        this.handleTextChange = this.handleTextChange.bind(this);
        this.onOk = this.onOk.bind(this);
    }


    componentWillMount () {

      this.setState({
        userData: new user(),
        departments: [],
        roles: [],
        showSweetAlert: false
      });
    }

    handleChangeSelect(e: SelectProps, elementName: string): void {

      let userData = this.state.userData;
      let elementVal = e ? e.value : '';
      userData = {...userData, [elementName]: elementVal};
      this.setState({userData: userData});
    }

    handleTextChange (event: React.FormEvent<bs.FormProps>): void {

      let elementName = event.currentTarget.name;
      elementName = elementName ? elementName : '';
      let elementVal = event.currentTarget.value;
      let userData = this.state.userData;
      userData = {...userData, [elementName]: elementVal};
      this.setState({userData: userData});
    }

    handleSubmit (e: React.SyntheticEvent<EventTarget>): void {
      
      e.preventDefault();

      this.setState({isRequesting: true});
      let api = new Api();
      api.getFetch('user/' + this.userId, {method: 'PUT', body: this.state.userData})
        .then((response: serverResponse) => {

          this.setState({isRequesting: false, showSweetAlert: true, ...response});

        }).catch( (response: serverResponse) => {

          this.setState({isRequesting: false, showSweetAlert: true, ...response});

        });
    }

    onOk(): void {

      this.setState({ showSweetAlert: false });

      if (this.state.status) {

        store.dispatch(push(appUrl('/user')));
      }
    }

    public render() {

      const { name, 
        email, 
        pubnet_id,
        designation, 
        department_id,
        division, 
        section,
        role_id,
        branch
      } = this.state.userData;

      const { isRequesting } = this.state;
      let errors = this.state ? this.state.errors : [];

      let templateDefaultProps = {
          user: this.props.user,
          history: this.props.history,
          showLoaderBar: this.props.showLoaderBar,
          showOverlayLoader: this.props.showOverlayLoader,
          page: 'user_edit'
      };

      let nameElement = {

        type: 'text',
        onChange: this.handleTextChange,
        name: 'name',
        placeholder: 'Name',
        value: name ? name : ''
      };

      let emailElement = {

        ...nameElement,
        name: 'email',
        placeholder: 'Email',
        value: email ? email : ''
      };

      let pubnetIdElement = {

        ...nameElement,
        name: 'pubnet_id',
        placeholder: 'PUBNET ID',
        value: pubnet_id ? pubnet_id : ''
      };

      let designationElement = {

        ...nameElement,
        name: 'designation',
        placeholder: 'Designation',
        value: designation ? designation : ''
      };

      let divisionElement = {

        ...nameElement,
        name: 'division',
        placeholder: 'Division',
        value: division ? division : ''
      };

      let branchElement = {

        ...nameElement,
        name: 'branch',
        placeholder: 'Branch',
        value: branch ? branch : ''
      };

      let sectionElement = {

        ...nameElement,
        name: 'section',
        placeholder: 'Section',
        value: section ? section : ''
      };

      let dprtProps = {
        name: 'department_id',
        value: department_id ? department_id : '',
        options: this.state.departments,
        onChange : (e: SelectProps) => {this.handleChangeSelect( e, 'department_id')}
      };

      let roleProps = {
        name: 'role_id',
        value: role_id ? role_id : '',
        options: this.state.roles,
        onChange : (e: SelectProps) => {this.handleChangeSelect( e, 'role_id')}
      };
      
      return (

          <Template {...templateDefaultProps} >
          <bs.Form horizontal={true} onSubmit={e => this.handleSubmit( e )} >       
          <CsFormGroup elementName="name" errors={errors}>
              <bs.Col sm={2}>Name</bs.Col>
              <ColWithError sm={10} elementName="name" errors={errors} >
                  <bs.FormControl {...nameElement} />
              </ColWithError>               
          </CsFormGroup>

          <CsFormGroup elementName="email" errors={errors}>
              <bs.Col sm={2}>Email</bs.Col>
              <ColWithError sm={10} elementName="email" errors={errors}>
                  <bs.FormControl {...emailElement} />
              </ColWithError>

          </CsFormGroup>

          <CsFormGroup elementName="pubnet_id" errors={errors}>
              <bs.Col sm={2}>PUBNET ID</bs.Col>
              <ColWithError sm={10} elementName="pubnet_id" errors={errors}>
                  <bs.FormControl {...pubnetIdElement} />
              </ColWithError>
          </CsFormGroup>

          <CsFormGroup elementName="designation" errors={errors}>
              <bs.Col sm={2}>Designation</bs.Col>
              <ColWithError sm={10} elementName="pubnet_id" errors={errors}>
                  <bs.FormControl {...designationElement} />
              </ColWithError>
          </CsFormGroup>

         <CsFormGroup elementName="department_id" errors={errors}>
              <bs.Col sm={2}>Department</bs.Col>
              <ColWithError sm={10} elementName="department_id" errors={errors}>
                 <Select {...dprtProps} />
              </ColWithError>
          </CsFormGroup>

         <CsFormGroup elementName="division" errors={errors}>
              <bs.Col sm={2}>Division</bs.Col>
              <ColWithError sm={10} elementName="division" errors={errors} >
                  <bs.FormControl {...divisionElement} />
              </ColWithError>
          </CsFormGroup>

          <CsFormGroup elementName="branch" errors={errors}>
              <bs.Col sm={2}>Branch</bs.Col>
              <ColWithError sm={10} elementName="branch" errors={errors} >
                  <bs.FormControl {...branchElement} />
              </ColWithError>
          </CsFormGroup>

          <CsFormGroup elementName="section" errors={errors}>
              <bs.Col sm={2}>Section</bs.Col>
              <ColWithError sm={10} elementName="section" errors={errors}>
                  <bs.FormControl {...sectionElement} />
              </ColWithError>
          </CsFormGroup>
          
          <CsFormGroup elementName="role_id" errors={errors}>
              <bs.Col sm={2}>Role </bs.Col>
              <ColWithError sm={10} elementName="role_id" errors={errors} >
               <Select {...roleProps} />
              </ColWithError>
          </CsFormGroup>

          <bs.FormGroup>
              <bs.Col smOffset={2} sm={10}>
                  <bs.Button type="submit" disabled={isRequesting}>
                    {isRequesting ? 'Please wait...' : 'Update'}
                   </bs.Button>
              </bs.Col>
          </bs.FormGroup>
          </bs.Form>
          {(() => {

              if (typeof this.state.message !== 'undefined' && this.state.message ) {
                  
                  let sweetAltProps = {
                    show: this.state.showSweetAlert,
                    title: <span>Alert !</span>,
                    onConfirm: this.onOk
                  };

                  return <SweetAlert {...sweetAltProps}>
                    {this.state.message}
                  </SweetAlert>;

              } else {

                  return null;
              }
          })()}

         </Template>
      );
    }
    /**
     * getting the user information from the server and store into the {list_data}
     * @param  {number} userId: number        [description]
     * @return {void}  
     */
    private getData(userId: number): void {

        let api = new Api();
        let data = api.getFetch('user/' + this.userId + '/edit', {method: 'POST'});
        data.then( (response: GetProfileReposne) => {
            
            let userData = new user();
            userData.id = response.data.user.id;
            userData.name = response.data.user.name;
            userData.created_at = response.data.user.created_at;
            userData.updated_at = response.data.user.updated_at;
            userData.email = response.data.user.email;
            userData.pubnet_id = response.data.user.pubnet_id;
            userData.role_id = response.data.user.role_id;
            userData.department_id = response.data.user.department_id;
            userData.designation = response.data.user.designation;
            userData.division = response.data.user.division;
            userData.email = response.data.user.email;
            userData.section = response.data.user.section;
            userData.branch = response.data.user.branch;

            // Mapping Department Data
            let departmentsData: any = [];
            let departments: any = response.data.departments;

            departments.map(function(v: any, index: number) {
              let departmentData = {};
              departmentData['value'] = v.id;
              departmentData['label'] = v.name;
              departmentsData.push(departmentData);

            });

            // Mapping Role Data
            let rolesData: any = [];
            let roles: any = response.data.roles;

            roles.map(function(v: any, index: number) {
              let roleData = {};
              roleData['value'] = v.id;
              roleData['label'] = v.name;
              rolesData.push(roleData);
            });

            this.setState({
              userData: userData,
              roles: rolesData,
              departments: departmentsData
            });
        });
    }
}
