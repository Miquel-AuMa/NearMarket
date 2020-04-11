<template>
<div>
  <Shop :external="true" :external-shop="example" />
</div>
</template>

<script>
import Shop from './FormShop'
export default {
  name: 'Edit',
  components: { Shop },
  data () {
    return {
      example: {
        pass: '',
        checkPass: '',
        shopType: 'bakery',
        phone: '099 8899',
        street: 'Calle',
        location: 'Localidad',
        cp: '08800',
        cast: true,
        horarioInicio: [new Date(2016, 9, 10, 8, 40), new Date(2016, 9, 10, 9, 40)],
        horarioFinal: [new Date(2016, 9, 10, 8, 40), new Date(2016, 9, 10, 9, 40)]
      }
    }
  }
}
</script>
