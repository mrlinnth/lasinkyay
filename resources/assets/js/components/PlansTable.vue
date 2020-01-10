<template>
    <div v-if="loading">
        <p class="text-sm text-gray-300 text-center">Loading...</p>
    </div>
    <div v-else>
        <table class="table table-full">
          <tbody>
            <tr>
                <th>Plan Name</th>
                <th>Fees</th>
                <th>Duration</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <tr v-for="plan in plans">
                <td>{{ plan.name }}</td>
                <td>{{ plan.price }} {{ plan.currency }}</td>
                <td>{{ plan.invoice_period }} {{ plan.invoice_interval }}</td>
                <td>{{ plan.description }}</td>
                <td>
                    <button v-on:click="viewPlan(plan.id)" class="mr-2">View</button>
                    <button v-on:click="editPlan(plan.id)" class="mr-2">Edit</button>
                    <button v-on:click="deletePlan(plan.id)">Delete</button>
                </td>
            </tr>
          </tbody>
        </table>        
    </div>    
</template>

<script>
export default {
  data() {
    return {
      plans: [],
      loading: true
    }
  },
  methods: {
    queryServer() {
      axios.get('/api/lasinkyay/plans')
        .then((response) => {
          this.loading = false
          this.plans = response.data.data
        })
    },
    fetchData() {
      this.loading = true
      this.queryServer()
    },
    viewPlan(id) {
      location.href = '/lasinkyay/plans/' + id
    },
    editPlan(id) {
      location.href = '/lasinkyay/plans/' + id + '/edit'
    },
    deletePlan(id) {
      console.log('TO DO : delete ', id)
    }
  },
  mounted() {
    console.log('lsk-test component mounted.')
    this.fetchData()
  }
}

</script>
