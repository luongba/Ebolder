<template>
    <div class="flex items-center py-2 md:py-[27px] px-2 md:px-[40px] justify-between">
        <div class="flex items-center">

            <img src="/images/logo/logo.svg" alt="" />
            <div class="p-0 text-[16px] font-bold uppercase hidden md:block">
                <p>If You Don’t Walk Today </p>
                <p>You’ll Have To Run Tomorrow.</p>
            </div>
        </div>
        <el-dropdown  trigger="click" v-if="user">
        <div class="flex items-center  justify-center cursor-pointer">

            <span class="mr-2 text-[16px] text-white">{{ user ? user.name : ""}}</span>
            <el-avatar shape="square"> {{user ? user.name[0] : ""}} </el-avatar>
        </div>
        <template #dropdown>
      <el-dropdown-menu>
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
</template>
<script>

export default {
    props: ["user"],
    methods: {
        logout(){
            window.location.href = "/logout";
        },
        history(){
            window.location.href = "/history";
        }
    },
    created(){
        console.log(this.user)
    }
};
</script>
<style></style>
