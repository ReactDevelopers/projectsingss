import moment from 'moment';
import Cookie from 'js-cookie';

export interface HelperProps {

    dateFormat: string;
    dateTimeFormat: string;
    displayDate: (date: string) => string;
    displayDateTime: (date: string) => string;
    range: (start: number, stop: number, step?: number) => Array<number>;
    isLogin: () => boolean;
    deepFind: (obj: {[key: string]: any}, path:string) => any;
}

class Helper implements HelperProps {
    
    dateFormat:string = 'DD/MM/YYYY';
    dateTimeFormat:string = 'DD/MM/YYYY LT';
    /**
     * To Display the Date
     * @param date 
     */
    displayDate(date: string | null) : string {

        return date ? moment(date).format(this.dateFormat) : 'N/A';
    }

    /**
     * To Display the DateTime
     * @param date 
     */
    displayDateTime(date: string | null) : string {

        return date ? moment(date).format(this.dateTimeFormat) : 'N/A';
    }
    /**
     * TO get Array of selected Range
     * @param start 
     * @param stop 
     * @param step 
     */
    range(start: number, stop: number, step?: number): Array<number> {

        if (typeof stop == 'undefined') {
            // one param defined
            stop = start;
            start = 0;
        }
    
        if (typeof step == 'undefined') {
            step = 1;
        }
    
        if ((step > 0 && start >= stop) || (step < 0 && start <= stop)) {
            return [start];
        }
    
        var result = [];
        for (var i = start; step > 0 ? i < stop : i > stop; i += step) {
            result.push(i);
        }
    
        return result;
    }

    /**
     * TO Check user Login
     */
    isLogin() : boolean {

        return Cookie.get('access_token') ? true : false;
    }

    /**
     * Find the key deep in object.
     * @param obj 
     * @param path 
     */
    deepFind(obj: {[key: string]: any} | undefined, path:string): any {

        var paths = path.split('.')
          , current = obj
          , i;
      
        for (i = 0; i < paths.length; ++i) {

          if (!current || current[paths[i]] === undefined) {
              
            return undefined;
          } else {
            current = current[paths[i]];
          }
        }
        return current;
    }


}

export default Helper;