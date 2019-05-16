import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/config',
        component: Layout,
        meta: { 
            permissions: ['config.index'] 
        },
        children: [
            {
                path: '',
                name: 'Config',    
                meta: { 
                    title: 'Config', 
                    icon: 'svg/settings-gears',
                    activeName:'config' ,
                    permissions: ['config.index'] 
                },
                component: () => import('@/views/admin/config')
            },
            
        ]
    },
]