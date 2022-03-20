<template>
  <div>
    <b-card class="mb-4" no-body>
      <b-card-body>
        <h4 class="card-title">Edit Data</h4>
        <form ref="form" enctype="multipart/form-data">
          <b-row>
            <b-col>
              <b-form-group label="Nama" label-for="name">
                <input
                  id="name"
                  v-model="form.name"
                  type="text"
                  :class="'form-control'"
                  autofocus
                  required
                />
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Username" label-for="username">
                <input
                  id="username"
                  v-model="form.username"
                  type="text"
                  :class="'form-control'"
                  autofocus
                  required
                />
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Password" label-for="password">
                <input
                  id="password"
                  v-model="form.password"
                  type="password"
                  :class="'form-control'"
                  autofocus
                  required
                />
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Role" label-for="role">
                <select
                  id="role"
                  class="form-control selectric"
                  v-model="form.role"
                >
                  <option v-for="v in data.role" :key="v.id" :value="v.value">
                    {{ v.placeholder }}
                  </option>
                </select>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Status" label-for="status">
                <select
                  id="status"
                  class="form-control selectric"
                  v-model="form.status"
                >
                  <option v-for="v in data.status" :key="v.id" :value="v.value">
                    {{ v.placeholder }}
                  </option>
                </select>
              </b-form-group>
            </b-col>
          </b-row>
          <b-button variant="outline-primary" size="sm" @click="update"
            >Update</b-button
          >
        </form>
        <h6 class="card-subtitle font-weight-normal text-muted"></h6>
      </b-card-body>
    </b-card>
  </div>
</template>
<script>
export default {
  props: ["id_data"],
  data() {
    return {
      form: {
        name: null,
        username: null,
        password: null,
        role: null,
        status: null,
      },
      data: {
        role: [
          {
            id: 1,
            value: "admin",
            placeholder: "Admin",
          },
          {
            id: 2,
            value: "user",
            placeholder: "User",
          },
        ],
        status: [
          {
            id: 1,
            value: "belum_bayar",
            placeholder: "Belum Bayar",
          },
          {
            id: 2,
            value: "sudah_bayar",
            placeholder: "Sudah Bayar",
          },
        ],
      },
    };
  },
  methods: {
    update() {
      this.$emit("updateData", { id: this.id_data, form: { ...this.form } });
    },
    loadUser() {
      this.$store
        .dispatch("user/user", this.id_data)
        .then((result) => {
          this.form.name = result.name;
          this.form.username = result.username;
          this.form.password = result.password;
          this.form.role = result.role;
          this.form.status = result.status;
          console.log("user:", result);
        })
        .catch((e) => console.log(e));
    },
  },
  beforeMount() {
    this.loadUser();
  },
  components: {
    //
  },
};
</script>
