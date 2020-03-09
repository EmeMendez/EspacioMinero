<template>
    <div>
       <span v-for="(tag,index_tag) in proveedor_tags" :key="index_tag + 'tag'" class="badge badge-primary py-1 mt-2 mr-2 font-weight-light" style="border-radius:5px;font-size:10px">{{tag.nombre}}</span>
    </div>
</template>
<script>
export default {
    data(){
        return{
            proveedor_tags: []
        }
    },
    mounted(){
        this.getTagsByProveedor();
    },
    props:{
        proveedor_rut: null
    },
   
    methods:{
        getTagsByProveedor(){
            axios.get('/proveedor_tag/'+ this.proveedor_rut).then(res=>{
                this.proveedor_tags = res.data
            })
        }
    }
}
</script>