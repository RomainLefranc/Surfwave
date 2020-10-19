$(document).ready(function () {
    $('#btn-connexion').click(function (e) {
        e.preventDefault();
        $('#section-connexion').toggle("fold", 1000);
    });
    $('.qdp').click(function (event) {
        surnom = $(event.target).attr('alt');
        var url = `http://localhost/Mission8/index.php?action=API&equipier=${surnom}`
        $.get(url, function (data) {
            question = ''
            data.resultat.qdp.forEach(qdp => {
                question += 
                `<div class="form-group">
                    <label>${qdp.libQuest}</label>
                    <input type="text" class="form-control" value="${qdp.reponse}" disabled>
                </div>`
            });
            var modal = 
            `<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Questionnaire de Proust</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form>
                            ${question}
                        </form>
                        </div>
                    </div>
                </div>
            </div>`
            $("#histoire").append(modal);
            $('#exampleModalCenter').modal('show');
            $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
                $('#exampleModalCenter').remove();            
            })
        })
    })
});
$('#section-connexion').hide();





