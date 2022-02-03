<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <router-link :to="'/user'">
                  Users
                </router-link>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <router-link :to="'/car'">
                  Cars
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    mounted() {
      console.log('Component mounted.')
    }
  }
</script>
