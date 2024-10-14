<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shkolo Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
	<div class="container mt-5">
		<h1 class="text-center mb-4">Shkolo Dashboard</h1>
		<div id="sortableGrid" class="grid-container">
			<?php
			$buttonData = [];
			while ($row = $data['buttons']->fetch_assoc()) {
				$buttonData[$row['position']] = $row;
			}

			// Display the buttons in a grid
			for ($i = 1; $i <= 9; $i++) {
				if (isset($buttonData[$i])) {
					$button = $buttonData[$i];
					echo "<div class='grid-item' data-position='{$button['position']}' data-id='{$button['id']}' style='background-color: {$button['color']}'>
							<a href='{$button['link']}'><button class='btn btn-light'>{$button['title']}</button></a>
							<div class='action-buttons'>
								<a href='/ButtonController/config/{$button['position']}' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i></a>
								<a href='/ButtonController/delete/{$button['position']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>
							</div>
						  </div>";
				} else {
					echo "<div class='grid-item' data-position='$i' style='background-color: #f1f1f1'>
							<a href='/ButtonController/config/$i'><button class='btn btn-secondary'>Set Button</button></a>
						  </div>";
				}
			}
			?>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
	<script src="/assets/js/dashboard.js"></script>
</body>
</html>
