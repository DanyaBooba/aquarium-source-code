<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <main class="container">
        <div class="mb-4">
            <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px; ">
            </div>
        </div>
        <div class="mb-4">
            <div id="upload-demo" style="width:350px"></div>
        </div>
        <div class="mb-4">
            <input type="file" id="upload">
            <button class="btn btn-success upload-result">Upload Image</button>
        </div>
    </main>

    <script src="{{ asset('js/jquery.croppie.js') }}"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $uploadCrop = $('#upload-demo').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle'
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            })

            $(document).on('change', '#upload', function() {
                const reader = new FileReader()
                reader.onload = function(e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function() {
                        console.log('jQuery bind complete')
                    });
                }
                reader.readAsDataURL(this.files[0])
            })

            $(document).on('click', '.upload-result', function(ev) {
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(resp) {
                    $.ajax({
                        url: "/user/settings/test/2",
                        type: "POST",
                        data: {
                            "image": resp
                        },
                        success: function(data) {
                            $("#upload-demo-i").html(`<img src="${resp}" />`)
                            console.log(data)
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
