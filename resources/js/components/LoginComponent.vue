<template>
    <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="login()">
                            <div class="card-header">Login</div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" v-model="form.email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" v-model="form.password" type="password" class="form-control " name="password" required autocomplete="current-password">
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" >
                                        Recordar Contraseña
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <span>Aun no te has registrado</span><router-link to="/registro">Registro</router-link>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name: 'Login',
       data(){
           return {
               user: {},
               form: {email: '', password: ''},
           }
       },
       methods: {
            async login(){
               if(this.form.email =='' &&  this.form.password == ''){
                   alert('Debes completar todos los campos')
                   return
               }
               //await this.$store.dispatch('login', this.form);
                this.$store.dispatch('login/login', this.form)
                //this.$router.push({name: 'dashboard'})
           }
       }
    }
</script>

<style scoped>

</style>
