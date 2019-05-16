import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/roster',
        component: Layout,
        name: 'Roster',    
        meta: { title: 'Roster', icon: 'svg/roster', heading: 'Roster', permissions: ['roster.index'] },
        children: [
            {
                path: '/roster',
                name: 'Roster_list', 
                meta: { 
                    title: 'Roster',
                    icon: 'svg/roster', 
                    heading: 'Roster',
                    permissions: ['roster.index']
                },
                component: () => import('@/views/admin/roster')
            },
            {
                path: '/roster/:institute_id/:month/edit',
                meta: { title: 'Roster', icon: 'svg/roster', heading: 'Roster Edit'  },
                component: () => import('@/views/admin/roster/Edit'),
                hidden: true,
                permissions: ['roster.update']
            }
        ]
    },
]