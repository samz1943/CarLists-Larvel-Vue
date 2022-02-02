<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="">Socar Sample Task</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            <li v-if="!isLoggedIn" class="nav-item">
                <a class="nav-link" @click="$router.push(`/`)">Login</a>
            </li>
            <li v-else class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Admin</a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" @click="$router.push(`/user`)">User</a>
                  <a class="dropdown-item" @click="$router.push(`/car`)">Car</a>
                  <a class="dropdown-item" @click="$router.push(`/car/availability`)">Car Availability</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters(['isLoggedIn'])
  },
  async created() {
    if (localStorage.getItem('token')) {
      this.$store.commit("setLoggedIn", true)
    }
  },
}
</script>