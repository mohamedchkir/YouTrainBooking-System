
//SIDEBAR
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

// TABLEAU
$(document).ready(function () {
    $('#example').DataTable();
});


function editGare(i) {

    let id = document.getElementById(i).children[0].innerHTML;
    let gare = document.getElementById(i).children[1].innerHTML;
    let ville = document.getElementById(i).children[2].innerHTML;
    let id_ville = document.getElementById(i).children[2].getAttribute("ville");
    // console.log(id_ville);
    // console.log(id, gare, ville)
    document.querySelector("#id_gare").value = id;
    document.querySelector("#gare_name").value = gare;
    document.querySelector("#gare_ville").value = ville;
    document.querySelector("#id_ville").value = id_ville;


}


