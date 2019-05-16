import * as React from 'react';
import { Provider } from 'react-redux';
import { Store } from 'redux';
import { ConnectedRouter } from 'react-router-redux';
import { Route, Switch } from 'react-router-dom';
import { History } from 'history';
import 'react-loading-bar/dist/index.css';
import 'react-datepicker/dist/react-datepicker.css';
import 'font-awesome/css/font-awesome.css';
import 'bootstrap/dist/css/bootstrap.css';

import './App.css';
import './scss/index.scss';

import Login from 'Components/auth/Login';
import Dashboard from 'Components/dashboard';
import CreateEvent from 'Components/event/CreateEvent';
import EditEvent from 'Components/event/EditEvent';
import EventList from 'Components/event/Event';
import SendInitialEmail from 'Components/event/SendInitialEmail';
import SendEventEmail from 'Components/event/SendEventEmail';
import UserList from 'Components/user/User';
import EditUser from 'Components/user/EditUser';
import EventGroup from 'Components/event_group/EventGroup';
import GroupEmail from 'Components/group_email/GroupEmail';
import CreateGroupEmail from 'Components/group_email/CreateGroupEmail';
import EditGroupEmail from 'Components/group_email/EditGroupEmail';

import CreateEventGroup from 'Components/event_group/CreateEventGroup';
import EditEventGroup from 'Components/event_group/EditEventGroup';

import EditEmailTemplate from 'Components/email_template/EditEmailTemplate';
import AuditTrails from 'Components/audits/AuditTrail';
import EmailLog from 'Components/audits/EmailLog';
import Config from 'Components/Config';

import SweetAlert from './plugins/Swal';
import {InitialProps as SwalProps} from './reducers/swal-reducer';

import helper from './plugins/Helper';

export interface Props {
  store: Store<any>;
  history: History;
}

export class App extends React.Component<Props, {}> {
  render() {
    
    const { store, history } = this.props;
    const initialProps = {
      history: history,
      dispatch: store.dispatch,
      rootState: store.getState(),
      helper: new helper(),
      callApi: ( ) =>{ return Promise.resolve('ok') }
    }
    return (
      <Provider store={store}>
        <ConnectedRouter history={history}>
          <>
          <SweetAlert {...SwalProps} />
          <Switch>
          <Route exact={true} path="/" render={ () => <Login  {...initialProps} /> } />
          {/* Evnet Route -> List, Create , Edit */}
          <Route exact={true} path="/dashboard" render={ () => <Dashboard  {...initialProps} /> } />
          <Route exact={true} path="/event/create" render={ () => <CreateEvent  {...initialProps} /> } />
          <Route exact={true} path="/event/:id" render={ () => <EditEvent  {...initialProps} /> } />
          <Route exact={true} path="/event" render={ () => <EventList  {...initialProps} /> } />
          <Route exact={true} path="/send-email/:type/:id" render={ () => <SendEventEmail  {...initialProps} /> } />
          <Route exact={true} path="/send-initail-email" render={ () => <SendInitialEmail  {...initialProps} /> } />
          
          {/* User Route -> list, Edit */}
          <Route exact={true} path="/user" render={ () => <UserList  {...initialProps} /> } />
          <Route exact={true} path="/user/:id" render={ () => <EditUser  {...initialProps} /> } />
          
          {/* Event Group Route -> list, edit , create */}
          <Route exact={true} path="/event_group" render={ () => <EventGroup  {...initialProps} /> } />
          <Route exact={true} path="/event_group/create" render={ () => <CreateEventGroup  {...initialProps} /> } />
          <Route exact={true} path="/event_group/:id" render={ () => <EditEventGroup  {...initialProps} /> } />
          
          {/* Email Template Route only for Edit */}
          <Route exact={true} path="/email_template/:id" render={ () => <EditEmailTemplate  {...initialProps} /> } />
          
          {/* Audit Trails Routes. */}
          <Route exact={true} path="/audit-trail" render={ () => <AuditTrails  {...initialProps} /> } />
          <Route exact={true} path="/email-log" render={ () => <EmailLog  {...initialProps} /> } />
  
          {/* Group Email routes, */}
          <Route exact={true} path="/group-email" render={ () => <GroupEmail  {...initialProps} /> } />
          <Route exact={true} path="/group-email/create" render={ () => <CreateGroupEmail  {...initialProps} /> } />
          <Route exact={true} path="/group-email/:id" render={ () => <EditGroupEmail  {...initialProps} /> } />

          <Route exact={true} path="/config" render={ () => <Config  {...initialProps} /> } />
          
          <Route            
            render={() => (
                <div>404 </div>
            )}
          />
          </Switch>
          </>
        </ConnectedRouter>
      </Provider>
    );
  }
}