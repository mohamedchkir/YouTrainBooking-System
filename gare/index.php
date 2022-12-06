<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

    <title>YouTrain™</title>
</head>

<body>
    <div class="container mt-5">

        <div class="row mb-5">
            <div class="col-lg-6 text-start" style="position: relative;">
                <label for="" class="form-label ms-2">NOM DU GARE</label>
                <input class="form-control" type="text" name="gare_depart" id="gare_name" placeholder="Entrer le nom du Gare" autocomplete="off" required>
            </div>
            <div class="col-lg-6 text-start" style="position: relative;">
                <label for="" class="form-label ms-2">VILLE</label>
                <input class="form-control " type="text" name="gare_ville" id="gare_ville" autocomplete="off" placeholder="Entrer le nom du Ville">
            </div>

        </div>


        <section>
            <div>

            </div>
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>GareName</th>
                        <th>CityName</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>GareName</th>
                        <th>CityName</th>
                    </tr>
                </tfoot>
            </table>
    </div>
    </section>


</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/main1.js"></script>

</html>