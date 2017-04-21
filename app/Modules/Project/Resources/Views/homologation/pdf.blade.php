@extends('_layouts.pdf')
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
        <th colspan="2" style="text-align: center;">{{$job->name}}</th>
    </tr>
    </thead>
    <thead>
        <tr>
            <th>INSCRIÇÃO</th>
            <th>NOME</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->user}}</td>
            </tr>
        @endforeach
    </tbody>
</table>