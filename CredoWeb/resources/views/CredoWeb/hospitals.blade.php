<x-layout>
    <x-slot name="title">
        Hospitals
    </x-slot>
    @include('CredoWeb.nav',  ['dataLink' => $dataLink])
    
    <div class="container">
        <h1>Hospitals</h1>
    
    
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
                    <th class="text-center" data-field="name" data-sortable="true" data-filter-control="input">Name</th>
                    <th class="text-center" data-field="addres" data-sortable="true" data-filter-control="input">Address</th>
                    <th class="text-center" data-field="phone" data-sortable="true" data-filter-control="input">Phone</th>
                    <th class="text-center" data-field="action" data-sortable="false" >Action</th>
                </tr>
    
            </thead>
            <tbody >
                        
                @foreach($dataHospitals as $dataHospital)
                    <tr>
                        <td class="text-center">{{ $dataHospital->ID }}</td>
                        <td class="text-right">{{ $dataHospital->name}}</td>
                        <td class="text-right">{{ $dataHospital->address }}</td>
                        <td class="text-right">{{ $dataHospital->phone }}</td>
                        <td class="text-center">
                                <button type="button" onclick='openEditHospitalForm({{ $dataHospital->ID }})' class="btn btn-success" data-dismiss="edit">Edit <i class="fa fa-edit"></i></button>
                                <button type="button" onclick='deleteHospital({{ $dataHospital->ID }})'class="btn btn-danger" data-dismiss="delete">Delete <i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   

    </div>
        
    @include('CredoWeb.Hospitals.addHospitals',  [])
    @include('CredoWeb.Hospitals.editHospitals', [])
</x-layout>