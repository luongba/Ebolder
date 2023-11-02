<template>
  <div class="w-full h-[100vh] overflow-y-scroll">
    <div class="sticky inset-x-0 top-0 bg-white z-50">
      <main-header-component :user="user" :breadcrumb="breadcrumb"/>
    </div>
    <div class="w-full mt-4">
      <div class="container mb-4">
        <p class="text-[24px]">History</p>
        <el-tabs v-model="activeName">
          <el-tab-pane label="Exam" name="Exam">
            <div
              class="exam flex mt-3 justify-between sm:flex-row flex-col"
              v-for="item in data"
              :key="item.id"
            >
            <div>
              <div class="flex">
                <div class="flex items-center" style="background: black; color: white; border-radius: 5px; padding: 4px 6px;">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.476 11.8408C6.35491 11.8408 6.96261 12.1572 7.23382 12.3431C7.32924 12.3933 7.58036 12.549 7.64565 12.564V4.21694C7.26897 3.56403 6.2394 3.05176 5.18973 3.05176C3.79855 3.05176 2.6635 3.83524 2.36719 4.42787V12.0166C2.37221 12.4636 2.62333 12.6444 2.93471 12.6444C3.16574 12.6444 3.31138 12.564 3.46708 12.4435C3.7885 12.1823 4.52679 11.8408 5.476 11.8408ZM10.5285 11.8408C11.4777 11.8408 12.2109 12.1823 12.5324 12.4435C12.6881 12.564 12.8337 12.6444 13.0597 12.6444C13.3711 12.6444 13.6323 12.4636 13.6323 12.0166V4.42787C13.3359 3.83524 12.2009 3.05176 10.8147 3.05176C9.76507 3.05176 8.73047 3.56403 8.35882 4.21694V12.5741C8.41908 12.559 8.6702 12.3983 8.77065 12.3431C9.04185 12.1572 9.64955 11.8408 10.5285 11.8408Z" fill="white"/>
                  </svg>
                  <div class="time ml-2">
                    Exam
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
                    {{ completion_time(item.time) || '00:00:00'  }}
                  </div>
                </div>
              </div>
              <p class="text-[16px] mt-3">{{ item.exam?.name || ''}}</p>
              <p class="text-[14px] mt-3 whitespace-nowrap">{{ created_at(item?.created_at) || ''}}</p>
            </div>
            <div class="flex w-100 items-center justify-start sm:justify-end mt-3 sm:mt-0" >
              <div class="grid grid-cols-2 gap-4">
                <div class="flex justify-between">
                  <div>
                  Listening: 
                  </div>
                  <div class="ml-2 exam-point">
                    {{  item.result_listening ?? 0 }}
                  </div>
                </div>
                <div class="flex justify-between">
                  <div>
                    Speaking: 
                  </div>
                  <div class="ml-2 exam-point">
                    {{  item.result_speaking ?? 0 }}
                  </div>
                </div>
                <div class="flex justify-between">
                  <div>
                    Reading: 
                  </div>
                  <div class="ml-2 exam-point">
                    {{  item.result_reading ?? 0 }}
                  </div>
                </div>
                <div class="flex justify-between">
                  <div>
                    Writing: 
                  </div>
                  <div class="ml-2 exam-point">
                    {{  item.result_writing ?? 0 }}
                  </div>
                </div>
              </div>
            
            </div>
          </div>
          </el-tab-pane>
          <el-tab-pane label="Study" name="Study">
            <div
              class="exam flex mt-3 justify-between sm:flex-row flex-col"
              v-for="item in history_study"
              :key="item.id"
            >
            <div>
              <div class="flex">
                <div :class="`flex items-center ${item.test_type}`" style="border-radius: 5px; padding: 4px 6px;">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.476 11.8408C6.35491 11.8408 6.96261 12.1572 7.23382 12.3431C7.32924 12.3933 7.58036 12.549 7.64565 12.564V4.21694C7.26897 3.56403 6.2394 3.05176 5.18973 3.05176C3.79855 3.05176 2.6635 3.83524 2.36719 4.42787V12.0166C2.37221 12.4636 2.62333 12.6444 2.93471 12.6444C3.16574 12.6444 3.31138 12.564 3.46708 12.4435C3.7885 12.1823 4.52679 11.8408 5.476 11.8408ZM10.5285 11.8408C11.4777 11.8408 12.2109 12.1823 12.5324 12.4435C12.6881 12.564 12.8337 12.6444 13.0597 12.6444C13.3711 12.6444 13.6323 12.4636 13.6323 12.0166V4.42787C13.3359 3.83524 12.2009 3.05176 10.8147 3.05176C9.76507 3.05176 8.73047 3.56403 8.35882 4.21694V12.5741C8.41908 12.559 8.6702 12.3983 8.77065 12.3431C9.04185 12.1572 9.64955 11.8408 10.5285 11.8408Z" fill="white"/>
                  </svg>
                  <div :class="`time ml-2`">
                    {{ item.test_type || ''}}
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
                    {{ completion_time(item.completion_time) }}
                  </div>
                </div>
              </div>
              <p class="text-[16px] mt-3 whitespace-nowrap">{{ item.topic_name || ''}}</p>
            </div>
            <div class="flex w-100 items-center justify-start sm:justify-end mt-3 sm:mt-0" >
              <div class="">
                <div class="flex justify-between">
                  <div>
                  Score: 
                  </div>
                  <div class="ml-2 exam-point">
                    {{  item.scores ?? 0 }}
                  </div>
                </div>
              </div>
            
            </div>
          </div>
          </el-tab-pane>
          
      </el-tabs>
      </div>
    </div>
  </div>
</template>
<script>
import ExamIcon from '../../../../../public/images/header/feature.svg';
export default {
  props: ["data", "user", "history_study"],
  data() {
    return {
      activeName: "Exam",
      breadcrumb: [
          {label: 'History', icon: ExamIcon},
      ]
    };
  },
  computed: {},
  methods: {
    completion_time(mili) {
      return $Helper.millisToMinutesAndSeconds(mili);
    },
    created_at(time) {
      return $Helper.formatDateTime(time);
    },
  },

};
</script>
<style scoped>
.exam {
  border-radius: 8px;
  padding: 16px;
  background-color: #f4f5f6;
}

.Vocabulary, .Vocabulary svg * {
  color: #3B1BBA;
  fill: #3B1BBA;
  background-color: #cad8f8
}
.Pronunciation, .Pronunciation svg * {
  color: #3B1BBA;
  fill: #3B1BBA;
  background-color: #cad8f8
}

.Grammar, .Grammar svg * {
  color: #D35924;
  fill: #D35924;
  background-color: #edd6cc
}
.Reading , .Reading svg *{
  color: #3B1BBA;
  fill: #3B1BBA;
  background-color: #cfc9ea
}
.Writing, .Writing svg * {
  color: #D35924;
  fill: #D35924;
  background-color: #edd6cc
}
.Listening, .Listening svg * {
  color: #AA3181;
  fill: #AA3181;
  background-color: #e5cedf
}
.Speaking, .Speaking svg * {
  color: #2162FF;
  fill: #2162FF;
  background-color: #cad8f8;
  
}
.exam-point {
  background-color: #e6e8ec;
  color: #141416;
  font-size: 14px;
  font-style: normal;
  font-weight: 700;
  line-height: 24px; /* 171.429% */
  letter-spacing: 1.4px;
  text-transform: uppercase;
  padding-left: 5px;
  padding-right: 5px;
}
</style>
