

<script>
import { Bar } from 'vue-chartjs'
import Axios from 'axios';

export default {
  extends: Bar,
  data: () => ({
    chartdata: {
      labels: [],
      datasets: [
        {
          label: 'Data One',
          backgroundColor: '#f87979',
          data: [1]
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  }),

  mounted () {
    this.renderChart(this.chartdata, this.options);
    this.getVisits();
  },
  methods:{
      getVisits(){
          axios.get("/api/visits").then((resp) => {
                resp.data.forEach(element => {
                   
                    this.chartdata['datasets'][0]['data'].push(element['count(views)']);
                    this.chartdata['labels'].push(element['MONTHNAME(created_at)']);
                    

                });
            });
      }
  }

}
</script>

<style>

</style>
