<template>
  <div class="w-full relative">
    <div class="sticky inset-x-0 top-0 bg-white z-50">
      <main-header-component :user="user" :breadcrumb="breadcrumb"/>
    </div>
    <div class="container w-full content relative">
      <div class="flex justify-between pt-3">
        <p class="text-[24px]">Exam List</p>
        <div>
          <el-input v-model="searchName" class="border-2" style="border-color: #2162FF; border-radius: 5px;" placeholder="Search"></el-input>
        </div>
      </div>
      <el-tabs v-model="activeName">
        <el-tab-pane label="All" name="All">
          <div
            class="exam flex mt-3 justify-between "
            v-for="item in filterData"
            :key="item.id"
            @click="handleClick(item)"
          >
          <div>
            <div class="flex">
              <div class="flex items-center" style="background: black; color: white; border-radius: 5px; padding: 4px 6px;">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.476 11.8408C6.35491 11.8408 6.96261 12.1572 7.23382 12.3431C7.32924 12.3933 7.58036 12.549 7.64565 12.564V4.21694C7.26897 3.56403 6.2394 3.05176 5.18973 3.05176C3.79855 3.05176 2.6635 3.83524 2.36719 4.42787V12.0166C2.37221 12.4636 2.62333 12.6444 2.93471 12.6444C3.16574 12.6444 3.31138 12.564 3.46708 12.4435C3.7885 12.1823 4.52679 11.8408 5.476 11.8408ZM10.5285 11.8408C11.4777 11.8408 12.2109 12.1823 12.5324 12.4435C12.6881 12.564 12.8337 12.6444 13.0597 12.6444C13.3711 12.6444 13.6323 12.4636 13.6323 12.0166V4.42787C13.3359 3.83524 12.2009 3.05176 10.8147 3.05176C9.76507 3.05176 8.73047 3.56403 8.35882 4.21694V12.5741C8.41908 12.559 8.6702 12.3983 8.77065 12.3431C9.04185 12.1572 9.64955 11.8408 10.5285 11.8408Z" fill="white"/>
                </svg>
                <div class="time ml-2">
                  {{ getType(item.name) }}
                </div>
              </div>
              <div class="flex items-center ml-3" style="background: #bcbec1; color: black; border-radius: 5px; padding: 4px 6px;">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.0026 4.5C5.70142 4.5 3.83594 6.36548 3.83594 8.66667C3.83594 10.9679 5.70142 12.8333 8.0026 12.8333C10.3038 12.8333 12.1693 10.9679 12.1693 8.66667C12.1693 6.36548 10.3038 4.5 8.0026 4.5ZM2.83594 8.66667C2.83594 5.8132 5.14913 3.5 8.0026 3.5C10.8561 3.5 13.1693 5.8132 13.1693 8.66667C13.1693 11.5201 10.8561 13.8333 8.0026 13.8333C5.14913 13.8333 2.83594 11.5201 2.83594 8.66667Z" fill="#141416"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 5.83301C8.27614 5.83301 8.5 6.05687 8.5 6.33301V8.42603L9.97901 9.60924C10.1946 9.78174 10.2296 10.0964 10.0571 10.312C9.8846 10.5277 9.56995 10.5626 9.35432 10.3901L7.68765 9.05678C7.56904 8.96189 7.5 8.81823 7.5 8.66634V6.33301C7.5 6.05687 7.72386 5.83301 8 5.83301Z" fill="#141416"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 1.33301C5.5 1.05687 5.72386 0.833008 6 0.833008H10C10.2761 0.833008 10.5 1.05687 10.5 1.33301C10.5 1.60915 10.2761 1.83301 10 1.83301H6C5.72386 1.83301 5.5 1.60915 5.5 1.33301Z" fill="#141416"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0.833008C8.27614 0.833008 8.5 1.05687 8.5 1.33301L8.5 3.99967C8.5 4.27582 8.27614 4.49967 8 4.49967C7.72386 4.49967 7.5 4.27582 7.5 3.99967L7.5 1.33301C7.5 1.05687 7.72386 0.833008 8 0.833008Z" fill="#141416"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0176 4.31344C13.2129 4.5087 13.2129 4.82528 13.0176 5.02055L12.0176 6.02055C11.8224 6.21581 11.5058 6.21581 11.3105 6.02055C11.1152 5.82528 11.1152 5.5087 11.3105 5.31344L12.3105 4.31344C12.5058 4.11818 12.8224 4.11818 13.0176 4.31344Z" fill="#141416"/>
                </svg>
                <div class="time">
                  00:45:00
                </div>
              </div>
            </div>
            <p class="text-[16px] mt-3">{{ item.name }}</p>
          </div>
          <div class="flex items-center" >
            <div class="flex start cursor-pointer" @click="handleClick(item)">
              <p class="text-[18px] hidden sm:block mr-2">Start now</p>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4697 16.5303C13.1768 16.2374 13.1768 15.7626 13.4697 15.4697L16.9393 12L13.4697 8.53033C13.1768 8.23744 13.1768 7.76256 13.4697 7.46967C13.7626 7.17678 14.2374 7.17678 14.5303 7.46967L18.5303 11.4697C18.8232 11.7626 18.8232 12.2374 18.5303 12.5303L14.5303 16.5303C14.2374 16.8232 13.7626 16.8232 13.4697 16.5303Z" fill="#141416"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.75 12C18.75 12.4142 18.4142 12.75 18 12.75L6 12.75C5.58579 12.75 5.25 12.4142 5.25 12C5.25 11.5858 5.58579 11.25 6 11.25L18 11.25C18.4142 11.25 18.75 11.5858 18.75 12Z" fill="#141416"/>
            </svg>
            </div>
           
          </div>
        </div>
        </el-tab-pane>
      </el-tabs>
      
    </div>

    <!-- <footer-component /> -->
  </div>
</template>
  <script>
import baseRequest from "../../../utils/baseRequest";
import ExamIcon from '../../../../../public/images/header/exam.svg';
export default {
  props: ["data", "user"],
  data() {
    return {
      show: false,
      currentClick: null,
      history_id: null,
      isExamDone: false,
      activeName: "All",
      searchName: "",
      filterData: null,
      breadcrumb: [
          {label: 'Exam', icon: ExamIcon},
      ]
    };
  },
  components: {},
  methods: {
    dongMoPopup(value) {
      this.show = value;
    },
    async handleClick(item) {
      window.location.href = `${$Api.baseUrl}/exam/${item.id}`;
    },
    async startExam() {
      if (this.currentClick !== null && !this.isExamDone) {
        window.location.href = `${$Api.baseUrl}/english-level-test/Listening?testId=${this.currentClick.listening_id}&l=${this.currentClick.listening_id}&s=${this.currentClick.speaking_id}&r=${this.currentClick.reading_id}&w=${this.currentClick.writing_id}&historyId=${this.history_id}&examId=${this.currentClick.id}&exam=true`;
      }else {
        window.location.href = `${$Api.baseUrl}/exam/result/${this.history_id}&l=${this.currentClick.listening_id}&s=${this.currentClick.speaking_id}&w=${this.currentClick.writing_id}&r=${this.currentClick.reading_id}&historyId=${this.history_id}&exam=true`;
      }
    },
    getType(name) {
      let strimName = name.trim();
      return strimName.slice(strimName.indexOf('(') + 1, strimName.length -1);
    }
  },
  created() {
    this.filterData = this.data
  },
  watch: {
    "searchName": {
      handler(value) {
          const x = this.data.filter(e => {
            return !value || e.name.indexOf(value) > 0
          })
          this.filterData = x
        }
    }
  }
};
</script>
  <style scoped>
.content {
  height: calc(100vh - 90px);
}
.exam {
  border-radius: 8px;
  padding: 16px;
  background-color: #e6e8ec;
}
.exam:hover {
}
.start {
  padding: 8px 20px;
}
.start:hover, .start:hover * {
  background-color: #2162FF;
  color: white;
  fill: white;
  border-radius: 5px;
}
.box-content {
  background: linear-gradient(
    96.6deg,
    rgba(0, 115, 121, 0.112) 11.23%,
    rgba(0, 95, 100, 0) 115.9%
  );
  box-sizing: border-box;
}
.time {
  font-size: 14px;
  font-style: normal;
  font-weight: 700;
  line-height: 24px; /* 171.429% */
  letter-spacing: 1.4px;
  text-transform: uppercase;
}
</style>
  