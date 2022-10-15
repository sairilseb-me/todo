<template>
    <div class="container">
        <div class="row d-flex justify-content-end">
            <div class="col-md-3 mb-3">
                <button class="btn btn-primary" @click="logout">Logout</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Add Todo</h3></div>
                    <div class="card-body">
                        <input type="text" name="" id="" class="form-control mb-2" placeholder="Add todo here.." v-model="title">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" @click="addTask">Add Todo</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header"><h3>Todo List</h3></div>
                    <div class="card-body">
                        <div>
                            <ul class="d-flex justify-content-around" v-for="todo in todos" :key="todo.id">
                               <div class="col-md-8">
                                    <li>{{ todo.title }}</li>
                               </div>
                               <div class="col-md-4"><button class="btn btn-danger btn-sm">Delete</button></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {onMounted, reactive, ref} from 'vue';
import {useRouter} from 'vue-router';
export default {
    setup() {
        
        let title = ref('');

        let todos = ref();

        const router = useRouter();
        const getTodo = () => {
            axios.get('/api', {withCredentials: true})
            .then((response)=>{
                todos.value = response.data;
                console.log(response.data);
            })
        }

        const addTask = () => {
            axios.post('/api/create', {'title': title.value})
            .then((response)=>{
                if(response.data.status === 'success'){
                    getTodo();
                    title.value = '';
                }
            })
        }

        const logout = () => {
            axios.get('/api/logout')
            .then(response => {
                if(response.data.status === 'success'){
                    router.push('/login');
                }
            })
        }

        onMounted(()=>{
            getTodo();
        })



        return {
            title,
            addTask,
            logout,
            todos,
        }
    },
}
</script>