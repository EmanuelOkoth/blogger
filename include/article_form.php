<head>
	<script src="ckeditor/build/ckeditor.js"></script>
</head>

<div class="container">
	<!-- sucess and error messages -->
	<?php
	if(isset($success_message)){
		echo '<div class="success_message">'.$success_message.'</div>'; 
	}
	if(isset($error_message)){
		echo '<div class="error_message">'.$error_message.'</div>'; 
	}
	?>

	<!-- FORM STARTS HERE --> 
	<form role="form" method="POST" enctype="multipart/form-data">
		<div class="form__group">
			<label for="title">Title</label>
			<input type="text" id="title" class="title" name="title" value="<?php echo $title; ?>" placeholder="Article Title Here..." >
		</div>

		<div class="form__group">
			<label for="body">Body</label>
			<textarea class="body" rows="8" id="body" name="body"><?php echo $body; ?></textarea>
			<script type="text/javascript">
				ClassicEditor.create( document.querySelector( '#body' ))
			</script>
		</div>

		<div class="form__group">
			<label for="tag">Tag</label>
			<input type="text" id="tag" class="tag" name="tag" value="<?php echo $tag; ?>" placeholder="Article Tag Here..." >
		</div>

		<div class="form__group">
			<label for="thumbnail">Thumbnail</label>
			<input type="file" id="thumbnail" class="thumbnail" name="thumbnail">
		</div>

		<div class="form__group">
			<button type="submit" class="btn btn--main" name="submit">
				Publish 
			</button>
		</div>
	</form>

	<!-- FORM ENDS HERE -->

</div>