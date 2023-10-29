<template>
    <div class="container">
      <transition name="fade">
        <div class="w-full h-full" v-if="show">
          <div
            class="md:absolute fixed inset-0 bg-blur flex items-center justify-center z-10"
          >
            <div
              class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4 max-h-[540px] overflow-y-scroll"
            >
              <div class="py-2 relative">
                <h1 class="font-semibold uppercase text-[14px] mb-4">
                  Add Audio
                </h1>
                <span
                  class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer"
                  @click="closeModel"
                >
                  <i class="lnr-cross"></i>
                </span>
              </div>
              <hr />
              <div class="my-2">
                <el-input class="mb-2" v-model="searchValue" placeholder="Search" />
                <div v-if="dataAudio.length == 0">
                  <el-empty description="No question"></el-empty>
                </div>
                <div
                  class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-2 px-2 text-[14px] font-semibold mb-4"
                  v-for="(itemAudio, index) in dataAudio"
                  :key="itemAudio.id"
                  v-else
                >
                  <span class="flex-1">{{ itemAudio.name }}</span>
                  <div class="flex items-center">
                    <el-tooltip
                      class="item"
                      effect="dark"
                      :content="`Questions: ${itemAudio.question_listening.length}`"
                      placement="top-start"
                    >
                      <el-button
                        icon="el-icon-info"
                        plain
                        circle
                        size="small"
                        class="mr-2 text-[20px]"
                      ></el-button>
                    </el-tooltip>
                    <div ref="pause" class="hidden">
                      <el-button
                        size="small"
                        type="warning"
                        plain
                        icon="el-icon-video-pause"
                        class="text-[20px]"
                        circle
                        @click="pauseAudio(index)"
                      ></el-button>
                    </div>
                    <el-button
                      icon="el-icon-plus"
                      size="mini"
                      class="ml-2"
                      @click="addTopic(itemAudio.id)"
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
      <p class="font-semibold text-[15px] mt-4 mb-2">Audios of Topic</p>
      <audio
        hidden
        id="audio-preview"
        autoplay
        class="w-full"
        controls
        v-show="file != ''"
      />
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div
          class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-4 px-4 text-[14px] font-semibold"
          v-for="item in detailTopic.audioList"
          :key="item.idAudio"
        >
          <span class="flex-1">{{ item.nameAudio }}</span>
          <div class="flex items-center">
            <el-tooltip
              class="item"
              effect="dark"
              :content="`Questions: ${item.count}`"
              placement="top-start"
            >
              <el-button
                icon="el-icon-info"
                plain
                circle
                size="small"
                class="mr-2 text-[20px]"
              ></el-button>
            </el-tooltip>
            <el-button
              size="small"
              type="danger"
              plain
              icon="el-icon-delete"
              circle
              class="ml-2"
              @click="removeTopic(item.idAudio)"
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
  
  export default {
    components: {
      StarRating,
    },
    data() {
      return {
        show: false,
        listTopic: [],
        detailTopic: {
          id: null,
          name: null,
          description: null,
          audioList: [],
          isExam: false
        },
        dataAudio: [],
        take: 5,
        isEditTitle: false,
        ApiUrl: $Api.baseUrl,
        baseApi: $Api.baseUrl,
        file: null,
        idPlay: null,
        timeOut: null,
        searchValue: ''
      };
    },
    props: ["param"],
    computed: {
    },
    watch: {
      "detailTopic.isExam": {
        handler(value) {
          if (typeof value == "boolean") {
              this.setStatusExam(value);
          }
        },
        immediate: false
      },
      "searchValue" : {
        handler(value) {
          clearTimeout(this.timeOut)
          this.timeOut = setTimeout(async() => {
              await this.getAllAudio()
          }, 300);
        }
      }
    },
    methods: {
      resetFeild() {
        this.show = false;
        this.topicData = {
          name: null,
          description: null,
        };
      },
      closeModel() {
        this.show = false;
        let audio = document.getElementById("audio-preview");
        audio.pause();
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
            `/admin/detail-topic-listening/${this.param}`
          );
          if (rs.data.status == 200) {
            let data = rs.data.data;
            this.detailTopic = {
              id: data.id,
              name: data.name,
              description: data.description,
              isExam: data.is_exam === 1 ? true : false,
              audioList: data.topic_audio_listen?.map((item) => {
                return {
                  idAudio: item.id,
                  nameAudio: item.name,
                  audio: item.audio,
                  count: item.question_listening.length || 0,
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
          let rs = await baseRequest.post(`/admin/delete-topic-vocabulary?search=${this.searchValue || ''}`, {
            id,
          });
          if (rs.data.status == 200) {
            this.getAllTopic();
          }
        } catch (e) {
          console.log(e);
        }
      },
      async getAllAudio() {
        try {
          let { data } = await baseRequest.get(`/admin/get-audio-listening${this.searchValue && '?search=' + this.searchValue}`);
          data = data.data;
          this.dataAudio = data.data.filter(
            (elem) =>
              !this.detailTopic.audioList.find(
                ({ idAudio }) => elem.id === idAudio
              )
          );
        } catch (error) {
          console.log(error);
        }
      },
      async addTopic(id) {
        try {
          let { data } = await baseRequest.post(
            `/admin/add-audio-to-topic-listening`,
            {
              idTopic: this.detailTopic.id,
              idAudio: id,
            }
          );
          if (data.status == 200) {
            this.getDetailTopic();
            this.dataAudio = this.dataAudio.filter((item) => item.id != id);
          }
        } catch (error) {
          console.log(error);
        }
      },
      async removeTopic(id) {
        try {
          let { data } = await baseRequest.post(
            `/admin/remove-audio-from-topic-listening`,
            {
              idTopic: this.detailTopic.id,
              idAudio: id,
            }
          );
          if (data.status == 200) {
            this.getDetailTopic();
          }
        } catch (error) {
          console.log(error);
        }
      },
      async saveChangeTitle(id) {
        try {
          let { data } = await baseRequest.post(`/admin/edit-topic-listening`, {
            id,
            name: this.detailTopic.name,
          });
          if (data.status == 200) {
            this.isEditTitle = false;
            this.getDetailTopic();
          }
        } catch (error) {
          console.log(error);
        }
      },
      playAudio(audioMusic, index) {
        this.idPlay = index;
        let audio = document.getElementById("audio-preview");
        audio.src = audioMusic;
        this.$refs.play[index].classList.add("hidden");
        this.$refs.pause[index].classList.remove("hidden");
        this.$refs.pause[index].classList.add("block");
        for (let i = 0; i < this.$refs.pause.length; i++) {
          if (i != index) {
            this.$refs.play[i].classList.remove("hidden");
            this.$refs.play[i].classList.add("block");
            this.$refs.pause[i].classList.remove("block");
            this.$refs.pause[i].classList.add("hidden");
          }
        }
      },
      pauseAudio(index) {
        let audio = document.getElementById("audio-preview");
        audio.pause();
        this.$refs.play[index].classList.remove("hidden");
        this.$refs.play[index].classList.add("block");
        this.$refs.pause[index].classList.remove("block");
        this.$refs.pause[index].classList.add("hidden");
      },
      async setStatusExam(value) {
        try {
          let rs = await baseRequest.post(`/admin/update-status-exam`, {
            is_exam: value,
            class: "Listening",
            model: "Listen",
            id: this.detailTopic.id,
          });
          if (rs.data.status == 200) {
          }
        } catch (e) {
          console.log(e);
        }
      },
    },
  
    created() {
      this.getDetailTopic();
      this.getAllAudio();
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
  