import * as constants from '../constants/TableTemplate';
import { serverListResponse } from '../app-interface';
import { refreshStatus } from '../components/helpers/TableTemplate';
import {  SortOrder } from 'react-bootstrap-table';

export interface TableResponse {

    data: Array<object>;
    totalDataSize: number;
    noDataText: string;
    currentPage: number;
    
}

export interface GetTableData {

    type: constants.GET_TABLE_DATA_SUCCESS;
    payload: TableResponse;
}

export function setTableData(response: serverListResponse ): GetTableData {
    
    return {
        type: constants.GET_TABLE_DATA_SUCCESS,
        payload: {
            data: response.data.data,
            totalDataSize: response.data.total,
            noDataText: 'No Record Found.',
            currentPage: response.data.current_page,
        },
    };
}

export interface TableInernalData {

    currentPage: number;
    sizePerPage: number;
    sortName: string;
    sortOrder: SortOrder;
    searchdata: string;
    needToRefresh: refreshStatus;
}

export interface SetTableInternalData {
    
    type: constants.SET__INTERNAL_TABLE_DATA;
    payload: TableInernalData;
}

export function setTableInternalData (response: TableInernalData ): SetTableInternalData {

    return {
        type: constants.SET__INTERNAL_TABLE_DATA,
        payload: { ...response },
    };
}

export interface TableRefresh {
    
    type: constants.TABLE_REFRESH;
    payload: {needToRefresh: refreshStatus};
}

export function tableRefreah (): TableRefresh {

    return {
        type: constants.TABLE_REFRESH,
        payload: {needToRefresh: refreshStatus.Yes },
    };
}


// REST Table data Action
// 
export interface ResetTableData {

    type: constants.TABLE_RESET;
    payload: TableResponse;
}

export function resetTableData(): ResetTableData {
    
    return {
        type: constants.TABLE_RESET,
        payload: {
            data: [],
            totalDataSize: 0,
            noDataText: 'loading...',
            currentPage: 0
        },
    };
}

export type TableTemplateAction = GetTableData |  SetTableInternalData | TableRefresh | ResetTableData;