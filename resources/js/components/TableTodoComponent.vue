<template>
    <div class="container">
        <h2>Todo Table</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Control</th>
            </tr>
            </thead>
            <tbody v-if="Object.keys(this.listTodo).length != 0">
                <tr v-for="(item,index) in this.listTodo" :key = "index">
                    <td>{{item.name}}</td>
                    <td>{{item.description}}</td>
                    <td>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button @click="deleteItemTodo(item.id,index)" type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name:'',
                description : '',
                todoApp :{
                    name : '',
                    description: ''

                },
                listTodo : [],
                config : {
                    headers: {'Authorization': "bearer " + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1NjkxMTc3MiwiZXhwIjoxNTU2OTE1MzcyLCJuYmYiOjE1NTY5MTE3NzIsImp0aSI6ImdwRFd2azBmV1loWEpFeksiLCJzdWIiOjcsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.yhnfPgG94M-X4UwQIruiZjooHs_3c6Vk_PErf9a3JpA'}
                },
            }
        },
        created() {
          this.getListTodo();
        },
        methods :{
            getListTodo(){
                axios.get('api/getTodoList',this.config)
                    .then(response => {
                        this.listTodo = response.data.todo;
                    }).catch(error => {
                        console.log(error.response.data.status);
                });
            },
            deleteItemTodo(id,key){
                console.log(id);
                console.log(key);
            }
        }

    }
</script>

<style scoped>

</style>
