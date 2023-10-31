<template>
  <div class="wrapper h-screen flex flex-column">
    <div class="sticky inset-x-0 top-0 bg-white z-50">
      <main-header-component :user="user" :breadcrumb="breadcrumb"/>
    </div>
    <div class="w-full h-full sm:overflow-hidden overflow-y-auto content content">
      <button @click="toggle()" :class="[open ? 'hidden' : 'block']"
        class="focus:outline-none transition-color duration-700 sidebarButton absolute">
        <span class="block transform origin-center font-bold">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 17.5303C8.17678 17.2374 8.17678 16.7626 8.46967 16.4697L12.9393 12L8.46967 7.53033C8.17678 7.23744 8.17678 6.76256 8.46967 6.46967C8.76256 6.17678 9.23744 6.17678 9.53033 6.46967L14.5303 11.4697C14.671 11.6103 14.75 11.8011 14.75 12C14.75 12.1989 14.671 12.3897 14.5303 12.5303L9.53033 17.5303C9.23744 17.8232 8.76256 17.8232 8.46967 17.5303Z" fill="#2162FF"/>
          </svg>
        </span>
      </button>
      <div class="flex max-h-full sidebar" :class="[!open ? 'hidden' : ' w-[350px] block']" >
        <!-- Sidebar -->
        <div class="flex w-full overflow-auto">
          
          <!-- Sidebar Content -->
            <div ref="content" class="bg-white  listLesson"
            :class="[open ? 'w-[350px]' : 'w-0 hidden']">
              <ListLesson :lessons="listLevel" :lessonType="lessonType" :levelName="levelName" v-model="open"
              :onGetLessonDetail="getLessonDetail" />
            <slot></slot>
          </div>
        </div>
      </div>
      <div class="main">
        <div class="rounded overflow-x-auto lesson flex-grow">
          <Lesson :content="lessonContent" :lessonType="lessonType"/>
        </div>
        <div class="w-[350px] rounded overflow-auto questions">
          <ListeningQuestions ref="listeningQuestions" :topics="lessonQuestions" v-if="this.lessonType == 'listening'"
            :onSubmit="submit" />
          <Questions :questions="lessonQuestions" :lessonType="lessonType" :onSubmit="submit" v-if="this.lessonType != 'listening'"/>
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
import ExamIcon from '../../../../../public/images/header/feature.svg';
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
      levelName: '',
      begin: null,
      breadcrumb: [
        { label: 'Study', icon: ExamIcon },
      ]
    };
  },
  watch: {
    "open" : {
        handler(value) {
            localStorage.setItem('section-list-show', value ? 1 : 0)
        }
    }
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
            vocabulary: rs.data.data?.vocabulary,
          };
          
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
          } else if (this.lessonType == 'pronunciation') {
            rs.data.data[`question_${this.lessonType}`].forEach(function(item) {
                item.answers = item.answer_pronunciation;
                delete item.answer_pronunciation;
                item.right_answers = item.right_answer_pronunciation;
                delete item.right_answer_pronunciation;
            });
            this.lessonContent = rs.data.data;
            this.lessonQuestions = rs.data.data[`question_${this.lessonType}`];
          } else if (this.lessonType == 'reading') {
            rs.data.data[`question_${this.lessonType}`].forEach(function(item) {
                item.answers = item.answer_reading;
                delete item.answer_reading;
                item.right_answers = item.right_answer_reading;
                delete item.right_answer_reading;
            });
            this.lessonContent = rs.data.data;
            this.lessonQuestions = rs.data.data[`question_${this.lessonType}`];
          } else if (this.lessonType == 'writing') {
            rs.data.data['question_lesson'].forEach(function(item) {
                item.answers = item.answer_lesson;
                delete item.answer_lesson;
                item.right_answers = item.right_answer_lesson;
                delete item.right_answer_lesson;
            });
            this.lessonContent = rs.data.data;
            this.lessonQuestions = rs.data.data['question_lesson'];
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
        test_type: this.query.skill ?? '',
        topic_name: this.selectedLessonName,
        scores: `${correctAnswers}/${questionCount}`,
        level_id: this.levelId,
        no_exam: true,
        completion_time: (Date.now() - this.begin) || 0
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
    }
  },
  async created() {
    const { skill, levelId, levelName } = this.query;
    this.lessonType = skill ? skill.toLowerCase() : '';
    this.levelId = levelId;
    this.levelName = levelName;
    this.breadcrumb = [... this.breadcrumb, {
      label: levelName
    }, {
      label: skill
    }]
    this.begin = Date.now();
    await this.getDetailLevel();
    await this.getLessonDetail(this.listLevel[0]?.id, this.listLevel[0]?.name)
  },
  async mounted() {
    let x = await localStorage.getItem('section-list-show')
    this.open = Number(x)
  }
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
  