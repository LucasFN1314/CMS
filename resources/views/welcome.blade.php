@extends('master')




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="./css/welcome.css">
</head>
<body>
    @section('content')
    <app-header></app-header>
    <home></home>
    <main></main>
    <footer></footer>
    <div class="progress-scroll"></div>
    @endsection
</body>

</html>