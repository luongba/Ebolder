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
          <el-input v-model="dynamicValidateForm.email"></el-input>
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

      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <el-form-item
          prop="password"
          label="Password"
          :rules="[
            {
              required: true,
              message: 'Please input password',
              trigger: 'blur',
            },
          ]"
        >
          <el-input
            type="password"
            v-model="dynamicValidateForm.password"
          ></el-input>
        </el-form-item>
        <el-form-item
          prop="password_confirmation"
          label="Password Confirm"
          :rules="[{ validator: validatePass2, trigger: 'blur' }]"
        >
          <el-input
            type="password"
            v-model="dynamicValidateForm.password_confirmation"
          ></el-input>
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
            multiple
            class="w-full"
            placeholder="Choose roles"
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
  data() {
    return {
      dynamicValidateForm: {
        name: "",
        email: "",
        phone: "",
        password: "",
        password_confirmation: "",
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
          try {
            let rs = await baseRequest.post(
              "/admin/create-user",
              this.dynamicValidateForm
            );
            let { data } = rs;
            if (data.status == 200) {
              this.$message({
                message: "Create user success!.",
                type: "success",
              });
              setTimeout(() => {
                window.location.href = `${$Api.baseUrl}/admin/users`;
              }, 500);
            } else {
              this.$message({
                message: "Create user error",
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
  },
  created() {
    this.getAllRole();
  },
};
</script>
