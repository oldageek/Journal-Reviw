<template>
    <input type="submit" class="btn btn-danger d-block w-100 mb-1" value="Eliminar X" @click="eliminarArticulo">
</template>

<script>
    export default {
        props: ['articuloId'],
        methods: {
            eliminarArticulo() {
                this.$swal({
                    title: 'Desea eliminar este Articulo?',
                    text: "Una vez eliminado, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'SI',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.value) {
                        const params = {
                            id: this.articuloId
                        }

                        // Enviar una peticion al servidor
                        axios.post(`/articulos/${this.articuloId}`, {params, _method: 'delete'})
                            .then(respuesta => {
                                this.$swal({
                                    title: 'Articulo eliminada',
                                    text: 'Se elimino el articulo',
                                    icon: 'success'
                                })

                                // Eliminar articulo de DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error);
                            })
                    }
                })
            }
        }       
    }
</script>