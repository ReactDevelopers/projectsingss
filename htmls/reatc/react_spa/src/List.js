import React, { Component } from "react";
import {BootstrapTable, TableHeaderColumn} from 'react-bootstrap-table';
import './index.css';
import 'react-bootstrap-table/dist/react-bootstrap-table-all.min.css';
import '../node_modules/react-bootstrap-table/dist/react-bootstrap-table.min.css';
import swal from 'sweetalert';
import axios from 'axios';
// import '../node_modules/react-bootstrap-table/dist/react-bootstrap-table-all.min.css';
 
class List extends Component {

  constructor(props) {
      const users = [];
      super(props)
      this.state = {
          users: []
      }
  }

  componentDidMount() {
      let self = this;
      fetch('http://localhost:3001/users', {
          method: 'GET'
      }).then(function(response) {
          if (response.status >= 400) {
              throw new Error("Bad response from server");
          }
          return response.json();
      }).then(function(data) {
          self.setState({users: data});
      }).catch(err => {
      console.log('caught it!',err);
      })
  }

  removeWorker = (worker:any) => {
      this.props.removeWorker(worker);
  };

  remote(remoteObj) {
    // Only cell editing, insert and delete row will be handled by remote store
    // remoteObj.cellEdit = true;
    // remoteObj.insertRow = true;
    remoteObj.dropRow = true;
    return remoteObj;
  }

  onDeleteRow = (row) => {
    console.log('^^^')
    console.log(row)
    // this.users = this.users.filter((product) => {
    //   return users.id !== row[0];
    // });

    // this.setState({
    //   data: this.users
    // });
  }

  deleteMember(row){
      var data = {
          id: row.id
      }
      // fetch("http://localhost:3001/users/delete", {
      //     method: 'POST',
      //     headers: {'Content-Type': 'application/json'},
      //     body: JSON.stringify(data)
      // }).then(function(response) {
      //     if (response.status >= 400) {
      //       throw new Error("Bad response from server");
      //     }
      //     return response.json();
      // }).then(function(data) {
      //     if(data === "success"){
      //        this.setState({msg: "User has been deleted."});  
      //     }
      // }).catch(function(err) {
      //     console.log(err)
      // });
      axios({
          method: 'post',
              url: "http://localhost:3001/users/delete",
              data: data,
              crossDomain: true,
              accept: 'application/json',
          //     headers : {
          //     'Content-Type': 'application/json'
          // }
       })
      .then(function (response) {
        console.log(response);
          swal({
              title: "deleted!",
              icon: "success",
              button: "Ok",
            })
      })
      .catch(function (response) {
          swal({
              title: "Error in deleteing",
              icon: "error",
              button: "Ok",
            })
      });
      console.log('cscs');
      console.log(this.state);
      this.onDeleteRow(row.id);
      // this.removeWorker(row.id)
      // for(let i in rowKeys) {
      //     this.removeWorker(rowKeys[i]);
      // }
      // refreshUser = res => this.setState({user: res.data.user})
      // this.forceUpdate();
  }


  componentWillReceiveProps(newProps) {
    console.log('componentWillReceiveProps............ from edit');
    console.log(newProps)
    // if(nextProps.params.id !== this.props.params.id) {
    //      this.props.dispatch(getCrmStatus(nextProps.params.id));
    // }
    // this.setState({
    //     name: newProps.CrmOne.name,
    //     shop_name: newProps.CrmOne.shop_name,
    //     status: newProps.CrmOne.status, 

    // })
  }


  onClickProductSelected(cell, row, rowIndex){
   console.log('Product #', row.id);
  }

  cellButton(cell, row, enumObject, rowIndex) {
    return (
       <button 
          type="button" 
          onClick={() => 
            this.deleteMember(row)
          /*this.onClickProductSelected(cell, row, rowIndex)*/}
       >
       Click me { rowIndex }
       </button>
    )
 }


  render() {

    const options = {
      page: 1,  // which page you want to show as default
      sizePerPageList: [ {
        text: '5', value: 5
      }, {
        text: '10', value: 10
      }, {
        text: 'All', value: this.state.users.length
      } ], // you can change the dropdown list for size per page
      sizePerPage: 5,  // which size per page you want to locate as default
      pageStartIndex: 1, // where to start counting the pages
      paginationSize: 3,  // the pagination bar size.
      prePage: 'Prev', // Previous page button text
      nextPage: 'Next', // Next page button text
      firstPage: 'First', // First page button text
      lastPage: 'Last', // Last page button text
      noDataText: 'No Results Found',
      paginationShowsTotal: this.renderShowsTotal,  // Accept bool or function
      paginationPosition: 'bottom'  // default is bottom, top and both is all available
      // hideSizePerPage: true > You can hide the dropdown for sizePerPage
      // alwaysShowAllBtns: true // Always show next and previous button
      // withFirstAndLast: false > Hide the going to First and Last page button
    };

    return (
      <div>
        <h2>Listing of Data</h2>
        
        <div>Datatable</div>
          <BootstrapTable data={this.state.users} pagination striped search options={ options } searchPlaceholder='input something...' exportCSV>
              <TableHeaderColumn isKey dataField='id' dataSort={ true }>ID</TableHeaderColumn>
              <TableHeaderColumn dataField='username'>Name</TableHeaderColumn>
              <TableHeaderColumn dataField='emailid'>Email</TableHeaderColumn>
              <TableHeaderColumn dataField='button' dataFormat={this.cellButton.bind(this)}/>
          </BootstrapTable>
      </div>
    );
  }
}
 
export default List;

