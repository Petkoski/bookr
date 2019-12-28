@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="text-center" style="margin-bottom: 5px; font-size: 23px; font-weight: normal">Admin Panel</div>
    </div>

    {{--@if ($action_message !== '')--}}
        {{--<div class="row">--}}
            {{--<div class="alert alert-success alert-dismissible col-sm-6 col-sm-offset-3">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                {{--<h4><i class="icon fa fa-check"></i> The operation was completed successfully. :)</h4>--}}
                {{--{{$action_message}}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

    @if (session('status'))
        <div class="row">
            <div class="alert alert-info alert-dismissible col-sm-6 col-sm-offset-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> The operation was completed successfully. :)</h4>
                {{ session('status') }}
            </div>
        </div>
    @endif

    {{--Create an Author--}}
    <div class="row">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Create an Author</h3>

                    <div class="box-tools pull-right">
                    {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                    {{--</button>--}}
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form role="form" method="POST" action="{{URL('/admin/CreateAnAuthor')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Check whether the author is already stored in the database:</label>

                            <select class="form-control select2" style="width: 100%;">
                                @foreach($authors as $author)
                                    <option>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- text input -->
                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Description" style="resize: vertical;"></textarea>
                        </div>

                        <button class="btn btn-primary btn-flat" type="submit">Add it to the database</button>
                    </form>
                </div>

                <!-- /.box-body -->
            </div>


        </div>
    </div>



    {{--Add a New Book--}}
    <div class="row">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Add a New Book</h3>

                    <div class="box-tools pull-right">
                        {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                        {{--</button>--}}
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form role="form" method="POST" action="{{URL('/admin/AddANewBook')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <!-- text input -->
                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Format:</label>
                            <input type="text" name="format" class="form-control" placeholder="Format">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Dimensions:</label>
                            <input type="text" name="dimensions" class="form-control" placeholder="Dimensions">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Publication Date:</label>
                            <input type="text" name="publication_date" class="form-control" placeholder="Publication Date">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Publisher:</label>
                            <input type="text" name="publisher" class="form-control" placeholder="Publisher">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Publication City/Country:</label>
                            <input type="text" name="publication_city" class="form-control" placeholder="Publication City/Country">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Language:</label>
                            <input type="text" name="language" class="form-control" placeholder="Language">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>ISBN10:</label>
                            <input type="text" name="isbn13" class="form-control" placeholder="ISBN10">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>ISBN13:</label>
                            <input type="text" name="isbn10" class="form-control" placeholder="ISBN13">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Bestsellers Rank:</label>
                            <input type="text" name="bestsellers_rank" class="form-control" placeholder="Bestsellers Rank">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Price (in Euros):</label>
                            <input type="text" name="price" class="form-control" placeholder="Price">
                        </div>

                        <div class="form-group">
                            <label>Category:</label>
                            {{--<input type="hidden" name="category" value="category_id">--}}

                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Description" style="resize: vertical;"></textarea>
                        </div>

                        <div class="form-group" style="margin-top: 40px; margin-bottom: 20px">
                            <label>Author(s):</label>

                            <select name="author_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select an author(s)" style="width: 100%;">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary btn-flat" type="submit">Add it to the database</button>
                    </form>
                </div>

                <!-- /.box-body -->
            </div>


        </div>
    </div>


    {{--Delete a Book--}}
    <div class="row">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Delete a Book</h3>

                    <div class="box-tools pull-right">
                        {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                        {{--</button>--}}
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form role="form" method="POST" action="{{URL('/admin/DeleteABook')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label>Name:</label>
                            {{--<input type="hidden" name="category" value="category_id">--}}

                            <select name="book_id" class="form-control select2" style="width: 100%;">
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary btn-flat" type="submit">Delete it from the database</button>
                    </form>
                </div>

                <!-- /.box-body -->
            </div>


        </div>
    </div>


    {{--Delete an Author--}}
    <div class="row">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Delete an Author</h3>

                    <div class="box-tools pull-right">
                        {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                        {{--</button>--}}
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form role="form" method="POST" action="{{URL('/admin/DeleteAnAuthor')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group" style="margin-bottom: 20px">
                            <label>Author(s):</label>

                            <select name="author_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select an author(s)" style="width: 100%;">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary btn-flat" type="submit">Delete it/them from the database</button>
                    </form>
                </div>

                <!-- /.box-body -->
            </div>


        </div>
    </div>


    {{--Delete a User--}}
    <div class="row">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Delete a User</h3>

                    <div class="box-tools pull-right">
                        {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                        {{--</button>--}}
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form role="form" method="POST" action="{{URL('/admin/DeleteAUser')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label>User:</label>
                            {{--<input type="hidden" name="category" value="category_id">--}}

                            <select name="user_id" class="form-control select2" style="width: 100%;">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary btn-flat" type="submit">Delete it from the database</button>
                    </form>
                </div>

                <!-- /.box-body -->
            </div>


        </div>
    </div>

@stop

@section('bottomscripts')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Datemask dd/mm/yyyy
//            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
//            //Datemask2 mm/dd/yyyy
//            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
//            //Money Euro
//            $("[data-mask]").inputmask();

            //Date range picker
//            $('#reservation').daterangepicker();
//            //Date range picker with time picker
//            $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
//            //Date range as a button
//            $('#daterange-btn').daterangepicker(
//                {
//                    ranges: {
//                        'Today': [moment(), moment()],
//                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//                        'This Month': [moment().startOf('month'), moment().endOf('month')],
//                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//                    },
//                    startDate: moment().subtract(29, 'days'),
//                    endDate: moment()
//                },
//                function (start, end) {
//                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//                }
//            );

            //Date picker
//            $('#datepicker').datepicker({
//                autoclose: true
//            });

            //iCheck for checkbox and radio inputs
//            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
//                checkboxClass: 'icheckbox_minimal-blue',
//                radioClass: 'iradio_minimal-blue'
//            });
//            //Red color scheme for iCheck
//            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
//                checkboxClass: 'icheckbox_minimal-red',
//                radioClass: 'iradio_minimal-red'
//            });
//            //Flat red color scheme for iCheck
//            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
//                checkboxClass: 'icheckbox_flat-green',
//                radioClass: 'iradio_flat-green'
//            });

            //Colorpicker
//            $(".my-colorpicker1").colorpicker();
//            //color picker with addon
//            $(".my-colorpicker2").colorpicker();

            //Timepicker
//            $(".timepicker").timepicker({
//                showInputs: false
//            });
        });
    </script>
@stop