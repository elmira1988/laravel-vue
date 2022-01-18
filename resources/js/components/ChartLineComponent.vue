<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="100" :options="{responive:true, maintainAspectRatio: true}"></line-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart'
    export default {
        components:
            {
            LineChart
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
