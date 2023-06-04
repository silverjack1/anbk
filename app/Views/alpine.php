<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Add React in One Minute</title>
</head>

<body>

    <div id="root">
        <!-- This div's content will be managed by React. -->
    </div>

    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <!-- Load our React component. -->
    <script src="<?= base_url() ?>/public/dist/js/reach.js"></script>

</body>

</html>