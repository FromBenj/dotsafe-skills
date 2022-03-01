<template>
  <div id="nav">
    <div class="d-flex align-items-center">
      <router-link to="/projects" class="nav-link pl-0">Projets</router-link> |
      <router-link to="/technologies" class="nav-link">Technologies</router-link>
    </div>
    <img src="./assets/dotsafe-logo.jpg" alt="Logo de Dotsafe" height="150">
  </div>
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  padding: 0 10rem;
}

#nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #FD8A0E;
}

.nav-link {
  font-size: 1.8rem;
}
</style>
