<template>
  <div class="container mx-auto">
      {{index}}
      <img :src="'/img/' + player.photo" style="max-width : 20%" />
      <h1>{{ player.name }}</h1>
      <p>{{ player.number }}</p>
      <button class="btn btn-warning" @click="increment">Increment</button>
  </div>
</template>

<script>
export default {
    data() {
        return {
            player: {
                name : "",
                number : null,
                photo : null
            },
            index : 0
        }
    },
    mounted () {
        this.getPlayer();
    },
    methods: {
        async getPlayer() {
            let response = await axios.get('/player/show/' + this.$route.params.id)

            this.player.name = response.data.name
            this.player.number = response.data.number
            this.player.photo = response.data.photo
        },
        increment(e){
            if (this.index >= this.player.number) {
                e.preventDefault()
            }else{
                this.index++
            }
        },
    },
}
</script>

<style>

</style>