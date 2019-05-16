import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/faq',
        component: Layout,
        name: 'faq_main',  
        hidden:true,  
        meta: { 
            title: 'FAQ', 
            icon: 'svg/user' ,
            heading: 'FAQ List',
            activeName:'faq',
            permissions: ['faq.index'] 
        },
        children: [
            {
                path: '/faq',
                name : 'faq_list',
                meta: { 
                    title: 'FAQ', 
                    icon: 'svg/user', 
                    heading: 'FAQ List' ,
                    permissions: ['faq.index'] 
                },
                component: () => import('@/views/admin/faq')
            },
            {
                path: '/faq/:id/edit',
                hidden: true,
                name : 'faq_edit',
                meta: { 
                    title: 'Edit FAQ',
                    heading: 'Edit FAQ' ,
                    permissions: ['faq.update'] 
                },
                component: () => import('@/views/admin/faq/Edit')
            },
            {
                path: '/faq/create',
                hidden: true,
                name : 'faq_add',
                meta: { 
                    title: 'Create FAQ',
                    heading: 'Create FAQ' ,
                    permissions: ['faq.store'] 
                },
                component: () => import('@/views/admin/faq/Create')
            }
        ]
    },
]