$(document).ready(function () {
    $('.btn-danger').click(function (e) { 
        e.preventDefault();
        var href = $(this).attr('href');
        var modal = `
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Attention</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    Voulez vraiment supprimer ce tarif ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a class="btn btn-danger" href="${href}" role="button">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
        `;
        $(".container").append(modal);
        $('#exampleModalCenter').modal('show');
        $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
            $('#exampleModalCenter').remove();            
        })
    });
});