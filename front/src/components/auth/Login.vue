<template>
  <div>
    <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
      <el-form-item label="Nombre" prop="name">
        <el-input type="text" v-model="ruleForm.name" auto-complete="off" />
      </el-form-item>
      <el-form-item label="Contraseña" prop="pass">
        <el-input type="password" v-model="ruleForm.pass" autocomplete="off" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="submitForm('ruleForm')">Enviar</el-button>
        <el-button @click="resetForm('ruleForm')">Reset</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
export default {
  name: 'Login',

  data () {
    const validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the password'))
      } else {
        callback()
      }
    }

    const validateName = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the name'))
      } else {
        callback()
      }
    }

    return {
      ruleForm: {
        pass: '',
        name: ''
      },
      rules: {
        pass: [
          { validator: validatePass, trigger: 'blur' }
        ],
        name: [
          { validator: validateName, trigger: 'blur' }
        ]
      }
    }
  },

  methods: {
    submitForm (formName) {
      this.$refs[formName].validate(async (valid) => {
        if (!valid) {
          console.log('error submit!!')
          return false
        }

        const payload = {
          username: this.ruleForm.name,
          password: this.ruleForm.pass
        }

        const response = await this.$store('session/login', payload)

        if (!response.isOk) {
          console.log('error network', response)
          return false
        }

        this.$router.push({ name: 'Home' })
      })
    },

    resetForm (formName) {
      this.$refs[formName].resetFields()
    }
  }
}
</script>
