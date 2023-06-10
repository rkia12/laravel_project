@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Liste des packs <a href="{{route("pack.add")}}" class="btn btn-secondary float-end">Ajouter</a></h3>
            <table class="table table-bordered table-striped table-hover data-table" id="data-table">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Type de pack</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                "lengthMenu": [ 5, 10, 15, 25, 100 ],
                "language": {
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Rien trouvé - désolé",
                "info": "Affichage de la page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun enregistrement disponible",
                "search": "Rechercher",
                "infoFiltered": "(filtré à partir de _MAX_ enregistrements au total)"
            },
            responsive: true,
                ajax: "{{ route('packs') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'type', name: 'type'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false},
                ]
            });
            table.on( 'draw', function () {
                let forms = document.querySelectorAll(".delete-confirm");
                if(forms.length > 0 ){
                    forms.forEach( form =>{
                        form.addEventListener("submit",(e)=>{
                            e.preventDefault();
                            let t= new swal({
                                title: "voulez-vous vraiment supprimer cet enregistrement",
                                type: "error",
                                confirmButtonClass:"btn-danger",
                                icon: 'warning',
                                buttons: 
                                {
                                    cancel: 'Annuler',
                                    confirm: 'Oui',
                                },
                                showCancelButton: true,
                                confirmButtonText: "Oui!",
                                dangerMode: true,
                            }).then(function(value) {
                                t="";
                                if (value === true) {
                                    form.submit();
                                }else if(value){
                                    if( value.isConfirmed ){
                                        form.submit();
                                    }
                                }
                            });
                        });
                    })
                }
            } );
            // $('#delete-confirm').each( function (btn) {
            //     $(btn).click(function(){
            //         alert("dgdfg")
            //     })
                    // swal({
                    //     title: 'Are you sure?',
                    //     text: 'This record and it`s details will be permanantly deleted!',
                    //     icon: 'warning',
                    //     buttons: ["Cancel", "Yes!"],
                    // }).then(function(value) {
                    //     if (value) {
                    //         window.location.href = url;
                    //     }
                    // });
                // });
            });
        </script>
</div>
@endsection