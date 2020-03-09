<template>
    <div class="accordion" id="accordionProvincia">        <div v-for="(province,index_province) in provinces" :key="province.nombre + index_province" class="card">
            <div>
            <div class="card-header p-0" :id="'heading' +province.nombre">
                <h2 class="mb-0">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#collapse'+province.id" aria-expanded="true" :aria-controls="'collapse'+province.id">
                                <span class="small">{{province.nombre}}</span>
                            </button>
                        </div>
                        <div class="col-3">
                            <input class="small" type="checkbox">
                        </div>
                    </div>              
                </h2>
            </div>
            
            <div :id="'collapse'+province.id" class="collapse" :aria-labelledby="'heading' +province.nombre" data-parent="#accordionProvincia">
                <div class="card-body">
                    <ciudad-component :province="province.id"></ciudad-component>
                </div>
            </div>                          
            </div>
        </div>
    </div> 
</template>
<script>
export default {
    data(){
        return{
            provinces: []
        }
    },
    props:{
        region : null
    },
    mounted(){
        this.getProvinces();
    },
    methods:{
        getProvinces(){
            axios.get("/provincia/"+this.region).then(res=>{
                this.provinces=res.data
            })
        }
    }

}
</script>