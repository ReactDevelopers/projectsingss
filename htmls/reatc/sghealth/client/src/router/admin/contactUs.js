import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/contact-us',
        component: Layout,
        name: 'contact_us',    
        meta: { 
            title: 'Contact Us', 
            icon: 'svg/email' ,
            permissions: ['contact-us.index'],
        },
        children: [
            {
                path: '/contact-us',
                meta: { 
                    title: 'Contact Us', 
                    icon: 'svg/email', 
                    heading: 'Contact Us List' ,
                    permissions: ['contact-us.index'],
                },
                component: () => import('@/views/admin/contactUs')
            },
            {
                path: '/contact-us/:id/edit',
                hidden: true,
                meta: { 
                    title: 'Reply Contact ' , 
                    heading: 'Contact Us Reply',
                    permissions: ['contact-us.show'],
                },
                component: () => import('@/views/admin/contactUs/Edit')
            }
        ]
    },
]