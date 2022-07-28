<template>
<main>
    <div class="container">
      <div>
        <div>
          <select class="form-select">
            <option value="" selected>지역1</option>
            <option value="" v-for="item in RestArea" :key="item">
              {{ item }}
            </option>
          </select>
        </div>
      </div>
  </div>
</main>
</template>

<script>

export default {
  data() {
    return {
      RestArea: [],
    }
  },
  created() {
    this.getRestArea()
  },
  updated() {
    
  },
  methods: {
    async getRestArea() {
        const Addr = await this.$get('api/restArea', {})
        // console.log(Addr);
        
        
        for(let i=0; i<Addr.length; i++){
          let Addr1 = Addr[i].restAddr.split(' ');
          this.RestArea[i] = Addr1[0]
        }
          console.log(RestArea);
    },
  }
}
</script>
