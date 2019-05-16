import * as React from 'react';
import * as ReactDOM from 'react-dom';
import API, {ApiEndPointI} from '../aep';
import * as bs from 'react-bootstrap';
import Loader from 'Components/layout/Loader';
import  {connect } from 'react-redux';
import 'react-bootstrap-table/css/react-bootstrap-table.css';
// import 'abortcontroller-polyfill/dist/abortcontroller-polyfill-only';
// const controller = new AbortController();
var $ = require('jquery');
const Parser = require('html-react-parser');

import {ServerDataI, FetchDataI, InitialListRequest} from '../reducers/fetch-reducer';

// SearchField, SearchPanelProps , 
import { 
    BootstrapTable, 
    ButtonGroupProps, 
    TableHeaderColumn, 
    ColumnDescription,
    SortOrder,
    SearchFieldProps,
    TableHeaderColumnProps, 
    PaginationPostion } from 'react-bootstrap-table';

import { Props, ServerResponse, ServerResponseListData, ListRequest, mapDispatchToProps, mapStateToProps } from "../features/root-props";

/**
 * Table column interface
 */
export interface TableColumnProps extends TableHeaderColumnProps {

    title: string;
}

export interface TableProps extends Props {

    paginationPosition: PaginationPostion;
    columns: TableColumnProps[];
    exportFileName?: string;
    endPoint: ApiEndPointI;
    defaultData?: {[key: string]:  any};
    trClassName ?: string | ((rowData: any, rowIndex: number) => string);
}
export interface TableArchitecture {

    displayLessMoreAction: (cell: undefined | string, row: object, minLength?: number ) => React.ReactElement<HTMLElement>;
}

class Table extends React.Component <TableProps> implements TableArchitecture {
    
    constructor(props: TableProps) {        
        super(props);
        this.onPageChange = this.onPageChange.bind(this);
        this.searchField  = this.searchField.bind(this);
        this.onSearchChange = this.onSearchChange.bind(this);
        this.onSortChange = this.onSortChange.bind(this);
        this.onSizePerPageList = this.onSizePerPageList.bind(this);
        this.onPageSizeChange = this.onPageSizeChange.bind(this);
        this.createCustomButtonGroup = this.createCustomButtonGroup.bind(this);
        this.exportData = this.exportData.bind(this);
      
    }
    public onPageChange(page: number, sizePerPage: number) {

        this.props.callApi(this.props.endPoint, {page: page});
    }
    public onSearchChange(e: any) {

        this.props.callApi(this.props.endPoint, {searchdata: e.target.value });
    }
    /**
     * This function works when user sorts the list.
     * @type {void}
     */
    onSortChange(sortName: string, sortOrder: SortOrder ): void {

        this.props.callApi(this.props.endPoint, {sortName: sortName, sortOrder: sortOrder });
    }
    /**
     * This function work when user changes the page size
     * @type {void}
     */
    onSizePerPageList(sizePerPage: number): void {
        
        this.props.callApi(this.props.endPoint, {sizePerPage: sizePerPage, page: 0 });
    }
    /**
     * Display the total record information
     * @param  {[number]} start: number        [description]
     * @param  {[number]} to:    number        [description]
     * @param  {[number]} total: number        [description]
     * @return {[void]}        [description]
     */
   renderShowsTotal(start: number, to: number, total: number): React.ReactElement<HTMLElement> {
        return (
        <p  className="page-count-info">
            Showing { start } to { to } of { total } entries
        </p>
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
    createCustomButtonGroup = (props: ButtonGroupProps, requestData: ListRequest ) => {

        console.log('My Props...');
        console.log(this.props);

        return (
            <>
              <span>
              <span>Show </span>
              <bs.DropdownButton
                 title={requestData.sizePerPage}
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
              <span> entries</span>
              </span>
                { this.props.exportFileName ? <bs.Button className="btn btn-primary export-btn" onClick={this.exportData}>Export</bs.Button> : null}

              </>
         );
     }

     exportData() {

       let endPoint = {...this.props.endPoint};
       endPoint.shouldResponseStore = false;
       endPoint.saveRequest = false;
       
       var fName = this.props.exportFileName ? this.props.exportFileName : 'test.xlsx';
       this.props.callApi(endPoint, {export: true})
         .then((blob: any) => {

            if(window.navigator.msSaveOrOpenBlob) {
                
                window.navigator.msSaveBlob(blob, fName);
            }
            else{

                var downloadLink = window.document.createElement('a');
                downloadLink.href = window.URL.createObjectURL(new Blob([blob], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=UTF-8' }));
                downloadLink.download = fName;
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);

            }
         });
     }

     shouldComponentUpdate(nextProps: TableProps) {

        const nextSectionData = this.getSectionData(nextProps);
        const SectionData = this.getSectionData(this.props);
        
        if(nextSectionData && SectionData && nextSectionData.shouldUpdate !== SectionData.shouldUpdate){
            return true;
        }

        return false;
     }
     componentWillMount() {

        let endPoint = {...this.props.endPoint};
        //endPoint.signal = controller.signal;
        const defaultData = this.props.defaultData ? this.props.defaultData : {};
        let requestData: {[key: string]: any} = this.getRequestData(this.props);
        
        const defaultDataKeys = Object.keys(defaultData);
        defaultDataKeys.map((v) => {

            if(requestData && !requestData[v] ){
                delete requestData[v];
            }
        })
        
        const data = {...defaultData, ...requestData };
        this.props.callApi(endPoint, data);

     }
     /**
      * Get a perticular section data
      * @param props
      */
     getSectionData(props?: TableProps) : FetchDataI<ServerResponse<ServerResponseListData>> | null {
        props = props ? props : this.props;
        const {  endPoint } = this.props;
        const SectionData: FetchDataI<ServerResponse<ServerResponseListData>> | null = 
            props.rootState.server[endPoint.sectionName] ? props.rootState.server[endPoint.sectionName] : null;
        
        return SectionData;
     }

     /**
      * Dispaly the view More button in cell
      * @param cell 
      * @param row 
      * @param minLength 
      */
     displayLessMoreAction(cell: undefined | string, row: object, minLength?: number ): React.ReactElement<HTMLElement> {

        minLength = minLength === undefined ? 100: minLength;

        let d: string = cell ? cell.toString() : '';
        //d = d.replace(/\n/gi,'</p><p>');

        let needToDisplayLess: boolean = d.length > minLength; 
        
        if(!needToDisplayLess) {
            return <span><p>{Parser(d)}</p></span>
        }
        else{

            let shortData = d.slice(0, minLength);
            return <span data-veiw={1} > 
                <span className="only-text">{Parser(shortData) }...</span>
                    <span className="table-cell-read-more" 
                        data-shorttext={shortData} 
                        data-text={'<p>'+d.replace(/\n/gi,'</p><p>')+'</p>'} 
                        onClick={ (e: React.FormEvent<Element>) => { this.displayActionData(e) } }> more
                    </span> 
                </span>
        }
    }
    displayActionData(elem: React.FormEvent<Element> ){

        let content = elem.currentTarget.getAttribute('data-text');
        let shortContent = elem.currentTarget.getAttribute('data-shorttext');
        let pNode  = ReactDOM.findDOMNode(elem.currentTarget).parentNode;

        let viewType = $(pNode).attr('data-veiw');

        let newViewType = viewType == 1 ? 2 : 1;
        $(pNode).attr('data-veiw',newViewType);

        if(viewType ==1) {
            
            $(pNode).find('.only-text').html(content);
            $(elem.currentTarget).text(' less');

        } else {

            $(pNode).find('.only-text').html(shortContent+'...');
            $(elem.currentTarget).text(' more');
        }
    }
    // createCustomSearchField(props: SearchFieldProps ) {

    // }

     /**
      * Get the Request Data
      * @param props 
      */
     getRequestData(props ?: TableProps) : ListRequest {
        
        props = props ? props :this.props;
        const SectionData = this.getSectionData(props);
        
        const requestData  = SectionData ? SectionData.requestData : InitialListRequest;
        return requestData;
     }

     searchField(props: SearchFieldProps, req: ListRequest) {
        
        return <input type="text" 
            onChange={this.onSearchChange} 
            value={req.searchdata}
            className="form-control"
            placeholder="Search"
            />
     }

    /**
     * The function renders the data on the web page.
     * @return {React.ReactElement} 
     */
    public render() {
        
        const { columns, paginationPosition, endPoint, defaultData } = this.props;

        console.log('Table is rendering...');
        
        const SectionData = this.getSectionData(this.props);
        const isFetching = SectionData ? SectionData.isFetching : true;

        const requestData  = this.getRequestData(this.props);

        const { page, sizePerPage, sortName, sortOrder, searchdata, customFilters  } = requestData;
        const data = SectionData && SectionData.response ? SectionData.response.data : null;
        const list = data ?  data.data : [];
        console.log('searchdatassss');
        console.log(list);

        
        const options = {
          sizePerPage: sizePerPage,
          sizePerPageList: [25 ,100, 200, 500, 1000 ],
          page: data ? data.current_page : 1,
          defaultSortName: sortName ? sortName :  (defaultData && defaultData.sortName ? defaultData.sortName : null),
          defaultSortOrder: sortOrder ? sortOrder :  (defaultData && defaultData.sortOrder ? defaultData.sortOrder : null),
          noDataText: isFetching ? <Loader show={isFetching}/>: 'No Data',
          paginationPosition: paginationPosition,
          onPageChange: this.onPageChange,
          onSearchChange: this.onSearchChange,
          onSortChange: this.onSortChange,
          onSizePerPageList: this.onSizePerPageList,
          paginationShowsTotal: this.renderShowsTotal,
          defaultSearch:  undefined,
          searchField: (fprops: SearchFieldProps) => { return this.searchField(fprops,  requestData) },
         // trClassName:
          //searchField: this.createCustomSearchField,
          btnGroup: (btn: ButtonGroupProps)  => {  return  this.createCustomButtonGroup(btn, requestData)},
        };

        let BTSetitng = {

          footer: false,
          search: true,
          pagination: true,
          data: list,
          striped: true,
          remote: true,
          fetchInfo: { dataTotalSize: data ? data.total: 0 },
          hover: true,
          trClassName:  this.props.trClassName,
          options: options,
        };

        return (
            <div className={isFetching ? 'loading': 'ready'}>
            <BootstrapTable {...BTSetitng} >
                {(() => {
                    
                    return columns.map( (column: TableColumnProps, index) => {

                        let columnProps = {...column};
                        delete columnProps.title;
                        return < TableHeaderColumn key={`templateTableColumn${index}`} 
                            {...columnProps}>
                            {column.title}
                        </TableHeaderColumn>;
                    });

                })()}
            </BootstrapTable>
            </div>
        );

    }
}

//export default connect(mapStateToProps, mapDispatchToProps)(Table);
export default Table;