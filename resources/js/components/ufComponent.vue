<template>
  
            <div class="col-12 col-md-7 mx-auto ">
                    <div class="form-wrap">
                        <p class='pl-4 mb-2'>Tamaño Empresa ( valor de la UF actual es de : {{uf}} ) </p>
                        <select name="user-tamanio" class="form-input">
                            <option v-for="(t, indexx) of tamanio_empresa" :key="indexx"  value="t.id">{{t.nombre}} : Minimo ($ {{formateador( ((uf*parseFloat(t.minimo)).toFixed(0)) )}} CLP) - Maximo ($ {{formateador( ((uf*parseFloat(t.maxima)).toFixed(0)) )}} CLP)</option>
                       </select>                         
                        <select @change="hola()"  name="user-tamanio" id="region">
                            <option v-for="t in regiones" :key="t.id"  value="n.id">{{t.nombre}}</option>
                       </select> 
                        <select  name="user-tamanio">
                            <option v-for="p in provincias" :key="p.id" value="">{{p.nombre}}</option>
                        </select> 
                        <select  name="user-tamanio" id="">
                            <option v-for="c in ciudades" :key="c.id" value="">{{c.nombre}}</option>
                        </select>                                           
                    </div>
            </div>

</template>

<script>
    export default {
        data(){
            return {
                uf: 0,
                regiones: [],
                provincias: [],
                ciudades: [],
                tamanio_empresa: [],
                regionSelected: null
            }
        },
        mounted(){
            this.getUf();
        },
        methods:{
            getUf(){
                axios.get('/regiones/provincias/ciudades').then(res =>{
                        this.regiones = res.data.regiones
                        this.provincias = res.data.provincias
                        this.ciudades = res.data.ciudades
                        this.tamanio_empresa = res.data.tamanio_empresa
                        console.log(this.regiones)
                        console.log(this.provincias)
                        console.log(this.ciudades)
                        console.log(this.tamanio_empresa)

                        }) 
                fetch('https://mindicador.cl/api')
                    .then(response => response.json())
                    .then((json) => {
                    this.uf = json.uf.valor
                })
            },
            formateador(number){
                return new Intl.NumberFormat("de-DE").format(number);                                 
            },
            hola(){
               var  region = document.getElementById('region').value;
               alert(region); 
            }
        }

        

        

    }
</script>
