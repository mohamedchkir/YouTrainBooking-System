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
  handleSuggestion({ inputFiled: "#gare_depart", resltOnNode: "#cities_rst1" });
  handleSuggestion({
    inputFiled: "#gare_distination",
    resltOnNode: "#cities_rst2",
  });
});

function handleSuggestion({ inputFiled: input, resltOnNode: node }) {
  $(input).keyup(
    function () {
      var ville = $(this).val();
      // if (ville == "" || ville == null) {
      //   $(node).html("no suggesttions");
      // } else {
      $.post(
        "./include/handlers/voyagehandler.php",
        {
          suggestions: ville,
        },
        function (data, status) {
          if (data == "") {
            $(node).html("no suggesttions");
          } else {
            $(node).html(data);
          }
        }
      );
    }
    //}
  );
  $(input).blur(function () {
    setTimeout(function () {
      $(node).html("");
    }, 15000);
  });
}

function putValue(ele) {
  let ville = ele.getAttribute("value");
  ele.parentElement.parentElement.children[1].value = ville;
  ele.parentElement.innerHTML = "";
}
