<h1>create some common note categories?</h1>





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo form_open("quicknote/addInitNoteCate") ?>
        <div class="form-check">
          <label for="name">quicknote</label>
          <input class="form-check-input" type="checkbox" name="notecate[]" value="quicknote" checked>
        </div>
        <div class="form-check">
          <label for="name">todo</label>
          <input class="form-check-input" type="checkbox" name="notecate[]" value="todo" checked>
        </div>
        <div class="form-check">
          <label for="name">recipe</label>
          <input class="form-check-input" type="checkbox" name="notecate[]" value="recipe" checked>
        </div>
        <div class="form-check">
          <label for="name">blog</label>
          <input class="form-check-input" type="checkbox" name="notecate[]" value="blog" checked>
        </div>
        <div class="form-check">
          <label for="name">playlist</label>
          <input class="form-check-input" type="checkbox" name="notecate[]" value="playlist" checked>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        <input class="btn btn-primary" value="Create" type="submit">
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('#myModal').modal("show");
  })
</script>