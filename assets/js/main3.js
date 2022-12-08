$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});


function edit(i){
    let unique=document.getElementById(i).children[0].getAttribute('data');;
    let id = document.getElementById(i).children[0].innerHTML;
    let status = document.getElementById(i).children[1].innerHTML;
    let duree = document.getElementById(i).children[2].innerHTML;
    let gare_depart = document.getElementById(i).children[3].innerHTML;
    let gare_arrivee = document.getElementById(i).children[4].innerHTML;
    let prix = document.getElementById(i).children[5].innerHTML;
    let id_train = document.getElementById(i).children[6].innerHTML;
    let date = document.getElementById(i).children[7].innerHTML;
    console.log(id)

    document.querySelector("#md_id_tr").value = id;
    document.querySelector("#md_status").value=status;
    document.querySelector("#md_duree").value = duree;
    document.querySelector("#md_gare_depart").value=gare_depart;
    document.querySelector("#md_gare_arrivee").value=gare_arrivee;
    document.querySelector("#md_prix").value=prix;
    document.querySelector("#md_id_train").value=id_train;
    document.querySelector("#md_datetime").value=date;
    document.querySelector("#md_unique_id").value = unique;

}