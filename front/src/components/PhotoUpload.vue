<template>
  <el-upload
    ref="upload"
    :action="uploadUrl"
    :auto-upload="true"
    :show-file-list="false"
    :on-success="handleSuccess"
    :data="postData"
  >
    <el-image :src="photoUrl" class="image-placeholder">
      <div slot="error">
        <i class="el-icon-picture-outline"></i>
      </div>
    </el-image>
  </el-upload>
</template>

<script>
export default {
  name: 'PhotoUpload',
  props: {
    uploadUrl: {
      default: null
    },
    postData: {
      default: () => {
        return {}
      }
    }
  },
  data () {
    return {
      photoUrl: this.postData.photo
    }
  },
  updated () {
    this.photoUrl = this.postData.photo || null
  },
  methods: {
    submit () {
      this.$refs.upload.submit()
    },
    handleSuccess (response) {
      this.$emit('success', response)
    }
  }
}
</script>

<style scoped>
  .image-placeholder {
    width: 85vw;
    min-height: 250px;
    line-height: 250px;
  }
</style>
