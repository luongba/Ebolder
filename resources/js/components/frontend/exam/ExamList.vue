<template>
  <div class="w-full relative">
    <transition name="fade">
      <div class="w-full h-full z-10 fixed inset-0" v-if="show">
        <div
          class="absolute w-[90%] sm:w-[50%] h-[50vh] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] bg-box-lesson rounded-md p-4 box-content"
        >
          <span
            class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer text-[#fff]"
            @click="show = false"
          >
            <i class="lnr-cross"></i>
          </span>
          <h2 class="text-[26px] text-center text-white uppercase">
            Làm bài kiểm tra
          </h2>
          <div class="w-full border relative mt-2 mb-4"></div>
          <div class="w-full h-[80%]">
            <div class="h-full w-full flex flex-col justify-between">
              <ul class="px-4">
                <li class="list-disc text-[16px] mb-2">
                  Người học làm lần lượt từng dạng đề một. Sau khi hoàn thành
                  làm bài tất cả các dạng nhấn nộp bài.
                </li>

                <li class="list-disc text-[16px] mb-2">
                  Tổng thời gian làm bài cho các dạng đề là 60 phút. Nếu quá 60
                  phút mà chưa nộp bài. Hệ thống sẽ tự động nộp bài.
                </li>
                <li class="list-disc text-[16px]">
                  Chúc bạn làm tốt bài kiểm tra!
                </li>
              </ul>
              <div class="mt-auto mx-auto">
                <button
                  class="cursor-pointer px-4 py-2 text-center uppercase leading-[28px] flex items-center justify-center font-light rounded-md bg-button text-[19px] text-white hover:opacity-80"
                  @click="startExam"
                >
                  Bắt đầu làm bài
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <header-component :user="user" />
    <div class="container w-full content relative">
      <div
        class="w-full grid grid-cols-2 lg:grid-cols-4 gap-4 mt-4"
        v-if="!show"
      >
        <div
          class="exam"
          v-for="item in data"
          :key="item.id"
          @click="handleClick(item)"
        >
          {{ item.name }}
        </div>
      </div>
    </div>

    <!-- <footer-component /> -->
  </div>
</template>
  <script>
import baseRequest from "../../../utils/baseRequest";

export default {
  props: ["data", "user"],
  data() {
    return {
      show: false,
      currentClick: null,
      history_id: null,
      isExamDone: false
    };
  },
  components: {},
  methods: {
    dongMoPopup(value) {
      this.show = value;
    },
    async handleClick(item) {
      this.show = true;
      this.currentClick = item;
      try {
        let rs = await baseRequest.post(`/admin/save-exam-history-final`, {
          exam_id: this.currentClick.id,
          user_id: this.user.id,
          status: "create",
        });
        if (rs.data.status == 200) {
          this.history_id = rs.data.history.id;
          if(rs.data.history.time > 0){
            this.isExamDone = true
          }
        }
      } catch (e) {
        console.log(e);
      }
    },
    async startExam() {
      if (this.currentClick !== null && !this.isExamDone) {
        window.location.href = `${$Api.baseUrl}/english-level-test/Reading?testId=${this.currentClick.reading_id}&v=${this.currentClick.vocabulary_id}&g=${this.currentClick.grammar_id}&l=${this.currentClick.listening_id}&s=${this.currentClick.speaking_id}&r=${this.currentClick.reading_id}&w=${this.currentClick.writing_id}&historyId=${this.history_id}&examId=${this.currentClick.id}&exam=true1`;
      }else {
        window.location.href = `${$Api.baseUrl}/exam/result/${this.history_id}&v=${this.currentClick.vocabulary_id}&g=${this.currentClick.grammar_id}&l=${this.currentClick.listening_id}&s=${this.currentClick.speaking_id}&w=${this.currentClick.writing_id}&r=${this.currentClick.reading_id}&historyId=${this.history_id}&exam=true1`;
      }
    },
  },
  created() {
    console.log(this.data);
  },
};
</script>
  <style scoped>
.content {
  height: calc(100vh - 90px);
}
.exam {
  border: 1px solid #fff;
  border-radius: 4px;
  padding: 24px;
  text-align: center;
  color: #fff;
  cursor: pointer;
  font-size: 16px;
  transition: all 0.25s linear;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.exam:hover {
  background: #fff;
  color: #000;
  transition: all 0.25s linear;
}
.box-content {
  background: linear-gradient(
    96.6deg,
    rgba(0, 115, 121, 0.112) 11.23%,
    rgba(0, 95, 100, 0) 115.9%
  );
  box-sizing: border-box;
}
</style>
  