<template>
  <div>
    <b-card class="mb-4" no-body>
      <b-card-body>
        <h4 class="card-title">Edit Data</h4>
        <form ref="form" enctype="multipart/form-data">
          <b-row>
            <b-col>
              <b-form-group label="Nama Fasilias" label-for="nama_fasilitas">
                <input
                  id="nama_fasilitas"
                  v-model="form.nama_fasilitas"
                  type="text"
                  :class="'form-control'"
                  autofocus
                />
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
    props: ['id_data'],
  data() {
    return {
      form: {
          nama_fasilitas: null,
      },
    };
  },
  methods: {
      update() {
          this.$emit('updateData', { id: this.id_data, form: {...this.form }})
      },
      loadFasilitas() {
          this.$store.dispatch('fasilitas/fasilitas', this.id_data)
            .then(result => {
                this.form.nama_fasilitas = result.nama_fasilitas
                console.log('fasilitas:', result)
            })
            .catch(e => console.log(e))
      },
  },
  beforeMount() {
      this.loadFasilitas()
  },
  components: {
    //
  },
};
</script>
