<template>
  
                <div class="image-container">
                    <img class="proveedor-image" :src="imagensita"/>
                    <div class="middle">
                      <button class="btn btn-primary text">Cambiar mi Logo</button>
                      <input @change="getImagen" type="file" accept=".png, .jpeg, .jpg"/>
                    </div>            
                </div>     
</template>

<script>
    export default {
        data(){
            return {
                imagenMiniatura: '/storage/default-avatar-image.png' ,
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
