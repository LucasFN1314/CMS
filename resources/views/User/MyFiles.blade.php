@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis archivos</title>
</head>
<body>
    @section('content')
    <app-header></app-header>
    <filemanager :own__files="true"></filemanager>
    @endsection
</body>
</html>