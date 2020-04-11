<template>
<div>
  <User :external="true" :external-user="example" :edit="false" :validate="true"/>
</div>
</template>

<script>
import User from './FormUser'
export default {
  name: 'Delete',
  components: { User },
  data () {
    return {
      example: {
        name: 'Nombre',
        surname: 'Apellidos',
        phone: '09 8899',
        street: 'Calle',
        location: 'Localizacion',
        cp: '08800'
      }
    }
  }
}
</script>

<style scoped>

</style>
