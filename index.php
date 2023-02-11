<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $comment = $_POST['comment'];
  $captcha = $_POST['g-recaptcha-response'];
  if (!isset($captcha)) {
    echo '
Please check the the captcha form.
';
    exit;
  }
  $secretKey = "6LeHSV4kAAAAAOy-RB_uEbF46Z0Don2ngpa4-tbr";
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  $response = file_get_contents($url);
  $responseKeys = json_decode($response, true);
  if ($responseKeys["success"]) {
    echo '
Thanks for posting comment
';
  } else {
    echo '
You are spammer ! Get the @$%K out
';
  }
}
?>
<html>

<head>
  <title>reCAPTCHA demo: Simple page</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>
  <h1>Google reCAPTHA Demo</h1>
  <form id="comment_form" action="" method="post">
    <input type="" name="email" placeholder="Type your email" size="40"><br><br>
    <div style="width:30em;height:20em;margin-bottom:4em;">
      <input type="hidden" name="comment" value="">
      <div id="editor" style="height: 100%;"></div>
    </div>
    <input type="submit" name="submit" value="Post comment"><br><br>
    <div class="g-recaptcha" data-sitekey="6LeHSV4kAAAAAAJvRg29HO-Fone3ox3k8nJVmwbu"></div>
  </form>

  < <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
      var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
          toolbar: [
            [{
              header: [1, 2, 3, 4, 5, 6, false]
            }],
            [{
              font: []
            }],
            ["bold", "italic"],

            [{
              list: "ordered"
            }, {
              list: "bullet"
            }],

            [{
              color: []
            }, {
              background: []
            }],
          ]
        },
      });

      quill.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='comment']").value = quill.root.innerHTML;
      });
    </script>
</body>

</html>