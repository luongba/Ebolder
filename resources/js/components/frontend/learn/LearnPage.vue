<template>
  <div class="wrapper h-screen">
    <div class="sticky inset-x-0 top-0 bg-white z-50">
      <header-component :user="user" />
    </div>
    <div class="grid grid-cols-5">
      <div class="flex relative">
        <!-- Sidebar -->
        <div class="absolute flex top-0 z-20" :class="[right ? 'right-0 flex-row' : 'left-0 flex-row-reverse']">
          <button @click="toggle()" :class="[open ? 'hidden' : 'block']"
            class="p-3 focus:outline-none transition-color duration-300 bg-white rounded-br-2xl h-fit">
            <span class="block transform origin-center font-bold">
              <img src="/images/learn/right.svg" alt="" />
            </span>
          </button>
          <!-- Sidebar Content -->
          <div ref="content" class="transition-all duration-700 bg-white overflow-hidden"
            :class="[open ? 'w-[350px]' : 'w-0']">
            <ListLesson :data="listLevel" :lessonType="lessonType" v-model="open" :onGetLessonDetail="getLessonDetail" />
            <slot></slot>
          </div>
        </div>

        <transition name="fade">
          <div v-if="dimmer && open" @click="toggle()"
            class="flex-1 bg-gray-400 bg-opacity-75 active:outline-none z-10" />
        </transition>
      </div>
      <div class="col-span-3 bg-white">
        <Lesson :content="lessonContent" />
      </div>
      <div class="col">
        QUESTIONS
      </div>
    </div>
  </div>
</template>
<script>
import baseRequest from "../../../utils/baseRequest";
import "./learn.css";
import ListLesson from "./ListLesson.vue"
import Lesson from './Lesson.vue'

export default {
  props: ["user", "query"],

  components: {
    ListLesson,
    Lesson
  },

  data() {
    return {
      level: 1,
      show: false,
      listLevel: [],
      listLesson: [],
      levelCountPassed: 1,
      examResult: [],
      keyUrl: "",
      idLevel: 29,
      dataHistory: [],
      targetScore: 20,
      open: true,
      dimmer: true,
      right: false,
      lessonType: 'grammar',
      lessonContent: '',
      lessonQuestions: null
    };
  },
  methods: {
    toggle() {
      this.open = !this.open;
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
        case "VOCABULARY": {
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
        case "PRONUNCIATION": {
          this.listLesson = this.listLevel.find(
            (item) => item.id === itemLevel.id
          ).pronunciations;
          break;
        }
        default: {
          break;
        }
      }
      this.show = true;
    },
    async getAllLevel() {
      const loading = this.$loading({
        lock: true,
        text: "Loading",
        spinner: "el-icon-loading",
        background: "rgba(0, 0, 0, 0.7)",
      });
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
            pronunciations: item.pronunciation || [],
          }));
        }
      } catch (e) {
        console.log(e);
      } finally {
        loading.close();
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
        case "VOCABULARY":
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
        case "PRONUNCIATION":
          window.location.href = `${$Api.baseUrl}/english-level-test/Pronunciation?testId=${id}&levelId=${this.idLevel}`;
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
        case "VOCABULARY":
          temp = "Vocabulary";
          break;
        case "GRAMMAR":
          temp = "Grammar";
          break;
        case "PRONUNCIATION":
          temp = "Pronunciation";
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
            itemHistory.test_type == temp && itemHistory.exam_id == item.id
          );
        });
      } else {
        rs = -1;
      }
      return rs != -1;
    },
    async getDetailLevel() {
      const loading = this.$loading({
        lock: true,
        text: "Loading",
        spinner: "el-icon-loading",
        background: "rgba(0, 0, 0, 0.7)",
      });
      try {
        let rs = await baseRequest.post(`/admin/detail-level`, { id: this.idLevel });
        if (rs.data.status == 200) {
          const data = rs.data.data;
          if (data) {
            this.listLevel = data[this.lessonType]
          }
        }
      } catch (e) {
        console.log(e);
      } finally {
        loading.close();
      }
    },
    async getLessonDetail(lessonId) {
      this.selectedLessonId = lessonId;
      const loading = this.$loading({
        lock: true,
        text: "Loading",
        spinner: "el-icon-loading",
        background: "rgba(0, 0, 0, 0.7)",
      });
      try {
        let rs = await baseRequest.get(`/admin/detail-topic-${this.lessonType}/${this.selectedLessonId}`);
        if (rs.data.status == 200) {
          const data = rs.data.data;
          if (data) {
            this.lessonContent = data.description;
            this.lessonQuestions = data[`question_${this.lessonType}`];
            console.log('this.lessonType', this.lessonType);
            console.log('data[`question_${this.lessonType}`]', data[`question_${this.lessonType}`]);
          }
        }
      } catch (e) {
        console.log(e);
      } finally {
        loading.close();
      }
    }
  },
  async created() {
    await this.getAllLevel();
    await this.getFullHistory();
    await this.getDetailLevel();
    await this.getLessonDetail(this.listLevel[0]?.id)
  },
  mounted() {
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
  background: linear-gradient(96.6deg,
      rgba(0, 115, 121, 0.112) 11.23%,
      rgba(0, 95, 100, 0) 115.9%);

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
  background: linear-gradient(96.6deg,
      rgba(0, 115, 121, 0.112) 11.23%,
      rgba(0, 95, 100, 0) 115.9%);
  box-sizing: border-box;
}

.bg-blur {
  background: rgba(0, 0, 0, 0.3);
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}

.fade-enter,
.fade-leave-to

/* .fade-leave-active below version 2.1.8 */
  {
  opacity: 0;
}

.exam {
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
  font-weight: 600;
}

.exam.active {
  background: green;
  color: #fff;
}

.exam.active>.exam-pass {
  display: flex;
}
</style>
  