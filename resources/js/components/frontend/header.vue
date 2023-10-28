<template>
  <div class="flex items-center py-2 md:py-[27px] justify-between relative z-10" style="font-family: lexend !important;">
    <div class="flex items-center cursor-pointer" @click="backToHome">
      <img src="/images/landing/logo.svg" alt="" />
      <div class="p-0 text-[16px] font-bold uppercase hidden md:block ml-2">
        <p class="whitespace-nowrap	">If You Don’t Walk Today</p>
        <p class="whitespace-nowrap	">You’ll Have To Run Tomorrow.</p>
      </div>
    </div>
    <div class="flex flex-wrap py-2">
      <nav class="relative flex flex-wrap items-center justify-between px-2 py-3">
        <div class="flex px-4 mx-auto flex-row items-center justify-between">
          <div class="flex items-center" id="example-navbar-info">
            <ul class="hidden sm:flex list-none ml-auto flex-row">
              <li class="nav-item">
                <div class="px-3 py-2 flex items-center text-lg leading-snug hover:opacity-75 cursor-pointer">
                  <a href="/">Home</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="/exam" class="px-3 py-2 flex items-center text-lg leading-snug hover:opacity-75 cursor-pointer">
                  Exam
                </a>
              </li>
              <li class="nav-item">
                <a href="/learn" class="px-3 py-2 flex items-center text-lg leading-snug hover:opacity-75 cursor-pointer">
                  Learn
                </a>
              </li>
              <li class="nav-item">
                <a href="/features" class="px-3 py-2 flex items-center text-lg leading-snug hover:opacity-75 cursor-pointer">
                  Features
                </a>
              </li>
            </ul>
          </div>
          <div class="w-fit rounded-[100px] bg-white px-4 py-2 cursor-pointer" @click="openLink" v-show="!user">
            <div class="text-lg leading-relaxed inline-block whitespace-nowrap	">
              Sign in
            </div>
          </div>
          <el-dropdown trigger="click" v-if="user">
            <div class="flex items-center justify-center cursor-pointer">
              <span class="mr-2 text-[16px] text-white">{{
                user ? user.name : ""
              }}</span>
              <el-avatar shape="square"> {{ user ? user.name[0] : "" }} </el-avatar>
            </div>
            <template #dropdown>
              <el-dropdown-menu>
                <el-dropdown-item>
                  <span @click="learn()">Lịch sử học</span>
                </el-dropdown-item>
                <el-dropdown-item>
                  <span @click="history()">Lịch sử làm bài thi</span>
                </el-dropdown-item>
                <el-dropdown-item>
                  <span @click="logout()">Đăng xuất</span>
                </el-dropdown-item>
              </el-dropdown-menu>
            </template>
          </el-dropdown>
        </div>
      </nav>
    </div>

  </div>
</template>
<script>
export default {
  props: ["user"],
  methods: {
    openLink() {
      window.location.href = `${$Api.baseUrl}/sign-in`;
    },
    logout() {
      window.location.href = "/logout";
    },
    history() {
      window.location.href = "/history";
    },
    learn() {
      window.location.href = "/history-learn";
    },
    backToHome() {
      window.location.href = "/";
    },
  },
  created() {
  },
};
</script>
<style>
a, a:hover {
  text-decoration: none;
  color: unset;
}
</style>
