// Form Validation

$(document).ready(() => {
  $("#signupForm").validate({
    rules: {
      businessname: "required",
      phonenumber: "required",
      username: {
        required: true,
        minlength: 2,
      },
      password: {
        required: true,
        minlength: 8,
      },
        password_confirmation: {
        required: true,
        minlength: 8,
        equalTo: "#password",
      },
      email: {
        required: true,
        email: true,
      },
      agree: "required",
    },
    messages: {
      businessname: "Please enter your business name",
      phonenumber: "Please enter your phone number",
      username: {
        required: "Please enter a username",
        minlength: "Your username must consist of at least 2 characters",
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
      },
        password_confirmation: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
        equalTo: "Please enter the same password as above",
      },
      email: "Please enter a valid email address",
      agree: "Please accept our policy",
    },
    errorElement: "em",
    errorPlacement: function (error, element) {
      // Add the `invalid-feedback` class to the error element
      error.addClass("invalid-feedback");
      if (element.prop("type") === "checkbox") {
        error.insertAfter(element.next("label"));
      } else {
        error.insertAfter(element);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass("is-valid").removeClass("is-invalid");
    },
  });
});
