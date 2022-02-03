<template>
  <div>
    <div class="container my-3">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="dropdown mb-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li @click="filter(null)"><div class="dropdown-item">All</div></li>
              <li @click="filter(0)"><div class="dropdown-item">Customer</div></li>
              <li @click="filter(1)"><div class="dropdown-item">Product Manager</div></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row justify-content-center" v-for="(user, index) in users" :key="index">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <img src="/images/user.png" style="width:40px"/>
              {{ user.name }}
              <span v-if="user.verified" class="badge rounded-pill bg-primary">Verified</span>
              <span v-if="user.product_manager" class="badge bg-success">Product Manager</span>
              <button type="button" class="btn btn-primary float-end" @click="$router.push('/user/' + user.id)">Info</button>
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
          product_manager: null,
          page: 1,
          limit: 10,
        },
        users: [],
        paging: [],
      }
    },
    created() {
      this.getUsers()
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
        this.getUsers()
      },
      filter(type) {
        this.data.product_manager = type
        this.data.page = 1
        this.getUsers()
      },
      async getUsers() {
        try {
          const response = await api.getUsers(this.data)
          this.users = response.data.data
          this.paging = response.data.meta.links
        } catch (error) {
          console.log(error)
        }
      }
    }
  }
</script>
