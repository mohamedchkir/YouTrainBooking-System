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
  //$("#train_msg_alert").hide();
  handleSuggestion({ inputFiled: "#gare_depart", resltOnNode: "#cities_rst1", treattedIn: "./include/handlers/voyagehandler.php",whatToGet:"gares" });
  handleSuggestion({ inputFiled: "#gare_distination", resltOnNode: "#cities_rst2", treattedIn: "./include/handlers/voyagehandler.php",whatToGet:"gares" });
  handleSuggestion({ inputFiled: "#gare_depart_reseach", resltOnNode: "#cities_rst1", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares" });
  handleSuggestion({ inputFiled: "#gare_distination_reseach", resltOnNode: "#cities_rst2", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares" });
  /*train*/
  handleSuggestion({ inputFiled: "#id_gare", resltOnNode: "#cities_rst2", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares" });
  // gare
  handleSuggestion({ inputFiled: "#ville", resltOnNode: "#gareres", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"villes" });
  handleSuggestion({ inputFiled: "#gare_ville", resltOnNode: "#md_gareres", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"villes" });
  //$("#ville").click(function () { alert("i am here") })





  /* voyage */
  handleSuggestion({inputFiled: "#gare_depart", resltOnNode: "#res", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares"});
  handleSuggestion({inputFiled: "#gare_arrivee", resltOnNode: "#res2", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares"});
  /* update modal voyage */
  handleSuggestion({inputFiled: "#md_gare_depart", resltOnNode: "#md_res", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares"});
  handleSuggestion({inputFiled: "#md_gare_arrivee", resltOnNode: "#md_res2", treattedIn: "../include/handlers/voyagehandler.php",whatToGet:"gares"});
  var contents;
  $('.changeable').click(function (){
    contents=$(this).html();
  });
  $('.changeable').blur(function(e) {
    if (contents!=$(this).html()){
      let id_table=$(this).attr("id").split("_");
      let column_name=id_table[0];
      let id_element =id_table[1];
      let data = $(this).text();
      //console.log(data)
      updateDB(column_name,data,id_element);
      contents = $(this).html();
    }
  });
  $("#cartBtn").click(function () {
    //$("#cart").show("slow")
    $("#cart").animate({
      width: 'toggle'
    });
  });
  $("#goTocart").click(function () {
    //$("#cart").show("slow")
    $("#cart").animate({
      width: 'toggle'
    });
  });
  $("#closeCartBtn").click(function () {
    $("#cart").hide();
  })

  /*
      checkout
                  */


});





function handleSuggestion({ inputFiled: input, resltOnNode: node, treattedIn: phpfile,whatToGet:villeOrGare }) {
  $(input).keyup(
    function () {
      var ville = $(this).val();
      //console.log(ville)
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
  //console.log({id:id_voyage,from:ville_depart,to:vill_dis,date:date,prix:price});
  let count = parseInt($("#order_counter").next().attr("counter"));
  $("#order_counter").text(count);
  //$("#order_counter").next().attr("counter",count)
  $.post("../include/handlers/ordersHandler.php",
      {
        addTripToCart:true,
        id:id_voyage,
        gare_depart:ville_depart,
        gare_arrive:vill_dis,
        date_voyage:date,
        prix_ticket:price
      },
        function(data,status){
            let orders = JSON.parse(data);
            loadOrderData(orders);
        })

  //console.log();
}

function updateDB(column,data,id){
  $.post("../include/handlers/trainHandler.php",{
    column : column,
    data:data,
    id:id
  },function (data,status){
    //alert(data)
    $("#train_msg_alert").show();
    $("#msg-label").text(data);
  });
}
function deleteTran(id){
  $.post("../include/handlers/trainHandler.php",{
    deleteTranById:id
  },function (data,status){
    $("#train_msg_alert").show();
    $("#msg-label").text(data);
    setTimeout(function (){
      window.location.reload()
    },2000)
  })
}


function isGareExist(gare_entred,filename) {
  return new Promise(function(resolve, reject) {
    $.post(filename, {
      getGares: true
    }, function (data, status) {
      let found = false;
      let gares = JSON.parse(data)
      gares.forEach(elem => {
        if (parseInt(elem.id) == parseInt(gare_entred)) found = true;
      })
      resolve(found)
    })
  })
}

function removeReserved(id){
  $.post("../include/handlers/ordersHandler.php",
      {
        deleteOrderByIndex:id
      },
      function (data,status){
        alert('deleted successfuly')
        loadOrderData(JSON.parse(data))

      })
}



function loadOrderData(ordersList){
  let output="";
  let i =0 ;
  //console.log(ordersList)
  let total =0;
  if (ordersList.length>0){
  ordersList.forEach((order)=>{
    total+=parseFloat(order['prix_ticket'])*order['quantity'];
    console.log('order at 0 : '+order['quantity']);
    console.log(ordersList)
    output+=`
                <div class='bg-light rounded-3 mb-1 w-100'>
                <div class='d-flex justify-content-between  flex-grow-1 p-3 align-items-center'>
                   <div style="background: url('../assets/img/reserved-bg.jpg');background-size:cover;background-position:center;width: 100px;height: 100px"></div>
                    <div>
                        <p>De :  ${order['gare_depart']}</p>
                        <p>vers : ${order['gare_arrive']}</p>
                    </div>
                    <div>
                    <h6 style='color:orange;font-weight: bold'>${order['quantity']} place(s)</h6>
                    <h5 class='text-center'>${parseFloat(order['prix_ticket'])*order['quantity']} Dh</h5>
                    </div>
                    <div>
                        <i class='bi bi-x-lg text-danger btn btn-rounded' role='button' onclick="removeReserved('${i}')"></i>
                    </div>
                </div>
            </div>
                `;
  })
  document.getElementById("lis_orders_div").innerHTML=output+`<div class='mt-auto p-2 w-100'>
                      <button class='btn btn-light w-100' onclick='processCheckingOut()'>check out</button>
                      <h6 class='text-light mt-1'> <i class='bi bi-check-circle-fill me-2'></i>Total à payer : <b>${total} DH</b></h6>
                      <h6 class='text-light mt-1'> <i class='bi bi-check-circle-fill me-2'></i>Tout ticket de type FLEX sont changeable</h6>
                      </div>`;
  }else{
    document.getElementById("lis_orders_div").innerHTML=`
      <div class='h-100 w-100'>
          <div class='h-50' style=\"background-image: url('../assets/img/empty_cart.png');background-position: center;background-size: cover;background-repeat: no-repeat\"></div>
      </div>
      
    `;
  }
}


function processCheckingOut(){
    //login first
  Swal.fire({
    title: 'Vous comfirmez votre achat ?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonColor: '#59aeff',
    denyButtonColor: '#a3a3a3',
    confirmButtonText: 'Oui',
    denyButtonText: `Annuler`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $.post("../include/handlers/ordersHandler.php",{
        processCheckingOut:true
      },function (data,status){
        //console.log(JSON.parse(data))
        if(data==1){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: '<h3>voyages réservé avec success :)</h3><br> <small>You receivez par la suite vos tickets par mail</small>'
          })
          loadOrderData([]);
        }
        //setTimeout(()=>getEmail(),3500)
        //console.log(getEmail());

      })
    } else if (result.isDenied) {
      Swal.fire({title:'checkout n est pas validé',type: 'info'})
    }
  })

}

async function getEmail(){
  const { value: email } = await Swal.fire({
    title: 'Confirmez votre email afin de recevoir votre ticket par boite mail',
    input: 'email',
    inputLabel: 'Your email address',
    inputPlaceholder: 'votre email personel',
    confirmButtonText: 'verifier',
    showCancelButton: true

  }).then((result) => {
    if (!result.isConfirmed) {
      return false;
    }
  })
  $.get("../include/handlers/ordersHandler.php",{verifyCustomerEmail:email},
      function (data,status){
        if (data==1){
          Swal.fire(
              'Bien verifié !',
              'You avez bien reçu votre ticket(s) par mail',
              'success'
          )
        }else{
          getEmail();
        }
      })
  return true;
}