$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $uploadCrop = $('#upload-demo').croppie({
        // enableExif: true,
        // enforceBoundary: false,
        // mouseWheelZoom: false,
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

            });
        }
        reader.readAsDataURL(this.files[0])
    })

    $(document).on('click', '.upload-result', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(resp) {
            $.ajax({
                url: "/user/settings/appearance/loadfile",
                type: "POST",
                data: {
                    "image": resp
                },
                success: function (data) {
                    window.open('/user/settings', '_self')
                }
            });
        });
    });
});
