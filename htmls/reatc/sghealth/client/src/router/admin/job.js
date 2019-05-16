import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/job',
        component: Layout,
        meta: { 
            title: 'Job List', 
            icon: 'svg/job' ,
            permissions: ['assignment.index'],
            private: true
        },
        children: [
            {
                path: '/job',
                name : 'job_list',
                meta: { 
                    title: 'Job List', 
                    icon: 'svg/job',
                    heading: 'Job',
                    permissions: ['assignment.index'],
                },
                component: () => import('@/views/admin/job')
            },
            {
                path: ':id/edit',
                meta: { 
                    title: 'Edit Job', 
                    heading: 'Job',
                    permissions: ['assignment.index'],
                },
                name:'job_edit',
                hidden: true,
                
                component: () => import('@/views/admin/job/Edit')
            },            
            {
                path: 'create',
                meta: { 
                    title: 'Create Job', 
                    heading: 'Create Job',
                    permissions: ['assignment.store'],
                },
                name:'job_create',
                hidden: true,
                component: () => import('@/views/admin/job/Create')
            },
            {
                path: ':id/view',
                meta: { 
                    title: 'View Job', 
                    heading: 'View Job',
                    permissions: ['assignment.show'],
                },
                name:'job_detail',
                hidden: true,
                component: () => import('@/views/admin/job/View')
            },         
        ]
    },
]