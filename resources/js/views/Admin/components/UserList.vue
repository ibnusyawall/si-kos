<template>
  <div>
    <b-modal
      id="modalHapus"
      ref="hapus-data"
      title="Hapus Data"
      :header-bg-variant="'danger'"
      :header-text-variant="'white'"
      :ok-title="'Hapus'"
      :okVariant="'danger'"
      @ok="handleHapus"
    >
      <p>
        <b>{{ hapus.nama }}</b> akan di hapus, apakah yakin ingin menghapusnya?
      </p>
    </b-modal>
    <div class="table-responsive">
      <table class="table v-middle text-nowrap bg-transparent">
        <thead class="bg-light">
          <tr class>
            <th class="border-0">Nama</th>
            <th class="border-0">Username</th>
            <th class="border-0">Role</th>
            <th class="border-0">Status</th>
            <th class="border-0 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="v in data.user" :key="v.id">
            <td>{{ v.name }}</td>
            <td>{{ v.username }}</td>
            <td>{{ v.role }}</td>
            <td>
              <b-badge
                :variant="v.status == 'belum_bayar' ? 'danger' : 'success'"
                >{{ v.status }}</b-badge
              >
            </td>
            <td class="text-center">
              <b-button
                variant="success"
                size="sm"
                class="mr-1"
                @click="edit(v.id)"
              >
                <i class="fas fa-edit"></i>
              </b-button>
              <b-button
                variant="danger"
                size="sm"
                class="mr-1"
                @click="hapus_(v.id, v.name)"
              >
                <i class="fas fa-trash"></i>
              </b-button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hapus: {
        id: null,
        nama: null,
      },
      data: {
        user: null,
      },
      length: {
        user: null,
      },
    };
  },
  beforeMount() {
    this.loadUser();
  },
  methods: {
    loadUser() {
      this.$store
        .dispatch("user/users")
        .then((result) => {
          console.log("user:", result);
          this.data.user = result;
        })
        .catch((e) => console.log(e));
    },
    edit(id) {
      this.$emit("editData", { id: id });
      console.log("id", id);
    },
    hapus_(id, nama) {
      console.log("id h", id);

      this.hapus.id = id;
      this.hapus.nama = nama;

      this.$bvModal.show("modalHapus");
    },
    async handleHapus(e) {
      e.preventDefault();
      try {
        let hapus_data = await axios.delete(`/api/v1/user/${this.hapus.id}`);
      } catch (e) {
        this.$nextTick(() => {
          this.$bvModal.hide("modalHapus");
          this._alert("Hapus Data", "Data gagal dihapus");
        });
      } finally {
        this.$nextTick(() => {
          this.loadUser();
          this.$bvModal.hide("modalHapus");
          this._alert("Hapus Data", "Data berhasil dihapus");
        });
      }
    },
    _alert(title, msg) {
      this.$bvModal.msgBoxConfirm(msg, {
        title: title,
        size: "sm",
        buttonSize: "sm",
        okVariant: "danger",
        okTitle: "OK",
        footerClass: "p-2",
        hideHeaderClose: false,
        centered: true,
      });
    },
  },
};
</script>
