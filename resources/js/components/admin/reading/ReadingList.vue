<template>
    <div>
        <div class="container">
            <LoadingVue v-if="isLoading" />
            <div class="grid grid-cols-1 gap-4">
                <input class="
                            border
                            border-[#e6e8ec]
                            outline-none
                            rounded-md
                            w-[30%]
                            px-2
                            py-2
                            mb-2
                        " v-model="textSearch" placeholder="Search" > </input>
            </div>
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
                    :style="item.is_exam == 1 ? 'border: 4px solid #3f6ad8 !important' : ''"
                    v-for="item in listTopic"
                    :key="item.id"
                >
                    <span class="w-[60%] overflow-hidden mr-2">{{
                        item.name
                    }} </span>
                    <div class="flex items-center">
                        <a
                            :href="`${ApiUrl}/admin/reading-level-test/topic-detail/${item.id}`"
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
        <div class="mt-3 flex items-center justify-center"> 
            <el-pagination
                background
                layout="prev, pager, next"
                :total="total"
                :current-page.sync="current"
                :page-size="perPage"
                @prev-click="paginateClick"
                @next-click="paginateClick"
                @current-change="paginateClick"
            >
            </el-pagination>
        </div>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import Editor from "@tinymce/tinymce-vue";
import LoadingVue from "../loading/Loading.vue";

export default {
    components: {
        Editor,
        LoadingVue
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
            isLoading: false,
            total: 1,
            current: 1,
            pageSize: 1,
            perPage: 10,
            textSearch: '',
            timeOut: null
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
        paginateClick(curentPage) {
            this.current = curentPage;
            this.getAllTopic();
        },
        async getAllTopic() {
            try {
                this.isLoading = true;
                let rs = await baseRequest.get(`/admin/list-topic-reading?search=${this.textSearch}&page=${this.current}`);
                if (rs.data.status == 200) {
                    this.isLoading = false;
                    this.total = rs.data.data.total;
                    this.current = rs.data.data.current_page;
                    this.pageSize = rs.data.data.last_page;
                    this.perPage = rs.data.data.per_page;
                    this.listTopic = rs.data.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                        is_exam: item.is_exam
                    }));
                }
            } catch (e) {
                setTimeout(() => {
                    this.isLoading = false;
                }, 1000);
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
                            `/admin/delete-topic-reading`,
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
    watch: {
        "textSearch": {
            handler(value) {
                this.current = 1;
                clearTimeout(this.timeOut)
                this.timeOut = setTimeout(async() => {
                    await this.getAllTopic()
                }, 300);
            }
        }
    }
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
