import * as React from 'react';
import * as ReactDOM from 'react-dom';
import user  from './models/user';
import registerServiceWorker from './registerServiceWorker';

import App from './App';
ReactDOM.render(
<App isError={false} message="" token="" showLoaderBar={true} user={new user()} history="" />, 
document.getElementById('root')
);

registerServiceWorker();