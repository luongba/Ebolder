<template>
    <div>
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div
                    class="
                        bg-white
                        shadow-sm
                        flex
                        items-center
                        justify-between
                        cursor-pointer
                        py-4
                        px-4
                        text-[14px]
                        font-semibold
                    "
                    v-for="(item, index) in listAudio"
                    :key="item.id"
                >
                    <span class="w-[60%] overflow-hidden mr-2">{{ item.name }}</span>
                    <div class="flex items-center">
                        <div ref="play">
                            <el-button
                                size="small"
                                type="success"
                                plain
                                icon="el-icon-video-play"
                                class="text-[20px]"
                                circle
                                @click="
                                    playAudio(
                                        `${baseApi}/upload/audio/${item.audio}`,
                                        index
                                    )
                                "
                            ></el-button>
                        </div>
                        <div ref="pause" class="hidden">
                            <el-button
                                size="small"
                                type="warning"
                                plain
                                icon="el-icon-video-pause"
                                class="text-[20px]"
                                circle
                                @click="pauseAudio(index)"
                            ></el-button>
                        </div>
                        <a
                            :href="`${ApiUrl}/admin/listening-level-test/question-edit/${item.id}`"
                            class="ml-2"
                        >
                            <el-button
                                size="small"
                                plain
                                type="primary"
                                icon="el-icon-edit"
                                circle
                            ></el-button>
                        </a>
                        <el-button
                            class="ml-2"
                            size="small"
                            type="danger"
                            plain
                            icon="el-icon-delete"
                            circle
                            @click="deleteAudio(item.id)"
                        ></el-button>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-2 left-[50%] bg-white w-[500px]">
                <audio
                    hidden
                    id="audio-preview"
                    autoplay
                    class="w-full"
                    controls
                    v-show="file != ''"
                />
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            show: false,
            topicData: {
                name: null,
                description: null,
            },
            listAudio: [],
            ApiUrl: $Api.baseUrl,
            rules: {
                name: [
                    {
                        required: true,
                        message: "Please input  name",
                        trigger: "blur",
                    },
                ],
                description: [
                    {
                        required: true,
                        message: "Please input description",
                        trigger: "blur",
                    },
                ],
            },
            file: null,
            baseApi: $Api.baseUrl,
            isplay: false,
        };
    },
    computed: {},
    watch: {},
    methods: {
        playAudio(audioMusic, index) {
            let audio = document.getElementById("audio-preview");
            audio.src = audioMusic;
            this.$refs.play[index].classList.add("hidden");
            this.$refs.pause[index].classList.remove("hidden");
            this.$refs.pause[index].classList.add("block");
            for (let i = 0; i < this.$refs.pause.length; i++) {
                if (i != index) {
                    this.$refs.play[i].classList.remove("hidden");
                    this.$refs.play[i].classList.add("block");
                    this.$refs.pause[i].classList.remove("block");
                    this.$refs.pause[i].classList.add("hidden");
                }
            }
        },
        pauseAudio(index) {
            let audio = document.getElementById("audio-preview");
            audio.pause();
            this.$refs.play[index].classList.remove("hidden");
            this.$refs.play[index].classList.add("block");
            this.$refs.pause[index].classList.remove("block");
            this.$refs.pause[index].classList.add("hidden");
        },
        async createTopic(formName) {
            this.$refs[formName].validate(async (valid) => {
                if (valid) {
                    try {
                        let rs = await axios.post(
                            `${$Api.baseUrlApi}/admin/store-topic-vocabulary`,
                            this.topicData
                        );
                        if (rs.data.status == 200) {
                            this.getAllAudio();

                            this.resetFeild();
                            this.$message({
                                type: "success",
                                message: "Add successful topics",
                            });
                        } else {
                            this.$message({
                                type: "error",
                                message: "Add error topics",
                            });
                        }
                    } catch (e) {
                        this.$message({
                            type: "error",
                            message: "Add error topics",
                        });
                    }
                } else {
                    return false;
                }
            });
        },
        async getAllAudio() {
            try {
                let rs = await axios.get(
                    `${$Api.baseUrlApi}/admin/get-audio-listening`
                );
                if (rs.data.status == 200) {
                    console.log(rs.data.data);
                    this.listAudio = rs.data.data;
                }
            } catch (e) {
                console.log(e);
            }
        },
        async deleteAudio(id) {
            this.$confirm(
                "This will permanently delete the topic. Continue?",
                "Warning",
                {
                    confirmButtonText: "OK",
                    cancelButtonText: "Cancel",
                    type: "warning",
                }
            )
                .then(async () => {
                    try {
                        let rs = await axios.post(
                            `${$Api.baseUrlApi}/admin/delete-audio-listening`,
                            { id }
                        );
                        if (rs.data.status == 200) {
                            this.getAllAudio();
                            this.$message({
                                type: "success",
                                message: "Delete completed",
                            });
                        } else {
                            this.$message({
                                type: "error",
                                message: "Delete error",
                            });
                        }
                    } catch (e) {
                        console.log(e);
                        this.$message({
                            type: "error",
                            message: "Delete error",
                        });
                    }
                })
                .catch(() => {
                    return;
                });
        },
    },

    created() {
        this.getAllAudio();
    },
};
</script>
<style scoped>
.bg-blur {
    background: rgba(0, 0, 0, 0.3);
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
