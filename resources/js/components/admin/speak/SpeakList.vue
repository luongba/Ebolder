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
            <a
              :href="`${ApiUrl}/admin/speaking-level-test/detail/${item.id}`"
            >
              <el-button
                size="small"
                plain
                type="primary"
                icon="el-icon-edit"
                circle
              ></el-button>
            </a>
            <el-button
              size="small"
              type="danger"
              class="ml-2"
              plain
              icon="el-icon-delete"
              circle
              @click="deleteTopic(item.id)"
            ></el-button>
          </div>
        </div>
      </div>
      
      <div class="mt-2 flex items-center justify-center"> 
        <el-pagination
          background
          layout="prev, pager, next"
          :total="total"
          :current-page.sync="current"
          :page-size="perPage"
          @prev-click="paginateClick"
          @next-click="paginateClick"
          @current-change="paginateClick"
        >
        </el-pagination>
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
      total: 1,
      current: 1,
      pageSize: 1,
      perPage: 1,
    };
  },
  computed: {},
  watch: {},
  methods: {
    init() {
      return {
        plugins: "image media link tinydrive code imagetools",
        height: 400,
        toolbar:
          "undo redo | formatselect | bold italic backcolor | \
               alignleft aligncenter alignright alignjustify | \
               bullist numlist outdent indent | removeformat",
        paste_data_images: true,
        tinydrive_token_provider:
          "df155c9e0a586dc631aa78a2434aa960bb71a67b960e892f50bec0345f1444fc",
        file_picker_callback: function (callback, value, meta) {
          let x =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.getElementsByTagName("body")[0].clientWidth;
          let y =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.getElementsByTagName("body")[0].clientHeight;

          let type = "image" === meta.filetype ? "Images" : "Files",
            url = "/laravel-filemanager?editor=tinymce5&type=" + type;

          tinymce.activeEditor.windowManager.openUrl({
            url: url,
            title: "Filemanager",
            width: x * 0.8,
            height: y * 0.8,
            onMessage: (api, message) => {
              callback(message.content);
            },
          });
        },
        content_style: `
		table, th, td {
    		border: 1px solid #000 !important;
		}	`,
      };
    },
    resetFeild() {
      this.show = false;
      this.topicData = {
        name: null,
        description: null,
        isExam: false,
      };
    },
    paginateClick(curentPage) {
      this.current = curentPage;
      this.getAllTopic();
    },
    async getAllTopic() {
      try {
        this.isLoading = true;
        let rs = await baseRequest.get(`/admin/list-topic-speak?page=${this.current}`);
        if (rs.data.status == 200) {
          this.isLoading = false;
          this.listTopic = rs.data.data.data;
          this.total = rs.data.data.total;
          this.current = rs.data.data.current_page;
          this.pageSize = rs.data.data.last_page;
          this.perPage = rs.data.data.per_page;
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
