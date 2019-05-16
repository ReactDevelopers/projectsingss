import { AppAction } from '../actions';
import { TableProps, refreshStatus } from '../components/helpers/TableTemplate';
import * as constants from '../constants/TableTemplate';
// import { defaultAlertData } from '../components/helpers/DeleteConfirmation';
import {  SortOrder, PaginationPostion } from 'react-bootstrap-table';

let defaultSortOrder: SortOrder = 'asc';
let defaultPaginationPos: PaginationPostion = 'bottom';

export const defaultTableData = {
	
	data: [],
	totalDataSize: 0,
	noDataText: 'Loading...',
	currentPage: 1,
	sizePerPage: 10,
	searchdata:'',
	sortName:'',
	sortOrder:  defaultSortOrder,
	columns: [],
	fetch: false,
	needToRefresh: refreshStatus.No,
	paginationPosition: defaultPaginationPos
};

export default function appTableReducer(state: TableProps , action: AppAction ): TableProps {

	
	switch (action.type) {

		case constants.GET_TABLE_DATA_SUCCESS:
		 return {
		 	...state,
			data: action.payload.data,
			totalDataSize: action.payload.totalDataSize,
			noDataText: 'No Record Found.',
			currentPage: action.payload.currentPage,
			needToRefresh: refreshStatus.No
		 }
		 case constants.SET__INTERNAL_TABLE_DATA:
		 	return {

		 		...state,
		 		currentPage: action.payload.currentPage,
		 		sizePerPage: action.payload.sizePerPage,
		 		sortName: action.payload.sortName,
		 		sortOrder: action.payload.sortOrder,
		 		searchdata: action.payload.searchdata,
		 		needToRefresh: refreshStatus.No
		 	}
		case constants.TABLE_RESET:
		 	return {

		 		...state,
		 		...action.payload
		 	}	
		case constants.TABLE_REFRESH:
			return {
				...state,
				needToRefresh: action.payload.needToRefresh				
			} 	

		default:
        return { ...state };
	}
}