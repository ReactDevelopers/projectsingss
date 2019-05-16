import * as constants from '../constants';

export interface PageLoaded {

	type:constants.PAGE_LOADED;
	showLoaderBar:boolean;
}

export function pageLoaded(): PageLoaded {
    
    return {
        type: constants.PAGE_LOADED,
        showLoaderBar:false,
    }
}

export function pageWillLoaded(): PageLoaded {
    
    return {
        type: constants.PAGE_LOADED,
        showLoaderBar:true,
    }
}

export interface PageOverlayLoader {

    type:constants.OVERLAY_LOADER;
}

export function pageOverlayLoader(): PageOverlayLoader {
    
    return {
        type: constants.OVERLAY_LOADER,
    }
}

export type PageAction = PageLoaded | PageOverlayLoader;