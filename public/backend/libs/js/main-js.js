jQuery(document).ready(function ($) {
    "use strict";

    // ==============================================================
    // Notification list
    // ==============================================================
    if ($(".notification-list").length) {
        $(".notification-list").slimScroll({
            height: "250px",
        });
    }

    // ==============================================================
    // Menu Slim Scroll List
    // ==============================================================

    if ($(".menu-list").length) {
        $(".menu-list").slimScroll({});
    }

    // ==============================================================
    // Sidebar scrollnavigation
    // ==============================================================

    if ($(".sidebar-nav-fixed a").length) {
        $(".sidebar-nav-fixed a")
            // Remove links that don't actually link to anything

            .click(function (event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, "") ==
                        this.pathname.replace(/^\//, "") &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length
                        ? target
                        : $("[name=" + this.hash.slice(1) + "]");
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $("html, body").animate(
                            {
                                scrollTop: target.offset().top - 90,
                            },
                            1000,
                            function () {
                                // Callback after animation
                                // Must change focus!
                                var $target = $(target);
                                $target.focus();
                                if ($target.is(":focus")) {
                                    // Checking if the target was focused
                                    return false;
                                } else {
                                    $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
                                    $target.focus(); // Set focus again
                                }
                            }
                        );
                    }
                }
                $(".sidebar-nav-fixed a").each(function () {
                    $(this).removeClass("active");
                });
                $(this).addClass("active");
            });
    }

    // ==============================================================
    // tooltip
    // ==============================================================
    if ($('[data-toggle="tooltip"]').length) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // ==============================================================
    // popover
    // ==============================================================
    if ($('[data-toggle="popover"]').length) {
        $('[data-toggle="popover"]').popover();
    }
    // ==============================================================
    // Chat List Slim Scroll
    // ==============================================================

    if ($(".chat-list").length) {
        $(".chat-list").slimScroll({
            color: "false",
            width: "100%",
        });
    }
    // ==============================================================
    // dropzone script
    // ==============================================================

    //     if ($('.dz-clickable').length) {
    //            $(".dz-clickable").dropzone({ url: "/file/post" });
    // }
}); // AND OF JQUERY

// $(function() {
//     "use strict";

// var monkeyList = new List('test-list', {
//    valueNames: ['name']

// });
// var monkeyList = new List('test-list-2', {
//    valueNames: ['name']

// });

// });



$(function () {
    $(".editor").each(function () {
        let id = $(this).attr("id");
        CKEDITOR.replace(id, {
            filebrowserUploadUrl: CK_UPLOAD_IMG,
            filebrowserUploadMethod: "form",
        });
    });

    $(".delete-confirm").on("click", function () {
        return confirm("Bạn có chắc chắn muốn xoá. Không thể phục hồi!");
    });

    /* Image Input*/
    function renderPreview($parent, value) {
        $parent.find(".preview").remove();
        let $preview = $("<div />", { class: "preview" });
        let img = new Image();
        img.src = value;
        $preview.html(img);
        $parent.append($preview);
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            let $parent = $(input).closest(".form-group");
            $parent.find(".old-input").remove();
            reader.onload = function (e) {
                renderPreview($parent, e.target.result);
            };
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(".input-file").each(function () {
        let value = $(this).attr("value");
        let name = $(this).attr("name");
        let $parent = $(this).closest(".form-group");
        if (value) {
            renderPreview($parent, value);
            let $input = $("<input />", {
                class: "old-input",
                type: "hidden",
                name: `old_${name}`,
                value: value,
            });
            $parent.append($input);
            $(this).removeAttr("value");
        }
    });

    $(".input-file").change(function () {
        readURL(this);
    });
    /* Image Input*/
});




    // ==============================================================
    // Popup Preview Video
    // ==============================================================

// $(document).ready(function () {
    // Gets the video src from the data-src on each button

    var $videoSrc;
    $(".video-btn").click(function () {
        $videoSrc = $(this).data("src");
    });
    console.log($videoSrc);

    // when the modal is opened autoplay it
    $("#myModal").on("shown.bs.modal", function (e) {
        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr(
            "src",
            $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
        );
    });

    // stop playing the youtube video when I close the modal
    $("#myModal").on("hide.bs.modal", function (e) {
        // a poor man's stop video
        $("#video").attr("src", $videoSrc);
    });

    // document ready
// });



    // ==============================================================
    // Upload Image
    // ==============================================================

    // imgInp.onchange = (evt) => {
    //     const [file] = imgInp.files;
    //     if (file) {
    //         blah.src = URL.createObjectURL(file);
    //     }
    // };
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imagepreview1').prop('src', e.target.result).show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input1").change(function () {
        readURL(this);
        $('#imagepreview1').show();
    });

    $("#input1").click(function () {

        $('#imagepreview1').attr('src','');
    });


    $('#imagepreview1').click(function(){

        $('#input1').replaceWith($('#input1').clone(true));
        $('#imagepreview1').hide();

    });
    $('#cancel').click(function(e)
    {
        $('#input1').val("");
        $('#imagepreview1').attr("","");
    })

    // ==============================================================
    // Preview Upload Images
    // ==============================================================


    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
