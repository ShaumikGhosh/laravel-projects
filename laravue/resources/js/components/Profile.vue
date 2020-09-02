<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile Component</div>

                    <div class="card-body">
                        <div class="col-md-12">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" :src="imageSource()"
                                             alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{form.name}}</h3>

                                    <p class="text-muted text-center">Software Engineer</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Followers</b> <a class="float-right">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Following</b> <a class="float-right">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Friends</b> <a class="float-right">13,287</a>
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    Logged in user info
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName"
                                                               placeholder="Name" v-model="form.name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                           class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail"
                                                               placeholder="Email" v-model="form.email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience"
                                                           class="col-sm-2 col-form-label">Photo</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="photo" id="inputExperience"
                                                               @change="updateProfile"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" @click.prevent="updateInfo"
                                                                class="btn btn-primary float-right">Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Profile',
        data() {
            return {
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    exist_img: '',
                    photo: ''
                })
            }
        },
        methods: {
            loadProfileData() {
                axios.get("api/profile")
                    .then((data) => {
                        this.form.name = data.data.name;
                        this.form.email = data.data.email;
                        this.form.exist_img = data.data.photo;
                    })
                    .catch((data) => {

                    })
            },
            updateProfile(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = () => {
                    this.form.photo = reader.result;
                };
                reader.readAsDataURL(file);
            },

            updateInfo() {
                this.form.put('api/profile/')
                    .then((data) => {
                        Fire.$emit('profileUpdated');
                        Toast.fire({
                            icon: 'success',
                            title: `${data.data.message}`
                        });
                    })
                    .catch(() => {

                    })
            },

            imageSource() {
                if (this.form.exist_img != null){
                    return "/img/" + this.form.exist_img;
                }else {
                    return "/img/demo.png";
                }
            }
        },

        created() {
            this.loadProfileData();

            Fire.$on('profileUpdated', () => {
                this.loadProfileData();
            })
        }
    }
</script>
