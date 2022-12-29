<template>
    <div class="wrapper">
        <div id="background-wrap">
            <!-- <div class="x1">
                <div class="cloud"></div>
            </div>

            <div class="x2">
                <div class="cloud"></div>
            </div>

            <div class="x3">
                <div class="cloud"></div>
            </div>

            <div class="x4">
                <div class="cloud"></div>
            </div>

            <div class="x5">
                <div class="cloud"></div>
            </div> -->
            <div class="cloud-box" id="cloud-box">
                <div class="box" id="cloud-1">
                    <div class="box-inner">
                        <div class="box-filter"></div>
                        <div class="box-content">
                            <h2 class="title">Level 1</h2>
                            <div>
                                <div class="w-full border relative mt-2 mb-4"></div>
                                <div class="flex justify-center flex-col items-center">
                                    <div class="mt-2">
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Học"
                                            placement="right"
                                        >
                                            <div
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm"
                                            >
                                                <i class="fa-solid fa-graduation-cap"></i>
                                            </div>
                                        </el-tooltip>
                                    </div>
                                    <div class="flex justify-center mt-4">
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Nghe"
                                            placement="bottom"
                                        >
                                            <div
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 box-disable"
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
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2"
                                            >
                                                <i
                                                    class="fa-solid fa-book-open-reader"
                                                ></i>
                                            </div>
                                        </el-tooltip>
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Từ vựng"
                                            placement="bottom"
                                        >
                                            <div
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2"
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
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2"
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
                <!-- <div class="big-cloud">
                    <h2 class="title" id="cloud-3">Level 3</h2>
                    <div class="clound-children"></div>
                </div>
                <div class="big-cloud" id="cloud-2">
                    <h2 class="title">Level 2</h2>
                    <div class="clound-children"></div>
                </div>
                <div class="big-cloud" id="cloud-1">
                    <h2 class="title">Level 1</h2>
                    <div class="clound-children"></div>
                </div> -->
            </div>
        </div>
        <div class="absolute bottom-[10%] right-[5%] z-10">
            <div class="mb-4">
                <el-button icon="el-icon-arrow-up" circle @click="cloudUp"></el-button>
            </div>
            <div>
                <el-button
                    icon="el-icon-arrow-down"
                    circle
                    @click="cloudDown"
                ></el-button>
            </div>
        </div>
    </div>
</template>
<script>
import "./learn.css";
export default {
    data() {
        return {
            level: 1,
        };
    },
    methods: {
        cloudUp() {
            this.level++;
            this.scrollToCloud();
        },
        cloudDown() {
            this.level--;
            this.scrollToCloud();
        },
        scrollToCloud() {
            let cloud = document.getElementById(`cloud-${this.level}`);
            cloud.scrollIntoView({
                behavior: "smooth",
                block: "center",
                inline: "center",
            });
        },
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
    background: linear-gradient(96.6deg,rgba(0,115,121,.112) 11.23%,rgba(0,95,100,0) 115.9%);

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
</style>
