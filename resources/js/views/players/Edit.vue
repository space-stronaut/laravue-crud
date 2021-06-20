<template>
  <div class="container mx-auto">
      <div class="card p-4" style="width : 35rem">
          <form @submit="update">
              <div class="mb-3">
                  <input type="text" v-model="forms.name" class="form-control">
                  <label for="" class="text-danger" v-if="validation.name">{{validation.name[0]}}</label>
              </div>
              <div class="mb-3">
                  <input type="number" maxlength="2"  v-model="forms.number" class="form-control">
                  <label for="" class="text-danger" v-if="validation.number">{{validation.number[0]}}</label>
              </div>
              <div class="mb-3">
                  <button type="submit" class="btn btn-success">Submit</button>
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
                number : null
            },
            validation : []
        }
    },
    mounted () {
        this.getPlayer();
    },
    methods: {
        async getPlayer(){
            let response = await axios.get('/player/edit/' + this.$route.params.id)

            if (response.status === 200) {
                this.forms.name = response.data.name
                this.forms.number = response.data.number
            }
        },
        async update(e) {
            e.preventDefault();
            try {
                let response = await axios.put('/player/update/' + this.$route.params.id, this.forms)

                if (response.status === 200) {
                    alert("Pegawai Berhasil Diupdate")

                    this.$router.push({name : "index"})
                }   
            } catch (e) {
                this.validation = e.response.data.errors
            }
        }
    },
}
</script>

<style>

</style>