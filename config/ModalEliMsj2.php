<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteChildresn<?php echo $val['IdMsj']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ¿Realmente deseas eliminar a ?
            </h4>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important">     
    
            <?php echo $val['IdMsj'];?> 
          </strong>
        </div>          
            
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button  type="submit" class="btn btn-danger btnBorrar" onclick="onBorrar() data-dismiss="modal" name="borrar" value="borrar" id="<?php echo $val['IdMsj']; ?>">Borrar</button>
        
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->