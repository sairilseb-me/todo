<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="authError">
                    <div class="alert alert-danger" role="alert">
                        Wrong Credentials. Please try again.
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h3>Login</h3></div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">
                                Email:
                            </label>
                            <input type="email" name="" id="" class="form-control" v-model="data.email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="" id="" class="form-control" v-model="data.password">
                        </div>
                        <div class="mb-2 d-flex justify-content-end">
                            <button class="btn btn-primary" style="width: 7rem" @click="login">Login</button>
                        </div>
                        <div class="mb-1">
                            <p>No account yet? <router-link :to="{name: 'register'}">Sign Up</router-link></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
import {reactive, ref} from 'vue';
import {useRouter} from 'vue-router';

export default {
    setup() {

        const authError = ref(false);
        const data = reactive({
            email: '',
            password: '',
        });

        const triggerAuthError =  () => {
            authError.value  = true;

            setTimeout(() => {
                authError.value = false
            }, 5000);
        }

        const router = useRouter();

        const login = () => {
            axios.get('/sanctum/csrf-cookie')
            .then((response)=>{
                axios.post(`/api/login`, data, {withCredentials: true})
                .then((response)=>{
                    if(response.data.status === 'success'){
                        router.push('/');
                    }else{
                        triggerAuthError();
                    }
                })
            })
        }

        return {
            data,
            login,
            authError,
        }
    },
}
</script>
