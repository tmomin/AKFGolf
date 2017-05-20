var wrapper = document.getElementById("signature-pad"),
    clearButton = wrapper.querySelector("[data-action=clear]"),
    saveButton = wrapper.querySelector("[data-action=save]"),
    canvas = wrapper.querySelector("canvas"),
    signaturePad;

// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
    // When zoomed out to less than 100%, for some very strange reason,
    // some browsers report devicePixelRatio as less than 1
    // and only part of the canvas is cleared then.
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
}

window.onresize = resizeCanvas;
resizeCanvas();

signaturePad = new SignaturePad(canvas);

clearButton.addEventListener("click", function (event) {
    signaturePad.clear();
});

saveButton.addEventListener("click", function (event) {
    if (signaturePad.isEmpty()) {
        alert("Please provide signature first now.");
    } else {
        //window.open(signaturePad.toDataURL());
        console.log('else');
        $.ajax({
            url : '/players/signature',
            type: 'GET',
            data : {
                signature: signaturePad.toDataURL('image/png'),
                //position: $('#position').val()
                firstName: $('#firstName').val(),
                lastName: $('#lastName').val(),
                id: $('#id').val()
            },
            success: function(response)
            {
                //sweetAlert("Success!", "Good stuff! Your signature is now saved", "success");
                setTimeout(function () {
                    location.reload();
                }, 3000);
                //data - response from server
            },
            error: function(response)
            {
                //sweetAlert("Oops...", "Sorry, something went wrong! We will investigate as soon as possible.", "error");
                console.log(response);
            }
        });
    }
});