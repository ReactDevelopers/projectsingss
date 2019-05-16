import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/license',
        component: Layout,
        meta: { 
            title: 'Institute Licenses', 
            icon: 'svg/users' ,
            permissions: ['license.index'],
        },
        children: [
            {
                path: '/license',
                name : 'license_list',
                meta: { 
                    title: 'Institute Licenses', 
                    icon: 'svg/users', 
                    heading: 'Institute Licenses' ,
                    permissions: ['license.index'],
                },
                component: () => import('@/views/admin/license')
            },
            {
                path: ':id/edit',
                meta: { 
                    title: 'Edit License', 
                    heading: 'Edit License' ,
                    permissions: ['license.update'],
                },
                name:'license_edit',
                hidden: true,
                component: () => import('@/views/admin/license/Edit')
            },            
            {
                path: 'create',
                meta: { 
                    title: 'Create License', 
                    heading: 'Create License' ,
                    permissions: ['license.store'],
                },
                name:'license_create',
                hidden: true,
                component: () => import('@/views/admin/license/Create')
            }            
        ]
    },
]