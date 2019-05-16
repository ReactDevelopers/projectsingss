import * as React from 'react';
import { Switch, Route} from 'react-router-dom';
import { Provider } from 'react-redux';
import history from './history';
import store from './store';
import { ConnectedRouter } from 'connected-react-router';

import Dashboard from './containers/Dashboard';
import Home from './containers/Home';
import NotFound from './components/NotFound';
import ImportUser from './containers/user/ImportUser';
import UserList from './containers/user/UserList';
import UserEdit from './containers/user/UserEdit';
import CourseCreate from './containers/course/CourseCreate';
import CourseList from './containers/course/CourseList';
import CourseEdit from './containers/course/CourseEdit';
import RunningCourseList from './containers/running_course/RunningCourseList';
import RunningCourseCreate from './containers/running_course/RunningCourseCreate';
import RunningCourseBooking from './containers/running_course_bookings/RunningCourseBookingList';

import appUrl from './helper';

class AppRouter extends React.Component {

 render() {
   return (
    <Provider store={store}>
      <ConnectedRouter history={history}>
       <Switch>
        <Route exact={true} path={appUrl('/')} component={Home}/>
        <Route exact={true} path={appUrl('/dashboard')} component={Dashboard}/>
        <Route exact={true} path={appUrl('/user/')} component={UserList}/>
        <Route exact={true} path={appUrl('/user/:id/edit')} component={UserEdit}/>
        <Route exact={true} path={appUrl('/user-import')} component={ImportUser}/>
        <Route exact={true} path={appUrl('/course')} component={CourseList}/>
        <Route exact={true} path={appUrl('/course/create')} component={CourseCreate}/>
        <Route exact={true} path={appUrl('/course/:id/edit')} component={CourseEdit}/>
        <Route exact={true} path={appUrl('/running-course')} component={RunningCourseList}/>
        <Route exact={true} path={appUrl('/running-course/create')} component={RunningCourseCreate}/>
        <Route exact={true} path={appUrl('/running-course-booking')} component={RunningCourseBooking}/>
        <Route component={NotFound}/>
       </Switch>
      </ConnectedRouter>
    </Provider>
   );
 }
}

export default AppRouter;