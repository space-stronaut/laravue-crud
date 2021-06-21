<template>
  <div class="container mx-auto">
      <div class="card p-4" style="width : 35rem">
          <form @submit="create" enctype="multipart/form-data">
              <div class="mb-3">
                  <label for="">Nama</label>
                  <input type="text" v-model="forms.name" class="form-control">
                  <label for="" class="text-danger" v-if="validation.name">{{validation.name[0]}}</label>
              </div>
              <div class="mb-3">
                  <input type="number" maxlength="2" v-model="forms.number" class="form-control">
                  <label for="" class="text-danger" v-if="validation.number">{{validation.number[0]}}</label>
              </div>
              <div class="mb-3">
                  <input type="file" v-on:change="preview" class="form-control">
              </div>
              <div class="mb-3">
                  <button type="submit" class="btn btn-success"><span v-if="loading">Loading</span><span v-else>Submit</span></button>
              </div>
          </form>
      </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            forms: {
                name : "",
                number : null,
                photo : null
            },
            validation : [],
            loading : false
        }
    },
    methods: {
        async create(e) {
            e.preventDefault();
            try {
                let data = new FormData();
                data.append('name', this.forms.name)
                data.append('number', this.forms.number)
                data.append('photo', this.forms.photo)
                console.log(data)
                this.loading = true
                let response = await axios.post('/player/create', data)

                if (response.status === 200) {
                    alert("Pegawai Berhasil Ditambahkan")
                    console.log(data)
                    this.loading = false

                    this.$router.push({name : "index"})
                }   
                console.log(this.forms.photo)
            } catch (error) {
                this.validation = error.response.data.errors
            }
        },
        preview(e){
            this.forms.photo = e.target.files[0]
        }
    },
}
</script>

<style>

</style>