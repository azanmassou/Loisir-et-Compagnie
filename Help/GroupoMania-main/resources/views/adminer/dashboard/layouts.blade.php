<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> GroupoMania | @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('Logos/icon-left-font-monochrome-white.png') }}" />
    <link rel="stylesheet" href="{{ asset('masterAdminer/assets/css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('masterAdminer/assets/css/socialv.css?v=4.0.0') }}">
    <link rel="stylesheet"
        href="{{ asset('masterAdminer/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('masterAdminer/assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet"
        href="{{ asset('masterAdminer/assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('masterAdminer/assets/vendor/font-awesome-line-awesome/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('masterAdminer/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">

    {{-- Ajax Requette --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="  ">
    <!-- loader Start -->
    {{-- <div id="loading">
          <div id="loading-center">
          </div>
    </div> --}}
    <!-- loader END -->

    @yield('content')

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('masterAdminer/assets/js/libs.min.js') }}"></script>
    <!-- slider JavaScript -->
    {{-- <script src="../assets/js/slider.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/slider.js') }}"></script>
    <!-- masonry JavaScript -->
    {{-- <script src="../assets/js/masonry.pkgd.min.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/masonry.pkgd.min.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    {{-- <script src="../assets/js/enchanter.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/enchanter.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    {{-- <script src="../assets/js/sweetalert.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/sweetalert.js') }}"></script>
    <!-- app JavaScript -->
    {{-- <script src="../assets/js/charts/weather-chart.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/charts/weather-chart.js') }}"></script>

    {{-- <script src="../assets/js/app.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/app.js') }}"></script>
    {{-- <script src="../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/datepicker.min.js') }}"></script>
    {{-- <script src="../assets/js/lottie.js"></script> --}}
    <script src="{{ asset('masterAdminer/assets/js/lottie.js') }}"></script>


    {{-- Importation Css JS Vite --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}


    {{-- Like Script --}}
    <script>
        function likingPost() {
            const forms = document.querySelectorAll("#forms");

            forms.forEach((form) => {
                form.addEventListener("submit", (e) => {
                    e.preventDefault();

                    const url = form.getAttribute("action");

                    const token = document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content;

                    const postId = form.querySelector("#post-id").value;

                    const count = form.querySelector("#count");

                    const btnSubmit = form.querySelectorAll('#btnS');

                    fetch(url, {
                            method: "POST",
                            headers: {
                                accept: "application/json",
                                "X-CSRF-TOKEN": token,
                                // "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            body: JSON.stringify({
                                id: postId,
                            }), // Replace 1 with the actual post ID
                        })
                        .then((response) => {

                            if (!response.ok) {
                                throw new Error("Error liking post");
                            }

                            return response.json();

                            // console.log(response)
                        })
                        .then((data) => {

                            // document.getElementById("count").innerHTML=data.count;

                            count.innerHTML = data.count;

                            btnSubmit.classList.remove('btn-outline-primary');
                            btnSubmit.classList.add('btn-outline-danger');
                            // console.log(btnSubmit);

                            // btnSubmit.removeProperty('btn-outline-primary');


                            // form.getElementById('btn').className = "like-btn btn btn-outline-danger";


                        })
                        .catch((error) => {
                            console.error("Error liking post2:", error);

                        });
                });


            });
        }

        // function freshingPost() {

        //     fetch("{{route('posts.fresh')}}");

        //             .then((response) => {

        //                 if (!response.ok) {
        //                     throw new Error("Error liking post");
        //                 }

        //                 return response.json();

                        
        //             })
        //             .then((data) => {


        //             })
        //             .catch((error) => {
        //                 console.error("Error liking post2:", error);
        //             });

        // }
    </script>

    <!-- offcanvas start -->

    <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn"
        aria-labelledby="shareBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small">
            <div class="d-flex flex-wrap align-items-center">
                <div class="text-center me-3 mb-3">
                    <img src="../assets/images/icon/08.png" class="img-fluid rounded mb-2" alt="">
                    <h6>Facebook</h6>
                </div>
                <div class="text-center me-3 mb-3">
                    <img src="../assets/images/icon/09.png" class="img-fluid rounded mb-2" alt="">
                    <h6>Twitter</h6>
                </div>
                <div class="text-center me-3 mb-3">
                    <img src="../assets/images/icon/10.png" class="img-fluid rounded mb-2" alt="">
                    <h6>Instagram</h6>
                </div>
                <div class="text-center me-3 mb-3">
                    <img src="../assets/images/icon/11.png" class="img-fluid rounded mb-2" alt="">
                    <h6>Google Plus</h6>
                </div>
                <div class="text-center me-3 mb-3">
                    <img src="../assets/images/icon/13.png" class="img-fluid rounded mb-2" alt="">
                    <h6>In</h6>
                </div>
                <div class="text-center me-3 mb-3">
                    <img src="../assets/images/icon/12.png" class="img-fluid rounded mb-2" alt="">
                    <h6>YouTube</h6>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
