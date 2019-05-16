import * as React from 'react';
import {Props, mapDispatchToProps, mapStateToProps, ServerResponse} from '../../features/root-props';
import Template from '../layout/Template';
import API from '../../aep';
import  {connect } from 'react-redux';
import {actions as RootActions} from '../../features/root-action';

class Detail extends React.Component<Props> {
    
    private CourseId: string;

    constructor(props: Props) {
        super(props);

        const params = this.props.params();
        this.CourseId = params[params.length-1];
    }

    shouldComponentUpdate(nextProps: Props) {

        return this.props.helper.shouldUpdate(nextProps, this.props, ['course_detail']);
    }

    componentWillMount(){
        let endPoint = {...API.COURSE_DETAIL};
        endPoint.url +='/'+this.CourseId;
        this.props.callApi(endPoint)
            .then((response: ServerResponse) => {
        })
    }
    componentWillUnmount() {

        this.props.dispatch(RootActions.fetch.deleteResponse(API.COURSE_DETAIL));
    }

    render() {
        const auth_user = this.props.helper.deepFind(this.props.rootState.server,'auth_user.response.data', {});

        const breadcrumbs = [
            {title: auth_user.view_as === 'Viewer' ? 'Show All Courses' :'Maintain Course Directory', url:  auth_user.view_as === 'Viewer' ?'/all-course' :'/course'},
            {title: 'Course Directory Detail', url: '/course/'+ this.CourseId},   
        ];

        const data: {[key:string]: any} =  this.props.helper.deepFind(this.props.rootState.server,'course_detail.response.data',{});
        const isFetching =  this.props.helper.deepFind(this.props.rootState.server,'course_detail.isFetching',true);

        return(
            <Template {...this.props} breadcrumb={breadcrumbs} >
            <div className="head-section light-blue-border border-12 dark-blue-bg">
                    <h5>{data.course_code}</h5>
                    <h4>Apply project management skills</h4>
                </div>
            <div className="light-blue-border border-12 white-bg p-20">
                <table className="table table-structure table-td-50">  
                    <tbody>   
                        
                        <tr><td><label>Course Code: </label></td><td>{!isFetching ? data.course_code : 'loading..'}</td></tr>
                        <tr><td><label>Course Title: </label></td><td>{!isFetching ? data.course_title: 'loading...'}</td></tr>
                        <tr><td><label>Duration (No of Days): </label></td><td>{!isFetching ? data.duration_in_days :'loading...'}</td></tr>
                        <tr><td><label>Programme Category: </label></td><td>{!isFetching ? data.prog_category_name: 'loading..'}</td></tr>
                        <tr><td><label>Programme Type: </label></td><td>{!isFetching ? data.prog_type_name: 'loading...'}</td></tr>
                        <tr><td><label>Dept/ Competency Level (if applicable): </label></td> <td>{!isFetching ? data.dept_name: 'loading...'}</td></tr>
                        <tr><td><label>Assessment Type: </label></td><td>{!isFetching ? data.assessment_type_name : 'loading...'}</td></tr>
                        <tr><td><label>Mandatory Y/N: </label></td><td>{!isFetching ? data.mandatory : 'loading...'}</td></tr>
                        <tr><td><label>Delivery Method: </label></td><td>{!isFetching ? data.delivery_method : 'loading...'}</td></tr>
                        <tr><td><label>Training Location: </label></td><td>{!isFetching ? data.training_location_name : 'loading...'}</td></tr>
                        <tr><td><label>Course Provider: </label></td><td>{!isFetching ? data.course_provider_name : 'loading...'}</td></tr>
                        <tr><td><label>Cost Per Pax: </label></td><td>{!isFetching ? data.cost_per_pax : 'loading...'}</td></tr>
                        <tr><td><label>Grant/Subsidy (Yes/No): </label></td><td>{!isFetching ? data.subsidy: 'loading...'}</td></tr>
                        <tr><td><label>If yes, provide value ($): </label></td><td>{!isFetching ? data.subsidy_value: 'loading...'}</td></tr>
                        <tr><td><label>Vendor Contact/Email Account: </label></td><td>{!isFetching ? data.vendor_email : 'loading...'}</td></tr>
                    </tbody> 
                </table>
            </div>
                
            </Template>
        );
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Detail)