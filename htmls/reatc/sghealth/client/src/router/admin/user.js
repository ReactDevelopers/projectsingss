import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/users',
        component: Layout,
        meta: { 
            title: 'Users', 
            icon: 'svg/users' ,
            permissions: ['users.index'],
        },
        name : 'user_main',
        children: [
            {
                path: '/users',
                name : 'user_list',
                meta: { 
                    title: 'Users', 
                    icon: 'svg/users', 
                    heading: 'Users' ,
                    permissions: ['users.index'],
                },
                component: () => import('@/views/admin/user')
            },
            {
                path: ':id/show',
                meta: { 
                    title: 'View User', 
                    heading: 'View User',
                    permissions: ['users.show'],
                },
                name:'user_view',
                hidden: true,
                component: () => import('@/views/admin/user/Edit')
            },
            {
                path: '/users/create-employee',
                meta: { 
                    title: 'Create Employee', 
                    heading: 'Create New Employee',
                    permissions: ['create-employee'],
                },
                name:'employee_create',
                hidden: true,
                component: () => import('@/views/admin/user/CreateEmployee')
            },
            {
                path: '/users/create-manager',
                meta: { 
                    title: 'Create Manager', 
                    heading: 'Create New Manager',
                    permissions: ['create-manager'],
                },
                name:'manager_create',
                hidden: true,
                component: () => import('@/views/admin/user/CreateManager')
            },
            {
                path: '/users/create-event-manager',
                meta: { 
                    title: 'Create Event Manager', 
                    heading: 'Create New Event Manager',
                    permissions: ['create-event-manager'],
                },
                name:'event_manager_create',
                hidden: true,
                component: () => import('@/views/admin/user/CreateEventManager')
            },
            {
                path: '/users/create-freelancer',
                meta: { 
                    title: 'Create Freelancer', 
                    heading: 'Create New Freelancer',
                    permissions: ['create-freelancer'],
                },
                name:'freelancer_create',
                hidden: true,
                component: () => import('@/views/admin/user/CreateFreelancer')
            },          
        ]
    },
]