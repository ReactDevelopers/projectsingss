import * as React from 'react';
import { BootstrapTable, ButtonGroupProps, SearchField, SearchPanelProps, TableHeaderColumn, SortOrder, TableHeaderColumnProps, PaginationPostion } from 'react-bootstrap-table';
import Api from '../../api/Api';
import { serverListResponse } from '../../app-interface';
import store from '../../store';
import { setTableData, setTableInternalData, TableInernalData, resetTableData } from '../../actions/TableTemplate';
import * as bs from 'react-bootstrap';

/**
 * Interface of table.
 */
export interface TableProps {

  data: Array<object>;
  totalDataSize: number;
  sizePerPage: number;
  currentPage: number;
  noDataText: string;
  searchdata: string;
  sortName: string;
  paginationPosition: PaginationPostion;
  sortOrder: SortOrder;
  columns: TableColumnProps[];
  fetch: Function | string | boolean;
  needToRefresh: refreshStatus
}

/**
 * Creates the Enum for handling the table refresh action.
 */
export enum refreshStatus  {
    'No',
    'Yes'
}

/**
 * Table key.
 */
export interface TableInernalDataOptionlKeys {

    currentPage?: number;
    sizePerPage?: number;
    sortName?: string;
    sortOrder?: SortOrder;
    searchdata?: string;
}
/**
 * Table column interface
 */
export interface TableColumnProps extends TableHeaderColumnProps {

    title: string;
}


/**
 * We are using this template to populate the data in bootstrap table format.
 */
export default class TableTemplate extends React.Component<TableProps> {

    constructor(props: TableProps) {
        
        super(props);

        this.fetchData();
        this.getInternalData = this.getInternalData.bind(this);
        this.onPageChange = this.onPageChange.bind(this);
        this.onSearchChange = this.onSearchChange.bind(this);
        this.onSortChange = this.onSortChange.bind(this);
        this.onSizePerPageList = this.onSizePerPageList.bind(this);
        this.onPageSizeChange = this.onPageSizeChange.bind(this);
    }
    /**
     * getting the List data from the APi and after response dispatch a method to set the table data.
     */
    fetchData(): void {

        if(this.props.fetch ===Function){

            this.props.fetch();

        }else if(this.props.fetch) {

            let api = new Api();
            
            let request = {

                body: {

                    sizePerPage: this.props.sizePerPage, 
                    page: this.props.currentPage,
                    searchdata: this.props.searchdata,
                    sortName: this.props.sortName,
                    sortOrder: this.props.sortOrder, 

                }

            };

            let url: string = this.props.fetch.toString();

            api.getFetch( url, request )
            .then( (response: serverListResponse ) => {

                store.dispatch(setTableData(response));
            });

        }
    }
    /**
     * this function shuffles table data except the `data` 
     * @type {Object}
     */
    getInternalData (overrideProps: TableInernalDataOptionlKeys): TableInernalData {

        let defaultData = {

            currentPage: this.props.currentPage,
            sizePerPage: this.props.sizePerPage,
            sortName: this.props.sortName,
            sortOrder: this.props.sortOrder,
            searchdata: this.props.searchdata,
            needToRefresh: refreshStatus.No,
        }

        return {...defaultData, ...overrideProps};

    }
    /**
     * This function works when the table page changes
     * @type {void}
     */
    onPageChange(page: number, sizePerPage: number): void {

          new Promise( (resolve, reject): void => {
              
              let data = this.getInternalData({currentPage: page});
              store.dispatch(setTableInternalData(data));
              resolve(data);

          }).then(() => {

            this.fetchData();

          });

    }
    /**
     * This function works when the user types anything in the search box.
     * @type {void}
     */
    onSearchChange(searchText: string, colInfos: object , multiColumnSearch: boolean): void {

         new Promise( (resolve, reject): void => {

             let data = this.getInternalData({searchdata: searchText});
             store.dispatch(setTableInternalData(data));
             resolve(data);

         }).then(() => {

          this.fetchData();

        });
    }
    /**
     * This function works when user sorts the list.
     * @type {void}
     */
    onSortChange(sortName: string, sortOrder: SortOrder ): void {

        new Promise( (resolve, reject): void => {
          
          let data = this.getInternalData({sortName: sortName, sortOrder: sortOrder, currentPage:0});
          store.dispatch(setTableInternalData(data));
          resolve(data);

        }).then(() => {

        this.fetchData();

        });
    }
    /**
     * This function work when user changes the page size
     * @type {void}
     */
    onSizePerPageList(sizePerPage: number): void {

        new Promise( (resolve, reject): void => {

          let data = this.getInternalData({sizePerPage: sizePerPage, currentPage: 0});
          store.dispatch(setTableInternalData(data));
          resolve(data);

        }).then(() => {

            this.fetchData();        
        });
    }
    /**
     * function executes when any property has been changed by the reducer action.
     * @param  {object} props: TableProps    Table properties.
     * @return {void}        
     */
    componentWillReceiveProps(props: TableProps){

        if(props.needToRefresh == refreshStatus.Yes){

            this.fetchData();
        }
    }

    /**
     * Display the tolal record information
     * @param  {[type]} start: number        [description]
     * @param  {[type]} to:    number        [description]
     * @param  {[type]} total: number        [description]
     * @return {[type]}        [description]
     */
   renderShowsTotal(start: number, to: number, total: number) {
        return (
          <p  className="page-count-info">
            From { start } to { to }, totals is { total }
          </p>
        );
    }

    componentWillUnmount(){
        store.dispatch(resetTableData());
    }

    /**
     * Search Field
     * @param  {[type]} props: SearchPanelProps [description]
     * @return {[type]}        [description]
     */
    createCustomSearchField = (props: SearchPanelProps) => {
      return (
         <SearchField
                className='my-custom-class'
                defaultValue={props.defaultValue}
                placeholder='Search..'/>
          );
    }

    /**
     * Handle the event when user changes the Page size lenth
     * @param  {[type]} eventKey: any     Selected page length
     * @return {[type]}           void
     */
    onPageSizeChange(eventKey: any): void {

        this.onSizePerPageList(eventKey);
    }
    
    /**
     * Rendering the pageSize downdown before the search field.
     * @param  {[type]} props: ButtonGroupProps [description]
     * @return {[type]}        [description]
     */
    createCustomButtonGroup = (props: ButtonGroupProps ) => {
       return (
             <bs.DropdownButton
                title={this.props.sizePerPage}
                id="dropdown-size-large"
             >
             <bs.MenuItem eventKey={5} onSelect={this.onPageSizeChange}>5</bs.MenuItem>
             <bs.MenuItem eventKey={10} onSelect={this.onPageSizeChange}>10</bs.MenuItem>
             <bs.MenuItem eventKey={50} onSelect={this.onPageSizeChange}>50</bs.MenuItem>
             <bs.MenuItem eventKey={100} onSelect={this.onPageSizeChange}>100</bs.MenuItem>
             <bs.MenuItem eventKey={200} onSelect={this.onPageSizeChange}>200</bs.MenuItem>
             <bs.MenuItem eventKey={500} onSelect={this.onPageSizeChange}>500</bs.MenuItem>
             <bs.MenuItem eventKey={1000} onSelect={this.onPageSizeChange}>1000</bs.MenuItem>
             </bs.DropdownButton>
        );
    }

    /**
     * The function renders the data on the web page.
     * @return {React.ReactElement} 
     */
    public render() {
        
        const { data, totalDataSize, sizePerPage, currentPage, noDataText, sortOrder, sortName, columns, paginationPosition } = this.props;

        let options = {

          sizePerPage: sizePerPage,
          sizePerPageList: [ 5, 10, 100, 200, 500, 1000 ],
          page: currentPage,
          defaultSortName: sortName,
          defaultSortOrder: sortOrder,
          noDataText: noDataText,
          paginationPosition: paginationPosition,
          onPageChange: this.onPageChange,
          onSearchChange: this.onSearchChange,
          onSortChange: this.onSortChange,
          onSizePerPageList: this.onSizePerPageList,
          paginationShowsTotal: this.renderShowsTotal,
          searchField: this.createCustomSearchField,
          btnGroup: this.createCustomButtonGroup,
        };

        let BTSetitng = {

          footer: false,
          search: true,
          pagination: true,
          data: data,
          striped: true,
          remote: true,
          fetchInfo: { dataTotalSize: totalDataSize },
          hover: true,
          options: options,
        };


        return (

            <BootstrapTable {...BTSetitng} >
                {(() => {
                    
                    return columns.map( (column: TableColumnProps, index) => {

                        let columnProps = {...column};
                        delete columnProps.title;
                        return < TableHeaderColumn key={`templateTableColumn${index}`} {...columnProps}>{column.title}</TableHeaderColumn>;
                    });

                })()}
            </BootstrapTable>
        );

    }
}