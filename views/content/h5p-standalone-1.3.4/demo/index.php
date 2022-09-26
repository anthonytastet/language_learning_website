<html>
<head>
  <link type="text/css" rel="stylesheet" media="all" href="../dist/styles/h5p.css" />
  <!-- <link type="text/css" rel="stylesheet" media="all" href="../src/css/h5p.css" /> -->
  <meta charset="utf-8" />
  <script type="text/javascript" src="../dist/js/h5p-standalone-main.min.js"></script>

  <script type="text/javascript">
    (function($) {
      $(function() {
        $('.h5p-container').h5p({
          frameJs: '../dist/js/h5p-standalone-frame.min.js',
          frameCss: '../dist/styles/h5p.css',
          h5pContent: '../workspace/<?= $_GET["post_content"] ?>'
        });
      });
    })(H5P.jQuery);
  </script>
</head>
  <body>
    <div class="h5p-container"></div>
  </body>
</html>
