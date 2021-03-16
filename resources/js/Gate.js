export default class Gate {
    constructor(user) {
        this.user = user;
        this.roles = ["superadministrator", "administrator"];
    }

    isAuthenticated() {
        return typeof this.user != "undefined" && typeof this.user != null;
    }

    isAdmin() {
        return this.roles.indexOf(Laravel.user.roles[0].name) != -1;
    }

    isUser() {
        return this.roles.indexOf(Laravel.user.roles[0].name) == -1;
    }

    isAdminOrUser() {
        return true;
    }

    iscurrentUser(value) {
        return Laravel.user.id === value ? false : true;
    }

    hasPermissionsNeeded(to) {
        if (typeof to.meta.permissions != "undefined") {
            return to.meta.permissions
                .map((val, index) => {
                    return (
                        Laravel.permissions.indexOf(val.toLowerCase()) !== -1
                    );
                })
                .every(function(e) {
                    return e === true;
                });
        }

        if (typeof to.meta.roles != "undefined") {
            return to.meta.roles
                .map((val, index) => {
                    return (
                        Laravel.user.roles[0].name
                        .toLowerCase()
                        .indexOf(val.toLowerCase()) !== -1
                    );
                })
                .some(function(e) {
                    return e === true;
                });
        }

        if (
            typeof to.meta.roles == "undefined" ||
            typeof to.meta.permissions == "undefined"
        ) {
            return true;
        }
    }
}