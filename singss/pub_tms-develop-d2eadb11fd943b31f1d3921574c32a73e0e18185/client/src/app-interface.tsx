import user from './models/user';
import { DeleteConfirmationProps } from './components/helpers/DeleteConfirmation';
import { TableProps } from './components/helpers/TableTemplate';
import { OldDateConfirmationProps } from './components/helpers/OldDateConfirmation';
import { RouterState } from 'connected-react-router';

export interface matchState {
    
    url: string;
    path: string;
    isExact: any;
    params: {
        id?: number;
    };
}

export interface AppState {
    isError: boolean;
    isRequesting:boolean;
    message:string;
    user: user;
    data?: object;
    status?: boolean;
    errors:Array<Object>;
    token: string;
    router?: RouterState;
    history?: any;
    showLoaderBar: boolean;
    showOverlayLoader?: boolean;
    error_code?: string;
    deleteConfirmation: DeleteConfirmationProps;
    oldDateConfirmation?: OldDateConfirmationProps;
    tableData: TableProps;
    match?: matchState;
    sweetalert?: Function;
}

export interface AppProps {

    isRequesting?:boolean;
    isError:boolean;
    data?: object;
    status?: boolean;
    message:string;
    token:string;
    user: user;
    errors?:Array<Object>;
    router?: RouterState;
    history:any;
    showLoaderBar:boolean;
    error_code?: string;
    showOverlayLoader?:boolean;
    match?: matchState;
    sweetalert?: Function;
    oldDateConfirmation?: OldDateConfirmationProps;
}

export interface pageInfo {

    url:string;
    title:string;
    metaTitle:string;
    metaDescription:string;
    metaKeywords:string;
    isAuthRequired:boolean;
    breadcrumb?: Array<string>;
}

export interface breadcrumbIntList {
    
    title: string;
    discription?: string;
    url: string;
    isActive: boolean;
}

export interface serverResponse {

    data: object;
    error_code: string;
    errors: Array<object>
    message: string;
    status: boolean;
}

export interface serverListResponse extends serverResponse {
    
    data: {

        total: number,
        per_page: number,
        current_page: number,
        last_page: number,
        first_page_url: string | null,
        last_page_url: string | null,
        next_page_url: string | null,
        prev_page_url: string | null,
        path: string,
        from: number,
        to: number,
        data: Array<object>   
    }
}