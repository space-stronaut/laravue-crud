<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <router-link class="navbar-brand" to="/">Navbar</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <router-link class="nav-item nav-link" exact-active-class="active" exact to="/">Home <span class="sr-only">(current)</span></router-link>
                    <router-link class="nav-item nav-link" exact-active-class="active" to="/about">About</router-link>
                    <router-link class="nav-item nav-link" exact-active-class="active" to="/player">Player</router-link>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    export default{
        name : "Navigation"
    }
</script>

<style scoped>

</style>