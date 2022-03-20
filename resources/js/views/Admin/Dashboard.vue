<template>
  <div>
    <template v-if="user.role == 'admin'">
      <CardStatistics />
      <b-card class="mb-4" no-body>
        <b-card-body>
          <h4 class="card-title">User</h4>
          <b-button variant="outline-primary" size="sm" @click="add_data"
            >Tambah Data</b-button
          >
        </b-card-body>
        <UserList @editData="editData" />
      </b-card>
      <template v-if="show_edit">
        <UserEdit :id_data="id_data" @updateData="updateData" />
      </template>
      <template v-if="show_add">
        <UserAdd />
      </template>
    </template>
    <template v-else>
      <b-card class="mb-4" no-body>
        <b-card-body class="text-center">
          <h4 class="card-title">STATUS PEMBAYARAN BULAN INI</h4>
          <b-button
            :variant="user.status == 'belum_bayar' ? 'danger' : 'success'"
            size="lg"
            class="mt-4"
          >
            {{ status[user.status] }}
          </b-button>
          <p class="mt-3">
              {{ user.status == 'belum_bayar' ? 'Segera melakukan pembayaran kepemilik kos ini.' : 'Kamu sudah melakukan pembayaran, terimakasih.'}}
           </p>
        </b-card-body>
      </b-card>
    </template>
  </div>
</template>

<script>
import { mapState } from "vuex";
import CardStatistics from "./components/CardStatistics.vue";

import UserList from "./components/UserList.vue";
import UserAdd from "./components/UserAdd.vue";
import UserEdit from "./components/UserEdit.vue";

export default {
  data() {
    return {
      show_add: false,
      show_edit: false,
      status: {
          'belum_bayar': 'Belum Bayar',
          'sudah_bayar': 'Sudah Bayar'
      }
    };
  },

  methods: {
    add_data() {
      this.show_add = !this.show_add;
    },
    editData({ id }) {
      this.id_data = id;

      this.show_edit = !this.show_edit;
      console.log("id: ", id);
    },
    updateData({ id, form }) {
      console.log("edit formL:", form);

      axios
        .put(`/api/v1/user/${id}`, form)
        .then((result) => {
          console.log("updated success", result);
          this.modalConfirm(
            "Konfirmasi",
            "Data berhasil di update",
            "success",
            true
          );
        })
        .catch((e) => {
          this.modalConfirm(
            "Konfirmasi",
            "Data gagal di update",
            "danger",
            false
          );
          console.log("error:", e);
        });
    },
    modalConfirm(title, msg, type, go = false) {
      this.$bvModal
        .msgBoxOk(msg, {
          title: title,
          size: "md",
          buttonSize: "md",
          okVariant: type,
          headerClass: "p-2 border-bottom-0",
          footerClass: "p-2 border-top-0",
          centered: true,
        })
        .then((value) => {
          if (go) {
            this.$router.go(0);
          }
        })
        .catch((err) => {
          // An error occurred
        });
    },
  },
  computed: {
    ...mapState({
      login_success: (state) => state.login_success,
      user: (state) => state.user,
    }),
    user: function () {
      return JSON.parse(localStorage.getItem("user"));
    },
  },
  components: {
    CardStatistics,
    UserList,
    UserAdd,
    UserEdit,
  },
};
</script>
