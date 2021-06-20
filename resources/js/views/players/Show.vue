<template>
  <div class="container mx-auto">
      <h1>{{ player.name }}</h1>
      <p>{{ player.number }}</p>
  </div>
</template>

<script>
export default {
    data() {
        return {
            player: []
        }
    },
    mounted () {
        this.getPlayer();
    },
    methods: {
        async getPlayer() {
            let response = await axios.get('/player/show/' + this.$route.params.id)

            this.player = response.data
        }
    },
}
</script>

<style>

</style>