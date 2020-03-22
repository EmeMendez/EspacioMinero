/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('proveedor-tags-component',require('./components/ProveedorTagsComponent.vue').default);
Vue.component('proveedores-component', require('./components/ListaProveedorComponent.vue').default);
Vue.component('imagen-component', require('./components/ImagenComponent.vue').default);
Vue.component('uf-component', require('./components/ufComponent.vue').default);
Vue.component('select-ciudad-component', require('./components/SelectCiudadComponent.vue').default);
Vue.component('imagen-minera-component', require('./components/ImagenMineraComponent.vue').default);
Vue.component('certificacion-component', require('./components/CertificacionComponent.vue').default);
Vue.component('provincia-component', require('./components/ProvinciaComponent.vue').default);
Vue.component('ciudad-component', require('./components/CiudadComponent.vue').default);
Vue.component('add-delete-proveedor-tags-component',require('./components/AddDeleteProveedorTagsComponent.vue').default);
Vue.component('mineras-component',require('./components/ListaMineraComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
const tags = new Vue({
    el: '#tags',
});
const ciudad = new Vue({
    el: '#ciudad',
});
const certificacion = new Vue({
    el: '#certificacion',
});
