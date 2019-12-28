@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="text-center" style="margin-bottom: 5px; font-size: 23px; font-weight: normal">Categories:</div>
    </div>



    <div class="row">
        <div class="box-body no-padding">
            <div class="container col-sm-6 col-sm-offset-3">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th class="text-center" style="width: 10px">ID</th>
                                <th style="width: 400px">Name</th>
                            </tr>

                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->id }}</td>

                                    <td><a href="{{URL('/category/'.$category->id)}}" style="color: #333; ">{{ $category->name }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>

@stop