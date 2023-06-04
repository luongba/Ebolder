<template>
  <div class="container">
    <transition name="fade">
      <div class="w-full h-full" v-if="show">
        <div
          class="md:absolute fixed inset-0 bg-blur flex items-center justify-center"
        >
          <div
            class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4 max-h-[540px] overflow-y-scroll"
          >
            <div class="py-2 relative">
              <h1 class="font-semibold uppercase text-[14px] mb-4">
                Add Question
              </h1>
              <span
                class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer"
                @click="show = !show"
              >
                <i class="lnr-cross"></i>
              </span>
            </div>
            <div class="my-2">
              <div v-if="dataQuestion.length == 0">
                <el-empty description="No question"></el-empty>
              </div>
              <div
                class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-2 px-2 text-[14px] font-semibold mb-4"
                v-for="itemQues in dataQuestion"
                :key="itemQues.id"
                v-else
              >
                <span class="flex-1">{{ itemQues.question }}</span>
                <div class="flex items-center">
                  <star-rating
                    :star-size="20"
                    :animate="false"
                    v-model="itemQues.level"
                    :show-rating="false"
                    :max-rating="3"
                    :read-only="true"
                  />
                  <el-button
                    icon="el-icon-plus"
                    size="mini"
                    class="ml-2"
                    @click="addTopic(itemQues.id)"
                    circle
                  ></el-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <div class="flex items-center justify-center">
      <p
        class="font-bold lg:text-[30px] text-[20px] uppercase text-center w-full"
        v-if="!isEditTitle"
      >
        {{ detailTopic.name }}
      </p>
      <input
        type="text"
        class="font-bold lg:text-[30px] text-[20px] uppercase text-center w-full"
        v-model="detailTopic.name"
        v-else
      />
      <el-button
        size="small"
        plain
        type="primary"
        icon="el-icon-edit"
        circle
        class="ml-2"
        v-if="!isEditTitle"
        @click="isEditTitle = !isEditTitle"
      ></el-button>

      <el-button
        type="success"
        icon="el-icon-check"
        circle
        size="small"
        plain
        v-if="isEditTitle"
        class="ml-2"
        @click="saveChangeTitle(detailTopic.id)"
      ></el-button>
    </div>
    <div>
      <span class="font-semibold text-[15px] mt-4 mb-2 mr-2">Exam</span>
      <el-switch v-model="detailTopic.isExam"></el-switch>
    </div>
    <div class="mt-4">
      <editor
        v-model="detailTopic.description"
        api-key="hri1xykfk0d1gnrwf70v71zn81p6f7s5e3z1edxly9mansfq"
        :init="{
          height: 600,
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
    </div>
    <div class="flex items-center justify-center mt-4">
      <el-button @click="saveChangeTitle(detailTopic.id)"
        >Change description</el-button
      >
    </div>
    <p class="font-semibold text-[15px] mt-4 mb-2">Statistical</p>
    <div
      class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-2 px-4 text-[14px] font-semibold flex flex-col items-start"
    >
      <div class="flex justify-between items-center w-full">
        <p>{{ levelEasy }}</p>
        <star-rating
          :star-size="20"
          :animate="false"
          :show-rating="false"
          :max-rating="1"
          :read-only="true"
          :rating="1"
        />
      </div>
      <div class="flex justify-between items-center w-full">
        <p>{{ levelMedium }}</p>
        <star-rating
          :star-size="20"
          :animate="false"
          :show-rating="false"
          :max-rating="2"
          :read-only="true"
          :rating="2"
        />
      </div>
      <div class="flex justify-between items-center w-full">
        <p>{{ levelhard }}</p>
        <star-rating
          :star-size="20"
          :animate="false"
          :show-rating="false"
          :max-rating="3"
          :read-only="true"
          :rating="3"
        />
      </div>

      <div class="flex justify-between items-center w-full border-t my-2">
        <p class="mt-2">Total: {{ levelhard + levelMedium + levelEasy }}</p>
      </div>
    </div>

    <!--        <p class="font-semibold text-[15px] mt-2">Description: {{ detailTopic.description }}</p>-->
    <p class="font-semibold text-[15px] mt-4 mb-2">Questions of Topic</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div
        class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-4 px-4 text-[14px] font-semibold"
        v-for="item in detailTopic.question"
        :key="item.idQues"
      >
        <span class="flex-1">{{ item.question }}</span>
        <div class="flex items-center">
          <star-rating
            :star-size="20"
            :animate="false"
            v-model="item.level"
            :show-rating="false"
            :max-rating="3"
            :read-only="true"
          />
          <el-button
            size="small"
            type="danger"
            plain
            icon="el-icon-delete"
            circle
            class="ml-2"
            @click="removeTopic(item.idQues)"
          ></el-button>
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
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import StarRating from "vue-star-rating";
import Editor from "@tinymce/tinymce-vue";

export default {
  components: {
    StarRating,
    Editor
  },
  data() {
    return {
      show: false,
      listTopic: [],
      detailTopic: {
        id: null,
        name: null,
        description: null,
        question: [],
        isExam: false,
      },
      dataQuestion: [],
      take: 5,
      isEditTitle: false,
    };
  },
  props: ["param"],
  computed: {
    levelEasy() {
      return this.detailTopic.question.reduce((sum, item) => {
        if (item.level == 1) {
          return (sum += 1);
        } else {
          return (sum += 0);
        }
      }, 0);
    },
    levelMedium() {
      return this.detailTopic.question.reduce((sum, item) => {
        if (item.level == 2) {
          return (sum += 1);
        } else {
          return (sum += 0);
        }
      }, 0);
    },
    levelhard() {
      return this.detailTopic.question.reduce((sum, item) => {
        if (item.level == 3) {
          return (sum += 1);
        } else {
          return (sum += 0);
        }
      }, 0);
    },
  },
  watch: {
    "detailTopic.isExam"(value) {
      if (typeof value == "boolean") {
        this.setStatusExam(value);
      }
    },
  },
  methods: {
    resetFeild() {
      this.show = false;
      this.topicData = {
        name: null,
        description: null,
      };
    },
    async setStatusExam(value) {
      try {
        let rs = await baseRequest.post(`/admin/update-status-exam`, {
          is_exam: value,
          class: "vocabulary",
          model: "vocabulary",
          id: this.detailTopic.id,
        });
        if (rs.data.status == 200) {
          this.$message({
            type: "success",
            message: "Thay đổi trạng thái thành công!",
          });
        }
      } catch (e) {
        console.log(e);
      }
    },
    async createTopic() {
      try {
        let rs = await baseRequest.post(
          `/admin/store-topic-vocabulary`,
          this.topicData
        );
        if (rs.data.status == 200) {
          this.getAllTopic();

          this.resetFeild();
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getDetailTopic() {
      try {
        let rs = await baseRequest.get(
          `/admin/detail-topic-vocabulary/${this.param}`
        );
        if (rs.data.status == 200) {
          let data = rs.data.data;
          this.detailTopic = {
            id: data.id,
            name: data.name,
            description: data.description,
            isExam: data.is_exam == 1 ? true : false,
            question: data.questiton_vocabulary?.map((item) => {
              return {
                idQues: item.id,
                level: item.level,
                question: item.question,
              };
            }),
          };
        }
      } catch (e) {
        console.log(e);
      }
    },
    async deleteTopic(id) {
      try {
        let rs = await baseRequest.post(`/admin/delete-topic-vocabulary`, {
          id,
        });
        if (rs.data.status == 200) {
          this.getAllTopic();
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllQuestion() {
      try {
        let { data } = await baseRequest.get(`/admin/list-question-vocabulary`);
        this.dataQuestion = data.data.filter(
          (elem) =>
            !this.detailTopic.question.find(({ idQues }) => elem.id === idQues)
        );
      } catch (error) {
        console.log(error);
      }
    },
    async addTopic(id) {
      try {
        let { data } = await baseRequest.post(
          `/admin/add-question-to-topic-vocabulary`,
          {
            idTopic: this.detailTopic.id,
            idQues: id,
          }
        );
        if (data.status == 200) {
          this.getDetailTopic();
          this.dataQuestion = this.dataQuestion.filter((item) => item.id != id);
        }
      } catch (error) {
        console.log(error);
      }
    },
    async removeTopic(id) {
      try {
        let { data } = await baseRequest.post(
          `/admin/remove-question-from-topic-vocabulary`,
          {
            idTopic: this.detailTopic.id,
            idQues: id,
          }
        );
        if (data.status == 200) {
          this.getDetailTopic();
          this.getAllQuestion();
        }
      } catch (error) {
        console.log(error);
      }
    },
    async saveChangeTitle(id) {
      try {
        let { data } = await baseRequest.post(`/admin/edit-topic-vocabulary`, {
          id,
          name: this.detailTopic.name,
          description: this.detailTopic.description,
        });
        if (data.status == 200) {
          this.isEditTitle = false;
          this.getDetailTopic();
        }
      } catch (error) {
        console.log(error);
      }
    },
  },

  created() {
    this.getDetailTopic();
    this.getAllQuestion();
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
