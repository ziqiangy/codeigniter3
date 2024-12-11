<style>
	.box-father {
		display: flex;
		justify-content: center;
	}

	.box-child {
		width: 400px;
		border: 3px solid black;
		background-color: #fff7d1;
		border-radius: 10px;
		padding: 15px;

	}

	.h-title {
		text-align: center;
	}

	.text-father {
		display: flex;
		justify-content: center;
	}

	.xrequired:before {
		content: '*';
		color: red;
	}
</style>


<div class="box-father">
	<div class="box-child">
		<div class="h-title">
			<h3>Insert a Quick Note</h3>
		</div>

		<div class="text-father">
			<div class="text-child">


				<?php echo form_open("Quicknote/insert") ?>
				<div class="form-group">
					<label for="note-content" class="xrequired">Quick Note</label>
					<textarea class="form-control" id="note-content" name="content" rows="10" cols="35"></textarea>

				</div>

				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" role="switch" id="checkCategory">
					<label class="form-check-label" for="checkCategory">Open Note Detail?</label>
				</div>
				<script>
					$(function() {
						$("#checkCategory").click(function() {
							if ($(this).prop("checked")) {
								$("#noteCategory").show();
								// alert("hi");
							} else {
								$("#noteCategory").hide();
							}
						})
					})
				</script>
				<div id="noteCategory" style="display:none;">
					<label for="cate_name">Note Category</label>
					<div class="row">
						<div class="col-9">

							<select name="cate_id" class="form-select" id="cate_name">
								<option value="0" selected>No</option>
								<?php foreach($data as $row): ?>
								<option
									value="<?php echo $row['id'] ?>">
									<?php echo $row['name'] ?>
								</option>
								<?php endforeach ?>
							</select>

						</div>
						<div class="col-3">
							<?php echo anchor("quicknote/addnotecate", "Add", array("class" => "btn btn-primary")); ?>

						</div>
					</div>
					<div class="form-group"><label for="title">Note Title</label>
						<input type="text" name="title" class="form-control" id="title">
					</div>
				</div>



				<script>
					$(function() {
						$("#checkBlog").click(function() {
							if ($(this).prop("checked")) {
								$("#blog-note").show();
							} else {
								$("#blog-note").hide();
							}
						})
					})
				</script>



				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" role="switch" id="checkBlog">
					<label class="form-check-label" for="checkBlog">Open Blogged Note?</label>
				</div>
				<div id="blog-note" style="display:none;">
					<div class="form-group"><label for="archive_date">Archive_date</label>
						<input type="date" name="archive_date" class="form-control" id="archive_date">
					</div>
				</div>

				<script>
					$(function() {
						$("#checkTask").click(function() {
							if ($(this).prop("checked")) {
								$('#task-note').show();
							} else {
								$('#task-note').hide();
							}
						})
					})
				</script>


				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" role="switch" id="checkTask">
					<label class="form-check-label" for="checkTask">Open Tasked Note?</label>
				</div>


				<div id="task-note" style="display:none">
					<div class="form-group"><label for="due_date">Due Date</label>
						<input type="date" name="due_date" class="form-control" id="due_date">
					</div>
					<label>Is this important?</label>
					<div class="form-check">

						<input type="radio" value="1" id="is_important" class="form-check-input" name="is_important">
						<label for="is_important" class="form-check-label">is important</label>
					</div>
					<div class="form-check">
						<input type="radio" value="0" id="is_not_important" class="form-check-input"
							name="is_important">
						<label for="is_not_important" class="form-check-label">is not important</label>
					</div>
				</div>







				<input class="btn btn-primary mt-2" type="submit" value="submit">
				</form>



			</div>
		</div>
	</div>
</div>