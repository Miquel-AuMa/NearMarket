<template>
<div>
  <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="180px" class="demo-ruleForm">
    <el-form-item label="Tipo de comercio" prop="formShopType">
      <el-select v-model="ruleForm.shopType" :value="ruleForm.shopType" placeholder="Select" class="spadding">
        <el-option
          v-for="item in shopType"
          :key="item.value"
          :label="item.label"
          :value="item.value">
        </el-option>
      </el-select>
    </el-form-item>
    <el-form-item label="Telefono" prop="phone" >
      <el-input type="text" v-model="ruleForm.phone" autocomplete="off" />
    </el-form-item>
    <el-form-item label="Calle" prop="street" >
      <el-input type="text" v-model="ruleForm.street" autocomplete="off" />
    </el-form-item>
    <el-form-item label="Localidad" prop="location" >
      <el-input type="text" v-model="ruleForm.location" autocomplete="off" />
    </el-form-item>
    <el-form-item label="Codigo Postal" prop="cp" >
      <el-input type="text" v-model="ruleForm.cp" autocomplete="off" />
    </el-form-item>
    <el-form-item label="Password" prop="pass">
      <el-input type="password" v-model="ruleForm.pass" autocomplete="off"></el-input>
    </el-form-item>
    <el-form-item label="Confirm" prop="checkPass">
      <el-input type="password" v-model="ruleForm.checkPass" autocomplete="off"></el-input>
    </el-form-item>
    <el-row :gutter="10">
      <el-col :xs="24" :sm="24" :md="12" :lg="6" :xl="6">
        <el-form-item>
          <el-checkbox v-model="ruleForm.cast" >Envio a domicilio</el-checkbox>
        </el-form-item>
      </el-col>
      <el-col :xs="24" :sm="24" :md="12" :lg="18" :xl="18">
        <el-form-item label="Horario Mañana">
        <el-time-picker
          is-range
          v-model="ruleForm.horarioInicio"
          range-separator="To"
          start-placeholder="Start time"
          end-placeholder="End time">
        </el-time-picker>
        </el-form-item>
        <el-form-item label="Horarios Tarde">
        <el-time-picker
          is-range
          arrow-control
          v-model=ruleForm.horarioFinal
          range-separator="To"
          start-placeholder="Start time"
          end-placeholder="End time">
        </el-time-picker>
        </el-form-item>
      </el-col>
    </el-row>
    <el-form-item>
      <el-button type="primary" @click="submitForm('ruleForm')">Enviar</el-button>
      <el-button @click="resetForm('ruleForm')">Borrar todo</el-button>
    </el-form-item>
  </el-form>
</div>
</template>

<script>
export default {
  name: 'Trade',
  data () {
    const valueEmpty = (rule, value, callback) => {
      if (!value) {
        return callback(new Error('Please input the age'))
      } else {
        callback()
      }
    }
    const validationShopType = (rule, value, callback) => {
      if (this.ruleForm.shopType === 'none') {
        callback(new Error('Please input the shop type'))
      } else {
        callback()
      }
    }
    const validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the password'))
      } else {
        if (this.ruleForm.checkPass !== '') {
          this.$refs.ruleForm.validateField('checkPass')
        }
        callback()
      }
    }
    const validatePass2 = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the password again'))
      } else if (value !== this.ruleForm.pass) {
        callback(new Error('Two inputs don\'t match!'))
      } else {
        callback()
      }
    }
    return {
      shopType: [
        {
          value: '',
          label: 'Eliga tipo de comercio'
        },
        {
          value: 'bakery',
          label: 'Panaderia'
        },
        {
          value: 'market',
          label: 'Supermercado'
        }
      ],
      ruleForm: {
        pass: '',
        checkPass: '',
        shopType: 'none',
        phone: '',
        street: '',
        location: '',
        cp: '',
        cast: false,
        horarioInicio: [new Date(2016, 9, 10, 8, 40), new Date(2016, 9, 10, 9, 40)],
        horarioFinal: [new Date(2016, 9, 10, 8, 40), new Date(2016, 9, 10, 9, 40)]
      },
      rules: {
        pass: [
          { validator: validatePass, trigger: 'blur' }
        ],
        checkPass: [
          { validator: validatePass2, trigger: 'blur' }
        ],
        formShopType: [
          { validator: validationShopType, trigger: 'blur' }
        ],
        phone: [
          { validator: valueEmpty, trigger: 'blur' }
        ],
        street: [
          { validator: valueEmpty, trigger: 'blur' }
        ],
        location: [
          { validator: valueEmpty, trigger: 'blur' }
        ],
        cp: [
          { validator: valueEmpty, trigger: 'blur' }
        ]
      }
    }
  },
  methods: {
    submitForm (formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          alert('submit!')
        } else {
          console.log('error submit!!')
          return false
        }
      })
    },
    resetForm (formName) {
      this.$refs[formName].resetFields()
    }
  }
}
</script>

<style scoped>
.el-select {
  width: 100%;
}
</style>

