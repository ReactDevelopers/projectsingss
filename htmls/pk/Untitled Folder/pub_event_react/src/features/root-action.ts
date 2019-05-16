// RootActions
console.log('Jell..........');
import { RouterAction, LocationChangeAction } from 'react-router-redux';
import { getReturnOfExpression } from 'utility-types';

import ReduxFormAction  from 'redux-form/lib/actions';
import * as fetchAction from '../actions/fetch-action';
import * as authAction from '../actions/auth-action';
import * as eventAction from '../actions/event-action';
import * as loadBarAction from '../actions/loader-bar-action';
import * as swalAction from '../actions/swal-action';

export const actions = {
  fetch: fetchAction,
  auth: authAction,
  event: eventAction,
  loadBar: loadBarAction,
  swal: swalAction,
};


const returnsOfActions = [
  ...Object.values(fetchAction),
  ...Object.values(authAction),
  ...Object.values(loadBarAction),
  ...Object.values(eventAction),
  ...Object.values(swalAction),
].map(getReturnOfExpression);

export type AppAction = typeof returnsOfActions[number];
type ReactRouterAction = RouterAction | LocationChangeAction;

export type RootAction =
  | AppAction
  | ReduxFormAction
  | ReactRouterAction;