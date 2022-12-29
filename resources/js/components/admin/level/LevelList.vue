<template>
    <div>
        <div class="container">
            <transition name="fade">
                <div class="w-full h-full" v-if="show">
                    <div
                        class="
                            absolute
                            inset-0
                            bg-blur
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <div
                            class="
                                w-[95%]
                                md:w-[70%]
                                bg-white
                                shadow-sm
                                px-4
                                py-4
                            "
                        >
                            <div class="py-2 relative">
                                <h1 class="font-semibold uppercase text-[14px]">
                                    Create new Level
                                </h1>
                                <span
                                    class="
                                        absolute
                                        right-[5px]
                                        top-[5px]
                                        text-[20px]
                                        cursor-pointer
                                    "
                                    @click="show = !show"
                                >
                                    <i class="lnr-cross"></i>
                                </span>
                            </div>
                            <el-form
                                :model="topicData"
                                :rules="rules"
                                ref="ruleForm"
                            >
                                <div class="my-2">
                                    <el-form-item
                                        label="Name Topic"
                                        prop="name"
                                    >
                                        <el-input
                                            placeholder="Name Topic"
                                            v-model="topicData.name"
                                        ></el-input>
                                    </el-form-item>
                                </div>
                                <el-form-item label="Lesson" prop="valueLesson">
                                    <el-select
                                        v-model="topicData.valueLesson"
                                        multiple
                                        placeholder="Select"
                                        style="width: 100%"
                                    >
                                        <el-option
                                            v-for="item in listTopicLesson"
                                            :key="item.id"
                                            :label="item.name"
                                            :value="item.id"
                                        >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                                <div
                                    class="
                                        grid grid-cols-2
                                        md:grid-cols-4
                                        gap-4
                                    "
                                >
                                    <el-form-item
                                        label="Reading"
                                        prop="reading"
                                    >
                                        <el-select
                                            v-model="topicData.valueReading"
                                            placeholder="Select"
                                            style="width: 100%"
                                        >
                                            <el-option
                                                v-for="item in listTopicReading"
                                                :key="item.id"
                                                :label="item.name"
                                                :value="item.id"
                                            >
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item
                                        label="Vocabulary"
                                        prop="vocabulary"
                                    >
                                        <el-select
                                            v-model="topicData.valueVocabulary"
                                            placeholder="Select"
                                            style="width: 100%"
                                        >
                                            <el-option
                                                v-for="item in listTopicVocabulary"
                                                :key="item.id"
                                                :label="item.name"
                                                :value="item.id"
                                            >
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item
                                        label="Listening"
                                        prop="listening"
                                    >
                                        <el-select
                                            v-model="topicData.valueListening"
                                            placeholder="Select"
                                            style="width: 100%"
                                        >
                                            <el-option
                                                v-for="item in listTopicListening"
                                                :key="item.id"
                                                :label="item.name"
                                                :value="item.id"
                                            >
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item
                                        label="Grammar"
                                        prop="grammar"
                                    >
                                        <el-select
                                            v-model="topicData.valueGrammar"
                                            placeholder="Select"
                                            style="width: 100%"
                                        >
                                            <el-option
                                                v-for="item in listTopicGrammar"
                                                :key="item.id"
                                                :label="item.name"
                                                :value="item.id"
                                            >
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </div>
                                <div class="flex justify-end items-center mt-4">
                                    <el-button plain @click="resetFeild"
                                        >Cancel</el-button
                                    >
                                    <el-button
                                        type="primary"
                                        @click="
                                            state == 'create'
                                                ? createTopic('ruleForm')
                                                : updateLevel('ruleForm')
                                        "
                                        >{{
                                            state == "create"
                                                ? "Create"
                                                : "Update"
                                        }}</el-button
                                    >
                                </div>
                            </el-form>
                        </div>
                    </div>
                </div>
            </transition>
            <div class="flex items-center justify-center mb-4">
                <el-button
                    icon="el-icon-plus"
                    plain
                    @click="
                        show = !show;
                        state = 'create';
                        topicData = {
                            name: null,
                            valueLesson: [],
                            valueGrammar: null,
                            valueReading: null,
                            valueVocabulary: null,
                            valueListening: null,
                        };
                    "
                ></el-button>
            </div>
            <div class="grid grid-cols-1 gap-4">
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
                    v-for="item in listLevel"
                    :key="item.id"
                >
                    <span class="w-[60%] overflow-hidden mr-2">{{
                        item.name
                    }}</span>
                    <div class="flex items-center">
                        <el-button
                            size="small"
                            plain
                            type="primary"
                            icon="el-icon-edit"
                            circle
                            @click="editLevel(item.id)"
                        ></el-button>
                        <el-button
                            class="ml-2"
                            size="small"
                            type="danger"
                            plain
                            icon="el-icon-delete"
                            circle
                            @click="deleteLevel(item.id)"
                        ></el-button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <editor
            api-key="hri1xykfk0d1gnrwf70v71zn81p6f7s5e3z1edxly9mansfq"
            :init="{
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount',
                ],
                toolbar:
                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
            }"
        /> -->
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import Editor from "@tinymce/tinymce-vue";
export default {
    components: {
        Editor,
    },
    data() {
        return {
            show: false,
            topicData: {
                id: null,
                name: null,
                valueLesson: [],
                valueGrammar: null,
                valueReading: null,
                valueVocabulary: null,
                valueListening: null,
            },
            listLevel: [],
            ApiUrl: $Api.baseUrl,
            rules: {
                name: [
                    {
                        required: true,
                        message: "Please input  name",
                        trigger: "blur",
                    },
                ],
                lesson: [
                    {
                        required: true,
                        message: "Please select lesson",
                        trigger: "blur",
                    },
                ],
                vocabulary: [
                    {
                        required: false,
                        message: "Please select vocabulary",
                        trigger: "blur",
                    },
                ],
                reading: [
                    {
                        required: false,
                        message: "Please select reading",
                        trigger: "blur",
                    },
                ],
                grammar: [
                    {
                        required: false,
                        message: "Please select grammar",
                        trigger: "blur",
                    },
                ],
                listening: [
                    {
                        required: false,
                        message: "Please select listening",
                        trigger: "blur",
                    },
                ],
            },

            listTopicGrammar: [],
            listTopicReading: [],
            listTopicVocabulary: [],
            listTopicListening: [],
            listTopicLesson: [],
            state: "create",
            idTemp: null,
        };
    },
    computed: {},
    watch: {},
    methods: {
        async createTopic(formName) {
            this.$refs[formName].validate(async (valid) => {
                if (valid) {
                    try {
                        let dataTemp = {
                            name: this.topicData.name,
                            lessons: this.topicData.valueLesson,
                            listening_id: this.topicData.valueListening,
                            reading_id: this.topicData.valueReading,
                            vocabulary_id: this.topicData.valueVocabulary,
                            grammar_id: this.topicData.valueGrammar,
                        };
                        let rs = await baseRequest.post(
                            `/admin/create-level`,
                            dataTemp
                        );
                        if (rs.data.status == 200) {
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
        async updateLevel(formName, id) {
            this.$refs[formName].validate(async (valid) => {
                if (valid) {
                    try {
                        let dataTemp = {
                            name: this.topicData.name,
                            lessons: this.topicData.valueLesson,
                            listening_id: this.topicData.valueListening,
                            reading_id: this.topicData.valueReading,
                            vocabulary_id: this.topicData.valueVocabulary,
                            grammar_id: this.topicData.valueGrammar,
                            id: this.idTemp,
                        };
                        let rs = await baseRequest.post(
                            `/admin/update-level`,
                            dataTemp
                        );
                        if (rs.data.status == 200) {
                            this.resetFeild();
                            this.$message({
                                type: "success",
                                message: "Add successful Level",
                            });
                            this.getAllLevel();
                        } else {
                            this.$message({
                                type: "error",
                                message: "Add error Level",
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
        async getAllLevel() {
            try {
                let rs = await baseRequest.get(`/admin/get-all-level`);
                if (rs.data.status == 200) {
                    this.listLevel = rs.data.data
                        .map((item) => ({
                            id: item.id,
                            name: item.name,
                        }))
                        .reverse();
                }
            } catch (e) {
                console.log(e);
            }
        },
        editLevel(id) {
            this.getDetailLevel(id);
            this.state = "edit";
            this.idTemp = id;
        },
        async getDetailLevel(id) {
            try {
                let rs = await baseRequest.post(`/admin/detail-level`, { id });
                let { data } = rs;
                if (data.status == 200) {
                    console.log(data);
                    this.topicData = {
                        name: data.data.name || null,
                        valueGrammar: Number(data.data.grammar_id) || null,
                        valueVocabulary:
                            Number(data.data.vocabulary_id) || null,
                        valueReading: Number(data.data.reading_id) || null,
                        valueListening: Number(data.data.listening_id) || null,
                        valueLesson:
                            data.data.learn.map((item) => item.id) || [],
                    };
                    this.show = !this.show;
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getAllTopicLesson() {
            try {
                let rs = await baseRequest.get(`/admin/list-topic-lesson`);
                if (rs.data.status == 200) {
                    console.log(rs.data.data);
                    this.listTopicLesson = rs.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                    }));
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getAllTopicVocabulary() {
            try {
                let rs = await baseRequest.get(`/admin/list-topic-vocabulary`);
                if (rs.data.status == 200) {
                    this.listTopicVocabulary = rs.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                    }));
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getAllTopicGrammar() {
            try {
                let rs = await baseRequest.get(`/admin/list-topic-grammar`);
                if (rs.data.status == 200) {
                    this.listTopicGrammar = rs.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                    }));
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getAllTopicReading() {
            try {
                let rs = await baseRequest.get(`/admin/list-topic-reading`);
                if (rs.data.status == 200) {
                    console.log(rs.data.data);
                    this.listTopicReading = rs.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                    }));
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getAllTopicListening() {
            try {
                let rs = await baseRequest.get(`/admin/topic-list-listening`);
                if (rs.data.status == 200) {
                    this.listTopicListening = rs.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                    }));
                }
            } catch (e) {
                console.log(e);
            }
        },

        async deleteLevel(id) {
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
                        let rs = await baseRequest.post(`/admin/delete-level`, {
                            id,
                        });
                        console.log(
                            "🚀 ~ file: LevelList.vue:459 ~ .then ~ rs",
                            rs
                        );
                        if (rs.data.status == 200) {
                            this.getAllLevel();
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
        resetFeild() {
            this.show = false;
            this.topicData = {
                name: null,
                valueLesson: [],
                valueGrammar: null,
                valueReading: null,
                valueVocabulary: null,
                valueListening: null,
            };
        },
    },

    created() {
        this.getAllTopicReading();
        this.getAllTopicLesson();
        this.getAllTopicVocabulary();
        this.getAllTopicGrammar();
        this.getAllTopicListening();
        this.getAllLevel();
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
