<template>
  <div class="wrapper">
    <header-component :user="user" />
    <transition name="fade">
      <div class="w-full h-full relative z-10 content" v-show="show">
        <div class="absolute w-[70%] h-[60vh] bg-box-lesson rounded-md p-4">
          <span
            class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer text-[#fff]"
            @click="dongMoPopup()"
          >
            <i class="lnr-cross"></i>
          </span>
          <h2 class="text-[26px] text-center text-white uppercase">
            Danh sách bài học
          </h2>
          <div class="w-full border relative mt-2 mb-4"></div>
          <div
            class="w-full overflow-y-scroll h-full"
            v-if="listLesson.length > 0"
          >
            <div
              class="grid grid-cols-1 gap-2 md:grid-cols-2 xl:grid-cols-4 mt-4"
            >
              <div
                class="p-3 border text-[#fff] text-[18px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 text-center font-thin cursor-pointer exam relative"
                :class="checkPassExam(keyUrl, itemLesson) ? 'active' : ''"
                @click="openExamPage(keyUrl, itemLesson.id)"
                v-for="itemLesson in listLesson"
                :key="itemLesson.id"
              >
                <div
                  class="absolute top-[50%] translate-y-[-50%] right-[8px] bg-[green] border rounded-full w-5 h-5 p-2 hidden justify-center items-center exam-pass"
                >
                  <i class="fa-solid fa-check text-sm"></i>
                </div>
                {{ itemLesson.name }}
              </div>
            </div>
          </div>
          <div
            v-else
            class="p-3 text-[#fff] text-[18px] leading-[1] mx-2 text-center font-thin"
          >
            Không có bài học nào
          </div>
        </div>
      </div>
    </transition>
    <div id="background-wrap" class="content">
      <div class="cloud-box px-2" id="cloud-box" v-show="!show">
        <div
          class="box-landing"
          :id="`cloud-${listLevel.length - index}`"
          v-for="(item, index) in listLevel"
          :key="index"
        >
          <div class="box-landing-inner">
            <div class="box-filter"></div>
            <div class="box-content">
              <h2 class="title">{{ item.name }}</h2>
              <div>
                <div class="w-full border relative mt-2 mb-4"></div>
                <div class="flex justify-center flex-col items-center">
                  <div class="mt-2">
                    <div class="flex justify-center mt-4">
                      <el-tooltip
                        class="item"
                        effect="dark"
                        content="Viết"
                        placement="right"
                      >
                        <div
                          class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2"
                          @click="x(item, 'WRITING')"
                        >
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </div>
                      </el-tooltip>
                      <el-tooltip
                        class="item"
                        effect="dark"
                        content="Luyện âm"
                        placement="right"
                      >
                        <div
                          class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2"
                          @click="x(item, 'SPEAKING')"
                        >
                          <i class="fa-solid fa-head-side-cough"></i>
                        </div>
                      </el-tooltip>
                      <el-tooltip
                        class="item"
                        effect="dark"
                        content="Luyện nói"
                        placement="right"
                      >
                        <div
                          class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2"
                          @click="x(item, 'TALKING')"
                        >
                        <i class="fa-solid fa-microphone"></i>
                        </div>
                      </el-tooltip>
                    </div>
                  </div>
                  <div class="flex justify-center mt-4">
                    <el-tooltip
                      class="item"
                      effect="dark"
                      content="Nghe"
                      placement="bottom"
                    >
                      <div
                        class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam relative"
                        @click="x(item, 'LISTEN')"
                      >
                        <i class="fa-solid fa-ear-listen"></i>
                      </div>
                    </el-tooltip>
                    <el-tooltip
                      class="item"
                      effect="dark"
                      content="Đọc"
                      placement="bottom"
                    >
                      <div
                        class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam relative"
                        @click="x(item, 'READ')"
                      >
                        <i class="fa-solid fa-book-open-reader"></i>
                      </div>
                    </el-tooltip>
                    <el-tooltip
                      class="item"
                      effect="dark"
                      content="Từ vựng"
                      placement="bottom"
                    >
                      <div
                        class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam relative"
                        @click="x(item, '')"
                      >
                        <i class="fa-solid fa-spell-check"></i>
                      </div>
                    </el-tooltip>
                    <el-tooltip
                      class="item"
                      effect="dark"
                      content="Ngữ pháp"
                      placement="bottom"
                    >
                      <div
                        class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam relative"
                        @click="x(item, 'GRAMMAR')"
                      >
                        <i class="fa-solid fa-gears"></i>
                      </div>
                    </el-tooltip>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="absolute bottom-[5%] right-[5%] z-10" v-show="!show">
      <div class="mb-4">
        <el-button
          :disabled="!(level < listLevel.length)"
          icon="el-icon-arrow-up"
          circle
          @click="cloudUp"
        ></el-button>
      </div>
      <div>
        <el-button
          :disabled="!(level > 1)"
          icon="el-icon-arrow-down"
          circle
          @click="cloudDown"
        ></el-button>
      </div>
    </div>
  </div>
</template>
  <script>
import baseRequest from "../../../utils/baseRequest";
import "./learn.css";
export default {
  props: ["user"],

  data() {
    return {
      level: 1,
      show: false,
      listLevel: [],
      listLesson: [],
      levelCountPassed: 1,
      examResult: [],
      keyUrl: "",
      idLevel: null,
      dataHistory: [],
      targetScore: 20,
    };
  },
  methods: {
    cloudUp() {
      if (this.level < this.listLevel.length) {
        this.level++;
        this.scrollToCloud();
      }
      return;
    },
    cloudDown() {
      if (this.level > 1) {
        this.level--;
        this.scrollToCloud();
      }
      return;
    },
    scrollToCloud() {
      let cloud = document.getElementById(`cloud-${this.level}`);
      cloud.scrollIntoView({
        behavior: "smooth",
        block: "center",
        inline: "center",
      });
    },
    dongMoPopup() {
      this.show = !this.show;
    },
    x(itemLevel, type) {
      this.listLesson = [];
      this.keyUrl = type;
      this.idLevel = itemLevel.id;
      switch (type) {
        case "WRITING": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).lessons;
          break;
        }
        case "READ": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).reads;
          break;
        }
        case "LISTEN": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).listens;
          break;
        }
        case "": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).vocabularies;
          break;
        }
        case "GRAMMAR": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).grammars;
          break;
        }
        case "SPEAKING": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).speaks;
          break;
        }
        case "TALKING": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).talks;
          break;
        }
        default: {
          break;
        }
      }
      this.show = true;
    },
    async getAllLevel() {
      try {
        let rs = await baseRequest.get(`/admin/get-all-level`);
        if (rs.data.status == 200) {
          this.listLevel = rs.data.data.map((item) => ({
            id: item.id,
            name: item.name,
            listens: item.listen,
            reads: item.reading,
            vocabularies: item.vocabulary,
            grammars: item.grammar,
            lessons: item.learn || [],
            speaks: item.speak || [],
            talks: item.question_luyen_am || []
          }));
        }
      } catch (e) {
        console.log(e);
      }
    },
    async checkPassedLevel() {
      //   let temp = this.dataHistory;
      this.listLevel.forEach((item) => {
        let tongSoBaiThiDaHoanThanh = this.dataHistory.filter(
          (itemHistory, id) => {
            let score = itemHistory.scores;
            score = score.split("/");
            let toltalScore = (parseInt(score[0]) / parseInt(score[1])) * 100;
            return (
              itemHistory.level_id == item.id && toltalScore >= this.targetScore
            );
          }
        );

        let countVocabulary = item.vocabularies.length || 0;

        let countGrammar = item.grammars.length || 0;

        let countRead = item.reads.length || 0;

        let countListen = item.listens.length || 0;

        let tongSoBaiThi =
          countVocabulary + countGrammar + countRead + countListen;
        if (tongSoBaiThi === tongSoBaiThiDaHoanThanh.length) {
          if (this.level < this.listLevel.length) {
            this.level++;
          }
        }
      });
      if (this.level === 1) {
        this.listLevel = this.listLevel.slice(0, this.level);
      } else {
        this.listLevel = this.listLevel.reverse().slice(0, this.level);
      }
    },
    openExamPage(type, id) {
      switch (type) {
        case "READ":
          window.location.href = `${$Api.baseUrl}/english-level-test/Reading?testId=${id}&levelId=${this.idLevel}`;
          break;
        case "LISTEN":
          window.location.href = `${$Api.baseUrl}/english-level-test/Listening?testId=${id}&levelId=${this.idLevel}`;
          break;
        case "":
          window.location.href = `${$Api.baseUrl}/english-level-test/Vocabulary?testId=${id}&levelId=${this.idLevel}`;
          break;
        case "GRAMMAR":
          window.location.href = `${$Api.baseUrl}/english-level-test/Grammar?testId=${id}&levelId=${this.idLevel}`;
          break;
        case "WRITING":
          window.location.href = `${$Api.baseUrl}/english-level-test/Writing?testId=${id}&levelId=${this.idLevel}`;
          break;
        case "SPEAKING":
          window.location.href = `${$Api.baseUrl}/english-level-test/Speaking?testId=${id}&levelId=${this.idLevel}`;
          break;
          case "TALKING":
          window.location.href = `${$Api.baseUrl}/english-level-test/Talking?testId=${id}&levelId=${this.idLevel}`;
          break;
        default:
          window.location.href = `${$Api.baseUrl}/lesson/${id}`;
      }
    },
    findLevel(id) {
      return this.examResult.find((item) => item.level_id === id);
    },
    async getFullHistory() {
      try {
        let rs = await baseRequest.get(`/admin/get-full-history`);
        if (rs.data.status == 200) {
          this.dataHistory = rs.data.data;
        }
      } catch (e) {
        console.log(e);
      }
    },
    checkPassExam(type, item) {
      let temp = null;
      switch (type) {
        case "READ":
          temp = "Reading";
          break;
        case "LISTEN":
          temp = "Listening";
          break;
        case "":
          temp = "Vocabulary";
          break;
        case "GRAMMAR":
          temp = "Grammar";
          break;
        case "TALKING":
          temp = "Talking";
          break;
          case "WRITING":
          temp = "Writing";
          break;
        default:
          temp = "Lesson";
      }
      let dataArrTemp = this.dataHistory.filter(
        (itemH) => itemH.level_id == this.idLevel
      );
      let rs;
      if (dataArrTemp.length > 0) {
        rs = dataArrTemp.findIndex((itemHistory, id) => {
          return (
            itemHistory.test_type == temp &&
            itemHistory.exam_id == item.id
          );
        });
      } else {
        rs = -1;
      }
      return rs != -1;
    },
  },
  async created() {
    await this.getAllLevel();
    await this.getFullHistory();
    this.checkPassedLevel();
  },
  mounted() {
    setTimeout(() => {
      this.scrollToCloud();
    }, 1000);
  },
};
</script>
  <style scoped>
.title {
  font-size: 40px;
  text-align: center;
  z-index: 3;
  color: #fff;
}
::-webkit-scrollbar {
  display: none;
}
.box-content {
  width: 100%;
  position: relative;
  padding: 40px;
  z-index: 6;
  background: linear-gradient(
    96.6deg,
    rgba(0, 115, 121, 0.112) 11.23%,
    rgba(0, 95, 100, 0) 115.9%
  );

  box-sizing: border-box;
}
.box-filter {
  position: absolute;
  inset: 0;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  z-index: 5;
}
.box-disable {
  cursor: not-allowed;
  position: relative;
}
.box-disable::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 2px;
  background: #fff;
  transform: rotate(45deg);
}
.box-disable::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 2px;
  background: #fff;
  transform: rotate(-45deg);
}

.box-disable:hover {
  background: transparent;
  color: #fff;
}

.bg-box-lesson {
  width: 80%;
  left: 50%;
  top: 35%;
  transform: translate(-50%, -50%);
  /* z-index: 6; */
  background: linear-gradient(
    96.6deg,
    rgba(0, 115, 121, 0.112) 11.23%,
    rgba(0, 95, 100, 0) 115.9%
  );
  box-sizing: border-box;
}
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

.exam {
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
  font-size: 16px;
  font-weight: 600;
}

.exam.active {
  background: green;
  color: #fff;
}

.exam.active > .exam-pass {
  display: flex;
}
</style>
  