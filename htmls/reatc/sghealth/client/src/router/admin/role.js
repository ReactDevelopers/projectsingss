import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/role',
        component: Layout, 
        name:'role-main',
        meta: { 
            title: 'Role', 
            heading: 'Role List', 
            icon: 'svg/security-badge',
            permissions: ['role.index']
        },
        children: [
            {
                path: '/role',
                name: 'role-list',
                meta: { 
                    title: 'Role', 
                    heading: 'Role & Permission' ,
                    permissions: ['role.index', 'permission.index']
                },
                component: () => import('@/views/admin/role')
            },
            {
                path: ':id/edit',
                name: 'role-edit',
                hidden: true,
                meta: { 
                    title: 'Edit Role', 
                    heading: 'Edit Role',
                    permissions: ['role.update']
                },
                component: () => import('@/views/admin/role/Edit')
            },
            // {
            //     path: 'permission',
            //     name:'permission-list',
            //     hidden: true,
            //     meta: { title: 'Permission', heading: 'Permission List' },
            //     component: () => import('@/views/admin/permission')
            // },
            {
                path: 'permission/:id/edit',
                hidden: true,
                name:'permission-edit',
                meta: { 
                    title: 'Edit Permission', 
                    heading: 'Edit Permission',
                    permissions: ['permission.update']
                },
                component: () => import('@/views/admin/permission/Edit')
            }
        ]
    },
]