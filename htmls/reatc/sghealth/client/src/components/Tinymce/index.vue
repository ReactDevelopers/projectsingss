<template>
  <div :class="{fullscreen:fullscreen}" class="tinymce-container editor-container">
    <el-form-item  
      v-if="insideFormElement"
      :showMessage="showMessage" 
      :prop="id" 
      :error="elError()" 
      :label="label" >
        <el-row>
          <el-col :span="24">
            <textarea :id="tinymceId" class="tinymce-textarea"/>
            <div class="editor-custom-btn-container">
              <editorImage color="#1890ff" class="editor-upload-btn" @successCBK="imageSuccessCBK"/>
            </div>
          </el-col>
        </el-row>
    </el-form-item>
  </div>
</template>

<script>
import editorImage from './components/editorImage'
import plugins from './plugins'
import toolbar from './toolbar'
import {lqFormElement} from 'vuex-lq-form';

export default {
  name: 'Tinymce',
  components: { editorImage },
  mixins: [lqFormElement],
  props: {
    showMessage: {
        type: Boolean,
        default() {
            return true;
        }
    },
    insideFormElement: {
        type: Boolean,
        default: function() {
            return true;
        }
    },
    label: String,
    toolbar: {
      type: Array,
      required: false,
      default() {
        return []
      }
    },
    menubar: {
      type: String,
      default: 'file edit insert view format table'
    },
    height: {
      type: Number,
      required: false,
      default: 360
    }
  },
  data() {
    return {
      hasChange: false,
      hasInit: false,
      tinymceId: this.id,
      fullscreen: false,
      languageTypeList: {
        'en': 'en',
        'zh': 'zh_CN'
      }
    }
  },
  computed: {
    language() {
      return this.languageTypeList[this.$store.getters.language]
    }
  },
  watch: {
 
    initialvalue(val, oldval) {
        this.$nextTick(() =>
          window.tinymce.get(this.tinymceId).setContent(val || ''))
    },
    language() {
      this.destroyTinymce()
      this.$nextTick(() => this.initTinymce())
    }
  },
  mounted() {
    this.initTinymce()
  },
  activated() {
    this.initTinymce()
  },
  deactivated() {
    this.destroyTinymce()
  },
  destroyed() {
    this.destroyTinymce()
  },
  methods: {
    initTinymce() {
      const _this = this
      window.tinymce.init({
        language: this.language,
        selector: `#${this.tinymceId}`,
        height: this.height,
        body_class: 'panel-body ',
        object_resizing: false,
        toolbar: this.toolbar.length > 0 ? this.toolbar : toolbar,
        menubar: this.menubar,
        plugins: plugins,
        end_container_on_empty_block: true,
        powerpaste_word_import: 'clean',
        code_dialog_height: 450,
        code_dialog_width: 1000,
        advlist_bullet_styles: 'square',
        advlist_number_styles: 'default',
        imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
        default_link_target: '_blank',
        link_title: false,
        nonbreaking_force_tab: true, // inserting nonbreaking space &nbsp; need Nonbreaking Space Plugin
        init_instance_callback: editor => {
          
          _this.hasInit = true
          editor.on('NodeChange Change KeyUp SetContent', () => {
            this.hasChange = true
            this.setValue(editor.getContent());
            this.$emit('input', editor.getContent())
          })
        },
        setup(editor) {
          editor.on('FullscreenStateChanged', (e) => {
            _this.fullscreen = e.state
          })
        }
      })
    },
    destroyTinymce() {
      const tinymce = window.tinymce.get(this.tinymceId)
      if (this.fullscreen) {
        tinymce.execCommand('mceFullScreen')
      }

      if (tinymce) {
        tinymce.destroy()
      }
    },
    elError: function () {
        return this.error ? this.error.join(', ') : undefined;
    },
    setContent(value) {
      window.tinymce.get(this.tinymceId).setContent(value)
      this.setValue(value);
    },
    getContent() {
      window.tinymce.get(this.tinymceId).getContent()
    },
    imageSuccessCBK(arr) {
      const _this = this
      arr.forEach(v => {
        const dimension = this.$helper.getProp(v, 'data.media.info.dimension', null);
        const original_name = this.$helper.getProp(v, 'data.media.info.original_name', null);
        const path  = this.$helper.getProp(v, 'data.media.path', '');
        const storage_url  = this.$helper.getProp(v, 'data.storage_url', '');
        const url  = storage_url+path;
        const html = dimension ? '<img class="wscnph" data-mce-src="'+url+'" src="'+url+'" alt="'+original_name+'" >' : '<a href="'+url+'">'+original_name+'</a>';
        window.tinymce.get(_this.tinymceId).insertContent(html)
      })
    }
  }
}
</script>

<style scoped>
.tinymce-container {
  position: relative;
  line-height: normal;
}
.tinymce-container>>>.mce-fullscreen {
  z-index: 10000;
}
.tinymce-textarea {
  visibility: hidden;
  z-index: -1;
}
.editor-custom-btn-container {
  position: absolute;
  right: 4px;
  top: 35px
  /*z-index: 2005;*/
}
.fullscreen .editor-custom-btn-container {
  z-index: 10000;
  position: fixed;
}
.editor-upload-btn {
  display: inline-block;
}
</style>
