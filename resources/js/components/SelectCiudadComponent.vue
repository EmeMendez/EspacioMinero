<template>
    <div>
        <div class="col-12 col-md-7 mx-auto ">
                <div class="form-wrap">
                    <p class='pl-4 mb-2'>Región</p>
                    <select id="user_region" @change="getProvincias()" class="form-input" v-model="region">
                        <option selected="selected" disabled value="">Seleccione una Región</option>
                        <option v-bind:value="r.id" v-for="r in regiones" :key="r.id">{{r.nombre}}</option>
                    </select>
                    <p id="user_region_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>
                </div>
        </div>            

        <div class="col-12 col-md-7 mx-auto ">
                <div class="form-wrap">
                    <p class='pl-4 mb-2'>Provincia</p>
                    <select id="user_province"  @change="getCiudades()"  class="form-input" v-model="provincia">
                        <option selected disabled value="">Seleccione una Provincia</option>
                        <option v-bind:value="p.id" v-for="p in provincias" :key="p.id">{{p.nombre}}</option>
                    </select>
                    <p id="user_province_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>
                </div>
        </div> 

        <div class="col-12 col-md-7 mx-auto ">
                <div class="form-wrap">
                    <p class='pl-4 mb-2'>Ciudad</p>
                    <select id="user_city" class="form-input" v-model="ciudad" name="user-city">
                        <option disabled value="">Seleccione una Ciudad</option>
                        <option v-bind:value="c.id" v-for="c in ciudades" :key="c.id">{{c.nombre}}</option>
                    </select>
                    <p id="user_city_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                regiones: [],
                provincias: [],
                ciudades: [],
                region: '',
                provincia: '',
                ciudad: ''
            }
        },
        mounted(){
            this.getRegiones();
        },
        methods:{
            getRegiones(){
                axios.get('/regiones/provincias/ciudades').then(res =>{
                        this.regiones = res.data.regiones

                        })                 
            },
            getProvincias(){
                axios.get('/provincias/' + this.region).then(res =>{
                        this.provincia = ''
                        this.ciudad = ''
                        this.provincias = res.data.provincias
                        })
               getCiudades();         

            },
            getCiudades(){
                axios.get('/ciudades/'+ this.provincia).then(res =>{
                        this.ciudad = ''
                        this.ciudades = res.data.ciudades
                        })  
            }
        }

    }
</script>