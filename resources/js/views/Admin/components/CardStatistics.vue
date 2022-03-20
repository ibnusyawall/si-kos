<template>
  <div>
    <b-row>
      <!-- <pre>{{ data }}</pre> -->
      <b-col cols="12" md="6" lg="6">
        <b-card class="mb-4">
          <h4 class="card-title mb-1">{{ length.user }}</h4>
          <b-card-text class="mb-2">Tota User</b-card-text>
          <b-progress
            :value="length.user"
            variant="success"
            :max="max"
          ></b-progress>
        </b-card>
      </b-col>
      <b-col cols="12" md="6" lg="6">
        <b-card class="mb-4">
          <h4 class="card-title mb-1">{{ length.fasilitas }}</h4>
          <b-card-text class="mb-2">Total Fasilitas</b-card-text>
          <b-progress
            variant="info"
            :value="length.fasilitas"
            :max="max"
          ></b-progress>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>
<script>
export default {
  data() {
    return {
      data: {
        user: null,
        fasilitas: null,
      },
      length: {
        user: null,
        fasilitas: null,
      },
      max: 50,
    };
  },
  beforeMount() {
    this.loadAllData();
  },
  methods: {
    loadAllData() {
      this.loadUser();
      this.loadFasilitas();
    },
    loadUser() {
      this.$store
        .dispatch("user/users")
        .then((result) => {
          this.data.user = [];
          this.length.user = result.length || 0;
          console.log("user:", result);
          this.data.user = result;
        })
        .catch((e) => console.log(e));
    },
    loadFasilitas() {
      this.$store
        .dispatch("fasilitas/fasilitas_")
        .then((result) => {
          this.data.fasilitas = [];
          this.length.fasilitas = result.length || 0;
          console.log("fasilitas:", result);
          this.data.fasilitas = result;
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>

