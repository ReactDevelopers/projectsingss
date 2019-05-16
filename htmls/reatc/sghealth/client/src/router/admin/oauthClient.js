import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/oauth-client',
        component: Layout,
        name: 'Client',    
        meta: { 
            title: 'Banner', 
            icon: 'svg/ads' ,
            permissions: ['device.index'],
        },
        children: [
            {
                path: '/oauth-client',
                meta: { 
                    title: 'Client & Devices', 
                    icon: 'svg/ads', 
                    heading: 'Client & device' ,
                    permissions: ['device.index'],
                },
                component: () => import('@/views/admin/oauthClient')
            }
        ]
    },
]