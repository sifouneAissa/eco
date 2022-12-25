const sidebar = [
    {
        name : 'Dashboard',
        route : 'admin.index',
        permission : 'view dashboard',
        icon : 'feather-home',
    },
    {
        name : 'Orders',
        route : 'admin.order.index',
        permission : 'view orders',
        icon : 'feather-truck'
    },
    {
        name : 'Clients',
        route : 'admin.client.index',
        permission : 'view clients',
        icon : 'feather-user-check'
    },
    {
        name : 'Users',
        route : 'admin.user.index',
        permission : 'view users',
        icon : 'feather-user'
    },
    {
        name : 'Products',
        route : 'admin.product.index',
        permission : 'view products',
        icon : 'feather-box',
        urls : [
            '/media/product'
        ],
    },
    {
        name : 'Blogs',
        route : 'admin.blog.index',
        permission : 'view blogs',
        icon : 'feather-file-text',
        urls : [
            '/blog/create'
        ]
    },
    {
        name : "Settings",
        permission : 'view roles',
        icon : 'feather-settings',
        children : [
            {
                name : "Roles",
                route : 'admin.role.index',
                permission : 'view roles',
                icon : 'feather-sliders'
            },
            {
                name : "Permissions",
                route : 'admin.permission.index',
                permission : 'view permissions',
                icon : 'feather-sliders'
            }
        ]
    }
];



export default  sidebar;
