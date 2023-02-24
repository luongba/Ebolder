<template>
    <div class="w-full h-[100vh] overflow-y-scroll">
        <div class="w-full  mt-4">
            <header-component :user="user" />
            <div class="container">
                <div class="block" v-if="data.length > 0">
                    <el-timeline>
                        <el-timeline-item
                            v-for="(item, index) in data"
                            :key="index"
                            type="success"
                            size="large"
                            :timestamp="created_at(item.created_at)"
                            placement="top"
                        >
                            <el-card shadow="never" class="p-4">
                                <el-row :gutter="20">
                                    <el-col :xs="24" :span="6">
                                        <div class="my-2">
                                            <el-statistic title="Test type">
                                                <template slot="formatter">
                                                    {{ item.test_type }}
                                                </template>
                                            </el-statistic>
                                        </div>
                                    </el-col>
                                    <el-col :xs="24" :span="6">
                                        <div class="my-2">
                                            <el-statistic title="Topic">
                                                <template slot="formatter">
                                                    {{ item.topic_name }}
                                                </template>
                                            </el-statistic>
                                        </div>
                                    </el-col>
                                    <el-col :xs="24" :span="6">
                                        <div class="my-2">
                                            <el-statistic title="Scores">
                                                <template slot="formatter">
                                            <span class="text-green-500">{{
                                                    item.scores
                                                }}</span>
                                                </template>
                                                <template slot="suffix">
                                            <span class="like">
                                                <i
                                                    class="el-icon-trophy"
                                                    style="color: green"
                                                ></i>
                                            </span>
                                                </template>
                                            </el-statistic>
                                        </div>
                                    </el-col>

                                    <el-col :xs="24" :span="6">
                                        <div class="my-2">
                                            <el-statistic title="Completion time">
                                                <template slot="formatter">
                                                    {{
                                                        completion_time(
                                                            item.completion_time
                                                        )
                                                    }}
                                                </template>
                                                <template slot="suffix">
                                            <span class="like">
                                                <i
                                                    class="el-icon-timer"
                                                    style="color: red"
                                                ></i>
                                            </span>
                                                </template>
                                            </el-statistic>
                                        </div>
                                    </el-col>
                                </el-row>
                            </el-card>
                        </el-timeline-item>
                    </el-timeline>
                </div>
                <div v-else>
                    <el-card shadow="never" class="p-4">
                        <el-empty description="History"></el-empty>
                    </el-card>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    props: ["data", "user"],
    data() {
        return {};
    },
    computed: {},
    methods: {
        completion_time(mili) {
            return $Helper.millisToMinutesAndSeconds(mili);
        },
        created_at(time) {
            return $Helper.formatDateTime(time);
        },
    },
};
</script>
<style scoped>
>>> .el-timeline-item__timestamp {
    font-size: 16px;
    line-height: 1.2;
}
</style>
