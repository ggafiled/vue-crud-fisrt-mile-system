<template>
  <form-wizard>
    <tab-content title="Sub-Building" :selected="true">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Project Name</label>
            <small>/ชื่อโปรเจ็ค</small>
            <input
              type="text"
              class="form-control"
              placeholder="Enter your name"
              v-model="fullName"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Buildingsum</label>
            <small>/จำนวนอาคาร</small>
            <number-input
              inline
              controls
              :min="1"
              @change="onSubBuildingUpdate"
            ></number-input>
            <has-error :form="form" field="subBuildingsum"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Floor</label>
            <small>/ชั้น</small>
            <input
              type="number"
              min="0"
              class="form-control"
              placeholder="ชั้น"
            />
            <has-error :form="form" field="floorSum"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Room</label>
            <small>/ห้อง</small>
            <input
              type="number"
              min="0"
              class="form-control"
              placeholder="ห้อง"
            />
            <has-error :form="form" field="roomSum"></has-error>
          </div>
        </div>
      </div>
    </tab-content>
    <tab-content title="Project Detail">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Manager Name</label>
            <small>/ชื่อผู้จัดการ</small>
            <input
              type="text"
              class="form-control"
              placeholder="ชื่อผู้จัดการ"
            />
            <has-error :form="form" field="nameManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Manager Tel</label>
            <small>/เบอร์ผู้จัดการ</small>
            <input
              type="text"
              class="form-control"
              placeholder="เบอร์ผู้จัดการ"
            />
            <has-error :form="form" field="phoneManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Manager Email</label>
            <small>/อีเมลล์ผู้จัดการ</small>
            <input
              type="text"
              class="form-control"
              placeholder="อีเมลล์ผู้จัดการ"
            />
            <has-error :form="form" field="mailManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Corporation Name</label>
            <small>/ชื่อนิติบุคคล</small>
            <input
              type="text"
              class="form-control"
              placeholder="ชื่อผู้จัดการ"
            />
            <has-error :form="form" field="nameManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Corporation Email</label>
            <small>/เมลล์นิติบุคคล</small>
            <input
              type="text"
              class="form-control"
              placeholder="เบอร์ผู้จัดการ"
            />
            <has-error :form="form" field="phoneManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Manager Email</label>
            <small>/อีเมลล์ผู้จัดการ</small>
            <input
              type="text"
              class="form-control"
              placeholder="อีเมลล์ผู้จัดการ"
            />
            <has-error :form="form" field="mailManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Technician Name</label>
            <small>/ชื่อช่าง</small>
            <input
              type="text"
              class="form-control"
              placeholder="ชื่อผู้จัดการ"
            />
            <has-error :form="form" field="nameManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Technician Tel</label>
            <small>/เบอร์ช่าง</small>
            <input
              type="text"
              class="form-control"
              placeholder="เบอร์ผู้จัดการ"
            />
            <has-error :form="form" field="phoneManager"></has-error>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Technician Email</label>
            <small>/เมลล์ช่าง</small>
            <input
              type="text"
              class="form-control"
              placeholder="อีเมลล์ผู้จัดการ"
            />
            <has-error :form="form" field="mailManager"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>House Number</label>
            <small>/บ้านเลขที่</small>
            <input
              type="text"
              class="form-control"
              placeholder="ชื่อผู้จัดการ"
            />
            <has-error :form="form" field="nameManager"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Moo.</label>
            <small>/หมู่</small>
            <input
              type="text"
              class="form-control"
              placeholder="เบอร์ผู้จัดการ"
            />
            <has-error :form="form" field="phoneManager"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Alley</label>
            <small>/ซอย</small>
            <input
              type="text"
              class="form-control"
              placeholder="อีเมลล์ผู้จัดการ"
            />
            <has-error :form="form" field="mailManager"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Road</label>
            <small>/ถนน</small>
            <input
              type="text"
              class="form-control"
              placeholder="ชื่อผู้จัดการ"
            />
            <has-error :form="form" field="nameManager"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Sub-district</label>
            <small>/ตำบล</small>
            <ThailandAutoComplete
              type="district"
              @select="select"
              color="#42b883"
              size="default"
              autocomplete="chrome-off"
              placeholder="ตำบล"
            />
            <has-error :form="form" field="districtName"></has-error>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label>District</label>
            <small>/อำเภอ</small>
            <ThailandAutoComplete
              type="amphoe"
              @select="select"
              color="#42b883"
              size="default"
              autocomplete="chrome-off"
              placeholder="อำเภอ"
            />
            <has-error :form="form" field="countyName"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Province</label>
            <small>/จังหวัด</small>
            <ThailandAutoComplete
              type="province"
              @select="select"
              size="default"
              color="#42b883"
              autocomplete="chrome-off"
              placeholder="จังหวัด"
            />
            <has-error :form="form" field="provinceName"></has-error>
          </div>
        </div>
        <div class="col-lg-6">
          <!-- text input -->
          <div class="form-group">
            <label>Postalcode</label>
            <small>/รหัสไปรษณีย์</small>
            <ThailandAutoComplete
              type="zipcode"
              @select="select"
              size="default"
              color="#42b883"
              autocomplete="chrome-off"
              placeholder="รหัสไปรษณีย์"
            />
            <has-error :form="form" field="postalCode"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Latitude</label>
            <small>/ละติจูด</small>
            <input
              type="text"
              class="form-control"
              placeholder="ชื่อผู้จัดการ"
            />
            <has-error :form="form" field="nameManager"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Longitude</label>
            <small>/ลองจิจูด</small>
            <input
              type="text"
              class="form-control"
              placeholder="เบอร์ผู้จัดการ"
            />
            <has-error :form="form" field="phoneManager"></has-error>
          </div>
        </div>
      </div>
    </tab-content>
    <tab-content title="Sale Detail">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Sale Name</label><br />
            <small>/ชื่อเซลล์</small>
            <select class="form-control" v-model="form.saleFm_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option :value="item.id" v-for="item in saleFms" :key="item.id">
                {{ item.nameSale }}
              </option>
            </select>
            <has-error :form="form" field="nameSale"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Date Contact Start</label><br />
            <small>/วันเริ่มทำสัญญา</small>
            <input
              v-model="form.contractStartDate"
              type="date"
              class="form-control"
              :disabled="editmode"
              :class="{
                'is-invalid': form.errors.has('contractStartDate'),
              }"
            />
            <has-error :form="form" field="contractStartDate"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Date Contact End</label><br />
            <small>/วันสิ้นสุดทำสัญญา</small>
            <input
              ref="contractEndDate"
              v-model="form.contractEndDate"
              type="date"
              class="form-control"
              :disabled="editmode"
              :class="{
                'is-invalid': form.errors.has('contractEndDate'),
              }"
            />
            <has-error :form="form" field="contractEndDate"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Income payment format *</label><br />
            <small>/รูปแบบการชำระรายได้</small>
            <select class="form-control" v-model="form.paymentType_id">
              <option disabled value="">--- Select a Class ---</option>
              <option
                :value="item.id"
                v-for="item in spendSpaces"
                :key="item.id"
              >
                {{ item.paymentType }}
              </option>
            </select>
            <has-error :form="form" field="paymentType"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Revenue </label>
            <small>/รูปแบบการชำระรายได้</small>
            <input
              v-model="form.contractTerm"
              type="text"
              class="form-control"
              placeholder="รูปแบบการชำระรายได้"
              :class="{
                'is-invalid': form.errors.has('contractTerm'),
              }"
            />
            <has-error :form="form" field="contractTerm"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Price to Pay</label>
            <small>/ยอดเงิน</small>
            <input
              v-model="form.balance"
              type="text"
              value="0"
              class="form-control"
              placeholder="ยอดเงิน"
              :class="{
                'is-invalid': form.errors.has('balance'),
              }"
            />
            <has-error :form="form" field="balance"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Remark contract</label>
            <small>/หมายเหตุรูปแบบสัญญา</small>
            <input
              v-model="form.remarkContract"
              type="text"
              class="form-control"
              placeholder="หมายเหตุรูปแบบสัญญา"
              :class="{
                'is-invalid': form.errors.has('remarkContract'),
              }"
            />
            <has-error :form="form" field="remarkContract"></has-error>
          </div>
        </div>
      </div>
    </tab-content>
    <tab-content title="Area Project">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Area</label><br />
            <small>/พื้นที่</small>
            <select class="form-control" v-model="form.areas_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option :value="item.id" v-for="item in areas" :key="item.id">
                {{ item.name }}
              </option>
            </select>
            <has-error :form="form" field="areas_id"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Area BBN</label><br />
            <small>/พื้นที่ บบน.</small>
            <select
              class="form-control"
              v-model="form.bbns_id"
              :disabled="form.areas_id == ''"
              required
            >
              <option value="" disabled>Select a Section</option>
              <option v-for="bbn in bbns" :key="bbn.id" :value="bbn.id">
                {{ bbn.name }}
              </option>
            </select>
            <has-error :form="form" field="bbns_id"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Area 3BB</label><br />
            <small>/พื้นที่ สามบีบี</small>
            <select class="form-control" v-model="form.area3bb_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option :value="item.id" v-for="item in area3bbs" :key="item.id">
                {{ item.area3BB }}
              </option>
            </select>
            <has-error :form="form" field="area3BB"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Area TRUE</label><br />
            <small>/พื้นที่ ทรู</small>
            <select class="form-control" v-model="form.areaTrue_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option :value="item.id" v-for="item in areaTrues" :key="item.id">
                {{ item.areaTrue }}
              </option>
            </select>
            <has-error :form="form" field="areaTrue"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Area TRUE NEW</label><br />
            <small>/พื้นที่ ทรูใหม่</small>
            <select class="form-control" v-model="form.areaTrueNew_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option
                :value="item.id"
                v-for="item in areaTrueNews"
                :key="item.id"
              >
                {{ item.areaTrueNew }}
              </option>
            </select>
            <has-error :form="form" field="areaTrueNew"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Area AIS</label><br />
            <small>/พื้นที่ เอไอเอส</small>
            <select class="form-control" v-model="form.areaAis_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option :value="item.id" v-for="item in areaAises" :key="item.id">
                {{ item.areaAis }}
              </option>
            </select>
            <has-error :form="form" field="areaAis"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Area Fibernet</label><br />
            <small>/พื้นที่ ไฟเบอเน็ต</small>
            <select class="form-control" v-model="form.areaFibernet_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option
                :value="item.id"
                v-for="item in areaFiberNets"
                :key="item.id"
              >
                {{ item.areaFiberNet }}
              </option>
            </select>
            <has-error :form="form" field="areaFiberNet"></has-error>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Operating Time</label><br />
            <small>/เวลาการเข้างาน</small>
            <select class="form-control" v-model="form.workTime_id">
              <option value="" disabled>--- Select a Class ---</option>
              <option :value="item.id" v-for="item in workTimes" :key="item.id">
                {{ item.workTime }}
              </option>
            </select>
            <has-error :form="form" field="workTime"></has-error>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Remark</label>
            <small>/รีมาร์ค</small>
            <textarea
              id="remark"
              v-model="form.remark"
              class="form-control"
              placeholder="-"
              :class="{
                'is-invalid': form.errors.has('remark'),
              }"
            />
            <has-error :form="form" field="remark"></has-error>
          </div>
        </div>
      </div>
    </tab-content>
  </form-wizard>
</template>

<script>
import { FormWizard, TabContent } from "vue-step-wizard";
import "vue-step-wizard/dist/vue-step-wizard.css";
import { mapGetters, mapState } from "vuex";
import NumberInput from "../partials/NumberInput.vue";
export default {
  name: "BasicStepperForm",
  title: "All -",
  components: {
    NumberInput,
    FormWizard,
    TabContent,
  },
  data() {
    return {
      fullName: "",
      companyName: "",
      referral: "",
      loader: null,
      openWindowPortal: false,
      editmode: false,
      selected: "",
      areas: [],
      bbns: [],
      area3bbs: [],
      areaTrues: [],
      areaTrueNews: [],
      areaAises: [],
      areaFiberNets: [],
      workTimes: [],
      spendSpaces: [],
      saleFms: [],
      form: new Form({
        id: "",
        areas_id: "",
        bbns_id: "",
        area3bb_id: "",
        areaTrue_id: "",
        areaTrueNew_id: "",
        areaAis_id: "",
        areaFibernet_id: "",
        projectName: "",
        subBuildingsum: 1,
        floorSum: 0,
        roomSum: 0,
        roadName: "",
        nameManager: "",
        phoneManager: "",
        mailManager: "",
        nameNiti: "",
        phoneNiti: "",
        mailNiti: "",
        nameTechnician: "",
        phoneTechnician: "",
        mailTechnician: "",
        houseNumber: "",
        squadNumber: "",
        alleyName: "",
        roadName: "",
        districtName: "",
        provinceName: "",
        countyName: "",
        postalCode: "",
        latitude: "",
        longitude: "",
        contractStartDate: new Date().toISOString().slice(0, 10),
        paymentType_id: "",
        saleFm_id: "",
        contractTerm: "",
        contractEndDate: new Date().toISOString().slice(0, 10),
        balance: 0,
        workTime_id: "",
        remark: "",
        subbuilding: [],
      }),
    };
  },
  computed: {
    ...mapGetters(["buildings"]),
    ...mapState(["buildings"]),
    areaID() {
      return this.form.areas_id;
    },
    location() {
      return { lon: this.form.longitude, lat: this.form.latitude };
    },
    subBuildingsum() {
      return this.form.subBuildingsum;
    },
    subbuilding() {
      return this.form.subbuilding.length;
    },
    sumFloorOfSubbuilding() {
      return this.form.subbuilding.reduce((total, obj) => {
        return parseInt(obj.floorSum) + parseInt(total);
      }, 0);
    },
    sumRoomOfSubbuilding() {
      return this.form.subbuilding.reduce((total, obj) => {
        return parseInt(obj.roomSum) + parseInt(total);
      }, 0);
    },
  },
  watch: {
    areaID: function (value) {
      this.form.bbN = "";
      axios.get("/bbns?area_id=" + this.form.areas_id).then((response) => {
        // console.log(response.data);
        this.bbns = response.data.data;
      });
    },
    form: {
      deep: true,
      handler(value) {
        if (this.form.subBuildingsum > 1) {
          this.form.floorSum = this.sumFloorOfSubbuilding;
          this.form.roomSum = this.sumRoomOfSubbuilding;
        }
      },
    },
  },
  methods: {
    onSubBuildingUpdate(newVal, oldVal) {
      console.log(newVal, oldVal);
      if (this.subbuilding != newVal) {
        if (newVal > oldVal) {
          const loop = newVal - this.subbuilding;
          if (loop >= 1) {
            for (var i = 0; i < loop; i++) {
              this.form.subbuilding.push({
                projectName: "",
                floorSum: 0,
                roomSum: 0,
              });
            }
          }
        } else if (newVal < oldVal) {
          const loop = this.subbuilding - newVal;
          console.log("onSubBuildingUpdate else" + loop);
          if (newVal == 1) {
            this.form.subbuilding = [];
          }
          if (loop >= 1) {
            for (var i = 0; i < loop; i++) {
              this.form.subbuilding.pop();
            }
          }
        }
      }
    },
    select(address) {
      this.form.districtName = address.district;
      this.form.countyName = address.amphoe;
      this.form.provinceName = address.province;
      this.form.postalCode = address.zipcode;
    },
    loadSaleFm() {
      axios.get("/saleFms").then((response) => {
        this.saleFms = response.data.data;
      });
    },
    loadSpendSpace() {
      axios.get("/spendSpaces").then((response) => {
        this.spendSpaces = response.data.data;
      });
    },
    loadArea() {
      axios.get("/areas").then((response) => {
        this.areas = response.data.data;
      });
    },
    loadArea3BB() {
      axios.get("/area3bbs").then((response) => {
        this.area3bbs = response.data.data;
      });
    },
    loadAreaTrue() {
      axios.get("/areaTrues").then((response) => {
        this.areaTrues = response.data.data;
      });
    },
    loadAreaTrueNew() {
      axios.get("/areaTrueNews").then((response) => {
        this.areaTrueNews = response.data.data;
      });
    },
    loadAreaAis() {
      axios.get("/areaAises").then((response) => {
        this.areaAises = response.data.data;
      });
    },
    loadAreaFiberNet() {
      axios.get("/areaFiberNets").then((response) => {
        this.areaFiberNets = response.data.data;
      });
    },
    loadWorkTime() {
      axios.get("/workTimes").then((response) => {
        this.workTimes = response.data.data;
      });
    },
    loadBuildings() {
      this.$Progress.start();
      if (this.$gate.isAdmin()) {
        this.$store.dispatch("GET_BUILDINGS");
        $("#buildings").DataTable().ajax.reload();
      }
      this.$Progress.finish();
    },
    updateBuilding() {
      this.$Progress.start();
      // console.log('Editing data');
      this.form
        .put("/building/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          //  Fire.$emit('AfterCreate');
          this.loadBuildings();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    editModal(building) {
      this.editmode = true;
      this.form.reset();
      this.form.errors.clear();
      building.subbuilding = building.subbuilding;
      console.log(building);
      $("#addNew").modal("show");
      this.form.fill(building);
    },
    openMapPickerLocation() {
      $("#pickermap").modal("show");
    },
    newModal() {
      this.editmode = false;
      this.selected = "";
      this.form.reset();
      this.form.errors.clear();
      $("#addNew").modal("show");
    },
    deleteBuilding(item) {
      Swal.fire({
        title: window.translate("building.alert.delete_building_title"),
        text:
          window.translate("building.alert.delete_building_text") +
          ` [${item.projectName}]`,
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        cancelButtonText: window.translate(
          "building.alert.delete_building_cancel_button_text"
        ),
        confirmButtonText: window.translate(
          "building.alert.delete_building_confirm_button_text"
        ),
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("/building/" + item.id)
            .then(() => {
              Swal.fire(
                window.translate("building.alert.comfirm_delete_title"),
                window.translate("building.alert.confirm_delete_message"),
                "success"
              );
              // Fire.$emit('AfterCreate');
              this.loadBuildings();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
    createBuilding() {
      console.log("createBuilding");
      if (this.selected == null || this.selected == undefined) return false;
      this.form
        .post("/building")
        .then((response) => {
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          this.loadBuildings();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
    generateTable() {
      var vm = this;
      var table = $(this.$refs.buildings).DataTable({
        dom: "Blfrtip",
        ajax: "/api/building",
        responsive: true,
        processing: true,
        autoWidth: true,
        pageLength: 10,
        lengthMenu: [
          [10, 15, 25, 50, -1],
          [10, 15, 25, 50, "All"],
        ],
        fixedHeader: true,
        fixedColumns: true,
        fixedColumns: {
          leftColumns: 2,
          rightColumns: 1,
        },
        scrollX: true,
        scrollCollapse: true,
        select: true,
        buttons: [
          "colvis",
          {
            extend: "copy",
            text: "<i class='bi bi-clipboard mr-1'></i>Copy",
            exportOptions: {
              columns: "th:not(.notexport)",
            },
          },
          {
            extend: "excelHtml5",
            autoFilter: true,
            sheetName: "Building",
            text: "<i class='bi bi-file-earmark-excel mr-1'></i>Excel",
            exportOptions: {
              columns: "th:not(.notexport)",
            },
          },
          {
            extend: "print",
            text: "<i class='bi bi-printer mr-1'></i>Print",
          },
          {
            className: "bg-danger",
            text: "<i class='bi bi-file-text mr-1'></i>ยังไม่ทำสัญญา",
            action: function (e, dt, node, config) {
              dt.columns(4).search("ยังไม่ได้ทำสัญญา").draw();
            },
          },
          {
            text:
              "<i class='bi bi-list-check mr-1'></i>" +
              window.translate(
                "datatables.alert.display_selected_record_title"
              ) +
              "",
            action: function (e, dt, node, config) {
              var rowsel = dt
                .rows({ selected: true })
                .data()
                .map(function (item) {
                  return item.id;
                })
                .join(",");
              if (!rowsel) {
                return Swal.fire({
                  title: window.translate(
                    "datatables.alert.display_selected_record_empty_title"
                  ),
                  text: window.translate(
                    "datatables.alert.display_selected_record_empty_text"
                  ),
                  timer: 2000,
                  showCancelButton: false,
                  showConfirmButton: false,
                });
              }
              $.fn.dataTable.ext.search.pop();
              $.fn.dataTable.ext.search.push(function (
                settings,
                data,
                dataIndex
              ) {
                return $(table.row(dataIndex).node()).hasClass("selected")
                  ? true
                  : false;
              });
              table.draw();
            },
          },
          {
            text: "<i class='bi bi-arrow-repeat mr-1'></i>Refresh",
            action: function (e, dt, node, config) {
              console.info("button: Clear");
              $.fn.dataTable.ext.search.pop();
              dt.search("").draw();
              dt.columns().search("").draw();
              dt.rows().deselect();
              dt.ajax.reload();
            },
          },
        ],
        columns: [
          {
            data: null,
            defaultContent: "",
            className: "dt-body-center notexport",
          },
          {
            data: "projectName",
            className: "text-capitalize",
            render: function (data, type, row, meta) {
              return (
                '<span><i class="bi bi-building pr-2"></i>' + data + "</span>"
              );
            },
          },
          {
            data: "subBuildingsum",
            render: function (data, type, row, meta) {
              return (
                '<span><i class="bi bi-building pr-2"></i>' +
                data +
                " ตึก" +
                "</span>"
              );
            },
          },
          {
            data: "floorSum",
          },
          {
            data: "roomSum",
          },

          {
            data: "nameManager",
          },
          {
            data: "phoneManager",
          },
          {
            data: "mailManager",
          },
          {
            data: "nameNiti",
          },
          {
            data: "phoneNiti",
          },
          {
            data: "mailNiti",
          },
          {
            data: "nameTechnician",
          },
          {
            data: "phoneTechnician",
          },
          {
            data: "mailTechnician",
          },
          {
            data: "houseNumber",
          },
          {
            data: "squadNumber",
          },
          {
            data: "alleyName",
          },
          {
            data: "districtName",
          },
          {
            data: "provinceName",
          },
          {
            data: "countyName",
          },
          {
            data: "postalCode",
          },
          {
            data: "countyName",
          },
          {
            data: "latitude",
          },
          {
            data: "longitude",
          },
          {
            data: "contractStartDate",
          },
          {
            data: "contractTerm",
          },
          {
            data: "contractEndDate",
          },
          {
            data: "balance",
          },
          {
            data: "remarkContract",
          },
          {
            data: "remark",
          },
          {
            data: "created_at",
            render: function (data, type, row, meta) {
              return moment(data).format("MM/DD/YYYY HH:MM");
            },
          },
          {
            data: "updated_at",
            render: function (data, type, row, meta) {
              return moment(data).format("MM/DD/YYYY HH:MM");
            },
          },
          {
            data: null,
            className: "dt-body-center notexport",
            render: function (data, type, row, meta) {
              return "<a class='edit-building btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-building btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
            },
          },
        ],
        columnDefs: [
          {
            targets: 0,
            searchable: false,
            orderable: false,
            className: "dt-body-center",
            checkboxes: {
              selectRow: true,
            },
          },
        ],
        select: { selector: "td:not(:last-child)", style: "os" },
        order: [[1, "desc"]],
      });
      $("tbody", this.$refs.buildings).on(
        "click",
        ".edit-building",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.editModal(row.data());
        }
      );
      $("tbody", this.$refs.buildings).on(
        "click",
        ".delete-building",
        function (e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          var row = table.row(tr);
          vm.deleteBuilding(row.data());
        }
      );
    },
  },
  created() {
    this.$Progress.start();
    LoadingWait.fire();
    this.loadBuildings();
    this.$Progress.finish();
  },
  mounted() {
    const vm = this;
    this.loadSaleFm();
    this.loadSpendSpace();
    this.loadArea();
    this.loadArea3BB();
    this.loadAreaTrue();
    this.loadAreaTrueNew();
    this.loadAreaAis();
    this.loadAreaFiberNet();
    this.loadWorkTime();
    this.generateTable();
    // $("#addNew").on("hide.bs.modal", function() {
    //     vm.form.reset();
    // });
    setTimeout(() => {
      LoadingWait.close();
    }, 3000);
    // $("input").attr("autocomplete", this.isChrome ? "chrome-off" : "off");
  },
};
</script>