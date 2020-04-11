<template>
  <el-form
    :model="category"
    :rules="rules"
    ref="categoryForm"
  >
    <el-form-item
      label="Nombre"
      prop="name"
    >
      <el-input
        v-model="category.name"
        type="text"
      />
    </el-form-item>
    <el-form-item
      label="Descripción"
      prop="description"
    >
      <el-input
        v-model="category.description"
        type="textarea"
      />
    </el-form-item>
    <el-form-item>
      <el-button type="primary" @click="submit()">Guardar categoría</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
export default {
  name: 'Create',
  data () {
    return {
      uploadUrl: '',
      imageUrl: null,
      category: {
        name: '',
        description: ''
      },
      rules: {
        name: [
          { required: true, trigger: 'blur', message: 'El nombre es obligatorio' }
        ],
        description: [
          { required: true, trigger: 'blur', message: 'La descripción es obligatorio' }
        ]
      }
    }
  },
  methods: {
    submit () {
      this.$refs.categoryForm.validate((valid) => {
        if (valid) {
          console.log('Submit')
        } else {
          console.log('error submit!!')
          return false
        }
      })
    }
  }
}
</script>
