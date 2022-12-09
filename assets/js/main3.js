$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $( "#gare_depart" ).blur(function() {
        let gare_depart = $(this).val();
        $('#gare_arrivee_roteur').val(gare_depart);
    });

    $( "#gare_arrivee" ).blur(function() {
        let gare_arrivee = $(this).val();
        $('#gare_depart_roteur').val(gare_arrivee);
    });

});


function edit(i){
    let unique=document.getElementById(i).children[0].getAttribute('data');
    let id = document.getElementById(i).children[0].innerHTML;
    let status = document.getElementById(i).children[1].getAttribute('data');
    let duree = document.getElementById(i).children[2].innerHTML;
    let gare_depart = document.getElementById(i).children[3].innerHTML;
    let id_gare_depart = document.getElementById(i).children[3].getAttribute('data');
    let gare_arrivee = document.getElementById(i).children[4].innerHTML;
    let id_gare_arrivee = document.getElementById(i).children[4].getAttribute('data');
    let prix = document.getElementById(i).children[5].innerHTML;
    let id_train = document.getElementById(i).children[6].getAttribute('data');
    let date = document.getElementById(i).children[7].innerHTML;
    
    document.querySelector("#md_id").value = id;
    document.querySelector("#md_status").value=status;
    document.querySelector("#md_duree").value = duree;
    document.querySelector("#md_gare_depart").value=gare_depart;
    document.querySelector("#md_gare_arrivee").value=gare_arrivee;
    document.querySelector("#md_prix").value=prix;
    document.querySelector("#md_id_train").value=id_train;
    document.querySelector("#md_datetime").value=date;
    document.querySelector("#md_unique_id").value = unique;

    document.querySelector("#id_md_gare_depart").value=id_gare_depart;
    document.querySelector("#id_md_gare_arrivee").value=id_gare_arrivee;

}

// var departtt = document.querySelector("#gare_arrivee").value;
// var arriveettt = document.querySelector("#gare_arrivee").value;


// console.log(departtt,arriveettt);

// document.querySelector("#gare_depart_roteur").value= depart;
// document.querySelector("#gare_arrivee_roteur").value= arrivee;