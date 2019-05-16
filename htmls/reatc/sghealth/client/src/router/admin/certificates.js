import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/certificate',
        component: Layout,
        name: 'certificate_main',   
        meta : {
            title:'Licenses',
            permissions: ['certificate.index'],
        },
        children: [
            {
                path: '/certificate',
                meta: { 
                    title: 'Licenses', 
                    icon: 'svg/quality', 
                    heading: 'Licenses & Certs List' ,
                    permissions: ['certificate.index'],
                },
                component: () => import('@/views/admin/certificate')
            },
            {
                path: ':id/edit',
                hidden: true,
                name: 'certificate_edit_page',
                meta: { 
                    title: 'Edit Certificate', 
                    heading: ' Edit Certificate' ,
                    permissions: ['certificate.show'],
                },
                component: () => import('@/views/admin/certificate/Edit')
            },
            {
                path: 'create',
                hidden: true,
                name: 'certificate_add_page',
                meta: { 
                    title: 'Create Certificate', 
                    heading: ' Create Certificate',
                    permissions: ['certificate.store'],
                },
                component: () => import('@/views/admin/certificate/Create')
            }
        ]
    },
]