<template>
<div>
  <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="180px" class="demo-ruleForm">
    <el-form-item label="Nombre" prop="name">
      <el-input type="text" v-model="ruleForm.name" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item label="Apellidos" prop="surname">
      <el-input type="text" v-model="ruleForm.surname" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item label="Telefono" prop="phone" >
      <el-input type="text" v-model="ruleForm.phone" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item label="Calle" prop="street" >
      <el-input type="text" v-model="ruleForm.street" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item label="Localidad" prop="location" >
      <el-input type="text" v-model="ruleForm.location" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item label="Codigo Postal" prop="cp" >
      <el-input type="text" v-model="ruleForm.cp" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item label="Contraseña" prop="pass">
      <el-input type="password" v-model="ruleForm.pass" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item label="Confirmar" prop="checkPass">
      <el-input type="password" v-model="ruleForm.checkPass" autocomplete="off" :disabled="!edit"/>
    </el-form-item>
    <el-form-item v-if="!validate">
      <el-checkbox v-model="isShop" >¿Tiene Comercio?</el-checkbox>
    </el-form-item>
    <el-form-item v-if="validate">
      <el-button type="danger" @click="submitFormDelete('ruleForm')" v-if="!edit">Eliminar</el-button>
      <el-button type="success" @click="submitFormEdit('ruleForm')" v-if="edit && external">Update</el-button>
      <el-button type="primary" @click="submitForm('ruleForm')" v-if="edit && !external">Enviar</el-button>
      <el-button @click="resetForm('ruleForm')" v-if="edit">Borrar todo</el-button>
    </el-form-item>
  </el-form>
</div>
</template>

<script>
export default {
  name: 'User',
  props: {
    validate: {
      required: false,
      type: Boolean,
      default: false
    },
    edit: {
      required: false,
      type: Boolean,
      default: true
    },
    external: {
      required: false,
      type: Boolean,
      default: false
    },
    externalUser: {
      required: false,
      type: Object,
      default: () => { return {} }
    }
  },
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
      isShop: false,
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
  watch: {
    isShop: function (val) {
      this.$emit('isShop', val)
    }
  },
  mounted () {
    if (this.external) {
      this.ruleForm = this.externalUser
    }
  },
  methods: {
    validateForm (formName) {
      return this.$refs[formName].validate((valid) => {
        return valid
      })
    },
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
    submitFormEdit (formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          alert('submit!')
        } else {
          console.log('error submit!!')
          return false
        }
      })
    },
    submitFormDelete (formName) {
      // Enviar id al endpoint shop delete
    },
    resetForm (formName) {
      this.$refs[formName].resetFields()
    }
  }
}
</script>
