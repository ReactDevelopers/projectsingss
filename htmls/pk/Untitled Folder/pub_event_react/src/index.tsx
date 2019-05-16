import * as React from 'react';
import * as ReactDOM from 'react-dom';
// tslint:disable:no-import-side-effect
// side-effect imports here
//console.log('...........kkkkkkkkk');
//import './rxjs-imports';
//console.log('...........llllllllllllllll');
// tslint:enable:no-import-side-effect

import { App } from './app';
import { store, browserHistory, epicMiddleware } from './store';
import Cookie from 'js-cookie';
import API from './aep';
import {callApi} from './actions/fetch-action';
import {Headers} from 'cross-fetch';
import {ServerResponse} from './features/root-props';
import {AuthI} from './models/Auth';

const renderRoot = (app: JSX.Element) => {
  
  console.log('s...');
  console.log(Cookie.get('access_token'));

  const access_token = Cookie.get('access_token');
  if(access_token) {

    API.AUTH_ME.headers = new Headers();
    API.AUTH_ME.headers.append('authorization', 'Bearer ' + access_token);
    API.AUTH_ME.extendResponse = (data: ServerResponse<AuthI>) => {data.data ? data.data.token = access_token : null };
    
    store.dispatch(callApi(API.AUTH_ME)).then((data: ServerResponse) => {
        ReactDOM.render(app, document.getElementById('root'));
    }).catch(() => {
      ReactDOM.render(app, document.getElementById('root'));
    });

  } else {

      ReactDOM.render(app, document.getElementById('root'));
  }
};

if (process.env.NODE_ENV === 'production') {
  renderRoot((
    <App store={store} history={browserHistory} />
  ));
} else { // removed in production, hot-reload config
  // tslint:disable-next-line:no-var-requires
  const AppContainer = require('react-hot-loader').AppContainer;
  renderRoot((
    <AppContainer>
      <App store={store} history={browserHistory} />
    </AppContainer>
  ));

  if (module.hot) {

    
    // app
    module.hot.accept('./app', async () => {
      // const NextApp = require('./app').App;
      const NextApp = (await System.import('./app')).App;
      renderRoot((
        <AppContainer>
          <NextApp store={store} history={browserHistory} />
        </AppContainer>
      ));
    });

    // reducers
    module.hot.accept('./features/root-reducer', () => {
      const newRootReducer = require('./features/root-reducer').default;
      store.replaceReducer(newRootReducer);
    });

    // epics
    module.hot.accept('./features/root-epic', () => {
      const newRootEpic = require('./features/root-epic').default;
      epicMiddleware.replaceEpic(newRootEpic);
    });
  }
}
