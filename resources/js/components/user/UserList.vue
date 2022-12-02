<template>
    <div class="container">
        <el-table
            :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))"
            style="width: 100%">

            <el-table-column
                label="Name"
                prop="name">
            </el-table-column>
            <el-table-column
                label="Email"
                prop="email">
            </el-table-column>
            <el-table-column
                label="Phone"
                prop="phone">
            </el-table-column>
            <el-table-column align="right">
                <template slot="header" slot-scope="scope">
                    <el-input
                        v-model="search"
                        size="small"
                        placeholder="Type to search"/>
                </template>
                <template slot-scope="scope">
                    <el-button
                        size="mini"
                        @click="handleEdit(scope.$index, scope.row)">Edit
                    </el-button>
                    <el-button
                        size="mini"
                        type="danger"
                        @click="handleDelete(scope.$index, scope.row)">Delete
                    </el-button>
                </template>
            </el-table-column>
        </el-table>
    </div>


</template>

<script>
import baseRequest from "../../utils/baseRequest";

export default {
    data() {
        return {
            tableData: [{
                id: null,
                email: null,
                name: null,
                phone: null,
            },],
            search: "",
            show:true,
        }
    },
    methods: {
        handleEdit(index, row) {
            window.location.href = `${$Api.baseUrl}/admin/user/edit/`+row.id;
        },
        handleDelete(index, row) {
            this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(async () => {
                try {
                    let result = await baseRequest.post(`/admin/delete-user/${row.id}`);
                    let {data} = result;
                    if (data.status == 200) {
                        this.getAllUser();
                        this.$message({
                            type: 'success',
                            message: 'Delete completed'
                        });
                    }
                } catch (error) {
                    console.log(error);
                    this.$message({
                        type: 'error',
                        message: 'Delete error'
                    });
                }

            }).catch(() => {
                return;
            });
        },
        async getAllUser() {
            try {
                let result = await baseRequest.get('/admin/list-user');
                let {data} = result;
                if (data.status == 200) {
                    this.tableData = data.data?.map(item => (
                        {
                            id: item.id,
                            name: item.name,
                            email: item.email,
                            phone: item.phone
                        }
                    ));
                }
            } catch (error) {
                console.log(error);
            }


        }
    },
    created() {
        this.getAllUser();
    }
}
</script>
