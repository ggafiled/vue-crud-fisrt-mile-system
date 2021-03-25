export default [{
        path: "/dashboard",
        component: require("./components/Dashboard.vue").default,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/building",
        component: require("./components/building/Buildings.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user"]
        }
    },
    {
        path: "/buildinglist",
        component: require("./components/building/BuildingList.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/admin/settings",
        component: require("./components/building/commingSoon.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/progress",
        component: require("./components/progress/Progress.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/calendar",
        component: require("./components/calendar/Calendar.vue").default
    },
    {
        path: "/profile",
        component: require("./components/Profile.vue").default,
        meta: {
            requiresAuth: true,
            permissions: ["profile-read", "profile-update"]
        }
    },
    {
        path: "/developer",
        component: require("./components/Developer.vue").default,
    },
    {
        path: "/users",
        component: require("./components/Users.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/permission",
        component: require("./components/Permission.vue").default,
        meta: {
            requiresAuth: true,
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