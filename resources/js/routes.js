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
        path: "/building/all",
        component: require("./components/building/BuildingList.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/building/tot",
        component: require("./components/building/BuildingTot.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/building/3bb",
        component: require("./components/building/Building3BB.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/building/true",
        component: require("./components/building/BuildingTrue.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/building/ais",
        component: require("./components/building/BuildingAis.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator", "user", "guest"]
        }
    },
    {
        path: "/building/fibernet",
        component: require("./components/building/BuildingFiberNet.vue")
            .default,
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
        path: "/constitution",
        component: require("./components/constitution/Constitution.vue")
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
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/customer",
        component: require("./components/customer/Customer.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/customer/treeview",
        component: require("./components/customer/CustomerTreeView.vue")
            .default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/planing/map",
        component: require("./components/planing/planing_map.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator", "administrator"]
        }
    },
    {
        path: "/issue-tickets",
        component: require("./components/issue/IssueTickets.vue").default,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/issue-tickets/:id",
        component: require("./components/issue/IssueTicketShow.vue").default,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/console-log",
        component: require("./components/consolelog/ConsoleLog.vue").default,
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
            roles: ["superadministrator", "administrator", "user"]
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
        path: "/settings",
        component: require("./components/datavalidation/Datavalidation.vue")
            .default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator"]
        },
        children: [{
                path: "contract_sell",
                component: require("./components/datavalidation/building/ContractSell.vue")
                    .default
            },
            {
                path: "spend_space",
                component: require("./components/datavalidation/building/SpendSpace.vue")
                    .default
            },
            {
                path: "area_3bb",
                component: require("./components/datavalidation/building/Area3bb.vue")
                    .default
            },
            {
                path: "area_true",
                component: require("./components/datavalidation/building/AreaTrue.vue")
                    .default
            },
            {
                path: "area_true_new",
                component: require("./components/datavalidation/building/areatruenew.vue")
                    .default
            },
            {
                path: "area_ais",
                component: require("./components/datavalidation/building/AreaAis.vue")
                    .default
            },
            {
                path: "area_fibernet",
                component: require("./components/datavalidation/building/AreaFibernet.vue")
                    .default
            },
            {
                path: "operating_time",
                component: require("./components/datavalidation/building/OpertingTime.vue")
                    .default
            },
            {
                path: "problemsolution",
                component: require("./components/datavalidation/planning/ProblemSolution.vue")
                    .default
            },
            {
                path: "technician",
                component: require("./components/datavalidation/planning/Technician.vue")
                    .default
            },
            {
                path: "callver",
                component: require("./components/datavalidation/planning/Callver.vue")
                    .default
            },
            {
                path: "callverstatus",
                component: require("./components/datavalidation/planning/CallverStatus.vue")
                    .default
            },
            {
                path: "generatingaction",
                component: require("./components/datavalidation/progress/Generatingaction.vue")
                    .default
            },
            {
                path: "serwayteam",
                component: require("./components/datavalidation/constalution/teamserway.vue")
                    .default
            }
        ]
    },
    { path: "*", component: require("./components/NotFound.vue").default }
];