import Layout from '@/views/admin/layout/Layout'
export default  [
    {
        path: '/notification-template',
        component: Layout,
        hidden: true,
        name: 'notification_template',
        meta: { 
            title: 'Notification Template',
            activeName:'email-sms-template',
            permissions: ['notification-template.index'],
        },
        children: [
            {
                path: '/notification-template',               
                name: 'notification_template_list',    
                meta: { 
                    title: 'Notification Template', 
                    icon: 'svg/user' ,
                    permissions: ['notification-template.index'],
                },
                component: () => import('@/views/admin/notificationTemplate')
            },
            {
                path: ':id/edit',
                meta: { 
                    title: 'Edit Notification Template',
                    permissions: ['notification-template.update'],
                },
                name:'notification-edit',
                hidden: true,
                component: () => import('@/views/admin/notificationTemplate/Edit')
            },
            {
                path: 'create',
                name:'notification-create',
                meta: { 
                    title: 'Add Notification Template',
                    permissions: ['notification-template.store'],
                },
                hidden: true,
                component: () => import('@/views/admin/notificationTemplate/Create')
            },
            
          
        ]
    },
]