<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>Ссылка</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="url in urldata">
                        <td>{{ url.title}}</td>
                        <td>{{ url.url}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'urldata'
        ],
        mounted() {
            console.log('PropComponent mounted.');
            this.update();
        },
        methods:{
            update:function(){
                console.log(this.urldata);
            }
        }

    }
</script>
