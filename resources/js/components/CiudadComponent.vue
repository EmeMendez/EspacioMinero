<template>
    <div> 
        <div v-for="(city,index_city) in cities" :key="index_city + 'city'" class="form-group form-check ml-4 mb-0">
            <input type="checkbox" class="form-check-input mb-0" id="exampleCheck1">
            <label class="form-check-label small" for="exampleCheck1">{{city.nombre}}</label>
        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return{
                cities : []
            }
        },
        props: {
            province : null,
        },
        mounted(){
            this.getCities();
        },
        methods:{
            getCities(){
               axios.get("/ciudad/"+this.province).then(res=>{
                   this.cities = res.data
               })
            }
        }


    }
</script>