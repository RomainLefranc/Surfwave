$(document).ready(function () {
    $('#btn-connexion').click(function (e) {
        e.preventDefault();
        $('#section-connexion').toggle("fold", 1000);
    });
});
$('#section-connexion').hide();

