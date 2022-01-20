<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="100" :options="{responive:true, maintainAspectRatio: true}"></line-chart>
            </div>
            <input type="checkbox" v-model="realtime"> realtime
            <input type="text" v-model="label">
            <input type="text" v-model="sale">
            <button @click="sendData" class="btn btn-primary text mt-1 mh-100"> Обновить</button>
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
                data:[],
                realtime:false,
                label:"",
                sale: 500
            }
        },
        mounted() {
            //Добавляем клиент для связи с сервером
            let socket = io.connect('http://localhost:3000',{transports: ['websocket']} );//{transports: ['websocket', 'polling', 'flashsocket']}
            console.log(socket);

            socket.on('connect', function() {
                console.log("Connected to WS server");

                console.log(socket.connected);
            });

            var app = this;
            //событие, которое нужно отлавливать
            socket.on("new-action:App\\Events\\NewEvent", function(data){
                app.data = data.result;
            });

            this.update();
            console.log('LineChartComponent mounted.');
        },
        methods:{
            update:function(){
                axios.get('/home/socket-chart').then((response) =>
                {
                    console.log(response);
                    this.data = response.data;
                })
            },

            sendData:function(){
                axios({ method: 'get',
                    url: "/home/socket-chart",
                    params: {
                        label: this.label,
                        sale: this.sale,
                        realtime: this.realtime
                    }
                }).then((response) =>
                {
                    console.log(response);
                    this.data = response.data;
                })
            }
        }

    }
</script>
