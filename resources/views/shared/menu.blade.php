<div class="col-md-3 px-0 menu">
    <div class="card shadow-lg" style="width: 95%; min-height:100%;">
        <ul class="list-group list-group-flush">
            <a href="{{ route('ajouterConducteur') }}" class="text-dark text-decoration-none">
                <li class="list-group-item py-4 font-weight-bolder {{Route::currentRouteName() == 'ajouterConducteur' ? 'activee' : '' }}">
                    Ajouter une Ecole
                    <i class="fas fa-user-plus float-right"></i>
                </li>
            </a>
            <a href="{{ route('listConducteur') }}" class="text-dark text-decoration-none">
                <li class="list-group-item py-4 font-weight-bolder {{ (Route::currentRouteName() == 'listConducteur' || Route::currentRouteName() == 'searchConducteur' ) ? 'activee' : '' }}">
                    Liste des ecoles
                    <i class="fas fa-clipboard-list float-right"></i>
                </li>
            </a>
        </ul>
    </div>
</div>