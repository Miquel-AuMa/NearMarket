<template>
  <div class="login">
    <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
      <el-form-item label="Nombre" prop="name">
        <el-input type="text" v-model="ruleForm.name" auto-complete="off" />
      </el-form-item>
      <el-form-item label="Contraseña" prop="pass">
        <el-input type="password" v-model="ruleForm.pass" autocomplete="off" />
      </el-form-item>
      <el-form-item style="text-align: right">
        <span class="lostPass" @click="dialogVisible = true">He perdido la contraseña</span>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="submitForm('ruleForm')">Enviar</el-button>
        <el-button @click="resetForm('ruleForm')">Borrar todo</el-button>
      </el-form-item>
    </el-form>
    <el-dialog
      title="Recuperar contraseña"
      :close-on-click-modal="false"
      :close-on-press-escape="false"
      :show-close="false"
      :visible.sync="dialogVisible">
      <span>Ingrese su telefono</span>
      <el-form>
        <el-form-item label="Telefono">
          <el-input type="text" v-model="lostPhone" auto-complete="off" />
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
    <el-button @click="dialogVisible = false">Cancelar</el-button>
    <el-button type="primary" @click="dialogVisible = false">Confirmar</el-button>
  </span>
    </el-dialog>
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
      lostPhone: '',
      dialogVisible: false,
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

        const response = await this.$store.dispatch('session/login', payload)

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
<style scoped>
  .lostPass {
    font-size: 12px;
    color: #6292e8;
    cursor: pointer;
  }
  .lostPass:hover {
    color: #01018e;
  }
</style>
