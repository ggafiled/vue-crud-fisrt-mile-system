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
        path: "/planing",
        component: require("./components/planing/Planing.vue").default,
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
        path: "/area/3bb",
        component: require("./components/area3bb.vue").default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator"]
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
                component: require("./components/datavalidation/building/contractsell.vue")
                    .default
            },
            {
                path: "spend_space",
                component: require("./components/datavalidation/building/spendspace.vue")
                    .default,
                meta: {
                    requiresAuth: true,
                    roles: ["superadministrator"]
                }
            },
            {
                path: "area_3bb",
                component: require("./components/datavalidation/building/area3bb.vue")
                    .default,
                meta: {
                    requiresAuth: true,
                    roles: ["superadministrator"]
                }
            },
            {
                path: "area_true",
                component: require("./components/datavalidation/building/areatrue.vue")
                    .default,
                meta: {
                    requiresAuth: true,
                    roles: ["superadministrator"]
                }
            },
            {
                path: "area_ais",
                component: require("./components/datavalidation/building/areaais.vue")
                    .default,
                meta: {
                    requiresAuth: true,
                    roles: ["superadministrator"]
                }
            },
            {
                path: "area_fibernet",
                component: require("./components/datavalidation/building/areafibernet.vue")
                    .default,
                meta: {
                    requiresAuth: true,
                    roles: ["superadministrator"]
                }
            },
            {
                path: "operating_time",
                component: require("./components/datavalidation/building/opertingtime.vue")
                    .default,
                meta: {
                    requiresAuth: true,
                    roles: ["superadministrator"]
                }
            }
        ]
    },
    {
        path: "/data/problemsolution",
        component: require("./components/datavalidation/planning/problemsolution.vue")
            .default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator"]
        }
    },
    {
        path: "/data/technician",
        component: require("./components/datavalidation/planning/technician.vue")
            .default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator"]
        }
    },
    {
        path: "/data/callver",
        component: require("./components/datavalidation/planning/callver.vue")
            .default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator"]
        }
    },
    {
        path: "/data/callverstatus",
        component: require("./components/datavalidation/planning/callverstatus.vue")
            .default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator"]
        }
    },
    {
        path: "/data/generatingaction",
        component: require("./components/datavalidation/progress/generatingaction.vue")
            .default,
        meta: {
            requiresAuth: true,
            roles: ["superadministrator"]
        }
    },
    { path: "*", component: require("./components/NotFound.vue").default }
];

