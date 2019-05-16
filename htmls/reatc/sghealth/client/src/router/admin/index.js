import Vue from 'vue'
import Router from 'vue-router'

import { canAccess } from '@/utils'
import NProgress from 'nprogress' // Progress 
import 'nprogress/nprogress.css'// Progress 
import { Message } from 'lq-element-ui'
import { getToken } from '@/utils/auth' 

// in development-env not use lazy-loading, because lazy-loading too many pages will cause webpack hot update too slow. so only in production use lazy-loading;
// detail: https://panjiachen.github.io/vue-element-admin-site/#/lazy-loading

Vue.use(Router)

/* Layout */
import Layout from '../../views/admin/layout/Layout'

/**
* hidden: true                   if `hidden:true` will not show in the sidebar(default is false)
* alwaysShow: true               if set true, will always show the root menu, whatever its child routes length
*                                if not set alwaysShow, only more than one route under the children
*                                it will becomes nested mode, otherwise not show the root menu
* redirect: noredirect           if `redirect:noredirect` will no redirect in the breadcrumb
* name:'router-name'             the name is used by <keep-alive> (must set!!!)
* meta : {
	title: 'title'               the name show in submenu and breadcrumb (recommend set)
	icon: 'svg-name'             the icon show in the sidebar
	breadcrumb: false            if false, the item will hidden in breadcrumb(default is true)
}
**/

import banner from './banner';
import developer from './developer';
import profile from './profile';
import institute from './institute';
import role from './role';
import job from './job';
import notificationTemplate from './notificationTemplate';
import user from './user';
import certificates from './certificates';
import service from './service';
import config from './config';
import faq from './faq';
import post from './post';
import contactUs from './contactUs';
import client from './oauthClient';
import profession from './profession';
import event from './event';
import roster from './roster';
import schedule from './schedule';
// import license from './license';
import store from '@/store';
import helper from 'vuejs-object-helper';

export const constantRouterMap = [
	{
		path: '/',
		component: Layout,
		redirect: '/dashboard',
		name: 'Dashboard',  
		children: [{
			meta: { title: 'Dashboard', icon: 'svg/dashboard' },
			path: 'dashboard',
			component: () => import('@/views/admin/dashboard')
		}]
	},
	...roster,
	...schedule,
	...banner,
	...event,
	...profile,
	//...instituteCategory,
	...institute,
	// ...professionCategory,
	...profession,
	...role,
	...job,
	...notificationTemplate,
	...user,
	...certificates,
	...service,
	...faq,
	...post,
	// ...license,
	...contactUs,	
	...developer,
	...config,
	...client,
	{ path: '/logout', hidden: true, component: () => import('@/views/admin/Logout') },
	{ path: '*', hidden: true, component: () => import('@/views/404') },
	{ path: '/403', hidden: true, component: Layout, children: [ { path: '', name:'forbidden-403', component: () => import('@/views/admin/403')} ] }
	
]
const muli_login_prefix = window.location.toString().match(/\/u\/[0-9]+\/?/g);

let  prefix = '';
if(process.env.VUE_APP_DOMAIN_PREFIX) {
	
	prefix = process.env.VUE_APP_DOMAIN_PREFIX.replaceAll(/^\/|\/$/g, '');
}

if(muli_login_prefix) {

	prefix = prefix.replaceAll(/^\/|\/$/g, '') + muli_login_prefix[0];
}

prefix = prefix.replaceAll(/^\/|\/$/g, '')+'/';


const router = new Router({
	mode: 'history', 
	scrollBehavior: () => ({ y: 0 }),
	base: prefix,
	routes: constantRouterMap
})

/**
 * Router Hookes
 */
router.beforeEach((to, from, next) => {
		
	NProgress.start()
	if (getToken()) {
		
		const route_permissions = to.meta.permissions;  
		NProgress.done();
		const landing_uri = helper.getProp(store.getters, 'authProfile.role.settings.landing_uri');

		if(landing_uri && from.path === '/' && to.path === '/dashboard' ) {

			next('/'+ landing_uri.replaceAll(/^\/|\/$/g, ''));
		}
		else if(!route_permissions) {
		  next();
		}
		else if(canAccess(route_permissions))  {
			next();
		}
		else {
		  Message.error('You do not have authority to access this path.');
		  next('/403');
		}

	} else {

		NProgress.done()
		//next();
		window.location.href = process.env.VUE_APP_AUTH_URL;		
	}
})

router.afterEach(() => {
	NProgress.done() 
})

export default router;