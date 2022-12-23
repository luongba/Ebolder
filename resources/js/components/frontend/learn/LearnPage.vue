<template>
    <div class="wrapper">
        <div id="background-wrap">
            <div class="x1">
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
            </div>
            <div class="cloud-box" id="cloud-box">
                <div class="box" id="cloud-3">
                    <div class="box-inner">
                        <div class="box-filter"></div>
                        <div class="box-content">
                            <h2 class="title">Level 3</h2>
                        </div>
                    </div>
                </div>
                <div class="box" id="cloud-2">
                    <div class="box-inner">
                        <div class="box-filter"></div>
                        <div class="box-content">
                            <h2 class="title">Level 2</h2>
                        </div>
                    </div>
                </div>
                <div class="box" id="cloud-1">
                    <div class="box-inner">
                        <div class="box-filter"></div>
                        <div class="box-content">
                            <h2 class="title">Level 1</h2>
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
                <el-button
                    icon="el-icon-arrow-up"
                    circle
                    @click="cloudUp"
                ></el-button>
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
    background: rgba(240, 128, 0,0.6);
}
.box-filter {
    position: absolute;
    inset: 0;
    filter: blur(8px);
    -webkit-filter: blur(8px);
    z-index: 5;
}
</style>