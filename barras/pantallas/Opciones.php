<!-- Modal elimina registro -->
<?php
session_start();
?>
<div class="modal fade"  id="modaltable" aria-labelledby="modaltableLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modaltableLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el registro?
            </div>

            <div class="modal-footer">
                <form action="../sets/eliminar.php" method="POST">

                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" name="borrar" id="borrar" value="Borrar" class="btn btn-danger">
                </form>
            </div>

        </div>
    </div>
</div>
