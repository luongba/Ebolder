<template>
  <div>
    <div class="container">
      <transition name="fade">
        <div class="w-full h-full" v-if="show">
          <div
            class="absolute inset-0 bg-blur flex items-center justify-center"
          >
            <div class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4">
              <div class="py-2 relative">
                <h1 class="font-semibold uppercase text-[14px]">
                  Create new Topic
                </h1>
                <span
                  class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer"
                  @click="show = !show"
                >
                  <i class="lnr-cross"></i>
                </span>
              </div>
              <el-form :model="topicData" :rules="rules" ref="ruleForm">
                <div class="my-2">
                  <el-form-item label="Name Topic" prop="name">
                    <el-input
                      placeholder="Name Topic"
                      v-model="topicData.name"
                    ></el-input>
                  </el-form-item>
                </div>
                <div class="">
                  <el-form-item label="Content" prop="description">
                    <editor
                      v-model="topicData.description"
                      api-key="hri1xykfk0d1gnrwf70v71zn81p6f7s5e3z1edxly9mansfq"
                      :init="{
                        height: 300,
                        menubar: false,
                        plugins: [
                          'advlist autolink lists link image charmap print preview anchor',
                          'searchreplace visualblocks code fullscreen',
                          'insertdatetime media table paste code help wordcount',
                        ],
                        toolbar:
                          'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                        visual: false,
                        content_style: `
		table, th, td {
    		border: 1px solid #000 !important;
		}	`,
                        paste_data_images: true,
                      }"
                    />
                  </el-form-item>
                </div>
                <div>
                  <el-form-item label="Audio file" prop="description">
                    <el-upload
                      class="upload-demo"
                      action="#"
                      :on-change="handleChange"
                      :auto-upload="false"
                      :file-list="fileList"
                    >
                      <el-button size="small" type="primary"
                        >Chosse file</el-button
                      >
                      <div slot="tip" class="el-upload__tip">
                        audio size less than 500kb
                      </div>
                    </el-upload>
                  </el-form-item>
                </div>
                <div class="">
                  <el-form-item label="Exam" prop="isExam">
                    <el-switch v-model="topicData.isExam"></el-switch>
                  </el-form-item>
                </div>
                <div class="flex justify-end items-center mt-4">
                  <el-button plain @click="resetFeild">Cancel</el-button>
                  <el-button type="primary" @click="createTopic('ruleForm')"
                    >Create</el-button
                  >
                </div>
              </el-form>
            </div>
          </div>
        </div>
      </transition>
      <LoadingVue v-if="isLoading" />
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div
          class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-4 px-4 text-[14px] font-semibold"
          :style="
            item.is_exam == 1 ? 'border: 4px solid #3f6ad8 !important' : ''
          "
          v-for="item in listTopic"
          :key="item.id"
        >
          <span class="w-[60%] overflow-hidden mr-2">{{ item.name }}</span>
          <div class="flex items-center">
            <el-button
              size="small"
              type="danger"
              plain
              icon="el-icon-delete"
              circle
              @click="deleteTopic(item.id)"
            ></el-button>
            <a
              :href="`${ApiUrl}/admin/speaking-level-test/detail/${item.id}`"
              class="ml-2"
            >
              <el-button
                size="small"
                plain
                type="primary"
                icon="el-icon-edit"
                circle
              ></el-button>
            </a>
          </div>
        </div>
        <div
          class="bg-white shadow-sm flex items-center justify-center cursor-pointer py-4 px-4 text-[14px] font-semibold"
          @click="show = !show"
        >
          <div class="flex items-center">
            <div class="w-[32px] h-[32px] flex items-center justify-center">
              <i class="el-icon-plus text-[20px]"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingVue from "../loading/Loading.vue";
import baseRequest from "../../../utils/baseRequest";
import Editor from "@tinymce/tinymce-vue";

export default {
  components: {
    LoadingVue,
    Editor,
  },
  data() {
    return {
      show: false,
      topicData: {
        name: null,
        description: null,
        isExam: false,
      },
      listTopic: [],
      ApiUrl: $Api.baseUrl,
      rules: {
        name: [
          {
            required: true,
            message: "Please input  name",
            trigger: "blur",
          },
        ],
      },
      isLoading: false,
      fileList: [],
      file: null,
    };
  },
  computed: {},
  watch: {},
  methods: {
    resetFeild() {
      this.show = false;
      this.topicData = {
        name: null,
        description: null,
      };
    },
    async createTopic(formName) {
      this.$refs[formName].validate(async (valid) => {
        if (valid) {
          try {
            let formData = new FormData();
            formData.append("file", this.file.raw);
            formData.append("name", this.topicData.name);
            formData.append("description", this.topicData.description);
            formData.append("isExam", this.topicData.isExam);
            const headers = {
              "Content-Type": "multipart/form-data",
            };
            let rs = await baseRequest.post(
              `/admin/store-topic-speak`,
              formData,
              { headers }
            );
            if (rs.data.status == 200) {
              this.getAllTopic();

              this.resetFeild();
              this.$message({
                type: "success",
                message: "Add successful topics",
              });
            } else {
              this.$message({
                type: "error",
                message: "Add error topics",
              });
            }
          } catch (e) {
            this.$message({
              type: "error",
              message: "Add error topics",
            });
          }
        } else {
          return false;
        }
      });
    },
    async getAllTopic() {
      try {
        this.isLoading = true;
        let rs = await baseRequest.get(`/admin/list-topic-speak`);
        if (rs.data.status == 200) {
          setTimeout(() => {
            this.isLoading = false;
          }, 1000);

          this.listTopic = rs.data.data;
        }
      } catch (e) {
        setTimeout(() => {
          this.isLoading = false;
        }, 1000);
        console.log(e);
      }
    },
    async deleteTopic(id) {
      this.$confirm(
        "This will permanently delete the topic. Continue?",
        "Warning",
        {
          confirmButtonText: "OK",
          cancelButtonText: "Cancel",
          type: "warning",
        }
      )
        .then(async () => {
          try {
            let rs = await baseRequest.post(`/admin/delete-topic-speak`, {
              id,
            });
            if (rs.data.status == 200) {
              this.getAllTopic();
              this.$message({
                type: "success",
                message: "Delete completed",
              });
            } else {
              this.$message({
                type: "error",
                message: "Delete error",
              });
            }
          } catch (e) {
            console.log(e);
            this.$message({
              type: "error",
              message: "Delete error",
            });
          }
        })
        .catch(() => {
          return;
        });
    },
    handleChange(file, fileList) {
      this.file = file;
    },
  },

  created() {
    this.getAllTopic();
  },
};
</script>
<style scoped>
.bg-blur {
  background: rgba(0, 0, 0, 0.3);
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
