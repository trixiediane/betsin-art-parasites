<x-app-layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            <h2>Kevin Anderson</h2>
                            <h3>Web Designer</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Settings</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    {{-- Profile Overview --}}
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <div class="row mb-3">
                                        <label for="bio" class="col-md-4 col-lg-3 col-form-label">Bio</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="bio" class="form-control" id="bio" style="height: 100px"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="">
                                            <i id="errors" class="errors text-danger font-weight-bold"
                                                data-field="name" style="display:none"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control" id="username"
                                                value="">
                                            <i id="errors" class="errors text-danger font-weight-bold"
                                                data-field="username" style="display:none"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email"
                                                value="">
                                            <i id="errors" class="errors text-danger font-weight-bold"
                                                data-field="email" style="display:none"></i>
                                        </div>
                                    </div>

                                    <div class="text-right mt-3">
                                        <button onclick="updateUser()" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="securityNotify" checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
    @push('scripts')
        <script>
            var id = user_data.id;
            showUser(id);
            editUser(id);

            function showUser(id) {
                $.ajax({
                    url: "{{ route('user.show', ['user' => 'id']) }}".replace('id', id),
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        var bio = response.data.bio ? response.data.bio : "Empty bio";
                        $("#profile-overview").empty();
                        $("#profile-overview").append(`
                        <h5 class="card-title">About</h5>
                        <p class="small fst-italic">${bio}</p>
                        <h5 class="card-title">Profile Details</h5>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Name</div>
                            <div class="col-lg-9 col-md-8">${response.data.name}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Username</div>
                            <div class="col-lg-9 col-md-8">${response.data.username}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Email</div>
                            <div class="col-lg-9 col-md-8">${response.data.email}</div>
                        </div>
                        `);
                    },
                    error: function(response) {
                        console.log("error");
                        console.log(response);
                        Swal.fire({
                            title: "Error",
                            text: response.text,
                            icon: 'error',
                            confirmButtonText: 'Ok',
                        });
                    }
                });
            }

            function editUser(id) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('user.edit', ['user' => 'id']) }}".replace('id', id),
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        // console.log(csrf);
                        $("#bio").val(response.data.bio);
                        $("#name").val(response.data.name);
                        $("#username").val(response.data.username);
                        $("#email").val(response.data.email);
                    },
                    error: function(response) {
                        console.log("error");
                        console.log(response);
                        Swal.fire({
                            title: "Error",
                            text: response.text,
                            icon: 'error',
                            confirmButtonText: 'Ok',
                        });
                    }
                });
            }

            function updateUser() {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "PUT",
                    url: "{{ route('user.update', ['user' => 'id']) }}".replace('id', id),
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": csrf
                    },
                    data: {
                        bio: $("#bio").val(),
                        name: $("#name").val(),
                        username: $("#username").val(),
                        email: $("#email").val(),
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                title: "Success",
                                text: response.text,
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then(() => {
                                showUser(id);
                                editUser(id);
                                $(".errors").hide();
                            });
                        } else if (response.status == 400) {
                            Swal.fire({
                                title: "Error",
                                text: response.text,
                                icon: 'error',
                                confirmButtonText: 'Ok',
                            })
                        }

                    },
                    error: function(response) {
                        console.log("error");
                        $(".errors").hide();
                        $(".errors").each(function(index, element) {
                            Object.entries(response.responseJSON.errors).forEach(error_element => {
                                console.log(error_element);
                                if (error_element[0] == $(element).data('field')) {
                                    $(element).text(error_element[1]);
                                    $(element).show();
                                }
                            });
                        });
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
