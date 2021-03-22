<template>
    <div class="card card-secondary">
        <div class="card-header"></div>
        <div class="card-body">
            <form @submit.prevent="addBuilding">
                <h2>Form Add Building</h2>
                <hr />

                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Project Building</label>
                            <input
                                v-model="building.buildingId"
                                type="text"
                                class="form-control"
                                placeholder="Enter your building..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Fm Code</label>
                            <input
                                v-model="building.fmCode"
                                type="text"
                                class="form-control"
                                placeholder="Enter your code..."
                            />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Contact Name</label>
                            <input
                                v-model="building.contactName"
                                type="text"
                                class="form-control"
                                placeholder="Enter your contact name..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Phone</label>
                            <input
                                v-model="building.phone"
                                type="number"
                                class="form-control"
                                placeholder="Enter your phone..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                v-model="building.email"
                                type="email"
                                class="form-control"
                                placeholder="Enter your Email..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Area</label>
                            <input
                                v-model="building.area"
                                type="number"
                                class="form-control"
                                placeholder="Enter your area..."
                            />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Floor</label>
                            <input
                                v-model="building.floor"
                                type="text"
                                class="form-control"
                                placeholder="Enter your floor..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input
                                v-model="building.roomNumber"
                                type="text"
                                class="form-control"
                                placeholder="Enter your room number..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Layer Number</label>
                            <input
                                v-model="building.numberLayer"
                                type="text"
                                class="form-control"
                                placeholder="Enter your number layer..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Working Time</label>
                            <input
                                type="date"
                                v-model="building.workingTime"
                                class="form-control"
                            />
                        </div>
                    </div>
                </div>

                <hr />
                <div class="row">
                    <div class="container-fluid">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Address Detail</label>
                            <input
                                v-model="building.detailAdress"
                                type="text"
                                class="form-control"
                                placeholder="Enter your address..."
                            />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Province</label>
                            <input
                                v-model="building.province"
                                type="text"
                                class="form-control"
                                placeholder="Enter your province..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>City</label>
                            <input
                                v-model="building.city"
                                type="text"
                                class="form-control"
                                placeholder="Enter your city..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>PostalCode</label>
                            <input
                                v-model="building.postalCode"
                                type="text"
                                class="form-control"
                                placeholder="Enter your postalcode..."
                            />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input
                                v-model="building.latitude"
                                type="text"
                                class="form-control"
                                placeholder="Enter your latitude..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Longtude</label>
                            <input
                                v-model="building.longtude"
                                type="text"
                                class="form-control"
                                placeholder="Enter your longtude..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Price Square</label>
                            <input
                                v-model="building.priceSquare"
                                type="text"
                                class="form-control"
                                placeholder="Enter your price square..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Blance</label>
                            <input
                                v-model="building.blance"
                                type="number"
                                class="form-control"
                                placeholder="Enter your price blance..."
                            />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Developer</label>
                            <input
                                v-model="building.developer"
                                type="text"
                                class="form-control"
                                placeholder="Enter your developer..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Grade</label>
                            <input
                                v-model="building.grade"
                                type="text"
                                class="form-control"
                                placeholder="Enter your grade..."
                            />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Note</label>
                            <input
                                v-model="building.note"
                                type="text"
                                class="form-control"
                                placeholder="Enter your note..."
                            />
                        </div>
                    </div>
                </div>
                <hr />
                <br />
                <br />
                <input type="submit" value="Create " class="btn btn-primary" />
                <a href="/dashboard" class="btn btn-success my-2">Back</a>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>
import axios from 'axios';
export default {

    data() {
        return {
            building: {
            }
        };
    },
    methods: {
        addBuilding() {
            axios
                .post("http://localhost:8000/api/buildings", this.building)
                .then(response => this.$router.push({ name: "home" }))
                .catch(err => console.log(err))
                .finally(() => (this.loading = false));
        }
    }
};
</script>

<style></style>
