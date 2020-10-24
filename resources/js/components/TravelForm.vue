<template>
    <div>
        <form @submit.prevent="submit" v-if="isAuthenticated">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Origen</label>
                        <input name="origen" v-model="origen" type="text" class="form-control mb-2" id="inputCoordenates" value="-25.321861, -57.544598">
                        <input class="btn btn-primary" type="button" value="Elegir">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname">Destino</label>
                        <input name="destino" v-model="destino" type="text" class="form-control mb-2" id="inputCoordenates" value="-25.286664, -57.611808">
                        <input class="btn btn-primary" type="button" value="Elegir">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Tipo de viajero</label>
                        <select name="tipo" v-model="tipo" class="form-control" id="exampleFormControlSelect1">
                            <option value="Elija una opción" disabled selected>Elija una opción</option>
                            <option>Conductor</option>
                            <option>Acompañante</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstname">Cantidad de acompañantes</label>
                        <select name="cantidad" v-model="cantidad" class="form-control" id="exampleFormControlSelect1">
                            <option value="Elija una opción" disabled selected>Elija una opción</option>
                            <option>0 - Si eres acompañante</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                        </select>
                    </div>
                </div>
                <textarea v-model="comentario" 
                        class="form-control" 
                        name="comentario" 
                        :placeholder="`¿Dónde querés ir hoy ${currentUser.name}?`"
                        required>
                </textarea>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary btn-lg" id="create-status">
                    <i class="fas fa-route mr-1"></i>
                    Viajar
                    </button>
            </div>
        </form>
        <div v-else class="card-body">
            <a href="/login">Debes loguearte para publicar!</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                origen: '',
                destino: '',
                tipo: '',
                cantidad: '',
                comentario: ''
            };
        },
        methods: {
            submit() {
                axios.post('/statuses', {
                        origen: this.origen,
                        destino: this.destino,
                        tipo: this.tipo,
                        cantidad: this.cantidad,
                        comentario: this.comentario
                    })
                    .then(res => {
                        //console.log(this.fields);
                        EventBus.$emit('status-created', res.data.data);
                        this.body = {}
                    })
                    .catch(err => {
                        console.log(err.response.data)
                    })
            }
        }
    }
</script>

<style>

</style>