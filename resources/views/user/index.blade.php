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

                            @if ($user->avatar)
                                <img id="avatar-img" src="{{ asset('storage/' . $user->avatar) }}" alt="Profile"
                                    class="rounded-circle mw-10">
                            @else
                                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle mw-10">
                            @endif

                            <h2 id="headerName">Kevin Anderson</h2>
                            <h3 id="headerBio">Web Designer</h3>
                            {{-- <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div> --}}
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

                                {{-- <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Settings</button>
                                </li> --}}

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

                                    <div class="row mb-3">
                                        <label for="avatar" class="col-md-4 col-lg-3 col-form-label">Avatar</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="avatar">
                                            </div>
                                            <i id="errors" class="errors text-danger font-weight-bold"
                                                data-field="avatar" style="display:none"></i>
                                        </div>
                                    </div>

                                    <div class="text-right mt-3">
                                        <button onclick="updateUser()" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>

                                {{-- <div class="tab-pane fade pt-3" id="profile-settings">

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

                                </div> --}}

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <div class="row mb-3">
                                        <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="old_password" type="password" class="form-control"
                                                id="old_password">
                                            <i id="errors" class="errors text-danger font-weight-bold"
                                                data-field="old_password" style="display:none"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password" class="form-control"
                                                id="new_password">
                                            <i id="errors" class="errors text-danger font-weight-bold"
                                                data-field="new_password" style="display:none"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="confirm_password"
                                            class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="confirm_password" type="password" class="form-control"
                                                id="confirm_password">
                                            <i id="errors" class="errors text-danger font-weight-bold"
                                                data-field="confirm_password" style="display:none"></i>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 col-lg-5">
                                        </div>
                                        <button onclick="updatePassword()"
                                            class="col-md-4 col-lg-3 btn btn-primary">Change
                                            Password</button>
                                        <div class="col-md-4 col-lg-4">
                                            <div class="spinner-border" role="status" style="display: none;">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
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


            async function updatePassword() {
                $(".spinner-border").show();

                try {
                    var csrf = $('meta[name="csrf-token"]').attr('content');

                    const response = await $.ajax({
                        type: "PUT",
                        url: "{{ route('update.password', ['id' => 'id']) }}".replace('id', id),
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": csrf
                        },
                        data: {
                            old_password: $("#old_password").val(),
                            new_password: $("#new_password").val(),
                            confirm_password: $("#confirm_password").val(),
                        },
                    });

                    if (response.status === 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.text,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then(() => {
                            $(".errors").hide();
                            $(".spinner-border").hide();
                            $("#old_password").val("");
                            $("#new_password").val("");
                            $("#confirm_password").val("");
                        });
                    } else if (response.status === 400) {
                        Swal.fire({
                            title: "Error",
                            text: response.text,
                            icon: 'error',
                            confirmButtonText: 'Ok',
                        }).then(() => {
                            $(".spinner-border").hide();
                        });
                    }
                } catch (error) {
                    console.error("Error:", error);
                    $(".errors").hide();
                    $(".spinner-border").hide();

                    if (error.responseJSON && error.responseJSON.errors) {
                        $(".errors").each(function(index, element) {
                            Object.entries(error.responseJSON.errors).forEach(error_element => {
                                if (error_element[0] == $(element).data('field')) {
                                    $(element).text(error_element[1]);
                                    $(element).show();
                                }
                            });
                        });
                    }
                }
            }


            function showUser(id) {
                $.ajax({
                    url: "{{ route('user.show', ['user' => 'id']) }}".replace('id', id),
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        $("#headerName").empty();
                        $("#headerBio").empty();

                        $("#headerName").append(response.data.name);
                        $("#headerBio").append(response.data.bio);
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
                let message = $("#message").val();
                let avatar = $("#avatar")[0];
                let attachment = avatar.files[0];
                let formData = new FormData();
                let bio = $("#bio").val();
                let username = $("#username").val();
                let name = $("#name").val();
                let email = $("#email").val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                formData.append('bio', bio);
                formData.append('username', username);
                formData.append('name', name);
                formData.append('email', email);

                if (attachment) {
                    formData.append('avatar', attachment);
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('update-user', ['id' => 'id']) }}".replace('id', id),
                    headers: {
                        "X-CSRF-TOKEN": csrf
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
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
                                let user = response.data;
                                if (user.avatar) {
                                    $('#avatar-img').attr('src', '{{ asset('storage/') }}' + '/' + user
                                        .avatar);
                                } else {
                                    // If user doesn't have an avatar, fallback to default image
                                    $('#avatar-img').attr('src', 'assets/img/profile-img.jpg');
                                }
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
