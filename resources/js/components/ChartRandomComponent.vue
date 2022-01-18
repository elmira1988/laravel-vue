<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="100" :options="{responive:true, maintainAspectRatio: true}"></line-chart>
                <button @click="update" class="btn btn-primary btn-xs text mt-1 mh-10">обновить</button>
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
            console.log('ChartRandomComponent mounted.');
        },
        methods:{
            update:function(){
                axios.get('/home/random-chart').then((response) =>
                {
                    console.log(response.data);
                    this.data = response.data;
                })
            }
        }

    }
</script>
