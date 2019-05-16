import Layout from '@/views/admin/layout/Layout'
export default  [
    {
        path: '/institute',
        component: Layout,
        name: 'institute-main',   
        meta: { 
            title: 'Institute List' , 
            icon: 'svg/hospital', 
            permissions: ['institute.index', 'institute-category.index','license.index'],
            private: true
        },
        //hidden: true,
        children: [
            {
                path: '/institute',                
                name: 'institute-list',    
                meta: { 
                    title: 'Institute List', 
                    heading:'Institute List',
                    permissions: ['institute.index', 'institute-category.index'],
                    private: true,
                },                
                component: () => import('@/views/admin/institute')
            },
            {
                path: ':id/edit',
                name: 'institute-edit',   
                meta: { 
                    title: 'Edit Institute', 
                    heading:'Edit Institute', 
                    permissions: ['institute.update'], 
                    private: true
                },
                hidden: true,
                component: () => import('@/views/admin/institute/Edit')
            },
            {
                path: 'create',
                name: 'institute-create',   
                meta: { 
                    title: 'Create Institute', 
                    heading: 'Create Institute', 
                    permissions: ['institute.create'], 
                    private: true
                },
                hidden: true,
                component: () => import('@/views/admin/institute/Create')
            },
            {
                path: '/institute-category/',
                name: 'intitute-category',
                meta: { 
                    title: 'Institute Category',  
                    heading: 'Institute Category List', 
                    permissions: ['institute-category.index'] 
                },
                component: () => import('@/views/admin/instituteCategory')
            },
            {
                path: '/institute-category/:id/edit',
                hidden: true,
                name: 'institute_category_edit_page',
                meta: { 
                    title: 'Edit Institute Category', 
                    heading: ' Edit Institute Category',
                    permissions: ['institute-category.update'] 
                },
                component: () => import('@/views/admin/instituteCategory/Edit')
            },
            {
                path: '/institute-category/create',
                hidden: true,
                name: 'institute_category_add_page',
                meta: { 
                    title: 'Create Institute Category', 
                    heading: ' Create Institute Category',
                    permissions: ['institute-category.store'] 
                },
                component: () => import('@/views/admin/instituteCategory/Create')
            },
            {
                path: '/license',
                name : 'license_list',
                meta: { 
                    title: 'Institute Licenses', 
                    heading: 'Institute Licenses' ,
                    permissions: ['license.index'],
                },
                component: () => import('@/views/admin/license')
            },
            {
                path: '/license/:id/edit',
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
                path: '/license/create',
                meta: { 
                    title: 'Create License', 
                    heading: 'Create License' ,
                    permissions: ['license.update'],
                },
                name:'license_create',
                hidden: true,
                component: () => import('@/views/admin/license/Create')
            }
        ]
    },
]