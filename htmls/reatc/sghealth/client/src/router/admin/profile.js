import Layout from '@/views/admin/layout/Layout'
export default  [
    {
        path: '/my-profile',
        component: Layout,
        name: 'My Profile', 
        hidden: true,   
        meta: { title: 'My Profile', icon: 'svg/user' },
        children: [
            {
                path: '/my-profile',
                meta: { title: 'My Profile'},
                hidden: true,
                component: () => import('@/views/admin/myProfile')
            },
            {
                path: '/my-profile/reset-password',
                hidden: true,
                meta: { title: 'Reset Password'},
                component: () => import('@/views/admin/myProfile/ResetPassword')
            }
        ]
    },
]