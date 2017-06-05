@extends('layouts.default')
@section('title', 'Your Dashboard')
@section('content')
<div class="row  border-bottom white-bg dashboard-header">
  <div class="col-sm-6">
    <h2>Dashboard</h2>
  </div>
</div>
<div class="row m-b-md m-t-md animated fadeInLeft">
  <div class="col-lg-3">
    <a href="#">
    <div class="widget style1 lazur-bg">
      <div class="row">
        <div class="col-xs-4 text-center">
            <i class="fa fa-shopping-cart fa-5x"></i>
        </div>
        <div class="col-xs-8 text-right">
          <span> Today's Orders </span>
          <h2 class="font-bold">0</h2>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-lg-3">
    <a href="#">
      <div class="widget style1 yellow-bg">
        <div class="row">
          <div class="col-xs-4">
            <i class="fa fa-question fa-5x"></i>
          </div>
          <div class="col-xs-8 text-right">
            <span> Pending Payments </span>
            <h2 class="font-bold">0</h2> 
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-3">
    <div class="widget style1 navy-bg">
      <div class="row">
        <div class="col-xs-4">
          <i class="fa fa-send fa-5x"></i>
        </div>
        <div class="col-xs-8 text-right">
          <span> Unshipped Orders </span>
          <h2 class="font-bold">0</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <table class="table">
      <tbody>
        <tr>
          <td>
            <a href="#" class="btn btn-danger m-r-sm">0</a>
            Products
          </td>
        </tr>
        <tr>
          <td>
            <a href="#" class="btn btn-primary m-r-sm">0</a>
            Customers
          </td>
        </tr>
      </tbody>
    </table>
  </div> 
</div>
@endsection
