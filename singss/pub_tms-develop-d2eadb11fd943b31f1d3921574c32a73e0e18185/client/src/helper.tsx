import { BASE_PATH } from './constants/config';
// import * as React from 'react';
var dateFormat = require('dateformat');

export default function appUrl(url: string, withbase?: boolean ): string {

	let baseUrl = ( withbase  === undefined || withbase) ? BASE_PATH:'';

	return baseUrl + url;
}

export function displayDate (date: string): string {
	
	return dateFormat(date, 'dd/mm/yyyy');

} 