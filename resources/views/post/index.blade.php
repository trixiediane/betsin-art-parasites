<x-app-layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Posts</li>
                    <li class="breadcrumb-item active">Art Submission</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Submit an Art</h5>

                <!-- Floating Labels Form -->
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="title" placeholder="Sample Title">
                            <label for="title">Title</label>
                            <i id="errors" class="errors text-danger font-weight-bold" data-field="title"
                                style="display:none"></i>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Address" id="content" style="height: 100px;"></textarea>
                            <label for="content">Content here...</label>
                            <i id="errors" class="errors text-danger font-weight-bold" data-field="content"
                                style="display:none"></i>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="image" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="image">
                            <i id="errors" class="errors text-danger font-weight-bold" data-field="image"
                                style="display:none">test</i>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" onclick="submitArt()">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->
    @push('scripts')
        <script>
            function submitArt() {
                var user_id = JSON.parse(localStorage.getItem('user_data'));
                user_id = user_id.id
                let image = $("#image")[0];
                let attachment = image.files[0];

                let formData = new FormData();
                let title = $("#title").val();
                let content = $("#content").val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                formData.append('user_id', user_id);
                formData.append('title', title);
                formData.append('content', content);
                formData.append('image', attachment);

                $.ajax({
                    type: "POST",
                    url: "{{ route('post.store') }}",
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
                                $('input').val('');
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
