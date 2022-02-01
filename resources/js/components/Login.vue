<template>
  <div class="container mt-6">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>
          <div class="card-body">
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" v-model="user.email" required autocomplete="email" autofocus>
                  <div><strong class="text-danger">{{ error.email }}</strong></div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" v-model="user.password" required autocomplete="current-password">
                  <div><strong class="text-danger">{{ error.password }}</strong></div>
              </div>
            </div>
            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary" @click="login">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import * as api from '../api/route'
export default {
  data() {
    return {
      user: {
        email: '',
        password: '',
      },
      error: {
        email: '',
        password: '',
      }

    }
  },
  methods: {
    validEmail(email) {
      var re = /(.+)@(.+){2,}\.(.+){2,}/;
      return re.test(email.toLowerCase());
    },
    async login() {
      this.error.email = ''
      this.error.password = ''
      if (this.user.email.trim() == '') {
        this.error.email = "Email is required"
      } else if (!this.validEmail(this.user.email)) {
        this.error.email = "The email must be a valid email address"
      }

      if (this.user.password.trim() == '') {
        this.error.password = "Password is required"
      }

      if (this.error.email == '' && this.error.password == '') {
        try {
          const response = await api.login(this.user)
          const token = response.data.token
          localStorage.setItem('token', token)
          this.$store.commit("setLoggedIn", true)
          this.$router.push('/home')
        } catch (error) {
          this.error.email = error.data.message
        }
      }
    }
  },
}
</script>