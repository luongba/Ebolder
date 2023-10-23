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
                      ? "Create level"
                      : "Update Level"
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
                    <el-form-item label="Level name" prop="name">
                      <el-input
                        placeholder="Level name"
                        v-model="topicData.name"
                      ></el-input>
                    </el-form-item>
                  </div>
                  <el-form-item label="Writing" prop="valueLesson">
                    <el-select
                      class="writing"
                      v-model="topicData.valueLesson"
                      multiple
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
                  <div class="grid grid-cols-1 md:grid-cols-1 md:gap-4 gap-1">
                    <el-form-item label="Reading" prop="valueReading">
                      <el-select
                        class="reading"
                        v-model="topicData.valueReading"
                        placeholder="Reading"
                        style="width: 100%"
                        multiple
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
                    <el-form-item label="Vocabulary" prop="valueVocabulary">
                      <el-select
                        class="vocabulary"
                        v-model="topicData.valueVocabulary"
                        placeholder="Vocabulary"
                        style="width: 100%"
                        multiple
                        @visible-change="(visible) => handleDropdownVisibleChange(visible, '.vocabulary-select')"
                        popper-class="vocabulary-select"
                      >
                        <el-option
                          v-for="item in listTopicVocabulary"
                          :key="item.id"
                          :label="item.name"
                          :value="item.id"
                        >
                        </el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Listening" prop="valueListening">
                      <el-select
                        class="listening"
                        v-model="topicData.valueListening"
                        placeholder="Listening"
                        style="width: 100%"
                        multiple
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
                    <el-form-item label="Grammar" prop="valueGrammar">
                      <el-select
                        class="grammar"
                        v-model="topicData.valueGrammar"
                        placeholder="Grammar"
                        style="width: 100%"
                        multiple
                        @visible-change="(visible) => handleDropdownVisibleChange(visible, '.grammar-select')"
                        popper-class="grammar-select"
                      >
                        <el-option
                          v-for="item in listTopicGrammar"
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
                        multiple
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
                    <el-form-item label="Pronunciation" prop="valueTalking">
                      <el-select
                        class="pronunciation"
                        v-model="topicData.valueTalking"
                        placeholder="Pronunciation"
                        style="width: 100%"
                        multiple
                        @visible-change="(visible) => handleDropdownVisibleChange(visible, '.pronunciation-select')"
                        popper-class="pronunciation-select"
                      >
                        <el-option
                          v-for="item in listTopicTalking"
                          :key="item.id"
                          :label="item.name"
                          :value="item.id"
                        >
                        </el-option>
                      </el-select>
                    </el-form-item>
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
              valueLesson: [],
              valueGrammar: null,
              valueReading: null,
              valueVocabulary: null,
              valueListening: null,
              valueSpeaking: null,
              valueTalking: null
            };
          "
        ></el-button>
      </div>
      <div class="grid grid-cols-1 gap-4">
        <div
          class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-4 px-4 text-[14px] font-semibold"
          v-for="item in listLevel"
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
        valueLesson: [],
        valueGrammar: null,
        valueReading: null,
        valueVocabulary: null,
        valueListening: null,
        valueSpeaking: null,
        valueTalking: null,
      },
      listLevel: [],
      ApiUrl: $Api.baseUrl,
      rules: {
        name: [
          {
            required: true,
            message: "Please input  name",
            trigger: "blur",
          },
        ],
        valueLesson: [
          {
            required: false,
            message: "Please select lesson",
            trigger: "blur",
          },
        ],
        valuevocabulary: [
          {
            required: false,
            message: "Please select vocabulary",
            trigger: "blur",
          },
        ],
        valueReading: [
          {
            required: false,
            message: "Please select reading",
            trigger: "blur",
          },
        ],
        valueGrammar: [
          {
            required: false,
            message: "Please select grammar",
            trigger: "blur",
          },
        ],
        valueListening: [
          {
            required: false,
            message: "Please select listening",
            trigger: "blur",
          },
        ],
        valueSpeaking: [
          {
            required: false,
            message: "Please select speaking",
            trigger: "blur",
          },
        ],
        valueTalking: [
          {
            required: false,
            message: "Please select speaking",
            trigger: "blur",
          },
        ],
      },

      listTopicGrammar: [],
      listTopicReading: [],
      listTopicVocabulary: [],
      listTopicListening: [],
      listTopicLesson: [],
      listTopicSpeaking: [],
      listTopicTalking: [],
      state: "create",
      idTemp: null,
      isLoading: false,
      isAtEndOfOptionsGammar: false,
      isAtEndOfOptionsReading: false,
      isAtEndOfOptionsVocabulary: false,
      isAtEndOfOptionsListening: false,
      isAtEndOfOptionsLesson: false,
      isAtEndOfOptionsSpeaking: false,
      isAtEndOfOptionsPronuncation: false,
      pageGrammar: 1,
      pageReading: 1,
      pageVocabulary: 1,
      pageListening: 1,
      pageLesson: 1,
      pageSpeaking: 1,
      pagePronunciation: 1,
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
      this.$refs[formName].validate(async (valid) => {
        if (valid) {
          try {
            let dataTemp = {
              name: this.topicData.name,
              lessons: this.topicData.valueLesson,
              listenings: this.topicData.valueListening,
              readings: this.topicData.valueReading,
              vocabularies: this.topicData.valueVocabulary,
              grammars: this.topicData.valueGrammar,
              speakings: this.topicData.valueSpeaking,
              talkings: this.topicData.valueTalking,
            };
            let rs = await baseRequest.post(`/admin/create-level`, dataTemp);
            if (rs.data.status == 200) {
              this.resetFeild();
              this.$message({
                type: "success",
                message: "Created successfully",
              });
              this.getAllLevel();
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
              lessons: this.topicData.valueLesson,
              listening_id: this.topicData.valueListening,
              reading_id: this.topicData.valueReading,
              vocabulary_id: this.topicData.valueVocabulary,
              grammar_id: this.topicData.valueGrammar,
              speakings: this.topicData.valueSpeaking,
              talkings: this.topicData.valueTalking,
              id: this.idTemp,
            };
            let rs = await baseRequest.post(`/admin/update-level`, dataTemp);
            if (rs.data.status == 200) {
              this.$message({
                type: "success",
                message: "Updated successfully",
              });
            } else {
              this.$message({
                type: "error",
                message: "Update failed",
              });
            }
          } catch (e) {
            this.$message({
              type: "error",
              message: "Update failed",
            });
          }
        } else {
          return false;
        }
      });
    },
    async getAllLevel() {
      try {
        this.isLoading = true;
        let rs = await baseRequest.get(`/get-levels`);
        if (rs.data.status == 200) {
          this.listLevel = rs.data.data
            .map((item) => ({
              id: item.id,
              name: item.name,
              is_exam: item.is_exam || null,
            }));
        }
      } catch (e) {
        console.log(e);
      } finally {
        this.isLoading = false;
      }
    },
    editLevel(id) {
      this.getDetailLevel(id);
      this.state = "edit";
      this.idTemp = id;
    },
    async getDetailLevel(id) {
      try {
        let rs = await baseRequest.post(`/admin/detail-level`, { id });
        let { data } = rs;
        if (data.status == 200) {
          this.topicData = {
            name: data.data.name || null,
            valueGrammar: data.data.grammar.map((item) => item.id) || [],
            valueVocabulary: data.data.vocabulary.map((item) => item.id) || [],
            valueReading: data.data.reading.map((item) => item.id) || [],
            valueListening: data.data.listen.map((item) => item.id) || [],
            valueLesson: data.data.learn.map((item) => item.id) || [],
            valueSpeaking: data.data.speak.map((item) => item.id) || [],
            valueTalking: data.data.pronunciation.map((item) => item.id) || [],
          };
          this.listTopicGrammar = data.data.grammar;
          this.listTopicReading = data.data.vocabulary;
          this.listTopicVocabulary = data.data.reading;
          this.listTopicListening = data.data.listen;
          this.listTopicLesson = data.data.learn;
          this.listTopicSpeaking = data.data.speak;
          this.listTopicTalking = data.data.pronunciation;
          this.show = !this.show;
        }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicLesson() {
      try {
        // if (this.listTopicLesson.length < 10) {
          let rs = await baseRequest.get(`/admin/list-topic-lesson?page=${this.pageLesson}&is_exam=true`);
          if (rs.data.status == 200) {
            if (rs.data.data.data.length == 0) {
              this.isAtEndOfOptionsLesson = true;
            }
            const lesson = rs.data.data.data.map((item) => ({
              id: item.id,
              name: item.name,
              is_exam: item.is_exam || null,
            }))
            .filter((itemTopic) => {
              return !this.listTopicLesson.some(existingItem => existingItem.id === itemTopic.id);
            });
            this.listTopicLesson.push(...lesson);
          }
        // }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicVocabulary() {
      try {
        // if (this.listTopicVocabulary.length < 10) {
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
        // }
        
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicGrammar() {
      try {
        // if (this.listTopicGrammar.length < 10) {
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
        // }
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
          // if (this.listTopicListening.length < 10) {
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
        // }
      } catch (e) {
        console.log(e);
      }
    },
    async getAllTopicSpeaking() {
      try {
        // if (this.listTopicSpeaking.length < 10) {
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
        // }
      } catch (e) {
      }
    },
    async getAllTopicTalking() {
      try {
        // if (this.listTopicTalking.length < 10) {
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
        // }
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
            let rs = await baseRequest.post(`/admin/delete-level`, {
              id,
            });
            if (rs.data.status == 200) {
              this.getAllLevel();
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
    this.getAllLevel();
    this.getAllTopicReading();
    this.getAllTopicLesson();
    this.getAllTopicVocabulary();
    this.getAllTopicGrammar();
    this.getAllTopicListening();
    this.getAllTopicSpeaking()
    this.getAllTopicTalking()
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
