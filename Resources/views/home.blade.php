@extends('header')

@section('content')
    <form action = "{{route('filter')}}" method="post" style='float:right;'>
    {{ csrf_field() }}
        <input type='number' name="year" placeholder="Année">
        <input type="submit" class="btn btn-primary" value="Rechercher">
    </form>
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="header" colspan="2">CA par mois</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($month as $m)
                                <tr>
                                    <td>{{ date("F", mktime(0, 0, 0, $m->month, 1)) }}</td>
                                    <td>{{ $m->amount }} €</td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    @foreach ($trim as $k => $v)
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                 <h2>Trimestre {{$k}} </h2>
                 <h4> Montant : {{$v['amount']}} € </h4>
                 <h5> Charge : {{$v['charge']}} €
                 </br>
                 <h4>Total : {{$v['amount']-$v['charge']}} €</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop