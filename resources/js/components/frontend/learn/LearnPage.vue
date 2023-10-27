<template>
  <div class="wrapper h-screen">
    <div class="sticky inset-x-0 top-0 bg-white z-50">
      <header-component :user="user" />
    </div>
    <div class="flex w-full h-full overflow-hidden">
      <div class="flex relative max-h-full w-[350px] overflow-x-auto">
        <!-- Sidebar -->
        <div class="absolute flex top-0 z-20 w-full">
          <button @click="toggle()" :class="[open ? 'hidden' : 'block']"
            class="p-3 focus:outline-none transition-color duration-700 bg-white rounded-br-2xl h-fit">
            <span class="block transform origin-center font-bold">
              <img src="/images/learn/right.svg" alt="" />
            </span>
          </button>
          <!-- Sidebar Content -->
          <div ref="content" class="bg-white overflow-hidden"
            :class="[open ? 'w-[350px]' : 'w-0']">
            <ListLesson :lessons="listLevel" :lessonType="lessonType" v-model="open" :onGetLessonDetail="getLessonDetail" />
            <slot></slot>
          </div>
        </div>
      </div>
      <div class="bg-white my-3 rounded mx-5 flex-grow overflow-x-auto">
        <Lesson :content="lessonContent"/>
      </div>
      <div class="w-[350px] my-3 rounded mr-3">
        <Questions :questions="lessonQuestions"/>
      </div>
    </div>
  </div>
</template>
<script>
import baseRequest from "../../../utils/baseRequest";
import "./learn.css";
import ListLesson from "./ListLesson.vue";
import Lesson from './Lesson.vue';
import Questions from './Questions.vue';

export default {
  props: ["user", "query"],
  components: {
    ListLesson,
    Lesson,
    Questions
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
            this.listLevel = data[this.lessonType];
            console.log('this.listLevel learnpage', this.listLevel);
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
            this.lessonContent = data;
            this.lessonQuestions = data[`question_${this.lessonType}`];
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
    await this.getFullHistory();
    await this.getDetailLevel();
    await this.getLessonDetail(this.listLevel[0]?.id)
  },
  mounted() {
  },
};
</script>
<style scoped>
@media only screen and (min-width: 1280px) {
}

@media only screen and (max-width: 1279px) {
}

@media only screen and (max-width: 900px) {
}
</style>
  