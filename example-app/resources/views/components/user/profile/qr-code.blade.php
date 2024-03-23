<div class="modal show modal-qrcode fade" style="display: block; padding-left: 0px;" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @if($nickname)
                <h4>
                    {{ $nickname }}
                </h4>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="qr-code-generator" class="qr-code-generator"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onClick="buttonCopyURL('{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}')">
                    Скопировать
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/user/qrcode.min.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
<script>
    const qrCode = new QRCodeStyling({
        width: 300,
        height: 300,
        type: "svg",
        data: "https://dev.to/luckynkosi/",
        image: "https://d2fltix0v2e0sb.cloudfront.net/dev-rainbow.svg",
        dotsOptions: {
            color: "#4267b2",
            type: "rounded"
        },
        backgroundOptions: {
            color: "#e9ebee",
        },
        imageOptions: {
            crossOrigin: "anonymous",
            margin: 20
        }
    });

    qrCode.append(document.getElementById("qr-code-generator"));

    // qrCode.download({ name: "qr", extension: "svg" });
</script>
{{-- <script type="text/javascript">
    new QRCode(document.getElementById("qr-code-generator"), {
            text: "{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}",
            width: 1024,
            height: 1024,
            colorDark: "#323791",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.Q,
        });
</script> --}}
