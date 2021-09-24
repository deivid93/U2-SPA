<template>
    <div class="container main">
        <div class="card">
            <div class="card-header d-flex">
                <h1 class="justify-content-start flex-grow-1 mt-3 p-2"><b>SISTEMA DE INVENTARIOS</b></h1>
                <div class="justify-content-end p-2"><i class="float-right far fa-user fa-4x"></i></div>
            </div>
            <div class="card-body">
                <ol class="breadcrumb">
                    <li @click="buscar" class="breadcrumb-item">
                        <a class="">Buscar Pedidos</a>
                    </li>
                        
                    <li @click="preparacion" class="breadcrumb-item" >
                        <a  class="">Preparacion de Pedidos</a>
                    </li>

                    <li class="breadcrumb-item" >
                        <a @click="logout" class="">Cerrar Sesion</a>
                    </li>
                </ol>
                <hr>

                <div v-if="isBuscar">
                    <h3 class="text-center mb-5">Buscar Pedido por fecha</h3>
                    <div class="row">
                        <div class="col-4">
                            <form enctype="multipart/form-data" @submit.prevent="buscarPedido" class="form-group" >
                                <div class="form-group">
                                    <date-picker v-model="date" mode="date" >            
                                    </date-picker>
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>
                        <div class="col-8">
                            <div v-if="pedidos.length">
                                <div v-for="pedido in pedidos" >
                                    <div class="caption">
                                    <h3 style="background: green"><b>ID Pedido:</b>  {{pedido.id}}</h3>
                                    <p><b>Descripcion Pedido: </b> {{pedido.desc}}</p>
                                    <p><b>Cantidad: </b>{{pedido.cantidad}}</p>
                                    <p><b>Fecha de Entrega: </b><span style="color:red;">{{pedido.fecha_entrega}}</span></p>
                                    <hr>
                                    <div v-if="pedido.productos.length">
                                        <div v-for="producto in pedido.productos" >
                                            <div class="caption">
                                                <h3><b>ID PRODUCTO: </b> {{producto.id}}</h3>
                                                <p><b>CODIGO: </b> {{producto.codigo}}</p>
                                                <p><b>NOMBRE: </b> {{producto.nombre}}</p>
                                                <p><b>DESCRIPCION: </b> {{producto.desc}}</p>
                                                <p><b>MARCA: </b> {{producto.marca}}</p>
                                                <p><b>PRECIO: </b><span style="color:green">${{producto.precio}}</span></p>
                                                <hr>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div v-else>
                                <span>No se encontaron resultados para la busqueda</span>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>

                <div v-else >
                    <h3 class="text-center mb-5">Stock Productos</h3>
                    <div class="row">
                        <div class="col-4">
                            <form enctype="multipart/form-data" @submit.prevent="buscarInventario" class="form-group" >
                                <div class="form-group">
                                    <label for="">Seleccionar Id Pedido</label>
                                    <select class="form-control" v-model="selected">
                                        <option disabled value="">Seleccione un elemento</option>
                                        <option v-for="p in total_pedidos" v-bind:value="p.id">{{p.id}}</option>
                                    </select>
                                </div> 
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>
                        <div class="col-8">
                            <div v-if="id_pedido.length">
                                <div v-for="pedido in id_pedido" >
                                    <div class="caption">
                                    <h3 style="background: green"><b>ID Pedido:</b>  {{pedido.id}}</h3>
                                    <p><b>Descripcion Pedido: </b> {{pedido.desc}}</p>
                                    <p><b>Cantidad: </b>{{pedido.cantidad}}</p>
                                    <p><b>Fecha de Entrega: </b><span style="color:red;">{{pedido.fecha_entrega}}</span></p>
                                    <hr>
                                    <div v-if="pedido.productos.length">
                                        <div v-for="producto in pedido.productos" >
                                            <div class="caption">
                                                <div class="row">
                                                    <div class="col-5"><h3><b>ID PRODUCTO: </b> {{producto.id}}</h3></div>
                                                    <div class="col-4">
                                                        <h3><b>STOCK:</b> 
                                                        <span style="color:red" v-if="producto.stock <= 0">
                                                            {{producto.stock}}
                                                        </span>
                                                        <span style="color:green" v-else>{{producto.stock}}</span>
                                                        </h3>
                                                    </div>
                                                    <div v-if="producto.stock <= 0" class="col-3">
                                                        <button class="btn btn-success" @click="searchProveedor(producto.id)">Proveedores</button>
                                                        <br>
                                                        <span>{{proveedores.nombre}}</span>
                                                    </div>
                                                </div>
                                                
                                                <p><b>CODIGO: </b> {{producto.codigo}}</p>
                                                <p><b>NOMBRE: </b> {{producto.nombre}}</p>
                                                <p><b>DESCRIPCION: </b> {{producto.desc}}</p>
                                                <p><b>MARCA: </b> {{producto.marca}}</p>
                                                <p><b>PRECIO: </b><span style="color:green">${{producto.precio}}</span></p>
                                                <hr>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div v-else>
                                <span>No se encontaron resultados para la busqueda</span>
                            </div>
                            
                        </div>
                    </div>
                </div>


            </div>
            <!-- Modal-->
            <div class="modal fade" tabindex="-1" role="dialog" id="propietario" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nuevo Propietario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Calendar from 'v-calendar/lib/components/calendar.umd'
    import DatePicker from 'v-calendar/lib/components/date-picker.umd'
    Vue.component('calendar', Calendar)
    Vue.component('date-picker', DatePicker)
    export default {
       components:{
           Calendar,DatePicker
       },
       name: 'Main',
       data(){
           return {
               isBuscar: false,
               isPreparacion: false,
               fecha_entrega: '',
               date: new Date(),
               token: '',
               user: null,
               pedidos: '',
               id_pedido:'',
               total_pedidos:'',
               selected: '',
               proveedores: ''
           }
       },
       
        created() {
            this.isBuscar = true,
            this.isPreparacion = false,
            this.token = localStorage.getItem('user')

        },
        mounted(){
            axios.get('/api/pedidosAll').then(res => {
                        this.total_pedidos = res.data.pedidos
                        console.log(this.total_pedidos);
                    });
        },
       methods: {
            logout(){
                const token = this.token;
                const config = {
                    withCredentials: true,
                    headers: { Authorization: `Bearer ${token}` }
                };  

                axios.get('/api/csrf-cookie').then(response => {
                    console.log(response);
                    axios.post('/api/signout').then(res => {
                        console.log(res);
                        localStorage.removeItem('user')
                        this.$router.push("/login")    
                    });
                });
                
            },
            buscar(){
                this.isBuscar = true
                this.isPreparacion = false
            },
            preparacion(){
                this.isBuscar = false
                this.isPreparacion = true
            },
            buscarPedido(){
                var dia, mes,fecha;
                (this.date.getDate() < 10)? dia = '0'+this.date.getDate() : dia = this.date.getDate();
                ((this.date.getMonth() + 1) < 10)? mes = '0'+(this.date.getMonth() + 1) : mes = this.date.getMonth() + 1
                fecha = this.date.getFullYear() + "-"+ mes +"-" +dia   
                const token = this.token
                const config = {
                    withCredentials: true,
                    fecha: fecha,
                    headers: { Authorization: `Bearer ${token}` }
                }; 
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/pedidos',{fecha: fecha}).then(response => {
                    //console.log(response.data.pedidos);
                    this.pedidos = response.data.pedidos
                    }).catch(error => {
                        console.log(error)
                    });
                }); 
            },
            buscarInventario(){
                this.proveedores = ''
                const token = this.token
                const config = {
                    withCredentials: true,
                    headers: { Authorization: `Bearer ${token}` }
                }; 
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/pedidos',{id: this.selected}).then(response => {
                        
                    this.id_pedido = response.data.pedidos
                    }).catch(error => {
                        console.log(error)
                    });
                }); 
            },
            searchProveedor(producto_id){
                console.log(producto_id)
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/proveedores',{producto: producto_id}).then(response => {
                    this.proveedores = response.data.proveedores
                    }).catch(error => {
                        console.log(error)
                    });
                }); 
            }


        }
    }
</script>

<style scoped>

</style>
