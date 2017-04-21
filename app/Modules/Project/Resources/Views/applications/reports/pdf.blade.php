@extends('_layouts.pdf')
@php $count = 1;  @endphp
<style>
    table {
        font-family: arial, sans-serif;
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
        <th colspan="3" style="text-align: center;">{{$job->name}}</th>
        <th style="text-align: center;">{{count($users)}}</th>
    </tr>
    </thead>
    <thead>
        <tr>
            <th class="text-lg-center">QTD</th>
            <th class="text-lg-center">INSCRIÇÃO</th>
            <th class="text-lg-center">NOME</th>
            <th class="text-lg-center"><small>LOCAL DE PROVA</small></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td><small>{{$count++}}</small></td>
                <td>{{$user->id}}</td>
                <td>{{$user->user}}</td>
                <td class="text-lg-center"><small>{{arraylocais()[$user->local]}}</small></td>
            </tr>
        @endforeach
    </tbody>
</table>