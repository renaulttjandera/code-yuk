<!doctype html>
<html lang="en" data-color-mode="light">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url('assets/logo.png
    '); ?>" type="image/x-icon">
    <style>
      :root {
        --main-color: #d9534f;
        --accent-color: #f7f7f7;
        --text-color: #292b2c;
        --green-color: #28a745;
      }

      html[data-color-mode = 'dark'] {
        --main-color: #3b3b3b;
        --accent-color: #1a1a1a;
        --text-color: #f7f7f7;
        --green-color: #3b3b3b;
      }

      .bg-danger, .btn-danger {
        background-color: var(--main-color)!important;
      }

      .modal-body {
        background-color: var(--accent-color)!important;
      }

      .btn-success {
        background-color: var(--green-color)!important;
      }

      .bg-light, .modal-header, .modal-footer {
        background-color: var(--accent-color)!important;
        border: none;
        outline: none;
      }

      .btn {
        outline: none;
        border: none;
      }

      .text {
        color: var(--text-color)!important;
      }

      .card {
        background: transparent;
      }

      .btn-mode {
        position: fixed;
    bottom: 35px;
    right: 35px; 
    width: 80px;
    height: 80px;
    background-color: var(--text-color);
    border-radius: 50%;
    text-align: center;
    color: var(--accent-color);
    line-height: 4.8rem;
    font-size: 30px;
      }

      .btn-mode:hover {
        color: #d9534f;
      }

      @media (max-width: 767.98px) { 
        .profile { 
          text-align: center!important;
          } 
          
      }
    </style>

    <title><?= $title; ?> | Code, Yuk</title>

  </head>
  <body class="bg-light">