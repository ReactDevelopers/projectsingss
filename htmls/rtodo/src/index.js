// import React from 'react';
// import ReactDOM from 'react-dom';
// import './index.css';
// import App from './App';
// import * as serviceWorker from './serviceWorker';

// ReactDOM.render(<App />, document.getElementById('root'));

// // If you want your app to work offline and load faster, you can change
// // unregister() to register() below. Note this comes with some pitfalls.
// // Learn more about service workers: http://bit.ly/CRA-PWA
// serviceWorker.unregister();


import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import './assets/css/custom.css';
import App from './App';
//import * as serviceWorker from './serviceWorker';

//import , { browserHistory  } from './store';
import { createBrowserHistory } from 'history';
export const browserHistory = createBrowserHistory({
    basename: process.env.DOMAIN_PATH
});

const render = Component =>
  ReactDOM.render(

      <Component history={browserHistory} />,
      
    document.getElementById('root')
);

render(App);

// Webpack Hot Module Replacement API
//if (module.hot) module.hot.accept('./app', () => render(App));