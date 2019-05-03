<template>
    <div class="container">
        <h2>Bordered Table</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{this.name}}</td>
                <td>{{this.Description}}</td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name:'dddd',
                Description : 'dsdsdsd',
                todoApp :{
                    name : '',
                    Description: ''

                },
                config : {
                    headers: {'Authorization': "bearer " + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1Njg3NzIxMywiZXhwIjoxNTU2ODgwODEzLCJuYmYiOjE1NTY4NzcyMTMsImp0aSI6IndVME52U3paUUlydUFhNUIiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.VzTw9415558Xbb2OdgOGxYDZhur06qb_pcUzUyhFsDI'}
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
                        console.log(response.data.todo);
                    }).catch(error => {
                        console.log(error.response.data.status);
                });
            }
        }

    }
</script>

<style scoped>

</style>
