<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <img src="/images/user.png" class="img-fluid mb-3" style="max-width:200px;display:block;margin-left:auto;margin-right:auto;width:50%;">
        <div class="card">
          <div class="card-header">
            <h3>{{ data.name }}</h3>
            <span v-if="data.verified" class="badge rounded-pill bg-primary">Verified</span>
            <span v-if="data.product_manager" class="badge bg-success">Product Manager</span>
          </div>
          <div class="card-body">
            <div v-if="data.cars.length" class="row justify-content-center">
              <div class="col-6" v-for="(car, index) in data.cars" :key="index">
                <div class="card">
                  <router-link :to="'/car/'+car.id+'/availability'">
                    <img src="/images/car1.png" class="card-img-top">
                  </router-link>
                  <div class="card-body">
                    <h5 class="card-title">{{ car.brand }} {{ car.build }} {{ car.year }}</h5>
                    <span class="card-text">MYR {{ car.price }} per day</span><br>
                    <span class="card-text">Mode: {{ car.mode }}</span><br>
                    <span class="card-text">Location: {{ car.geolocation }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div v-else>
              <p class="text-center">No car available</p>
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
        data: {}
      }
    },
    async created() {
      try {
        const id = parseInt(this.$route.params.id)
        const response = await api.getUser(id)
        this.data = response.data.data
      } catch (error) {
        console.log(error)
      }
    }
  }
</script>
