<div class="modal modal-qrcode fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="qr-code-generator">

                </div>
                <button type="button" class="btn btn-secondary" onClick="buttonCopyURL('{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}')">
                    Скопировать
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/user/qrcode.min.js') }}"></script>
<script type="text/javascript">
    // new QRCode(document.getElementById("qr-code-generator"), "{{ $nickname ? route('user.show.nickname', $nickname) : route('user.show.id', $id) }}");

    new QRCode(document.getElementById("qr-code-generator"), {
            text: "https://example.com",
            width: 1024,
            height: 1024,
            colorDark: "#575FCF",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.Q,
        });

</script>
