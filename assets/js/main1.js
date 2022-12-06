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