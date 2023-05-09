<template>
    <div class="container">
        <el-form
            :model="dynamicValidateForm"
            ref="dynamicValidateForm"
            class="demo-dynamic"
        >
            <div class="grid grid-cols-1">
                <el-form-item
                    prop="name"
                    label="Name"
                    :rules="[
                        {
                            required: true,
                            message: 'Please input name ',
                            trigger: 'blur',
                        },
                    ]"
                >
                    <el-input v-model="dynamicValidateForm.name"></el-input>
                </el-form-item>
            </div>
            <div class="grid grid-cols-1">
                <el-form-item
                    prop="display_name"
                    label="Display Name"
                    :rules="[
                        {
                            required: true,
                            message: 'Please input display name',
                            trigger: 'blur',
                        },
                    ]"
                >
                    <el-input v-model="dynamicValidateForm.display_name"></el-input>
                </el-form-item>
            </div>

            <el-card class="box-card mb-4" shadow="hover" v-for="(permision, index) in permisions" :key="permision.id">
                <div slot="header" class="clearfix">
                    <span>{{ permision.name }}</span>
                    <el-checkbox class="float-right" :indeterminate="isIndeterminate" v-model="checkAll[index].check"
                                 @change="handleCheckAllChange($event,index)">Check all
                    </el-checkbox>
                </div>

                <div style="margin: 15px 0;"></div>
                <el-checkbox-group v-model="permisionItem[index]" @change="handleCheckedCitiesChange($event,index)">
                    <el-checkbox v-for="item in permision.child" :label="item.id" :key="item.id" border>
                        {{ item.name }}
                    </el-checkbox>

                </el-checkbox-group>
            </el-card>

            <el-form-item class="mt-4">
                <el-button type="primary" @click="submitForm('dynamicValidateForm')"
                >Submit
                </el-button
                >
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";

export default {
    props: ['param'],
    data() {

        return {
            dynamicValidateForm: {
                name: "",
                display_name: "",
            },
            checkAll: [],
            checkedCities: [],
            isIndeterminate: true,
            permisions: [],
            permisionItem: []
        };
    },
    methods: {
        handleCheckAllChange(val, index) {
            this.permisionItem[index] = val ? this.permisions[index].child.map(item => item.id) : [];
            this.isIndeterminate = false;
        },
        handleCheckedCitiesChange(val,index) {
            let checkedCount = this.permisionItem[index].length;
            this.checkAll[index].check = checkedCount === this.permisions[index].child.length;
            this.isIndeterminate = checkedCount > 0 && checkedCount < this.permisions[index].child.length;
        },
        async submitForm(formName) {

            this.$refs[formName].validate(async (valid) => {
                if (valid) {
                    try {
                        let temp = [];
                        this.permisionItem.forEach(item => {
                            item.map(itemchild => {
                                temp.push(itemchild)
                            })
                        })
                        let rs = await baseRequest.post(
                            `/admin/update-role-permision/${this.param}`,
                            {...this.dynamicValidateForm, permisions: temp}
                        );
                        let {data} = rs;
                        if (data.status == 200) {
                            this.$message({
                                message: 'Create user success!.',
                                type: 'success'
                            });
                            setTimeout(() => {
                                window.location.href = `${$Api.baseUrl}/admin/roles`;
                            }, 500)
                        } else {
                            this.$message({
                                message: "Create user error",
                                type: 'error'
                            });
                        }
                    } catch (error) {
                        this.$message({
                            message:
                                "Email or phone number already exists",
                            type: 'error'
                        });
                    }
                } else {
                    console.log("error submit!!");
                    return false;
                }
            });


        },
        async getAllRole() {
            try {
                let result = await baseRequest.get("/admin/get-all-role");
                let {data} = result;
                if (data.status == 200) {
                    this.options = data.data?.map((item) => ({
                        value: item.id,
                        label: item.name,
                    }));
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getAllPermision() {
            try {
                let result = await baseRequest.get("/admin/all-permision");
                let {data} = result;
                if (data.status == 200) {
                    this.permisions = data.data?.map(item => (
                        {
                            id: item.id,
                            name: item.name,
                            child: item.permision_child.map(itemChild => (
                                {
                                    id: itemChild.id,
                                    name: itemChild.name,
                                }
                            ))
                        }
                    ))
                    this.permisions.forEach((item, index) => {
                        this.permisionItem.push([]);
                        this.checkAll.push({check: false})
                    })
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getDetailRole(){
            try {
                let result = await baseRequest.get(`/admin/get-detail-role/${this.param}`);
                let {data} = result;
                if (data.status == 200) {
                    this.dynamicValidateForm = {
                        name: data.data.name,
                        display_name: data.data.display_name,
                        permisions: data.data.permisions
                    }
                    this.permisions.forEach((item,index) => {
                        item.child.forEach((itemChild) => {
                            let indexPermison = this.dynamicValidateForm.permisions.findIndex(itemPe => itemPe.id === itemChild.id);
                            if(indexPermison !=-1){
                                this.permisionItem[index].push(itemChild.id);
                            }
                        })
                    })
                }
            } catch (e) {
                console.log(e);
            }
        }
    },
    created() {
        this.getAllRole();
        this.getAllPermision()
        this.getDetailRole()
    },
};
</script>
