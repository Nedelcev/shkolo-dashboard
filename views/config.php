<?php
// Load the button configuration if it exists
$button = $data['button'];
$position = $data['position'];
$title = $button['title'] ?? '';
$link = $button['link'] ?? '';
$color = $button['color'] ?? '#ff0000'; // Default color is red
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configure Button</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div class="container mt-5">
		<h1 class="text-center mb-4">Configure Button (Position <?php echo $position; ?>)</h1>

		<form action="/ButtonController/save" method="POST" class="row g-3">
			<input type="hidden" name="position" value="<?php echo $position; ?>">

			<!-- Title Input -->
			<div class="col-md-6">
				<label for="title" class="form-label">Button Title</label>
				<input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
			</div>

			<!-- Link Input -->
			<div class="col-md-6">
				<label for="link" class="form-label">Button Link</label>
				<input type="url" class="form-control" id="link" name="link" value="<?php echo $link; ?>" required>
			</div>

			<!-- Color Picker -->
			<div class="col-md-6">
				<label for="color" class="form-label">Button Color</label>
				<input type="color" class="form-control form-control-color" id="color" name="color" value="<?php echo $color; ?>">
			</div>

			<!-- Preview -->
			<div class="col-md-6 d-flex align-items-center">
				<label class="form-label me-3">Preview:</label>
				<button type="button" class="btn btn-lg" style="background-color: <?php echo $color; ?>; color: #fff;">
					<?php echo $title ? $title : 'Preview'; ?>
				</button>
			</div>

			<!-- Submit Button -->
			<div class="col-12 text-center mt-3">
				<button type="submit" class="btn btn-primary btn-lg">Save Button</button>
				<a href="/" class="btn btn-secondary btn-lg">Cancel</a>
			</div>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
	<!-- Real time preview -->
	<script>
		document.getElementById('title').addEventListener('input', function() {
			document.querySelector('.btn-lg').textContent = this.value || 'Preview';
		});

		document.getElementById('color').addEventListener('input', function() {
			document.querySelector('.btn-lg').style.backgroundColor = this.value;
		});
	</script>

</body>
</html>
