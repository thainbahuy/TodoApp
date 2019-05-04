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
                    headers: {'Authorization': "bearer " + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1Njk2NDExNSwiZXhwIjoxNTU2OTY3NzE1LCJuYmYiOjE1NTY5NjQxMTUsImp0aSI6IkFlZmVKUUpncHg0RjZ6SE0iLCJzdWIiOjcsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.elbHgiwfogFxlogwE3fAbyMBgl6A8QwA0mvRBHEjqlc'}
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
                        alert(error.response.data.status);
                });
            },

            deleteItemTodo(id,index){
                axios.delete('api/todo/'+id,this.config)
                    .then(response => {
                        this.listTodo.splice(index,1);
                    })
                    .catch(error => {
                        alert(error.response.data.status);
                    });
            }
        }

    }
</script>

<style scoped>

</style>
