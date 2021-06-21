<template>
  <div class="container mx-auto">
      {{index}}
      <router-link class="btn btn-primary my-5" to="/player/add">Tambah</router-link>

        <div v-if="searching" class="alert alert-warning" role="alert">
            Hasil Pencarian Untuk : <b>{{query}}</b>
        </div>

      <div class="card p-4 d-flex my-2" style="width:35rem">
          <form>
              <div class="mb-3">
                <input type="text" v-model="query" @keyup="cari" placeholder="Cari..." class="form-control">
              </div>
              <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Cari</button>
              </div>
          </form>
      </div>
      <table class="table">
          <thead class="thead-dark">
              <th scope="col">Id</th>
              <th scope="col">Nama</th>
              <th scope="col">Nomor</th>
              <th scope="col">Gambar</th>
              <th scope="col">Aksi</th>
          </thead>
          <tbody v-for="(player,index) in players" :key="player.id">
              <tr>
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ player.name }}</td>
                  <td>{{ player.number }}</td>
                  <td>
                      <img v-if="player.photo" :src="'/img/' + player.photo" style="max-width:20%" />
                      <img v-else :src="'/img/24022287.png'" style="max-width:20%" />
                  </td>
                  <td>
                      <router-link :to="{name : 'show', params : { id : player.id }}" class="btn btn-primary">Show</router-link>
                      <router-link :to="{name : 'edit', params : { id : player.id }}" class="btn btn-success">Edit</router-link>
                      <button class="btn btn-danger" @click="hapus(player.id)">Hapus</button>
                  </td>
              </tr>
          </tbody>
      </table>

  </div>
</template>

<script>
export default {
    data() {
        return {
            players: [],
            query : "",
            searching : false,
            loading : false,
        }
    },
    mounted () {
        this.getPlayers();
    },
    methods: {
        async getPlayers() {
            let response = await axios.get('/player')
            if(response.status === 200){
                this.players = response.data
            }
        },
        async hapus(e){

            let q = confirm("Anda Yakin ?")
            if (q) {
                let response = await axios.delete('/player/delete/' + e)

                if (response.status === 200) {
                    this.getPlayers()
                }   
            }
        },
        async cari(){
            try {
                let response = await axios.get('/player/cari/' + this.query);
                if (response.status === 200) {
                    this.players = response.data
                    this.searching = true
                }   
            } catch (error) {
                this.getPlayers()
                this.searching = false
            }
        }
    },
}
</script>

<style>

</style>