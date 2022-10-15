<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Register</h3></div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">
                                Email:
                            </label>
                            <input type="email" name="" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                        <div class="mb-2 d-flex justify-content-between">
                            <router-link class="btn btn-secondary" :to="{name: 'login'}">Back</router-link>
                            <button class="btn btn-primary" style="width: 7rem">Register</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
