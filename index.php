<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
	<link type="image/x-icon" rel="shortcut icon" href="favicon.ico">
    <title>Список файлов для скачивания</title>
</head>
<body>

	<style>
		.LinkWrapper {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}

		.Link {
			display: flex;
			justify-content: space-between;
			width: 700px;
			margin: 5px;
		}

		a {
			color: white;
			text-decoration: none;
		}

		a:hover {
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
		}

		a:active {
			color: black;
		}

		.FileName {
			width: 100%;
			padding: 5px 10px;
			background-color: cornflowerblue;
			border-top-left-radius: 5px;
			border-bottom-left-radius: 5px;
		}

		.FileSize {
			width: 100px;
			text-align: right;
			padding: 5px 10px; 
			background-color: rgb(255, 122, 98);
			border-top-right-radius: 5px;
			border-bottom-right-radius: 5px;
		}
	</style>

	<div class="LinkWrapper">

		<?php
			function filesize_format($filesize)
			{
				$formats = array(' Б',' Кб',' Мб',' Гб',' Тб');
				$format = 0;
				while ($filesize > 1024 && count($formats) != ++$format)
				{
					$filesize = round($filesize / 1024, 2);
				}
				$formats[] = ' Тб';
			return $filesize.$formats[$format];
			}


			define("DIR_ROOT", dirname(__FILE__)."/");
			define("DIR_FILES", DIR_ROOT."files/");

			$files = scandir(DIR_FILES);
			foreach ($files as $value) {
				if (($value == '.') || ($value == '..')) {
					continue;
				}

				$size = filesize_format(filesize(DIR_FILES . $value));
				$link = '/files/' . $value;

				echo "<a class='Link' href='{$link}'>";
				echo 	"<div class='FileName'>{$value}</div>";
				echo 	"<div class='FileSize'>{$size}</div>";
				echo "</a>";
			}
		?>

	</div>

</body>
</html>
