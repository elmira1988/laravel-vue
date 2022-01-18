<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <pie-chart :chart-data="data" :height="100" :options="{responive:true, maintainAspectRatio: true}"></pie-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import PieChart from './PieChart'
    export default {
        components:
            {
                PieChart
            },
        data:function(){
            return {
                data:[]
            }
        },
        mounted() {
            this.update();
            console.log('LineChartComponent mounted.');
        },
        methods:{
            update:function(){
                axios.get('/home/data-chart').then((response) =>
                {
                    console.log(response);
                    this.data = response.data;
                })
            }
        }

    }
</script>
