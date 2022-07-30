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

      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6" :key="ibobf" v-for="ibobf in BobfList">
          <div class="card" style="width: 18rem;">
            <a style="cursor:pointer;">
                <img
                    alt="이미지" class="card-img-top">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ ibobf.title }}</h5>
                <p class="card-text">
                    <span class="badge bd-dark text-black me-1">{{ ibobf.nick }}</span>
                </p>
                <p class="card-text">
                    <span class="badge bd-dark text-black" :key="item" v-for="item in BobfArea">{{ item[0] }}</span>
                    <span class="badge bd-dark text-black" :key="item" v-for="item in BobfArea">{{ item[1] }}</span>
                </p>
                    <span class="card-text badge bd-dark text-black">{{ ibobf.cur_mem }} / {{ ibobf.total_mem }}</span>
                <div class="d-flex justify-content-between align-ites-center">
                    <small class="text-dark">{{  }}</small>
                </div>
            </div>
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
      BobfList: [],
      BobfArea: [],
    };
  },
  computed: {
  },
  created() {
    //지역
    this.getRestArea(),
    this.selRestaurant()
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

    async selRestaurant() {
      this.BobfList = await this.$post('api/selRestaurant', {});

      const BobfArea = this.BobfList;

      for(let i=0; i<BobfArea.length; i++) {
        let Addr1 = BobfArea[i].rest_address.split(' '); 
        this.BobfArea.push(Addr1);
      }
    },
  }
}
</script>
