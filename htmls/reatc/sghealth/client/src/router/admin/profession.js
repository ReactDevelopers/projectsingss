import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/profession',
        component: Layout,
        name: 'profession_main',   
        meta : {
            title:'Profession',
            icon: 'svg/quality',
            permissions: ['profession.index', 'profession-category.index'] 
        },
        children: [
            {
                path: '/profession',
                name: 'profession_list',
                meta: { 
                    title: 'Profession', 
                    heading: 'Profession List',
                    permissions: ['profession.index'] 
                },
                component: () => import('@/views/admin/profession')
            },
            {
                path: ':id/edit',
                hidden: true,
                name: 'profession_edit_page',
                meta: { 
                    title: 'Edit Profession', 
                    heading: ' Edit Profession',
                    permissions: ['profession.update'] 
                },
                component: () => import('@/views/admin/profession/Edit')
            },
            {
                path: 'create',
                hidden: true,
                name: 'profession_add_page',
                meta: { 
                    title: 'Create Profession', 
                    heading: ' Create Profession',
                    permissions: ['profession.store']
                },
                component: () => import('@/views/admin/profession/Create')
            },
            {
                path: '/profession-category',
                name: 'profession-category_list',
                meta: { 
                    title: 'Profession Category', 
                    heading: 'Profession Category List',
                    permissions: ['profession-category.index']
                },
                component: () => import('@/views/admin/professionCategory')
            },
            {
                path: '/profession-category/:id/edit',
                hidden: true,
                name: 'profession_category_edit_page',
                meta: { 
                    title: 'Edit Profession Category', 
                    heading: ' Edit Profession Category',
                    permissions: ['profession-category.update']
                },
                component: () => import('@/views/admin/professionCategory/Edit')
            },
            {
                path: '/profession-category/create',
                hidden: true,
                name: 'profession_category_add_page',
                meta: { 
                    title: 'Create Profession Category', 
                    heading: ' Create Profession Category',
                    permissions: ['profession-category.store']
                },
                component: () => import('@/views/admin/professionCategory/Create')
            }
        ]
    },
]