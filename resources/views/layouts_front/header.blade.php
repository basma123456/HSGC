<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/css_front/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css_front/all.min.css')}}">

   @if(App::getLocale() === 'en')
    <link rel="stylesheet" href="{{asset('assets/css_front/main.css')}}">
    @elseif(App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{asset('assets/css_front/main-rtl.css')}}">
@endif
        <link rel="stylesheet" href="{{asset('assets/css_front/uikit.min.css')}}">
    <title>HSGC</title>

</head>
@toastr_css

<body>


