export default [{
        path: "/dashboard",
        component: require("./components/Dashboard.vue").default
    },
    {
        path: "/building",
        component: require("./components/building/Addbuilding.vue").default
    },
    {
        path: "/calendar",
        component: require("./components/calendar/Calendar.vue").default
    },
    {
        path: "/profile",
        component: require("./components/Profile.vue").default,
        meta: {
            permissions: ["profile-read", "profile-update"]
        }
    },
    {
        path: "/developer",
        component: require("./components/Developer.vue").default
    },
    {
        path: "/users",
        component: require("./components/Users.vue").default,
        meta: {
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/permission",
        component: require("./components/Permission.vue").default,
        meta: {
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/products",
        component: require("./components/product/Products.vue").default
    },
    {
        path: "/product/tag",
        component: require("./components/product/Tag.vue").default
    },
    {
        path: "/product/category",
        component: require("./components/product/Category.vue").default
    },
    { path: "*", component: require("./components/NotFound.vue").default }
];
