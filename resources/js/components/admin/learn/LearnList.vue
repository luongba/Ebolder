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
                    v-for="item in listTopic"
                    :key="item.id"
                >
                    <span class="w-[60%] overflow-hidden mr-2">{{
                            item.name
                        }}</span>
                    <div class="flex items-center">
                        <a
                            :href="`${ApiUrl}/admin/lesson/topic-detail/${item.id}`"
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
                            @click="deleteTopic(item.id)"
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
            },
            listTopic: [],
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
            baseApi: $Api.baseUrl,
            isplay: false,
        };
    },
    computed: {},
    watch: {},
    methods: {
        async createTopic(formName) {
            this.$refs[formName].validate(async (valid) => {
                if (valid) {
                    try {
                        let rs = await baseRequest.post(
                            `/admin/store-topic-vocabulary`,
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
        async getAllTopic() {
            try {
                let rs = await baseRequest.get(
                    `/admin/list-topic-lesson`
                );
                if (rs.data.status == 200) {
                    console.log(rs.data.data);
                    this.listTopic = rs.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                    }));
                }
            } catch (e) {
                console.log(e);
            }
        },
        async deleteTopic(id) {
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
                        let rs = await baseRequest.post(
                            `/admin/delete-topic-lesson`,
                            { id }
                        );
                        if (rs.data.status == 200) {
                            this.getAllTopic();
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
        this.getAllTopic();
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
