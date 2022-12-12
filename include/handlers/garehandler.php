<?php


include_once("../autoloader.php");

session_start();
if (isset($_POST["saveGare"])) saveGare();
if (isset($_POST["editGare"])) editGare();
if (isset($_POST["deleteGare"])) deleteVoyage();
if(isset($_POST['getGares'])) getGares();

//Add gare function 

function saveGare()
{
    $gareName = $_POST['gare_name'];
    $ville = $_POST['ville'];
    $gare = new GareController();
    $gare->ajouterGare(new gare($gareName, $ville));

    echo "<script>
    window.location.replace('../../gare/index.php')
</script>";
}

//Edit gare function 
function editGare()
{
    $gareName = $_POST['gare_name'];
    $ville = $_POST['gare_ville'];
    $id = $_POST['id_gare'];

    $gare = new GareController();

    $gare->editGare(new Gare($gareName, $ville), $id);
    echo "<script>window.location.replace('../../gare/index.php')</script>";
}

//Delete gare function 
function deleteVoyage()
{
    if (isset($_POST['id_gare'])) {
        $id = $_POST['id_gare'];

        $gare = new GareController();

        $gare->supprimerGare($id);
        echo "<script>window.location.replace('../../gare/index.php')</script>";
    }
}

function getGares(){
    $gareCntr = new GareController();
    echo json_encode($gareCntr->getAllGare());
}