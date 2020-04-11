<template>
<div>
  <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
    <el-form-item label="Nombre" prop="name">
      <el-input type="text" v-model="ruleForm.name" autocomplete="off" />
    </el-form-item>
    <el-form-item label="Apellidos" prop="surname">
      <el-input type="text" v-model="ruleForm.surname" autocomplete="off" />
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
    <el-form-item label="Contraseña" prop="pass">
      <el-input type="password" v-model="ruleForm.pass" autocomplete="off"></el-input>
    </el-form-item>
    <el-form-item label="Confirmar" prop="checkPass">
      <el-input type="password" v-model="ruleForm.checkPass" autocomplete="off"></el-input>
    </el-form-item>
    <el-form-item>
      <el-button type="primary" @click="submitForm('ruleForm')">Enviar</el-button>
      <el-button @click="resetForm('ruleForm')">Borrar todo</el-button>
    </el-form-item>
  </el-form>
</div>
</template>

<script>
export default {
  name: 'User',
  data () {
    const valueEmpty = (rule, value, callback) => {
      if (!value) {
        return callback(new Error('Please input the age'))
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
      ruleForm: {
        name: '',
        surname: '',
        phone: '',
        street: '',
        location: '',
        cp: '',
        pass: '',
        checkPass: ''
      },
      rules: {
        name: [
          { validator: valueEmpty, trigger: 'blur' }
        ],
        surname: [
          { validator: valueEmpty, trigger: 'blur' }
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
        ],
        pass: [
          { validator: validatePass, trigger: 'blur' }
        ],
        checkPass: [
          { validator: validatePass2, trigger: 'blur' }
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

</style>
