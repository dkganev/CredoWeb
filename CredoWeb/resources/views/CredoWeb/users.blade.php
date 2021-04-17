<x-layout>
    <x-slot name="title">
        Users
    </x-slot>
    @include('CredoWeb.nav',  ['dataLink' => $dataLink])
    
    <div class="container">
        <h1>Users</h1>
    
    
        <div id="toolbar">
            <div class="form-inline" role="form">
                <button type="button" class="btn btn-primary" id="addBtn">ADD <i class="fa fa-plus" ></i></button>
            </div>
        </div>
        <table
            id="table"
            data-toolbar="#toolbar"
            data-show-columns="true"
            data-show-columns-toggle-all="true"
            data-pagination="true"
            data-page-list="[10, 25, 50, 100, all]"
            data-filter-control="true"
            data-show-search-clear-button="true">
            <thead >
                
                <tr>
                    <th class="text-center" data-field="id" data-sortable="true" data-filter-control="input">ID</th>
                    <th class="text-center" data-field="first_name" data-sortable="true" data-filter-control="input">First Name</th>
                    <th class="text-center" data-field="last_name" data-sortable="true" data-filter-control="input">Last Name</th>
                    <th class="text-center" data-field="email" data-sortable="true" data-filter-control="input">Email</th>
                    <th class="text-center" data-field="type" data-sortable="true" data-filter-control="select">Type</th>
                    <th class="text-center" data-field="workplace" data-sortable="true" data-filter-control="input">Workplace</th>
                    <th class="text-center" data-field="created_at" data-sortable="true" data-filter-control="input">Created</th>
                    <th class="text-center" data-field="action" data-sortable="false" >Action</th>
                </tr>
    
            </thead>
            <tbody >
                        
                @foreach($dataUsers as $dataUser)
                    <tr>
                        <td class="text-center">{{ $dataUser->ID }}</td>
                        <td class="text-right">{{ $dataUser->first_name}}</td>
                        <td class="text-right">{{ $dataUser->last_name }}</td>
                        <td class="text-right">{{ $dataUser->email }}</td>
                        <td class="text-right">{{ $dataUser->type }}</td>
                        <td class="text-right">{{ $dataUser->name }}</td>
                        <td class="text-right">{{ $dataUser->created_at }}</td>
                        <td class="text-center">
                                <button type="button" onclick='openEditUserForm({{ $dataUser->ID }})' class="btn btn-success" data-dismiss="edit">Edit <i class="fa fa-edit"></i></button>
                                <button type="button" onclick='deleteUser({{ $dataUser->ID }})'class="btn btn-danger" data-dismiss="delete">Delete <i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   

    </div>
@include('CredoWeb.Users.addUsers',  ['dataTypes' => $dataTypes, 'dataHospitals' => $dataHospitals])
@include('CredoWeb.Users.editUsers', ['dataTypes' => $dataTypes, 'dataHospitals' => $dataHospitals])
    
</x-layout>

  

<script>
//        $(function() {
//            $('#table').bootstrapTable()
//        })

//$(document).ready(function(){
//  $("#addBtn").click(function(){
//    $("#addModal").modal();
//  });
//});
</script>  
   



