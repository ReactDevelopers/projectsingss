import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/post',
        component: Layout,
        name: 'post_main',   
        hidden:true,
        meta : {
            title:'Pages',
            activeName:'pages-list',
            permissions: ['post.index'],
        },
        children: [
            {
                path: '/post',
                name: 'post_list',
                meta: { 
                    title: 'Pages', 
                    icon: 'svg/user', 
                    heading: 'Pages List' ,
                    activeName:'pages-list',
                    permissions: ['post.index'],
                },
                component: () => import('@/views/admin/post')
            },
            {
                path: ':id/edit',
                hidden: true,
                name: 'post_edit_page',
                meta: { 
                    title: 'Edit Pages', 
                    heading: ' Edit Pages',
                    permissions: ['post.update'],
                },
                component: () => import('@/views/admin/post/Edit')
            },
            {
                path: 'create',
                hidden: true,
                name: 'post_add_page',
                meta: { 
                    title: 'Create Pages', 
                    heading: ' Create Pages' ,
                    permissions: ['post.store'],
                },
                component: () => import('@/views/admin/post/Create')
            }
        ]
    },
]