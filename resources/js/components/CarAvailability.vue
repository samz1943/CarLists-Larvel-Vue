<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <img src="/images/car1.png" class="img-fluid" style="display:block;margin-left:auto;margin-right:auto;width:50%;">
        <div class="card">
          <div class="card-header"><h2>{{ data.car.brand }} {{ data.car.build }} {{ data.car.year }}</h2></div>
          <div class="card-body">
            <span class="card-text">MYR {{ data.car.price }} per day</span><br>
            <span class="card-text">Mode: {{ data.car.mode }}</span><br>
            <span class="card-text">Location: {{ data.car.geolocation }}</span><br>
            Available: {{ data.start_at }} -> {{ data.end_at }}
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
        const response = await api.getCarAvailability(id)
        this.data = response.data.data
      } catch (error) {
        console.log(error)
      }
    }
  }
</script>
