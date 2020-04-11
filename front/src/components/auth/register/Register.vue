<template>
  <div>
    <el-select v-model="selectRegister" placeholder="Select" class="spadding">
      <el-option
        v-for="item in optionsRegister"
        :key="item.value"
        :label="item.label"
        :value="item.value">
      </el-option>
    </el-select>
    <error v-if="selectRegister==='none'"/>
    <trade v-if="selectRegister==='trade'"/>
    <user v-if="selectRegister==='user'"/>
  </div>
</template>

<script>
import error from './OptionNotSelect'
import trade from './Trade'
import user from './User'

export default {
  name: 'register',
  components: { error, trade, user },
  data () {
    return {
      selectRegister: 'none',
      optionsRegister: [
        {
          value: 'none',
          label: 'Eliga ocion'
        },
        {
          value: 'user',
          label: 'Usuario'
        },
        {
          value: 'trade',
          label: 'Comercio'
        }
      ]
    }
  }
}
</script>
<style scoped lang="scss">
  .spadding {
    padding: 20px;
  }
</style>
