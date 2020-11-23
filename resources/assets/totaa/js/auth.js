$("#login-register-form").validate({
    ignore: ".ignore, .select2-input",
    focusInvalid: true,
    errorPlacement: function errorPlacement(error, element) {
        var $parent = $(element).parents(".form-group");

        // Do not duplicate errors
        if ($parent.find(".jquery-validation-error").length) {
            return;
        }

        $parent.append(
            error.addClass(
                "jquery-validation-error small form-text invalid-feedback"
            )
        );
    },
    highlight: function(element) {
        var $el = $(element);
        var $parent = $el.parents(".form-group");

        $el.addClass("is-invalid");

        // Select2 and Tagsinput
        if (
            $el.hasClass("select2-hidden-accessible") ||
            $el.attr("data-role") === "tagsinput"
        ) {
            $el.parent().addClass("is-invalid");
        }
    },
    unhighlight: function(element) {
        $(element)
            .parents(".form-group")
            .find(".is-invalid")
            .removeClass("is-invalid");

        $(element)
            .parents(".input-group")
            .find(".is-invalid")
            .removeClass("is-invalid");
    }
});

$("#name").change(function() {
    $(this).valid();
});

$("#password").change(function() {
    $(this).valid();
});

$("#username").change(function() {
    $(this).valid();
});

$("#email").change(function() {
    $(this).valid();
});

$("#phone").change(function() {
    $(this).valid();
});

$("#password-confirm").change(function() {
    $(this).valid();
});
