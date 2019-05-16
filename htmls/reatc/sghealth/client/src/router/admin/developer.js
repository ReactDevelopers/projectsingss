import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/developer',
        component: Layout,
        name: 'developer_main',
        meta: { 
            title: 'Developer', 
            icon: 'svg/settings-gears',
            permissions: ['request-log'],
        },
        children: [
            {
                path: '/developer',
                name : 'developer',
                meta: { 
                    title: 'Server Command', 
                    heading: 'To Developer Use Only' ,
                    permissions: ['request-log'],
                },
                component: () => import('@/views/admin/developer')
            },
            {
                path: '/developer/request-log',
                name : 'request-log',
                meta: { 
                    title: 'Request Log',  
                    heading: 'Request Log (To Debug the problems)',
                    permissions: ['request-log'], 
                },
                component: () => import('@/views/admin/requestLog')
            }
        ]
    },
]