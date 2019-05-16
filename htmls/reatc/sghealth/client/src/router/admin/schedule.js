import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/schedule',
        component: Layout,
        name: 'Schedule',    
        meta: { 
            title: 'Schedule', 
            icon: 'svg/schedule', 
            heading: 'Schedule List',
            permissions: ['institute-monthly-data.index']
        },
        children: [
            {
                path: '/schedule',
                name: 'Schedule_list', 
                meta: { 
                    title: 'Schedule', 
                    icon: 'svg/schedule', 
                    heading: 'Schedule List',
                    permissions: ['institute-monthly-data.index']
                },
                component: () => import('@/views/admin/schedule')
            }
        ]
    },
]