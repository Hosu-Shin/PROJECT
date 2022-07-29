<template>
<main>
    <div>

      <div>
        <div>
          <div>
            <select class="form-select" @click="SubAreaChange()">
              <option value="" selected>시/도 선택</option>
              <option value="{{ item }}" v-for="item in RestArea" :key="item">
                <!-- {{ item }} -->
              </option>
            </select>
            </div>
          <div>
            <select class="form-select">
              <option value="" selected>구/군 선택</option>
              <option value="" v-for="item in SubArea" :key="item">
                {{ item }}
              </option>
            </select>
          </div>

        </div>
      </div>

 
    
  </div>
</main>
</template>

<script>

export default {
  components: {
  },
  data() {
    return {
      //지역
      RestArea: [],
      SubArea: [],

    };
  },
  computed: {
  },
  created() {
    //지역
    this.getRestArea()
  },
  updated() {
    this.getRestArea()
  },
  methods: {
    //지역
    async getRestArea() {
        const Addr = await this.$get('api/selArea', {})
        
        for(let i=0; i<Addr.length; i++){
            let Addr1 = Addr[i].area1
            let Addr2 = Addr[i].area2
            let Addr3 = Addr[i].area3
            
            this.RestArea.push(Addr1);

            if(Addr[i].area2 !== '' && Addr[i].area3 !== '') {
              this.SubArea.push(Addr2+'/'+Addr3);
            } else {
              this.SubArea.push(Addr2,Addr3);
            }
        }
      this.RestArea = Array.from(new Set(this.RestArea))
      this.SubArea = Array.from(new Set(this.SubArea))
    },


  }
}
</script>
