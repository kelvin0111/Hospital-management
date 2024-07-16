<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('dash/assets/userJS.JS') }}""></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/style.css') }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
 <![endif]-->
    <!-- Chatra {literal} -->
    <script>
        (function(d, w, c) {
            w.ChatraID = 'xuDkDJmND9PcG6J2h';
            var s = d.createElement('script');
            w[c] = w[c] || function() {
                (w[c].q = w[c].q || []).push(arguments);
            };
            s.async = true;
            s.src = 'https://call.chatra.io/chatra.js';
            if (d.head) d.head.appendChild(s);
        })(document, window, 'Chatra');
    </script>
    <!-- /Chatra {/literal} -->
</head>
<style>
    /* CSS for Preloader */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        /* Semi-transparent white background */
        display: none;
        /* Initially hidden */
        z-index: 9999;
        /* Ensure it's above other elements */
    }

    .loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
        /* Add styles for your loading animation or message */
    }
</style>

<body>
