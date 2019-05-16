<template>
  <div class="login-container">    
      <div class="login-form">
          <el-row :style="{marginBottom: '10px', height: '100px'}">
              <el-col :span="24" align="center">
                <img :src="`${$root.storage_url}${$helper.getProp(configs,'LOGO_HIGHLIGHT.data.path')}`" v-if="$helper.getProp(configs,'LOGO_HIGHLIGHT.data.path')" height="100" />
              </el-col>
          </el-row>
          <router-view/>    
      </div>
  </div>
</template>
<script>
  import { mapGetters } from 'vuex'

  export default {
    name: 'Login-page-layout',
    computed: {
        ...mapGetters([
        'configs'
        ]),
    }
  }
</script>

<style rel="stylesheet/scss" lang="scss">

$bg:#2d3a4b;
$light_gray:#eee;
.title {
    font-size: 26px;
    font-weight: 400;
    color: $light_gray;
    margin: 0px auto 40px auto;
    text-align: center;
    font-weight: bold;
  }

/* reset lq-element-ui css */
// .login-container {
//   .el-input {
//     display: inline-block;
//     height: 47px;
//     // width: 85%;
//     input {
//       background: transparent;
//       border: 0px;
//       -webkit-appearance: none;
//       border-radius: 0px;
//       padding: 12px 5px 12px 15px;
//       color: $light_gray;
//       height: 47px;
//       &:-webkit-autofill {
//         -webkit-box-shadow: 0 0 0px 1000px $bg inset !important;
//         -webkit-text-fill-color: #fff !important;
//       }
//     }
//   }
//   .el-form-item {
//     border: 1px solid rgba(255, 255, 255, 0.1);
//     background: rgba(0, 0, 0, 0.1);
//     border-radius: 5px;
//     color: #454545;
//   }
// }

</style>
<style rel="stylesheet/scss" lang="scss" scoped>
$bg:#28bec0;
$dark_gray:#889aa4;
$light_gray:#eee;

.login-container {
  position: fixed;
  height: 100%;
  width: 100%;
  background-color: $bg;
  background: linear-gradient(90deg, $bg 50%, #56ccce 50%);
  .login-form {
    position: absolute;
    left: 0;
    right: 0;
    width: 520px;
    max-width: 100%;
    padding: 0px 35px 15px 35px;
    margin: 120px auto;
  }
  .tips {
    font-size: 14px;
    color: #fff;
    margin-bottom: 10px;
    span {
      &:first-of-type {
        margin-right: 16px;
      }
    }
  }
  .svg-container {
    padding: 6px 5px 6px 15px;
    color: $dark_gray;
    vertical-align: middle;
    width: 30px;
    display: inline-block;
  }
  
  .show-pwd {
    position: absolute;
    right: 10px;
    top: 7px;
    font-size: 16px;
    color: $dark_gray;
    cursor: pointer;
    user-select: none;
  }
}

</style>

