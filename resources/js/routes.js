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
        path: "/student/create",
        component: require("./components/createStudent.vue").default,
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
        path: "/buildingtot",
        component: require("./components/building/BuildingTot.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/building3bb",
        component: require("./components/building/Building3BB.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/buildingTrue",
        component: require("./components/building/BuildingTrue.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/buildingAis",
        component: require("./components/building/BuildingAis.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/buildingFiberNet",
        component: require("./components/building/BuildingFiberNet.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/commingsoon",
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
        path: "/constarution",
        component: require("./components/constarution/Constarution.vue")
            .default,
        meta: {
            requiresAuth: true,
            permissions: ["constarution-create", "constarution-read"]
        }
    },
    {
        path: "/progress",
        component: require("./components/progress/Progress.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user"]
        }
    },
    {
        path: "/planing",
        component: require("./components/planing/Planing.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/calendar",
        component: require("./components/calendar/Calendar.vue").default,
        meta: {
            requiresAuth: true
        }
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
        path: "/users",
        component: require("./components/Users.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/team",
        component: require("./components/team/Team.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator","user"]
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
    { path: "*", component: require("./components/NotFound.vue").default }
];
