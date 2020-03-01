<template>
    <div>
        <div class="col-12 col-md-7 mx-auto ">
                <div class="form-wrap">
                    <p class='pl-4 mb-2'>Tamaño Empresa ( valor de la UF actual es de : $ {{formateador(uf)}} CLP ) </p>
                    <select v-model="tamanio" name="user-tamanio" class="form-input">
                        <option selected="selected" disabled value="">Seleccione un tamaño de empresa</option>
                        <option  v-for="(t, indexx) of tamanio_empresa" :key="indexx" v-bind:value="t.id">{{t.nombre}} : Minimo ($ {{formateador( ((uf*parseFloat(t.ventaMinima)).toFixed(0)) )}} CLP) - Maximo ($ {{formateador( ((uf*parseFloat(t.ventaMaxima)).toFixed(0)) )}} CLP)</option>
                    </select>
                    <p id="error_tipo_empresa" class="text-danger my-0 pb-1 pl-4">&nbsp</p>
                </div>
        </div>     
    </div>
</template>

<script>
    export default {
        data(){
            return {
                uf: 0,
                tamanio_empresa: [],
                tamanio: ''
            }
        },
        mounted(){
            this.getUf();
        },
        methods:{
            getUf(){
                axios.get('/regiones/provincias/ciudades').then(res =>{
                        this.tamanio_empresa = res.data.tamanio_empresa
                        }) 
                fetch('https://mindicador.cl/api')
                    .then(response => response.json())
                    .then((json) => {
                    this.uf = json.uf.valor
                })
            },
            formateador(number){
                return new Intl.NumberFormat("de-DE").format(number);                                 
            }
        }

    }
</script>