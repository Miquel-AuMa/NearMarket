<template>
  <el-form
    :model="product"
    :rules="rules"
    ref="productForm"
  >
    <el-form-item
      label="Nombre"
      prop="name"
    >
      <el-input
        v-model="product.name"
        type="text"
      />
    </el-form-item>
    <el-form-item
      label="Descripción"
      prop="description"
    >
      <el-input
        v-model="product.description"
        type="textarea"
      />
    </el-form-item>
    <el-form-item
      label="Categoría"
      prop="category"
    >
      <el-select
        v-model="product.category"
        value-key="id"
        filterable
      >
        <el-option
          v-for="category in categories"
          :key="category.id"
          :label="category.name"
          :value="category"
        />
      </el-select>
    </el-form-item>
    <el-form-item
      label="Precio"
      prop="price"
    >
      <el-input v-model.number="product.price" type="number"/>
    </el-form-item>
    <el-form-item
      label="Disponibilidad"
      prop="available"
    >
      <el-radio-group v-model="product.available">
        <el-radio-button :label="true">Disponible</el-radio-button>
        <el-radio-button :label="false">No disponible</el-radio-button>
      </el-radio-group>
    </el-form-item>
    <PhotoUpload
      :extra-data="product"
      :upload-url="urlUpload"
      @success="handlePhotoUploadSuccess"
    />
    <el-form-item>
      <el-button
        type="primary"
        @click="submit"
      >
        Guardar producto
      </el-button>
    </el-form-item>
  </el-form>
</template>

<script>
import PhotoUpload from '../PhotoUpload'

export default {
  name: 'Form',
  props: {
    product: {
      default: {}
    }
  },
  data () {
    return {
      urlUpload: 'https://jsonplaceholder.typicode.com/posts/',
      categories: [],
      rules: {
        name: [
          { required: true, trigger: 'blur', message: 'El nombre es obligatorio' }
        ],
        description: [
          { required: true, trigger: 'blur', message: 'La descipción es obligatoria' }
        ],
        category: [
          { required: true, trigger: 'blur', message: 'La categoría es obligatoria' }
        ],
        price: [
          { required: true, type: 'number', trigger: 'blur', message: 'La categoría es obligatoria' }
        ]
      }
    }
  },
  mounted () {
    this.getCategories()
  },
  methods: {
    submit () {
      this.$refs.productForm.validate((valid) => {
        if (valid) {
          this.$emit('submit', { ...this.product, category: this.product.category.id })
        } else {
          return false
        }
      })
    },
    handlePhotoUploadSuccess (response) {
      this.product.photo = response.url
      console.log('Success' + JSON.stringify(response))
    },
    getCategories () {
      setTimeout(() => {
        this.categories = [
          { id: 1, name: 'Pan', description: '' },
          { id: 2, name: 'Leche', description: '' }
        ]
      }, 500)
    }
  },
  components: {
    PhotoUpload
  }
}
</script>

<style scoped>
  .el-select {
    width: 100%;
  }
</style>
