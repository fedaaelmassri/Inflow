var DropzoneDemo = function() {
    Dropzone.autoDiscover = false;

    var e = function() {
        Dropzone.options.mDropzoneOne = {
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 5,
            accept: function(e, o) {
                "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o()
            },
            success: function(file, response) {

                $('[name=higforce_header_image]').val(response);
                alert(response);
            },
        }, Dropzone.options.mDropzoneTwo = {
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            accept: function(e, o) { "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o() }
        }, Dropzone.options.mDropzoneThree = {
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            acceptedFiles: "image/*,application/pdf,.psd",
            accept: function(e, o) { "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o() }
        }
    };
    return { init: function() { e() } }
}();
DropzoneDemo.init();
