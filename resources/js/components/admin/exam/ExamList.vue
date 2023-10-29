<template>
  <div>
    <LoadingVue v-if="isLoading" />
    <div class="container">
      <transition name="fade">
        <div class="w-full h-full" v-if="show">
          <div
            class="absolute inset-0 bg-blur flex items-center justify-center"
          >
            <div class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4">
              <div class="py-2 relative">
                <h1 class="font-semibold uppercase text-[14px]">
                  {{
                    state == "create"
                      ? "Create exam"
                      : "Update exam"
                  }}
                </h1>
                <span
                  class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer"
                  @click="show = !show"
                >
                  <i class="lnr-cross"></i>
                </span>
              </div>

              <el-form :model="topicData" :rules="rules" ref="ruleForm">
                <div class="w-full h-[60vh] overflow-y-scroll">
                  <div class="my-2">
                    <el-form-item label="Exam name" prop="name">
                      <el-input
                        placeholder="Exam name"
                        v-model="topicData.name"
                      ></el-input>
                    </el-form-item>
                  </div>
                  <div class="my-2">
                    <el-form-item label="Enable" prop="isExam">
                      <el-switch v-model="topicData.isExam"></el-switch>
                    </el-form-item>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-1 md:gap-4 gap-1">
                    <el-form-item label="Listening" prop="valueListening">
                      <el-select
                        class="listening"
                        v-model="topicData.valueListening"
                        placeholder="Listening"
                        style="width: 100%"
                        @visible-change="(visible) => handleDropdownVisibleChange(visible, '.listening-select')"
                        popper-class="listening-select"
                      >
                        <el-option
                          v-for="item in listTopicListening"
                          :key="item.id"
                          :label="item.name"
                          :value="item.id"
                        >
                        </el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Speaking" prop="valueSpeaking">
                      <el-select
                        class="speaking"
                        v-model="topicData.valueSpeaking"
                        placeholder="Speaking"
                        style="width: 100%"
                        @visible-change="(visible) => handleDropdownVisibleChange(visible, '.speaking-select')"
                        popper-class="speaking-select"
                      >
                        <el-option
                          v-for="item in listTopicSpeaking"
                          :key="item.id"
                          :label="item.name"
                          :value="item.id"
                        >
                        </el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Reading" prop="valueReading">
                      <el-select
                        class="reading"
                        v-model="topicData.valueReading"
                        placeholder="Reading"
                        style="width: 100%"
                        @visible-change="(visible) => handleDropdownVisibleChange(visible, '.reading-select')"
                        popper-class="reading-select"
                      >
                        <el-option
                          v-for="item in listTopicReading"
                          :key="item.id"
                          :label="item.name"
                          :value="item.id"
                        >
                        </el-option>
                      </el-select>
                    </el-form-item>
                    <!-- <el-form-item label="Vocabulary" prop="valueVocabulary">
                        <el-select
                          v-model="topicData.valueVocabulary"
                          placeholder="Vocabulary"
                          style="width: 100%"
                        >
                          <el-option
                            v-for="item in listTopicVocabulary"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id"
                          >
                          </el-option>
                        </el-select>
                      </el-form-item> -->
                    <!-- <el-form-item label="Grammar" prop="valueGrammar">
                        <el-select
                          v-model="topicData.valueGrammar"
                          placeholder="Grammar"
                          style="width: 100%"
                        >
                          <el-option
                            v-for="item in listTopicGrammar"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id"
                          >
                          </el-option>
                        </el-select>
                      </el-form-item> -->

                    <el-form-item label="Writing" prop="valueLesson">
                      <el-select
                        class="writing"
                        v-model="topicData.valueLesson"
                        placeholder="Writing"
                        style="width: 100%"
                        @visible-change="(visible) => handleDropdownVisibleChange(visible, '.writing-select')"
                        popper-class="writing-select"
                      >
                        <el-option
                          v-for="item in listTopicLesson"
                          :key="item.id"
                          :label="item.name"
                          :value="item.id"
                        >
                        </el-option>
                      </el-select>
                    </el-form-item>
                    <!-- <el-form-item label="Pronunciation" prop="valueTalking">
                        <el-select
                          v-model="topicData.valueTalking"
                          placeholder="Pronunciation"
                          style="width: 100%"
                        >
                          <el-option
                            v-for="item in listTopicTalking"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id"
                          >
                          </el-option>
                        </el-select>
                      </el-form-item> -->
                  </div>
                </div>
                <div class="flex justify-end items-center mt-4">
                  <el-button plain @click="resetFeild">Cancel</el-button>
                  <el-button
                    type="primary"
                    @click="
                      state == 'create'
                        ? createTopic('ruleForm')
                        : updateLevel('ruleForm')
                    "
                    >{{ state == "create" ? "Create" : "Update" }}</el-button
                  >
                </div>
              </el-form>
            </div>
          </div>
        </div>
      </transition>

      <div class="flex items-center justify-center mb-4">
        <el-button
          icon="el-icon-plus"
          plain
          @click="
            show = !show;
            state = 'create';
            topicData = {
              name: null,
              valueLesson: null,
              valueGrammar: null,
              valueReading: null,
              valueVocabulary: null,
              valueListening: null,
              valueSpeaking: null,
              valueTalking: null,
            };
          "
        ></el-button>
      </div>
      <div class="grid grid-cols-1 gap-4">
        <div
          class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-4 px-4 text-[14px] font-semibold"
          :style="
            item.exam_id == 1 ? 'border: 4px solid #3f6ad8 !important' : ''
          "
          v-for="item in listExam"
          :key="item.id"
        >
          <span class="w-[60%] overflow-hidden mr-2">{{ item.name }}</span>
          <div class="flex items-center">
            <el-button
              size="small"
              plain
              type="primary"
              icon="el-icon-edit"
              circle
              @click="editLevel(item.id)"
            ></el-button>
            <el-button
              class="ml-2"
              size="small"
              type="danger"
              plain
              icon="el-icon-delete"
              circle
              @click="deleteLevel(item.id)"
            ></el-button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
import baseRequest from "../../../utils/baseRequest";
import Editor from "@tinymce/tinymce-vue";
import LoadingVue from "../loading/Loading.vue";
export default {
  components: {
    Editor,
    LoadingVue,
  },
  data() {
    return {
      show: false,
      topicData: {
        id: null,
        name: null,
        valueGrammar: null,
        valueReading: null,
        valueVocabulary: null,
        valueListening: null,
        valueSpeaking: null,
        valueLesson: null,
        valueTalking: null,
        isExam: 0,
      },
      listExam: [],
      ApiUrl: $Api.baseUrl,
      rules: {
        name: [
          {
            required: true,
            message: "Please input  name",
            trigger: "blur",
          },
        ],
        valueSpeaking: [
          {
            required: true,
            message: "Please select speak",
            trigger: "change",
          },
        ],
        // valueVocabulary: [
        //   {
        //     required: true,
        //     message: "Please select vocabulary",
        //     trigger: "change",
        //   },
        // ],
        valueReading: [
          {
            required: true,
            message: "Please select reading",
            trigger: "change",
          },
        ],
        // valueGrammar: [
        //   {
        //     required: true,
        //     message: "Please select grammar",
        //     trigger: "change",
        //   },
        // ],
        valueListening: [
          {
            required: true,
            message: "Please select listening",
            trigger: "change",
          },
        ],
        valueLesson: [
          {
            required: true,
            message: "Please select Writing",
            trigger: "change",
          },
        ],
        // valueTalking: [
        //   {
        //     required: true,
        //     message: "Please select Talking",
        //     trigger: "change",
        //   },
        // ],
      },

      //   listTopicGrammar: [],
      listTopicReading: [],
      //   listTopicVocabulary: [],
      listTopicListening: [],
      listTopicLesson: [],
      listTopicSpeaking: [],
      //   listTopicTalking: [],
      state: "create",
      idTemp: null,
      isLoading: false,
      // isAtEndOfOptionsGammar: false,
      isAtEndOfOptionsReading: false,
      // isAtEndOfOptionsVocabulary: false,
      isAtEndOfOptionsListening: false,
      isAtEndOfOptionsLesson: false,
      isAtEndOfOptionsSpeaking: false,
      // isAtEndOfOptionsPronuncation: false,
      isAtEndOfOptions: false,
      // pageGrammar: 1,
      pageReading: 1,
      // pageVocabulary: 1,
      pageListening: 1,
      pageLesson: 1,
      pageSpeaking: 1,
      // pagePronunciation: 1,
    };
  },
  computed: {},
  watch: {},
  methods: {
    handleDropdownVisibleChange(visible, className) {
      if (visible) {
        const dropdownList = document.querySelector(className + ' .el-scrollbar .el-scrollbar__wrap');
        dropdownList.addEventListener('scroll', this.handleScroll);
      } else {
        const dropdownList = document.querySelector('.el-select-dropdown .el-scrollbar__wrap');
        dropdownList.removeEventListener('scroll', this.handleScroll);
      }
    },
    async handleScroll(event) {
      const elSelect = event.target;
      const ul = elSelect.querySelector('ul');
      const totalItems = ul.childElementCount;
      const lastVisibleItemIndex = Math.floor((elSelect.scrollTop + elSelect.clientHeight) / ul.firstElementChild.clientHeight);
      if (lastVisibleItemIndex == totalItems) {
          const typeTopic = elSelect.parentElement.parentElement.classList;
          if (Object.values(typeTopic).includes('pronunciation-select') && !this.isAtEndOfOptionsPronuncation && this.pagePronunciation * 10 <= totalItems) {
            this.pagePronunciation++;
            await this.getAllTopicTalking();
          } else if (Object.values(typeTopic).includes('grammar-select') && !this.isAtEndOfOptionsGammar && this.pageGrammar * 10 <= totalItems) {
            this.pageGrammar++;
            await this.getAllTopicGrammar();
          } else if (Object.values(typeTopic).includes('reading-select') && !this.isAtEndOfOptionsReading && this.pageReading * 10 <= totalItems) {
            this.pageReading++;
            await this.getAllTopicReading();
          } else if (Object.values(typeTopic).includes('vocabulary-select') && !this.isAtEndOfOptionsVocabulary && this.pageVocabulary * 10 <= totalItems) {
            this.pageVocabulary++;
            await this.getAllTopicVocabulary();
          } else if (Object.values(typeTopic).includes('listening-select') && !this.isAtEndOfOptionsListening && this.pageListening * 10 <= totalItems) {
            this.pageListening++;
            await this.getAllTopicListening();
          } else if (Object.values(typeTopic).includes('writing-select') && !this.isAtEndOfOptionsLesson && this.pageLesson * 10 <= totalItems) {
            this.pageLesson++;
            await this.getAllTopicLesson();
          } else if (Object.values(typeTopic).includes('speaking-select') && !this.isAtEndOfOptionsSpeaking && this.pageSpeaking * 10 <= totalItems) {
            this.pageSpeaking++;
            await this.getAllTopicSpeaking();
          }
      }
    },
    async createTopic(formName) {
      this.$refs[formName].validate(async (valid, err) => {
        if (valid) {
          try {
            let dataTemp = {
              name: this.topicData.name,
              listening_id: this.topicData.valueListening,
              reading_id: this.topicData.valueReading,
              vocabulary_id: this.topicData.valueVocabulary,
              grammar_id: this.topicData.valueGrammar,
              speaking_id: this.topicData.valueSpeaking,
              writing_id: this.topicData.valueLesson,
              pronunciation_id: this.topicData.valueTalking,
              status: this.topicData.isExam || false,
            };
            let rs = await baseRequest.post(`/admin/create-exam`, dataTemp);
            if (rs.data.status == 200) {
              this.resetFeild();
              this.$message({
                type: "success",
                message: "Created successfully",
              });
              this.getAllExam();
            } else {
              this.$message({
                type: "error",
                message: "Created failed",
              });
            }
          } catch (e) {
            this.$message({
              type: "error",
              message: "Created failed",
            });
          }
        } else {
          return false;
        }
      });
    },
    async updateLevel(formName, id) {
      this.$refs[formName].validate(async (valid) => {
        if (valid) {
          try {
            let dataTemp = {
              name: this.topicData.name,
              speaking_id: this.topicData.valueSpeaking,
              listening_id: this.topicData.valueListening,
              reading_id: this.topicData.valueReading,
            //   vocabulary_id: this.topicData.valueVocabulary,
            //   grammar_id: this.topicData.valueGrammar,
              writing_id: this.topicData.valueLesson,
            //   pronunciation_id: this.topicData.valueTalking,
              status: this.topicData.isExam,
            };
            let rs = await baseRequest.post(
              `/admin/update-exam/${this.idTemp}`,
              dataTemp
            );
            if (rs.data.status == 200) {
              this.resetFeild();
              this.$message({
                type: "success",
                message: "Updated successfully",
              });
              this.getAllExam();
            } else {
              this.$message({
                type: "error",
                message: "Updated failed",
              });
            }
          } catch (e) {
            this.$message({
              type: "error",
              message: "Updated failed",
            });
          }
        } else {
          return false;
        }
      });
    },
    async getAllExam() {
      try {
        this.isLoading = true;
        let rs = await baseRequest.get(`/admin/get-all-exam`);
        if (rs.data.status == 200) {
          setTimeout(() => {
            this.isLoading = false;
          }, 1000);
          this.listExam = rs.data.data
            .map((item) => ({
              id: item.id,
              name: item.name,
              exam_id: item.status,
            }))
            .reverse();
        }
      } catch (e) {
        console.log(e);
      } finally {
        this.isLoading = false;
      }
    },
    editLevel(id) {
      this.getDetailExam(id);
      this.state = "edit";
      this.idTemp = id;
    },
    async getDetailExam(id) {
      try {
        let rs = await baseRequest.get(`/admin/get-detail-exam/${id}`);
        let { data } = rs;
        if (data.status == 200) {
          this.topicData = {
            name: data.data.name || null,
            valueListening: data.data.listening_id,
            // valueVocabulary: data.data.vocabulary_id,
            valueReading: data.data.reading_id,
            // valueGrammar: data.data.grammar_id,
            valueSpeaking: data.data.speaking_id,
            valueLesson: data.data.writing_id,
            // valueTalking: data.data.pronunciation_id,

            isExam: data.data.status === 1 ? true : false,
          };
          this.show = !this.show;
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicLesson() {
      try {
        let rs = await baseRequest.get(`/admin/list-topic-lesson?page=${this.pageLesson}&is_exam=true`);
        if (rs.data.status == 200) {
          if (rs.data.data.data.length == 0) {
            this.isAtEndOfOptionsLesson = true;
          }
          const lesson = rs.data.data.data
            .map((item) => ({
              id: item.id,
              name: item.name,
              is_exam: item.is_exam || null,
            }))
            .filter((itemTopic) => {
              return !this.listTopicLesson.some(existingItem => existingItem.id === itemTopic.id);
            });
            this.listTopicLesson.push(...lesson);
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicVocabulary() {
      try {
        let rs = await baseRequest.get(`/admin/list-topic-vocabulary?page=${this.pageVocabulary}&is_exam=true`);
        if (rs.data.status == 200) {
          if (rs.data.data.data.length == 0) {
            this.isAtEndOfOptionsVocabulary = true;
          }
          const vocab = rs.data.data.data.map((item) => ({
            id: item.id,
            name: item.name,
            is_exam: item.is_exam || null,
          }))
          .filter((itemTopic) => {
            return !this.listTopicVocabulary.some(existingItem => existingItem.id === itemTopic.id);
          });
          this.listTopicVocabulary.push(...vocab);
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicGrammar() {
      try {
        let rs = await baseRequest.get(`/admin/list-topic-grammar?page=${this.pageGrammar}&is_exam=true`);
        if (rs.data.status == 200) {
          if (rs.data.data.data.length == 0) {
            this.isAtEndOfOptionsGammar = true;
          }
          const grammar = rs.data.data.data.map((item) => ({
            id: item.id,
            name: item.name,
            is_exam: item.is_exam || null,
          }))
          .filter((itemTopic) => {
            return !this.listTopicGrammar.some(existingItem => existingItem.id === itemTopic.id);
          });
          this.listTopicGrammar.push(...grammar);
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicReading() {
      try {
        let rs = await baseRequest.get(`/admin/list-topic-reading?page=${this.pageReading}&is_exam=true`);
        if (rs.data.status == 200) {
          if (rs.data.data.data.length == 0) {
            this.isAtEndOfOptionsReading = true;
          }
          const reading = rs.data.data.data.map((item) => ({
            id: item.id,
            name: item.name,
            is_exam: item.is_exam || null,
          }))
          .filter((itemTopic) => {
              return !this.listTopicReading.some(existingItem => existingItem.id === itemTopic.id);
            });
          this.listTopicReading.push(...reading);
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicListening() {
      try {
        let rs = await baseRequest.get(`/admin/topic-list-listening?page=${this.pageListening}&is_exam=true`);
        if (rs.data.status == 200) {
          if (rs.data.data.data.length == 0) {
            this.isAtEndOfOptionsListening = true;
          }
          const listening = rs.data.data.data.map((item) => ({
            id: item.id,
            name: item.name,
            is_exam: item.is_exam || null,
          }))
          .filter((itemTopic) => {
            return !this.listTopicListening.some(existingItem => existingItem.id === itemTopic.id);
          });
          this.listTopicListening.push(...listening);
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicSpeaking() {
      try {
        let rs = await baseRequest.get(`/admin/list-topic-speak?page=${this.pageSpeaking}&is_exam=true`);
        if (rs.data.status == 200) {
          if (rs.data.data.data.length == 0) {
            this.isAtEndOfOptionsSpeaking = true;
          }
          const speaking = rs.data.data.data.map((item) => ({
            id: item.id,
            name: item.name,
            is_exam: item.is_exam || null,
          }))
          .filter((itemTopic) =>  {
            return !this.listTopicSpeaking.some(existingItem => existingItem.id === itemTopic.id);
          });
          this.listTopicSpeaking.push(...speaking);
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicTalking() {
      try {
        let rs = await baseRequest.get(`/admin/list-topic-pronunciation?page=${this.pagePronunciation}&is_exam=true`);
        if (rs.data.status == 200) {
          if (rs.data.data.data.length == 0) {
            this.isAtEndOfOptionsPronuncation = true;
          }
          const talking = rs.data.data.data.map((item) => ({
            id: item.id,
            name: item.name,
            is_exam: item.is_exam || null,
          }))
          .filter((itemTopic) => {
            return !this.listTopicTalking.some(existingItem => existingItem.id === itemTopic.id);
          });
          this.listTopicTalking.push(...talking);
        }
      } catch (e) {
        console.log(e);
      }
    },

    async deleteLevel(id) {
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
            let rs = await baseRequest.post(`/admin/delete-exam/${id}`);
            if (rs.data.status == 200) {
              this.getAllExam();
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
    resetFeild() {
      this.show = false;
      this.topicData = {
        name: null,
        valueLesson: [],
        valueGrammar: null,
        valueReading: null,
        valueVocabulary: null,
        valueListening: null,
      };
    },
  },

  created() {
    this.getAllTopicReading();
    this.getAllTopicLesson();
    // this.getAllTopicVocabulary();
    // this.getAllTopicGrammar();
    this.getAllTopicListening();
    this.getAllExam();
    this.getAllTopicSpeaking();
    // this.getAllTopicTalking();
  },
};
</script>
  <style scoped>
.bg-blur {
  background: #eee;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
</style>
  