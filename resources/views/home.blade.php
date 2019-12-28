@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! Hi
                </div>


                <table class="table">
                    <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endsection
