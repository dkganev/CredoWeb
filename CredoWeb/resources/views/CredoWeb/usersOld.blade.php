<x-layout>
    <x-slot name="title">
        Links
    </x-slot>
    <div class="container">
    <h1>welcome</h1>
    





    

    
    <!--<div class="row">
        <div class="col-sm">    
            <input type="text" id="customSearch" >
        </div>
        <div class="col-sm">    
            <input type="text" id="customSearch2" >
        </div>
    </div>-->
    
    <div>
        <div id="toolbar">
            <div class="form-inline" role="form">
                <div class="form-group">
                    <span>Offset: </span>
                    <input name="offset" class="form-control w70 customSearch" type="number" value="0">
                </div>
                <div class="form-group">
                    <span>Limit: </span>
                    <input name="limit" class="form-control w70 customSearch" type="number" value="5">
                </div>
                <div class="form-group">
                    <input id="customSearch" name="search"  class="form-control customSearch" type="text" placeholder="Search">
                </div>
                    <button id="ok" type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
        <!--<table class="table table-bordered table-bordered table-hover table-striped" 
            id="table"
            data-search="true"
            data-custom-search="customSearch"
            data-custom-sort="customSort"
            data-classes="table-condensed"
            data-toggle="table"
            data-show-columns="true"
        ><!--data-url="http://127.0.0.1/data/data5.json"  //data-pagination="true"  data-show-columns="true" data-search-selector="#customSearch" data-show-columns-toggle-all="true"-->
    
        <!--<table
            id="table"
            data-toggle="table"
            data-toolbar="#toolbar"
            data-show-columns="true"
            data-custom-search="customSearch"
            data-search-selector=".customSearch"
            data-filter-control="true"
            data-show-search-clear-button="true">
        >-->
        <table
            id="table"
            
            data-filter-control="true"
            data-show-search-clear-button="true">
            <thead style="margin-right: 0px;">
                <tr>
                    <th data-field="id" data-sortable="true" data-filter-control="input">ID</th>
                    <th data-field="first_name" data-sortable="true">First Name</th>
                    <th data-field="last_name" data-sortable="true">Last Name</th>
                    <th data-field="type" data-sortable="true" data-filter-control="select">Type</th>
                    <th data-field="workplace" data-sortable="true">Workplace</th>
                    <th data-field="created_at" data-sortable="true">Created</th>
                </tr>
    
            </thead>
            <tbody >
                        
                @foreach($dataUsers as $dataUser)
                    <tr>
                        <td class="text-center">{{ $dataUser->ID }}</td>
                        <td class="text-right">{{ $dataUser->first_name}}</td>
                        <td class="text-right">{{ $dataUser->last_name }}</td>
                        <td class="text-right">{{ $dataUser->type }}</td>
                        <td class="text-right">{{ $dataUser->name }}</td>
                        <td class="text-right">{{ $dataUser->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>   

    </div>
    @foreach($dataUsers as $dataUser)
    
    
    <p>{{$dataUser->ID}}</p>
    
    @endforeach
</x-layout>
<script>
    $(document).ready(function(){
        
//        $("input[title='inputColumns']").on("keyup",function(){
//            //$("#customSearch").teht()0
//            var str2 = $("input").text();
//            console.log(str2);
//           alert($("input[title='inputColumns']").val());
//        });
        
        $("button[title='Columns']").click(function(){
            if($(".dropdown-menu.dropdown-menu-right").is(":visible")){
                $( ".dropdown-menu.dropdown-menu-right" ).hide();
            } else{
                $( ".dropdown-menu.dropdown-menu-right" ).show();
            }
          
            //$( "#myselect option:selected" ).text();
            //$( "#myselect" ).val();
            //selectedColor = $( "select option:selected" ).text();
            //console.log('test1234', selectedColor);
            //$("select").css("color", selectedColor);
            //alert("The text has been changed.");
        });
    });
    function customSort(sortName, sortOrder, data) {
        var order = sortOrder === 'desc' ? -1 : 1
        data.sort(function (a, b) {
            var aa = +((a[sortName] + '').replace(/[^\d]/g, ''))
            var bb = +((b[sortName] + '').replace(/[^\d]/g, ''))
            if (aa < bb) {
                return order * -1
            }
            if (aa > bb) {
                return order
            }
            return 0
        })
    } 
    
        $(function() {
            $('#table').bootstrapTable()
        })
//    var $table = $('#table')
//    var $ok = $('#ok')
//
//    $(function() {
//        $ok.click(function () {
//            alert("The text has been changed.");
//            $('input[name="search"]').val('ee').change();
//            $('input[name="search"]').change();
//            $table.bootstrapTable('refresh');
//        })
//    })
//
//    function queryParams() {
//        var params = {}
//        $('#toolbar').find('input[name]').each(function () {
//            clonsole.log($(this).val()); 
//            params[$(this).attr('name')] = $(this).val()
//        })
//        return params
//    }
//
//
//    function customSearch(data, text) {
//        text ='P';
//        text2 ='P';
//        return data.filter(function (row) {
//            console.log( row.type.indexOf(text));
//            row.type.indexOf(text);
//            row.last_name.indexOf(text2);
//            return -1;   
//        })
//    }
</script>  
   



<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo 'welcome';
