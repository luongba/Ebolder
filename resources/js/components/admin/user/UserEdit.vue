<template>
  <div class="container">
    <el-form
      :model="dynamicValidateForm"
      ref="dynamicValidateForm"
      class="demo-dynamic"
    >
      <div class="grid grid-cols-1">
        <el-form-item
          prop="email"
          label="Email"
          :rules="[
            {
              required: true,
              message: 'Please input email address',
              trigger: 'blur',
            },
            {
              type: 'email',
              message: 'Please input correct email address',
              trigger: ['blur', 'change'],
            },
          ]"
        >
          <el-input 
          :disabled=true v-model="dynamicValidateForm.email"></el-input>
        </el-form-item>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <el-form-item
          prop="name"
          label="Name"
          :rules="[
            {
              required: true,
              message: 'Please input name',
              trigger: 'blur',
            },
          ]"
        >
          <el-input v-model="dynamicValidateForm.name"></el-input>
        </el-form-item>
        <el-form-item
          prop="phone"
          label="Phone"
          :rules="[
            {
              required: true,
              message: 'Please input phone',
              trigger: 'blur',
            },
            {
              min: 10,
              max: 10,
              message: 'Length must be 10 character',
              trigger: 'blur',
            },
          ]"
        >
          <el-input v-model="dynamicValidateForm.phone"></el-input>
        </el-form-item>
      </div>

      <div class="grid grid-cols-1">
        <el-form-item
          prop="roles"
          label="Role"
          :rules="[
            {
              required: true,
              message: 'Please input roles',
              trigger: 'blur',
            },
          ]"
        >
          <el-select
            v-model="dynamicValidateForm.roles"
            class="w-full"
            placeholder="Choose roles"
            :disabled="dynamicValidateForm.roles == 1"
          >
            <el-option
              v-for="item in options"
              :key="item.value"
              :label="item.label"
              :value="item.value"
            >
            </el-option>
          </el-select>
        </el-form-item>
      </div>

      <el-form-item>
        <el-button type="primary" @click="submitForm('dynamicValidateForm')"
          >Submit</el-button
        >
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";

export default {
  props: ["param"],
  data() {
    return {
      dynamicValidateForm: {
        name: "",
        email: "",
        phone: "",
        roles: "",
      },
      options: [
        {
          value: null,
          label: null,
        },
      ],
    };
  },
  methods: {
    async submitForm(formName) {
      this.$refs[formName].validate(async (valid) => {
        if (valid) {
          this.dynamicValidateForm.roles = [this.dynamicValidateForm.roles]
          try {
            let rs = await baseRequest.post(
              `/admin/update-user/${this.param}`,
              this.dynamicValidateForm
            );
            let { data } = rs;
            if (data.status == 200) {
              this.$message({
                message: "Update user success!.",
                type: "success",
              });
              this.getDetailUser();
            } else {
              this.$message({
                message: "Update user error",
                type: "error",
              });
            }
          } catch (error) {
            this.$message({
              message: "Email or phone number already exists",
              type: "error",
            });
          }
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    validatePass2(rule, value, callback) {
      console.log(rule);
      if (value === "") {
        callback(new Error("Please input the password again"));
      } else if (value !== this.dynamicValidateForm.password) {
        callback(new Error("Two inputs don't match!"));
      } else {
        callback();
      }
    },
    async getAllRole() {
      try {
        let result = await baseRequest.get("/admin/get-all-role");
        let { data } = result;
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
    async getDetailUser() {
      try {
        let result = await baseRequest.get(`/admin/detail-user/${this.param}`);
        let { data } = result;
        if (data.status == 200) {
          this.dynamicValidateForm = {
            name: data.data.name || null,
            email: data.data.email || null,
            phone: data.data.phone || null,
            roles: data.data.roles[0]?.id || 3,
          };
        }
      } catch (e) {
        console.log(e);
      }
    },
  },
  created() {
    this.getDetailUser();
    this.getAllRole();
  },
};
</script>
