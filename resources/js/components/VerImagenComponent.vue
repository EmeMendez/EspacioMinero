<template>
    <div>
        <div class="form-wrap">
            <input @change="getImagen" class="form-input" id="user-imagen" type="file" name="user-imagen">
        </div>
        <img :src="imagensita" height="100" width="100">
    </div> 
</template>


<script>
    export default {
        data(){
            return {
                imagenMiniatura: '/storage/default-avatar.png' ,
                imagen: ''
            }
        },
        methods:{
            getImagen(e){
                let file = e.target.files[0]; 
                this.imagen = file;
                this.cargarImagen(file);
                },
            cargarImagen(file){
                let reader = new FileReader();
                reader.onload = (e) =>{
                    this.imagenMiniatura=e.target.result;
                    }
                reader.readAsDataURL(file);                  
            }
        },
        computed:{
            imagensita(){
                return this.imagenMiniatura;
            }
        }
    }
</script>