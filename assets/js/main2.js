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
  handleSuggestion({ inputFiled: "#gare_depart", resltOnNode: "#cities_rst1", treattedIn: "./include/handlers/voyagehandler.php",whatToGet:"gares" });
  handleSuggestion({ inputFiled: "#gare_distination", resltOnNode: "#cities_rst2", treattedIn: "./include/handlers/voyagehandler.php",whatToGet:"gares" });
  handleSuggestion({ inputFiled: "#gare_depart_reseach", resltOnNode: "#cities_rst1", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares" });
  handleSuggestion({ inputFiled: "#gare_distination_reseach", resltOnNode: "#cities_rst2", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares" });
  /*train*/
  handleSuggestion({ inputFiled: "#id_gare", resltOnNode: "#cities_rst2", treattedIn: "../handlers/voyagehandler.php",whatToGet:"gares" });
  // gare
  handleSuggestion({ inputFiled: "#ville", resltOnNode: "#gareres", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"villes" });
  handleSuggestion({ inputFiled: "#gare_ville", resltOnNode: "#md_gareres", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"villes" });
  //$("#ville").click(function () { alert("i am here") })





  /* voyage */
  handleSuggestion({inputFiled: "#gare_depart", resltOnNode: "#res", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares"});
  handleSuggestion({inputFiled: "#gare_arrivee", resltOnNode: "#res2", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares"});
});

function handleSuggestion({ inputFiled: input, resltOnNode: node, treattedIn: phpfile,whatToGet:villeOrGare }) {
  $(input).keyup(
    function () {
      var ville = $(this).val();
      console.log(ville)
      $.post(
        phpfile,
        {
          suggestions: ville,
          whatToGet:villeOrGare
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
  let ville_id = ele.getAttribute("ville_id");
  ele.parentElement.parentElement.children[1].value = ville;
  ele.parentElement.parentElement.children[3].setAttribute("value", ville_id);
  ele.parentElement.innerHTML = "";
}


function bookTicket({id:id_voyage,from:ville_depart,to:vill_dis,date:date,prix:price}){
  console.log({id:id_voyage,from:ville_depart,to:vill_dis,date:date,prix:price});
  let count = parseInt($("#order_counter").next().attr("counter"));
  $("#order_counter").text(count+1);
  $("#order_counter").next().attr("counter",count+1)
  //$.get("../include/handlers/voyageHandler.php",{getOrderCount:true,function(data,status){}})

  console.log();
}