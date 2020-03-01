<template>
  
            <div class="col-12 col-md-7 mx-auto ">
                    <div class="form-wrap">
                        <p class='pl-4 mb-2'>Tamaño Empresa       ( valor de la UF actual es de : {{uf}}) </p>
                        <select name="user-tamanio" id="">

                            <option value=""></option>

                        </select>
   
                                                                         
                    </div>
            </div>

</template>

<script>
    export default {
        data(){
            return {
                uf:0

            }
        },
        methods:{
            getUf(){
                fetch('https://mindicador.cl/api')
                .then(function(response) {
                    this.uf = response.uf.valor
                    return this.uf;
                })
            }

        },
        mounted(){
            this.getUf()
        }
    }
</script>
