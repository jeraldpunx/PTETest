@extends('layouts.default')

@section('content')
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">notes</i></h2>
            <h5 class="center">Reading Items</h5>

            <p class="light">Lorem ipsum dolor sit amet, prodesset conceptam usu cu, mea an feugait voluptua. Te pro posidonium delicatissimi, an graeci labitur nam. In eos case habemus voluptaria. Ei diam inciderint definitiones vis, ne quo mediocrem iudicabit. Mea no liber aperiri definitiones.</p>

            <a href='{!! route('reading'); !!}' class="waves-effect waves-light btn"><i class="material-icons right">send</i>Start</a>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Under Development</h5>

            <p class="light">Under Development.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Under Development</h5>

            <p class="light">Under Development.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>
  
@stop

@section('script')
@stop