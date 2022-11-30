function makeaMargin(e) {
  const ariaExpanded = e.getAttribute("aria-expanded");
  if (ariaExpanded == "true") {
    document.getElementById("login").classList.add("mb-3");
    document.getElementById("sign_up").classList.remove("px-3");
  } else {
    document.getElementById("login").classList.remove("mb-3");
    document.getElementById("sign_up").classList.add("px-3");
  }
}
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// JQUERY STARTS HERE

$(document).ready(function () {
  $("gare_depart").keyup(function () {
    var ville = $(this).val();
    $.post(
      "./include/handlers/voyagehandler.php",
      {
        suggestions: ville,
      },
      function (data, status) {}
    );
  });
});
