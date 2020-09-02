<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Table</h3>
                    <div class="card-tools">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">
                            Add New <i class="fa fa-user-plus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.type}}</td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-edit" @click="editUserModal(user)"></i>
                                    </a>

                                    <a href="#" @click="deleteUser(user)">
                                        <i class="fa fa-trash" style="color:red"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ editMode ? "Edit old data" : "Add new user" }}</h5>
                        <button type="button" class="close" @click="showModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="editMode ? updateUser() : createUser()">
                            <div class="form-group">
                                <label for="name"></label>
                                <input id="name" v-model="form.name" type="text" name="name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"
                                       placeholder="Enter user name">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input id="email" v-model="form.email" type="email" name="email"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }"
                                       placeholder="Enter user e-mail">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="type"></label>
                                <select id="type" @change="selectedType" name="type"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                    <option v-bind:value="form.type ? form.type : ''">{{form.type ? form.type : "-- Select Type --"}}</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Writer">Writer</option>
                                    <option value="Seo Clerk">Seo Clerk</option>
                                </select>
                                <has-error :form="form" field="type"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="password"></label>
                                <input id="password" v-model="form.password" type="password" name="password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }"
                                       placeholder="Enter user password">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click="closeModalWindow">Close</button>
                                <button type="submit" class="btn btn-primary">{{editMode ? "Save Changes" : "Add New"}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Users',
        data () {
            return {
                editMode: false,
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    type: null,
                    password: ''
                })
            }
        },

        methods:{

            closeModalWindow () {
                this.form.reset();
                this.editMode = false;
                $('#addUserModal').modal('hide');
            },

            showModal(){
                this.form.reset();
                this.editMode = false;
            },

            editUserModal(user){
                this.form.reset();
                this.editMode = true;
                $('#addUserModal').modal('show');
                this.form.fill(user);
            },

            loadUser(){
                axios.get("api/user")
                .then(({data}) => (this.users = data));
            },

            createUser(){
                this.form.post('api/user')
                .then(()=>{
                    Fire.$emit('userCreated');
                    $('#addUserModal').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Data inserted successfully!'
                    });
                })
                .catch(()=>{

                });
            },

            updateUser () {
                this.form.put("api/user/"+this.form.id)
                .then((response)=>{
                    $('#addUserModal').modal('hide');
                    Fire.$emit('userUpdated');
                    Toast.fire({
                        icon: 'success',
                        title: `${response.data.message}`
                    });
                })
                .catch(()=>{

                });
            },

            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    this.form.delete('api/user/'+id)
                    .then((data)=>{
                        Fire.$emit("userDeleted");
                        Swal.fire(
                            'Deleted!',
                            `${data.data.message}`,
                            'success'
                        )
                    })
                    .catch((result)=>{

                    });
                })
            },

            selectedType (e) {
                setInterval(()=>{
                    this.form.type = e.target.value;
                }, 1000);
            }
        },

        created() {
            this.loadUser();
            setInterval(()=>this.loadUser(), 2000);
            Fire.$on('userCreated', ()=>{
                this.loadUser();
            });
            Fire.$on('userDeleted', ()=>{
                this.loadUser();
            });
            Fire.$on('userUpdated', ()=>{
                this.loadUser();
            });
        }
    }
</script>
