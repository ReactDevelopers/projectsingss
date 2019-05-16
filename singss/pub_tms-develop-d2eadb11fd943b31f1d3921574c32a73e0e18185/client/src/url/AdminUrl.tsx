import appUrl from '../helper';
import { pageInfo } from '../app-interface';

class AdminUrl {

    public urls = {
        home: {

            url: appUrl('/'),
            title: 'TMS',
            metaTitle: 'Login',
            metaDescription: 'Login',
            metaKeywords: 'Login',
            isAuthRequired: false
        },

        dashboard: {

            url: appUrl('/dashboard'),
            title: 'Dashboard',
            metaTitle: 'dashboard',
            metaDescription: 'dashboard',
            metaKeywords: 'dashboard',
            isAuthRequired: true,

        },
        
        user_list: {

            url: appUrl('/user'),
            title: 'User List',
            metaTitle: 'User List',
            metaDescription: 'User List',
            metaKeywords: 'User List',
            isAuthRequired: true,
            breadcrumb: ['dashboard']
        },
        user_edit: {

            url: appUrl('/user/:id/edit'),
            title: 'User Edit',
            metaTitle: 'User Edit',
            metaDescription: 'User Edit',
            metaKeywords: 'User Edit',
            isAuthRequired: true,
            breadcrumb: ['dashboard', 'user_list']
        },
        user_import: {

            url: appUrl('/user-import'),
            title: 'User Import',
            metaTitle: 'User Import',
            metaDescription: 'User Import',
            metaKeywords: 'User Import',
            isAuthRequired: true,
            breadcrumb: ['dashboard', 'user_list']
        },
        course: {

            url: appUrl('/course'),
            title: 'Maintain Course List',
            metaTitle: 'Maintain Course List',
            metaDescription: 'Maintain Course List',
            metaKeywords: 'Create New Course',
            isAuthRequired: true,
            breadcrumb: ['dashboard']
        },
        course_create: {

            url: appUrl('/course/create'),
            title: 'Create New Course',
            metaTitle: 'Create New Course',
            metaDescription: 'Create New Course',
            metaKeywords: 'Create New Course',
            isAuthRequired: true,
            breadcrumb: ['dashboard', 'course']
        },
        course_edit: {

            url: appUrl('/course/:id/edit'),
            title: 'Edit Course',
            metaTitle: 'Edit Course',
            metaDescription: 'Edit Course',
            metaKeywords: 'Edit Course',
            isAuthRequired: true,
            breadcrumb: ['dashboard', 'course']
        },

        runningCourse: {

            url: appUrl('/running-course'),
            title: 'Maintain Course Runs',
            metaTitle: 'Maintain Course Runs',
            metaDescription: 'Maintain Course Runs',
            metaKeywords: 'Running',
            isAuthRequired: true,
            breadcrumb: ['dashboard']
        },
        runningCourseCreate: {

            url: appUrl('/running-course/create'),
            title: 'Running Course Create',
            metaTitle: 'Running Course Create',
            metaDescription: 'Running Course Create',
            metaKeywords: 'Running Course',
            isAuthRequired: true,
            breadcrumb: ['dashboard','runningCourse']
        },
        runningCourseBooking: {

            url: appUrl('running-course-booking'),
            title: 'Maintain Course Run Bookings',
            metaTitle: 'Maintain Course Run Bookings',
            metaDescription: 'Maintain Course Run Bookings',
            metaKeywords: 'Maintain Course Run Bookings',
            isAuthRequired: true,
            breadcrumb: ['dashboard']
        }
    };

    /**
     * Getting al pages
     * @type {[funciton]}
     * @returns Object
     */ 
    getAll(): object {

        return this.urls;
    }
    
    /**
     * Geting the given page information
     * @type {[funciton]}
     * @returns instance of pageInfo
     */
    getPage(pagename: string): pageInfo {
        
        if (typeof this.urls[pagename] !== 'undefined') {

            return this.urls[pagename];

        } else {

            return {

                url: appUrl('/'),
                title: 'TMS',
                metaTitle: 'TMS',
                metaDescription: 'TMS',
                metaKeywords: 'TMS',
                isAuthRequired: false,
            };
        }
    }
}

export default AdminUrl;