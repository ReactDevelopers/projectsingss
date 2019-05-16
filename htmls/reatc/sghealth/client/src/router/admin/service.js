import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/service',
        component: Layout,
        meta: { 
            permissions: ['service.index'],
        },
        children: [
            {
                path: '',
                name: 'Service',    
                meta: { 
                    title: 'Service', 
                    icon: 'svg/user' ,
                    heading: 'Service List',
                    permissions: ['service.index'],
                },
                component: () => import('@/views/admin/service')
            },
            {
                path: ':id/edit',
                hidden: true,
                name: 'Edit_Service',
                meta: { 
                    title: 'Edit Service',
                    heading: 'Edit Service' ,
                    permissions: ['service.update'],
                },
                component: () => import('@/views/admin/service/Edit')
            },
            {
                path: 'create',
                hidden: true,
                name: 'Create_Service',
                meta: { 
                    title: 'Create Service',
                    heading: 'Create Service' ,
                    permissions: ['service.store'],
                },
                component: () => import('@/views/admin/service/Create')
            }
        ]
    },
]