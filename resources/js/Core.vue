<template>
  <div>
      <Navigation />
      <router-view></router-view>
  </div>
</template>

<script>
import Navigation from "./components/Navigation.vue"

export default {
    name : "core",
    components : {
        Navigation
    }
}
</script>

<style>

</style>