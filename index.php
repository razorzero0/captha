<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button class="g-recaptcha" data-sitekey="6LdtyV0kAAAAANwSXADtuqgeW1qDQpR-tKN5M7ab" data-callback='onSubmit' data-action='submit'>Submit</button>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
</body>

</html>