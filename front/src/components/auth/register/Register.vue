<template>
  <div>
    <user :validate="false" @isShop="cambio" ref="user" />
    <trade v-if="isShop" :validate="false" ref="trade" />
    <el-form>
      <el-form-item>
      <el-button type="primary" @click="submitForm">Enviar</el-button>
      <el-button @click="resetForm">Borrar todo</el-button>
    </el-form-item>
    </el-form>
  </div>
</template>

<script>
import trade from '../../shop/FormShop'
import user from '../../user/FormUser'

export default {
  name: 'register',
  components: { trade, user },
  data () {
    return {
      isShop: false
    }
  },
  methods: {
    cambio (val) {
      this.isShop = val
    },
    resetForm () {
      this.$refs.user.resetForm('ruleForm')
      if (this.isShop) {
        this.$refs.trade.resetForm('ruleForm')
      }
    },
    submitForm () {
      const userValidate = this.$refs.user.validateForm('ruleForm')
      let tradeValidate = true
      if (this.isShop) {
        tradeValidate = this.$refs.trade.validateForm('ruleForm')
      }
      if (!userValidate || !tradeValidate) {
        return false
      }
      console.log('enviado')
    }
  }
}
</script>
<style scoped lang="scss">
  .spadding {
    padding: 20px;
  }
</style>
