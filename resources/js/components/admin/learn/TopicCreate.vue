<template>
    <div>
        <div class="app-page-title flex justify-between items-center">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-book icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div class="flex justify-between">
                        <p>LESSON</p>
                    </div>
                </div>
            </div>
            <p
                href=""
                class="
                    font-semibold
                    text-[16px] text-[#3f6ad8]
                    cursor-pointer
                    mr-2
                "
                @click="createTopic"
            >
                SAVE
            </p>
        </div>
        <div class="container">
            <div class="mb-4">
                <el-form ref="ruleFormItem" :model="dataTopic" class="w-full">
                    <el-form-item
                        label="Name"
                        prop="name"
                        :rules="[
                            {
                                required: true,
                                message: 'Please enter your answer',
                            },
                        ]"
                        class="w-full m-0"
                    >
                        <el-input
                            v-model="dataTopic.name"
                            placeholder="Please enter name..."
                        >
                        </el-input>
                    </el-form-item>
                </el-form>
            </div>
            <editor
                v-model="dataTopic.content"
                api-key="hri1xykfk0d1gnrwf70v71zn81p6f7s5e3z1edxly9mansfq"
                :init="{
                    height: 200,
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
            />
            <el-button type="primary" class="mt-4" @click="chooseType(1)">
                Upload Video
            </el-button>
            <el-button type="primary" class="mt-4" @click="chooseType(2)">
                Link Media
            </el-button>
            <div
                class="
                    w-full
                    p-4
                    rounded-sm
                    border-dashed
                    bg-white
                    flex
                    items-center
                    justify-center
                    cursor-pointer
                    mt-4
                "
                style="border-width: 2px"
                @click="uploadAudio"
                v-if="typeUpload == 1"
            >
                <div class="flex flex-col items-center">
                    <i class="el-icon-upload text-[50px]"></i>
                    <p class="mt-2 text-[15px] font-semibold">
                        Click to upload
                    </p>
                    <p
                        class="mt-2 text-[15px] font-bold text-center"
                        v-if="file != null"
                    >
                        Video Name: {{ file.name }}
                    </p>
                </div>
            </div>
            <div class="mt-4" v-if="typeUpload == 2">
                <el-input
                    placeholder="Please enter link..."
                    v-model="linkMedia"
                >
                    <template slot="prepend">Http://</template>
                </el-input>
            </div>

            <el-button
                v-if="file != null && typeUpload == 1"
                type="primary"
                class="mt-4"
                @click="logicPreviewVideo"
            >
                {{ isVideo ? "Hidden video" : "Preview video" }}
            </el-button>
            <input
                type="file"
                ref="fileAudio"
                @change="getChangeAudio($event)"
                hidden
            />
            <div class="mt-4 flex items-center justify-center">
                <video
                    controls
                    style="width: 100%; height: auto"
                    v-show="isVideo"
                >
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="flex flex-col justify-center w-full items-center">
                <div
                    class="card w-full mt-3"
                    v-for="(data, index) in dataQuestion"
                    :key="index"
                >
                    <div class="card-header flex justify-between items-center">
                        <span>Question {{ index + 1 }}</span>
                        <span
                            v-if="dataQuestion.length > 1"
                            class="
                                text-red-600 text-[14px]
                                font-semibold
                                cursor-pointer
                            "
                            @click="deleteQues(data.id)"
                            >Xóa</span
                        >
                    </div>

                    <div class="card-body" v-if="data.type == 1">
                        <div class="w-full">
                            <el-form
                                ref="ruleFormData"
                                :model="data"
                                class="w-full"
                            >
                                <el-form-item
                                    prop="question"
                                    :rules="[
                                        {
                                            required: true,
                                            message:
                                                'Please enter your question',
                                        },
                                    ]"
                                    class="w-full m-0"
                                >
                                    <el-input
                                        type="textarea"
                                        placeholder="Nhập câu hỏi..."
                                        v-model="data.question"
                                        rows="3"
                                    ></el-input>
                                </el-form-item>

                                <div
                                    class="w-full mt-2"
                                    v-for="item in data.dataAns"
                                    :key="item.idAns"
                                >
                                    <div class="mt-4 flex items-start">
                                        <el-form
                                            ref="ruleFormItem"
                                            :model="item"
                                            :rules="rules"
                                            class="w-full"
                                        >
                                            <el-form-item
                                                prop="text"
                                                :rules="[
                                                    {
                                                        required: true,
                                                        message:
                                                            'Please enter your answer',
                                                    },
                                                ]"
                                                class="w-full m-0"
                                            >
                                                <Input v-model="item.text">
                                                    <template slot="prepend"
                                                        >{{ item.alphabet }}
                                                    </template>
                                                </Input>
                                            </el-form-item>
                                        </el-form>

                                        <el-button
                                            v-if="data.dataAns.length > 1"
                                            class="ml-2"
                                            type="danger"
                                            icon="el-icon-delete"
                                            @click="
                                                deleteAns(data.id, item.idAns)
                                            "
                                            plain
                                            circle
                                        ></el-button>
                                    </div>
                                </div>
                                <div
                                    class="
                                        flex
                                        justify-between
                                        items-start
                                        mt-4
                                    "
                                >
                                    <div class="leading-[40px]">
                                        <span class="text-[13px] font-semibold"
                                            >Level:
                                            {{
                                                data.level == 1
                                                    ? "Easy"
                                                    : data.level == 2
                                                    ? "Medium"
                                                    : "Hard"
                                            }}</span
                                        >
                                        <star-rating
                                            :star-size="20"
                                            :animate="true"
                                            v-model="data.level"
                                            :show-rating="false"
                                            :max-rating="3"
                                        />
                                    </div>

                                    <div class="w-[180px]">
                                        <el-form-item
                                            :rules="[
                                                {
                                                    required: true,
                                                    message:
                                                        'Please select answer',
                                                    trigger: 'blur',
                                                },
                                            ]"
                                            prop="answer"
                                            class="w-full m-0"
                                        >
                                            <span
                                                class="
                                                    text-[13px]
                                                    font-semibold
                                                    mr-2
                                                "
                                                >Anwser:</span
                                            >
                                            <el-select
                                                v-model="data.answer"
                                                placeholder="Select"
                                            >
                                                <el-option
                                                    v-for="item in data.dataAns"
                                                    :key="item.idAns"
                                                    :label="item.alphabet"
                                                    :value="item.idAns"
                                                >
                                                </el-option>
                                            </el-select>
                                        </el-form-item>
                                    </div>
                                </div>
                                <div
                                    class="
                                        mx-auto
                                        my-4
                                        lg:my-2
                                        flex
                                        justify-center
                                    "
                                >
                                    <el-button
                                        v-if="data.dataAns.length < maxAns"
                                        @click="pushAns(data.id)"
                                        icon="el-icon-plus"
                                        plain
                                    ></el-button>
                                </div>
                            </el-form>
                        </div>
                    </div>
                    <div class="card-body" v-if="data.type == 2">
                        <div class="w-full">
                            <el-form
                                ref="ruleFormData"
                                :model="data"
                                class="w-full"
                            >
                                <el-form-item
                                    prop="question"
                                    :rules="[
                                        {
                                            required: true,
                                            message:
                                                'Please enter your question',
                                        },
                                    ]"
                                    class="w-full m-0"
                                >
                                    <el-input
                                        type="textarea"
                                        placeholder="Nhập câu hỏi..."
                                        v-model="data.question"
                                        rows="3"
                                    ></el-input>
                                </el-form-item>
                                <div class="mt-4">
                                    <el-button
                                        icon="el-icon-search"
                                        type="primary"
                                        plain
                                        @click="renderAnswer(data, index)"
                                    >
                                        Xuất câu trả lời
                                    </el-button>
                                </div>

                                <div
                                    class="w-full mt-2"
                                    v-for="item in data.dataAns"
                                    :key="item.idAns"
                                >
                                    <div class="mt-4 flex items-start">
                                        <el-form
                                            ref="ruleFormItem"
                                            :model="item"
                                            :rules="rules"
                                            class="w-full"
                                        >
                                            <el-form-item
                                                prop="text"
                                                :rules="[
                                                    {
                                                        required: true,
                                                        message:
                                                            'Please enter your answer',
                                                    },
                                                ]"
                                                class="w-full m-0"
                                            >
                                                <Input v-model="item.text">
                                                    <template slot="prepend"
                                                        >{{ item.alphabet }}
                                                    </template>
                                                </Input>
                                            </el-form-item>
                                        </el-form>

                                        <el-button
                                            v-if="data.dataAns.length > 1"
                                            class="ml-2"
                                            type="danger"
                                            icon="el-icon-delete"
                                            @click="
                                                deleteAns(data.id, item.idAns)
                                            "
                                            plain
                                            circle
                                        ></el-button>
                                    </div>
                                </div>
                                <div
                                    class="
                                        flex
                                        justify-between
                                        items-start
                                        mt-4
                                    "
                                >
                                    <div class="leading-[40px]">
                                        <span class="text-[13px] font-semibold"
                                            >Level:
                                            {{
                                                data.level == 1
                                                    ? "Easy"
                                                    : data.level == 2
                                                    ? "Medium"
                                                    : "Hard"
                                            }}</span
                                        >
                                        <star-rating
                                            :star-size="20"
                                            :animate="true"
                                            v-model="data.level"
                                            :show-rating="false"
                                            :max-rating="3"
                                        />
                                    </div>
                                </div>
                            </el-form>
                        </div>
                    </div>
                </div>

                <div class="mx-auto my-4 flex justify-center">
                    <el-popover placement="right" width="400" trigger="click">
                        <p class="mb-2 text-[14px] text-bold">Dạng câu hỏi:</p>
                        <el-button type="primary" @click="pushQues(1)" round
                            >Chọn đáp án</el-button
                        >
                        <el-button type="primary" @click="pushQues(2)" round
                            >Điền vào chỗ trống</el-button
                        >
                        <el-button
                            type="success"
                            icon="el-icon-circle-plus-outline"
                            plain
                            slot="reference"
                            >More questions
                        </el-button>
                    </el-popover>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import StarRating from "vue-star-rating";
import { Input, Button, Select, Form } from "element-ui";
import Editor from "@tinymce/tinymce-vue";

export default {
    components: {
        StarRating,
        Input,
        Button,
        Select,
        Form,
        Editor,
    },
    data() {
        return {
            dataTopic: {
                name: null,
                content: "hello",
            },

            dataQuestion: [],
            alphabet: ["a", "b", "c", "d", "e", "f", "g", "h"],
            maxAns: 4,
            level: "Easy",

            rules: {
                name: [
                    {
                        required: true,
                        message: "Please input Activity question",
                        trigger: "blur",
                    },
                ],
            },
            file: null,
            isVideo: false,
            tempid: null,
            typeUpload: 0,
            linkMedia: "",
        };
    },
    methods: {
        uploadAudio() {
            this.$refs.fileAudio.click();
        },
        getChangeAudio(event) {
            console.log(event.target.files[0]);
            let file = event.target.files[0];
            if (
                parseFloat((file.size * 0.00000095367431640625).toFixed(2)) > 10
            ) {
                this.$message({
                    message: "Vui lòng chọn video dưới 10mb!",
                    type: "warning",
                });
                return;
            }
            if (event.target.files[0].type == "video/mp4") {
                this.file = event.target.files[0];
                let blobURL = URL.createObjectURL(file);
                document.querySelector("video").src = blobURL;
            } else {
                this.$message({
                    message: "The file is not in the correct format",
                    type: "error",
                });
            }
        },
        logicPreviewVideo() {
            if (!this.isVideo) {
                this.isVideo = true;
            } else {
                document.querySelector("video").pause();
                this.isVideo = false;
            }
        },
        renderAnswer(data, index) {
            let question = data.question;
            if (question != null) {
                let sum = 0;
                this.dataQuestion[index].dataAns = [];
                if (question.length > 0) {
                    for (let i = 0; i < question.length; i++) {
                        if (question[i] === "#") {
                            sum++;
                            this.dataQuestion[index].dataAns.push({
                                alphabet: sum,
                                idAns: $Helper.randomId(),
                                text: null,
                            });
                        }
                    }
                }
            }
            return;
        },
        chooseType(type) {
            if (type == 1) {
                this.typeUpload = 1;
                this.linkMedia = "";
            } else {
                this.typeUpload = 2;
                document.querySelector("video").pause();
                this.isVideo = false;
            }
        },
        async createTopic() {
            try {
                let formData = new FormData();

                let dataTemp = {
                    name: this.dataTopic.name,
                    contentReading: this.dataTopic.content,
                    dataQuestion: this.dataQuestion,
                    linkMedia: this.linkMedia,
                };
                let result;
                if (this.typeUpload == 1) {
                    formData.append("file", this.file);
                    formData.append("name", dataTemp.name);
                    formData.append("contentReading", dataTemp.contentReading);
                    formData.append("dataQuestion", JSON.stringify(dataTemp.dataQuestion));
                    const headers = {
                        "Content-Type": "multipart/form-data",
                    };
                    result = await baseRequest.post(
                        `/admin/create-topic-lesson`,
                        formData,
                        { headers }
                    );
                } else {
                    result = await baseRequest.post(
                        `/admin/create-topic-lesson`,
                        dataTemp
                    );
                }
                let { data } = result;
                if (data.status == 200) {
                    this.$message({
                        message: data.message,
                        type: "success",
                    });
                    // setTimeout(() => {
                    //     window.location.href = `${$Api.baseUrl}/admin/lesson`;
                    // }, 1000);
                } else {
                    this.$message({
                        message: data.message,
                        type: "error",
                    });
                }
            } catch (error) {
                console.log("🚀 ~ ~ error", error);
            }
        },

        pushAns(id) {
            let dataQues = this.dataQuestion.find((item) => item.id == id);
            dataQues.dataAns.push({
                idAns: $Helper.randomId(),
                text: null,
                alphabet: this.alphabet[dataQues.dataAns.length].toUpperCase(),
            });
        },
        validate(formNameItem, formNameData) {
            if (this.$refs[formNameItem] && this.$refs[formNameData]) {
                let isCheck = true;

                this.$refs[formNameItem].forEach((item) => {
                    item.validate((valid) => {
                        if (!valid) {
                            isCheck = false;
                        } else {
                            console.log("error submit!!");
                            return false;
                        }
                    });
                });
                if (
                    this.dataQuestion[0].type == 2 &&
                    this.dataQuestion.length == 1
                ) {
                    return true;
                } else {
                    this.$refs[formNameData].forEach((item) => {
                        item.validate((valid) => {
                            if (!valid) {
                                isCheck = false;
                            } else {
                                console.log("error submit!!");
                                return false;
                            }
                        });
                    });
                }
                return isCheck;
            } else {
                return true;
            }
        },
        pushQues(type) {
            let isCheck = this.validate("ruleFormData", "ruleFormItem");
            if (isCheck) {
                if (type == 1) {
                    this.dataQuestion.push({
                        id: $Helper.randomId(),
                        question: null,
                        level: 1,
                        dataAns: [
                            {
                                idAns: $Helper.randomId(),
                                text: null,
                                alphabet: "A",
                            },
                        ],
                        answer: null,
                        type: type,
                    });
                } else if (type == 2) {
                    this.dataQuestion.push({
                        id: $Helper.randomId(),
                        question: null,
                        level: 1,
                        dataAns: [],
                        answer: null,
                        type: type,
                    });
                }
            }
        },
        deleteAns(idQues, idAns) {
            let dataQues = this.dataQuestion.find((item) => item.id == idQues);
            dataQues.dataAns = dataQues.dataAns.filter(
                (item) => item.idAns != idAns
            );
            if (dataQues.type == 1) {
                let data = dataQues.dataAns;
                let temp = [];
                for (let i = 0; i < data.length; i++) {
                    temp.push({
                        idAns: data[i].idAns,
                        text: data[i].text,
                        alphabet: this.alphabet[i].toUpperCase(),
                    });
                }
                dataQues.dataAns = temp;
            } else if (dataQues.type == 2) {
                let data = dataQues.dataAns;
                let temp = [];
                for (let i = 0; i < data.length; i++) {
                    temp.push({
                        idAns: data[i].idAns,
                        text: data[i].text,
                        alphabet: i + 1,
                    });
                }
                dataQues.dataAns = temp;
            }

            // let data = dataQues.dataAns;
            // let temp = [];
            // for (let i = 0; i < data.length; i++) {
            //     temp.push({
            //         idAns: data[i].idAns,
            //         text: data[i].text,
            //         alphabet: this.alphabet[i].toUpperCase(),
            //     });
            // }
            // dataQues.dataAns = temp;
        },
        deleteQues(id) {
            this.dataQuestion = this.dataQuestion.filter(
                (item) => item.id != id
            );
        },
        async createQuestion(id) {
            let dataTemp = this.dataQuestion.map((item) => ({
                id: item.id,
                audio_id: id,
                question: item.question,
                level: item.level,
                dataAns: item.dataAns,
                answer: item.answer,
            }));
            try {
                let result = await baseRequest.post(
                    `/admin/add-question-to-audio-listening`,
                    dataTemp
                );
                let { data } = result;
                if (data.status == 200) {
                    this.$message({
                        message: data.message,
                        type: "success",
                    });
                    setTimeout(() => {
                        window.location.href = `${$Api.baseUrl}/admin/listening-level-test/question-list`;
                    }, 1000);
                } else {
                    this.$message({
                        message: data.message,
                        type: "error",
                    });
                }
            } catch (error) {
                console.log("🚀 ~ ~ error", error);
            }
        },
    },

    // created() {
    //     setTimeout(() => {
    //         this.isLoading = false;
    //     }, 3000);
    // },
};
</script>
