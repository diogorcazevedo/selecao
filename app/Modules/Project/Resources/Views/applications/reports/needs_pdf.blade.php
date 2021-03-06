@extends('_layouts.pdf')
@php $count = 1;  @endphp
<style>
    table {
        font-family: arial, sans-serif;
        font-size:10px;;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<table>
    <thead>
    <tr style="background-color: #0E2231;color: #ffffff;">
        <th colspan="8" style="text-align: center;">{{$job->name}}</th>
        <th style="text-align: center;">{{count($users)}}</th>
    </tr>
    </thead>
    <thead>
        <tr>
            <th class="text-lg-center">QTD</th>
            <th class="text-lg-center">INSCRIÇÃO</th>
            <th class="text-lg-center">NOME</th>
            <th class="text-lg-center"><small>LOCAL DE PROVA</small></th>
            <th class="text-lg-center"><small>SITUAÇÃO</small></th>
            <th class="text-lg-center"><small>NECESSIDADE</small></th>
            <th class="text-lg-center"><small>DESCRIÇÃO</small></th>
            <th class="text-lg-center"><small>CEL</small></th>
            <th class="text-lg-center"><small>EMAIL</small></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td><small>{{$count++}}</small></td>
                <td>{{$user->id}}</td>
                <td>{{$user->user}}</td>
                <td class="text-lg-center"><small>{{arraylocais()[$user->local]}}</small></td>
                <td class="text-lg-center"><small>{{$user->user_needs}}</small></td>
                <td class="text-lg-center"><small>{{$user->desc_need}}</small></td>
                <td class="text-lg-center"><small>{{$user->user_needs_description}}</small></td>
                <td class="text-lg-center"><small>{{$user->cel}}</small></td>
                <td class="text-lg-center"><small>{{$user->email}}</small></td>
            </tr>
        @endforeach
    </tbody>
</table>