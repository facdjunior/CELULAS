@extends('template.painel-admin')
@section('title', 'Painel Administrativo')
@section('content')

<?php
@session_start();
if(@$_SESSION['id'] != ''){
  echo "<script language='javascript'> window.location='./' </script>";
}

?>

Home do Admin

@endsection
