<template>
  <el-upload
    ref="upload"
    :action="uploadUrl"
    :auto-upload="false"
    :show-file-list="false"
    :on-change="handlePreview"
    :on-success="handleSuccess"
    :file-list="files"
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
      photoUrl: this.postData.photo,
      files: []
    }
  },
  methods: {
    submitImageForm () {
      if (this.files.length === 0) {
        this.sendPostDataOnly()
      } else {
        this.sendPhotoWithExtraPostData()
      }
    },
    sendPostDataOnly () {
      console.log('Enviar por post ')
    },
    sendPhotoWithExtraPostData () {
      this.$refs.upload.submit()
    },
    handlePreview (file) {
      this.getBase64(file.raw).then(res => {
        this.photoUrl = res
        this.$emit('preview', file)
      })
    },
    handleSuccess () {
      this.$emit('success')
    },
    getBase64 (file) {
      return new Promise(function (resolve, reject) {
        const reader = new FileReader()
        let imgResult = ''
        reader.readAsDataURL(file)
        reader.onload = function () {
          imgResult = reader.result
        }
        reader.onerror = function (error) {
          reject(error)
        }
        reader.onloadend = function () {
          resolve(imgResult)
        }
      })
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
