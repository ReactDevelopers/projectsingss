import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/banner',
        component: Layout,
        name: 'Banner',    
        meta: { 
            title: 'Banner', 
            icon: 'svg/ads', 
            permissions: ['banner.index'] 
        },
        children: [
            {
                path: '/banner',
                meta: { 
                    title: 'Banner', 
                    icon: 'svg/ads', 
                    heading: 'Banner List', 
                    permissions: ['banner.index'] 
                },
                component: () => import('@/views/admin/banner')
            },
            {
                path: '/banner/:id/edit',
                hidden: true,
                meta: { 
                    title: 'Edit banner', 
                    heading: 'Banner Edit', 
                    permissions: ['banner.update'] 
                },
                component: () => import('@/views/admin/banner/Edit')
            },
            {
                path: '/banner/create',
                hidden: true,
                meta: { title: 'Create' , heading: 'Banner Create', permissions: ['banner.store']},
                component: () => import('@/views/admin/banner/Create')
            }
        ]
    },
]