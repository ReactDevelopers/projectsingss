import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import Universal from '../../views/auth/layout'

export const constantRouterMap = [
	{ 
		path: '/', 
		component: Universal,
		hidden: true,
		children: [{
			path: '/',
			component: () => import('@/views/auth/login')
		}]
	},
	{ 
		path: '/forget-password', 
		component: Universal,
		hidden: true,
		children: [{
			path: '/',
			component: () => import('@/views/auth/forgetPassword')
		}]
	},
	{ 
		path: '/reset-password', 
		component: Universal,
		hidden: true,
		children: [{
			path: '/',
			component: () => import('@/views/auth/resetPassword')
		}]
	},
	{ 
		path: '/token-verify', 
		component: Universal,
		hidden: true,
		children: [{
			path: '/',
			component: () => import('@/views/auth/verifyData')
		}]
	},
	{ 
		path: '/device-identity', 
		component: () => import('@/views/auth/DeviceIdentity'),
		hidden: true
	},
	{ 
		path: '/register-event-manager/:email', 
		component: Universal,
		hidden: true,
		children: [{
			path: '/',
			component: () => import('@/views/auth/registerManager'),
		}]
		
	},
	{ path: '*', hidden: true, component: () => import('@/views/404') }
]

export default new Router({
	mode: 'history', 
	scrollBehavior: () => ({ y: 0 }),
	base: process.env.VUE_APP_DOMAIN_PREFIX,
	routes: constantRouterMap
})