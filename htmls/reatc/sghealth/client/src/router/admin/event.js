import Layout from '@/views/admin/layout/Layout'

export default  [
    {
        path: '/event',
        component: Layout,
        name: 'event_main',   
        meta : {    
            title:'Information ',   
            icon: 'svg/information', 
            permissions: ['event.index', 'news.index', 'advertisment.index'] 
        },
        children: [
            /***
             * events routes
             */
            {
                path: '/event',
                name: 'event_list',  
                meta: { 
                    title: 'Events',  
                    heading: 'Events List',
                    permissions: ['event.index'] 
                },
                component: () => import('@/views/admin/event')
            },
            {
                path: '/event/:id/edit',
                hidden: true,
                name: 'event_page',
                meta: { 
                    title: 'Edit Event', 
                    heading: 'Edit Event',
                    permissions: ['event.update'] 
                },
                component: () => import('@/views/admin/event/Edit')
            },
            {
                path: '/event/create',
                hidden: true,
                name: 'event_add_page',
                meta: { 
                    title: 'Create Event',
                    heading: ' Create Event',
                    permissions: ['event.store']
                },
                component: () => import('@/views/admin/event/Create')
            },
            {
                path: '/event/:id/view',
                hidden: true,
                name: 'event_view_page',
                meta: { 
                    title: 'View Event', 
                    heading: 'View Event',
                    permissions: ['event.show'] 
                },
                component: () => import('@/views/admin/event/View')
            },
            /***
             * news routes
             */
            {
                path: '/news',
                name: 'news_list',  
                meta: { 
                    title: 'News',  
                    heading: 'News List',
                    permissions: ['news.index'] 
                },
                component: () => import('@/views/admin/news')
            },
            {
                path: '/news/:id/edit',
                hidden: true,
                name: 'news_page',
                meta: { 
                    title: 'Edit News', 
                    heading: 'Edit News',
                    permissions: ['news.update'] 
                },
                component: () => import('@/views/admin/news/Edit')
            },
            {
                path: '/news/create',
                hidden: true,
                name: 'news_add_page',
                meta: { 
                    title: 'Create News', 
                    heading: ' Create News',
                    permissions: ['news.store'] 
                },
                component: () => import('@/views/admin/news/Create')
            },
            
            /***
             * advertisement
             */
            {
                path: '/advertisement',
                name: 'advertisement_list',  
                meta: { 
                    title: 'Advertisement', 
                    heading: 'Advertisement List',
                    permissions: ['advertisment.index']
                },
                component: () => import('@/views/admin/advertisement')
            },
            {
                path: '/advertisement/:id/edit',
                hidden: true,
                name: 'advertisement_page',
                meta: { 
                    title: 'Edit Advertisement', 
                    heading: 'Edit Advertisement',
                    permissions: ['advertisment.update']
                },
                component: () => import('@/views/admin/advertisement/Edit')
            },
            {
                path: '/advertisement/create',
                hidden: true,
                name: 'advertisement_add_page',
                meta: { 
                    title: 'Create Advertisement', 
                    heading: ' Create Advertisement',
                    permissions: ['advertisment.store']
                },
                component: () => import('@/views/admin/advertisement/Create')
            },
            
        ]
    },
]