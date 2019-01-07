<?php
    ini_set("auto_detect_line_endings", true);
    $url = "https://gist.githubusercontent.com/" . str_replace(' ', '%20', $_GET["snippet"]);
    $data = file_get_contents($url);
    $type = getLangShort(end(explode(".", $url)));
    function getLangShort($short) {
      switch ($short) {
        case 'cs':
            return 'csharp';
          break;
        case 'py':
            return 'python';
          break;
        case 'js':
            return 'javascript';
          break;
        case 'ts':
            return 'typescript';
          break;
        case 'sh':
            return 'bash';
          break;
        default:
            return $short;
          break;
      }
    }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <pre><code class="language-<?php echo $type; ?>" id="code"><?php echo $data; ?></code></pre>
  <script src="prism.js"></script>
  <script>
    Prism.highlightAll();
  </script>

</body>

</html>