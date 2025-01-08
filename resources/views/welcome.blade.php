<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 11 + Vue 3</title>
    @vite('resources/js/app.js')
</head>

<body>
    <div id="app">
        <page-tree :pages="{{ $pages }}"></page-tree>
    </div>
</body>

</html>