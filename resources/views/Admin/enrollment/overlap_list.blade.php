@extends('layouts.default')
@section('extralinks')
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-table/dist/bootstrap-table.min.css') }}">
@endsection
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="container">
                <h1 class="text-center">Overlap List
                </h1>
                @if(Session::has('success'))
                <div class="alert alert-success my-2">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                @endif
                @if(Session::has('del'))
                <div class="alert alert-danger my-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('del') }}
                </div>
                @endif

                <div class="mainpage">
                    <div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="px-3 col-lg-4 col-md-12  col-sm-12 email  mb-3">
                                <label class="form-label" style="font-size: 16pt">Session</label>
                                <br>
                                <center>
                                    <select class="form-control" name="session" data-component="date" id="session">
                                        <option value='0'>Select Session</option>
                                        @foreach($session as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </center>
                            </div>
                        </div>
                        <div class="sem">

                        </div>
                    </div>
                    <div class="table-sorter-wrapper">
                        <div class="page" align="right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extrascript')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
<script>
$(document).ready(function() {
    $('#myTable').after('<div id="nav"></div>');
    var rowsShown = 100;
    var rowsTotal = $('#myTable tbody tr').length;
    var numPages = rowsTotal / rowsShown;
    for (i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="' + i + '">' + pageNum + '</a> ');
    }
    $('#myTable tbody tr').hide();
    $('#myTable tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function() {
        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#myTable tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
        css('display', 'table-row').animate({
            opacity: 1
        }, 300);
    });
});
</script>
<script src="{{ asset('/js/jq.tablesort.js') }}"></script>
<script src="{{ asset('/js/tablesorter.js') }}"></script>
<script src="{{ asset('/js/bootstrap-table.js') }}"></script> -->

<script>
$(document).ready(function() {
    $("#session").on("keyup change", function(e) {
        var id = $("#session").val();
        //console.log(id);
        $(".sem").empty();
        $.ajax({
            url: "http://127.0.0.1:8000/api/overlaplist/" + id,
            type: 'GET',
            async: true,
            dataType: 'json', // added data type
            success: function(res) {
                if (id == 0)
                    id = 0;
                else if (res.data.length == 1) {
                    $s =
                        `<p class="d-flex justify-content-center">No Overlapping Found!!!</p>`;
                    $(".sem").append($s);
                } else {
                    //console.log(res.data);
                    // res.data.reverse();
                    //console.log(res.data);
                    //  console.log(res.data);

                    $s = ` <table class="table app-table-hover mb-0 text-left">
                                    <thead class="fw-bold">
                                        <tr>
                                            <th class="cell">Course Code</th>
                                            <th class="cell">Course Title</th>
                                            <th class="cell"><center>Semester</center></th>
                                            <th class="cell"><center>Students</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                    var element = [];
                    $.each(res.data, function(stu, ss) {
                        element.push(stu);
                    });
                    element.reverse();
                    //console.log(element);
                    $.each(element, function(index, ss) {
                        $.each(res.data[ss], function(sub, cc) {
                            var ok = cc;
                            $.each(ok, function(sem, co) {
                                //  console.log(sem);
                                var c = sub;
                                var title = '';
                                var code = '';
                                while (c[0] != '#') {
                                    title += c[0];
                                    c = c.slice(1);
                                }
                                //   console.log(c);
                                c = c.slice(1);
                                while (c[0] != '#') {
                                    code += c[0];
                                    c = c.slice(1);
                                }
                                c = c.slice(1);
                                //  console.log(sem,' ',ctitle,' ',ccode);
                                $s += `<tr>
                                        <td class="cell">${code}</td>
                                        <td class="cell">${title}</td>
                                        <td class="cell"><center>${sem}</center></td>
                                        <td class="cell"><center>${ss}</center></td>
                                    </tr>`;
                            });
                        });
                    });
                    $s += `</tbody>
                            </table>`;
                    $(".sem").append($s);
                }
            } //
        }); //
    }) //
});
</script>



@endsection
