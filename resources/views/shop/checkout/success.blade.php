@extends('layouts.app')
@section('style')
<style>
  html, body {
                color: #2E4857;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .full-height {
                height: 100%;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
            }
            a{
                color: #2E4857;
            }
            a:hover{
                
            }
</style>
@endsection
@section('content')
<div class="flex-center full-height">
  <div class="d-flex align-items-center content mt-4">
    <div class="title">
      <h1 style="margin-top: 15%;">Your part is done!</h1>
      <p style="font-size: 24px">Thanks agian for your order we have sent you an email with extra details. You will be redirected to our home page in 10 seconds.</p>

    </div>
  </div>
</div>
@endsection