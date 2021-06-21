<template>
  <div class="container mx-auto">
      <div class="card p-4" style="width : 35rem">
          <form @submit="update" enctype="multipart/form-data">
              <div class="mb-3">
                  <input type="text" v-model="forms.name" class="form-control">
                  <label for="" class="text-danger" v-if="validation.name">{{validation.name[0]}}</label>
              </div>
              <div class="mb-3">
                  <input type="number" maxlength="2"  v-model="forms.number" class="form-control">
                  <label for="" class="text-danger" v-if="validation.number">{{validation.number[0]}}</label>
              </div>
              <div class="mb-3">
                  <input type="file" name="" class="form-control" @change="preview" id="">
                  <label for="" class="text-danger" v-if="validation.photo">{{validation.photo[0]}}</label>
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
    mounted () {
        this.getPlayer();
    },
    methods: {
        async getPlayer(){
            let response = await axios.get('/player/edit/' + this.$route.params.id)
            this.loading = true

            if (response.status === 200) {
                this.forms.name = response.data.name
                this.forms.number = response.data.number
                this.forms.photo = response.data.photo
                this.loading = false
            }
        },
        async update(e) {
            e.preventDefault();
            try {
                let data = new FormData();
                data.append('name', this.forms.name)
                data.append('number', this.forms.number)
                data.append('photo', this.forms.photo)
                this.loading = true
                    let response = await axios.post(`/player/update/${this.$route.params.id}`, data)

                    if (response.status === 200) {
                        alert("Pegawai Berhasil Diupdate")
                        this.loading = false

                        this.$router.push({name : "index"})
                    }   
                
            } catch (e) {
                this.validation = e.response.data.errors
            }
        },
        preview(e){
            this.forms.photo = e.target.files[0]
            console.log(e.target.files[0])
        }
    },
}
</script>

<style>

</style>