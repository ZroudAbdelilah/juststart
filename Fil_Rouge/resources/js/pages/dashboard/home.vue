<template>
    <div class="container-fluid">
        <h1>Dashboard</h1>
        <div class="row my-3">
            <div class="col">
                <div class="shadow border rounded bg-success text-white p-3">
                    <h2>Total projects:</h2>
                    <span class="h4">0000</span>
                </div>
            </div>
            <div class="col">
                <div class="shadow border rounded bg-danger  text-white p-3">
                    <h2>Total projects:</h2>
                    <span class="h4">0000</span>
                </div>
            </div>
            <div class="col">
                <div class="shadow border rounded bg-info text-white p-3">
                    <h2>Total projects:</h2>
                    <span class="h4">0000</span>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12">
                <div class="shadow border rounded bg-light text-white p-3">
                    <div class="small">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>

</style>
<script>

  export default {
    components: {
    },
    data () {
      return {
        datacollection: null
      }
    },
    mounted () {
      this.fillData()
    },
    methods: {
      fillData () {
        this.datacollection = {
          labels: [this.getRandomInt(), this.getRandomInt()],
          datasets: [
            {
              label: 'Data One',
              backgroundColor: '#f87979',
              data: [this.getRandomInt(), this.getRandomInt()]
            }, {
              label: 'Data One',
              backgroundColor: '#f87979',
              data: [this.getRandomInt(), this.getRandomInt()]
            }
          ]
        }
      },
      getRandomInt () {
        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
      }
    }
  }
</script>
