<template>
    <div>
        <div class="form-wrap">
            <input @change="getImagen" class="form-input" id="user-imagen" type="file" name="user-imagen">
        </div>
        <img :src="imagensita" height="100" width="100">
    </div> 
</template>


