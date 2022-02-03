<template>
  <div>
    <div class="container my-3">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="dropdown mb-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Mode
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li @click="filterMode('')"><div class="dropdown-item">All</div></li>
              <li @click="filterMode('auto')"><div class="dropdown-item">Auto</div></li>
              <li @click="filterMode('manual')"><div class="dropdown-item">Manual</div></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="dropdown mb-3">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Location
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li @click="filterGeolocation('')"><div class="dropdown-item">All</div></li>
                <li @click="filterGeolocation('selangor')"><div class="dropdown-item">Selangor</div></li>
                <li @click="filterGeolocation('penang')"><div class="dropdown-item">Penang</div></li>
                <li @click="filterGeolocation('johor')"><div class="dropdown-item">Johor</div></li>
                <li @click="filterGeolocation('kl')"><div class="dropdown-item">Kuala Lumpur</div></li>
              </ul>
            </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-xl-3 mb-5" v-for="(car, index) in cars" :key="index">
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
            <div class="card-footer">
                <img src="/images/user.png" style="width:40px"/>
              <p class="card-text text-end">{{ car.owner.name }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <div v-for="(page, index) in paging" :key="index">
          <div v-if="page.url">
            <li class="page-item" v-if="page.label == '&laquo; Previous'" @click="goToPage(page.label)"><div class="page-link">Previous</div></li>
            <li class="page-item" v-else-if="page.label == 'Next &raquo;'" @click="goToPage(page.label)"><div class="page-link">Next</div></li>
            <li class="page-item" :class="{'active': page.active}" v-else @click="goToPage(page.label)"><div class="page-link">{{ page.label }}</div></li>
          </div>
        </div>
      </ul>
    </nav>
  </div>
</template>

<script>
  import * as api from '../api/route'
  export default {
    data() {
      return {
        data: {
          mode: '',
          geolocation: '',
          page: 1,
          limit: 12,
        },
        cars: [],
        paging: [],
      }
    },
    created() {
      this.getCars()
    },
    methods: {
      goToPage(label) {
        if (label == '&laquo; Previous') {
          this.data.page -= 1
        } else if (label == 'Next &raquo;') {
          this.data.page += 1
        } else {
          this.data.page = label
        }
        this.getCars()
      },
      filterMode(value) {
        this.data.mode = value
        this.data.page = 1
        this.getCars()
      },
      filterGeolocation(value) {
        this.data.geolocation = value
        this.data.page = 1
        this.getCars()
      },
      async getCars() {
        try {
          const response = await api.getCars(this.data)
          this.cars = response.data.data
          this.paging = response.data.meta.links
        } catch (error) {
          console.log(error)
        }
      }
    }
  }
</script>
