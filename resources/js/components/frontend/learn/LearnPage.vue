<template>
  <div class="wrapper h-screen">
    <div class="sticky inset-x-0 top-0 bg-white z-50">
      <header-component :user="user" />
    </div>
    <div class="w-full h-full overflow-hidden content">
      <div class="flex max-h-full w-[350px] overflow-x-auto sidebar">
        <!-- Sidebar -->
        <div class="flex w-full">
          <button @click="toggle()" :class="[open ? 'hidden' : 'block']"
            class="focus:outline-none transition-color duration-700 sidebarButton">
            <span class="block transform origin-center font-bold">
              <img src="/images/learn/right.svg" alt="" />
            </span>
          </button>
          <!-- Sidebar Content -->
          <div ref="content" class="bg-white overflow-hidden listLesson" :class="[open ? 'w-[350px]' : 'w-0']">
            <ListLesson :lessons="listLevel" :lessonType="lessonType" :levelName="levelName" v-model="open"
              :onGetLessonDetail="getLessonDetail" />
            <slot></slot>
          </div>
        </div>
      </div>
      <div class="main">
        <div class="rounded overflow-x-auto lesson">
          <Lesson :content="lessonContent" />
        </div>
        <div class="w-[350px] rounded  questions">
          <ListeningQuestions ref="listeningQuestions" :topics="lessonQuestions" v-if="this.lessonType == 'listening'"
            :onSubmit="submit" />
          <Questions :questions="lessonQuestions" :onSubmit="submit"/>
        </div>
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
import ListeningQuestions from './ListeningQuestions.vue';

export default {
  props: ["user", "query"],
  components: {
    ListLesson,
    Lesson,
    Questions,
    ListeningQuestions
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
      levelId: null,
      dataHistory: [],
      targetScore: 20,
      open: true,
      dimmer: true,
      right: false,
      lessonType: '',
      lessonContent: '',
      lessonQuestions: null,
      levelName: ''
    };
  },
  methods: {
    toggle() {
      this.open = !this.open;
    },
    async getDetailLevel() {
      const loading = this.$loading({
        lock: true,
        text: "Loading",
        spinner: "el-icon-loading",
        background: "rgba(0, 0, 0, 0.7)",
      });
      try {
        let rs = await baseRequest.post(`/admin/detail-level`, { id: this.levelId });
        if (rs.data.status == 200) {
          const data = {
            grammar: rs.data.data?.grammar,
            writing: rs.data.data?.learn,
            listening: rs.data.data?.listen,
            pronunciation: rs.data.data?.pronunciation,
            reading: rs.data.data?.reading,
            speaking: rs.data.data?.speak,
          };
          console.log(data);
          if (data) {
            this.listLevel = data[this.lessonType];
          }
        }
      } catch (e) {
        console.log(e);
      } finally {
        loading.close();
      }
    },
    async getLessonDetail(lessonId, lessonName) {
      
      this.selectedLessonId = lessonId;
      this.selectedLessonName = lessonName;
      console.log("----------------", lessonId);
      const loading = this.$loading({
        lock: true,
        text: "Loading",
        spinner: "el-icon-loading",
        background: "rgba(0, 0, 0, 0.7)",
      });
      try {
        let rs = await baseRequest.get(`/admin/detail-topic-${this.lessonType}/${this.selectedLessonId}`);
        if (rs.data.status == 200) {
          if (this.lessonType == 'listening') {
            this.lessonContent = rs.data.data;
            this.lessonQuestions = rs.data.data['topic_audio_listen']

          } else {
            this.lessonContent = rs.data.data;
            this.lessonQuestions = rs.data.data[`question_${this.lessonType}`];
          }
        }
      } catch (e) {
        console.log(e);
      } finally {
        loading.close();
      }
    },
    async submit(correctAnswers, questionCount) {
      const requestParams = {
        test_type: this.lessonType,
        topic_name: this.selectedLessonName,
        scores: `${correctAnswers}/${questionCount}`,
        level_id: this.levelId,
        no_exam: true,
        completion_time: 0
      }
      const loading = this.$loading({
        lock: true,
        text: "Loading",
        spinner: "el-icon-loading",
        background: "rgba(0, 0, 0, 0.7)",
      });
      try {
        let rs = await baseRequest.post(`/admin/save-history`, requestParams);
        if (rs.data.status == 200) {
          
        }
      } catch (e) {
        console.log(e);
      } finally {
        loading.close();
      }
      console.log(correctAnswers);
    }
  },
  async created() {
    const { skill, levelId, levelName } = this.query;
    this.lessonType = skill ? skill.toLowerCase() : '';
    this.levelId = levelId;
    this.levelName = levelName;

    await this.getDetailLevel();
    await this.getLessonDetail(this.listLevel[0]?.id, this.listLevel[0]?.name)
  },
  mounted() {
  },
};
</script>
<style scoped>
@media only screen and (min-width: 1280px) {
  .content {
    display: flex;
  }

  .sidebar {}

  .lesson {
    flex-grow: 1;
    margin: 0.75rem 2.25rem;
  }

  .questions {
    width: 350px;
    margin: 0.75rem 0.75rem 0.75rem 0;
  }

  .sidebarButton {
    border-radius: 0px 0px 24px 0px;
    border-right: 2px solid var(--color-base-200, #F4F5F6);
    background: var(--color-white-100, #FFF);
    box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.15);
    padding: 0.75rem;
    height: fit-content;
  }

  .main {
    width: 100%;
    display: flex;
  }
}

@media only screen and (max-width: 1279px) {
  .content {
    display: flex;
  }

  .sidebarButton {
    border-radius: 0px 0px 24px 0px;
    border-right: 2px solid var(--color-base-200, #F4F5F6);
    background: var(--color-white-100, #FFF);
    box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.15);
    height: 96px;
  }

  .main {
    width: 100%;
    display: flex;
    flex-direction: row;
    margin: 12px;
  }

  .sidebar {
    height: 100%;
    position: absolute;
  }

  .lesson {
    margin-right: 12px;
  }
}

@media only screen and (max-width: 900px) {
  .content {
    display: block;
    margin-top: 2px;
  }

  .lesson {
    width: 100%;
    flex-grow: 1;
    margin: 0;
    border-radius: unset !important;
  }

  .questions {
    width: 100%;
    border-radius: unset !important;
  }

  .sidebar {
    height: 100%;
    position: absolute;
  }

  .sidebarButton {
    border-radius: 0px 0px 24px 0px;
    border-right: 2px solid var(--color-base-200, #F4F5F6);
    background: var(--color-white-100, #FFF);
    box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.15);
    height: 96px;
  }

  .main {
    display: block;
  }
}</style>
  