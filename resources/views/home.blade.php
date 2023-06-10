@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 container-fluid">
            <div class="row">
                <div class="col-md-8 bg-white p-3 shadow position-relative mb-1" style="border-radius: 13px;">
                    <select class="position-absolute py-2 px-1 shadow border-0 fs-6" id="year_select"
                        style="z-index:1000000;top:40px;right:30px;border-radius:30px;color:#f48116;background-color:#FFF8E5;">
                        @foreach( $available_years as $available_year )
                            <option value="{{ $available_year }}">{{ $available_year }}</option>
                        @endforeach
                    </select>
                    <div id="main" style="width: 100%;height:400px;"></div>
                </div>
                <div class="col-md-4 pe-0 position-relative mb-1">
                    <div class="bg-white shadow" style="border-radius: 13px;">
                        <h5 class="ps-3 py-3 pt-4 fw-bold" style="color: #464646;">Analytiques(produits)</h5>
                        <div class="d-flex flex-wrap justify-content-between justify-content-sm-center">
                            <div >
                                <div id="pieChart1" style="width:150px;height:150px;"></div>
                                <p class="text-muted text-center mx-auto fs-6">categories</p>
                            </div>
                            <div>
                                <div id="pieChart2" style="width:150px;height:150px;"></div>
                                <p class="text-muted text-center mx-auto fs-6">packs</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between justify-content-sm-center">
                            <div>
                                <div id="pieChart3" style="width:150px;height:150px;"></div>
                                <p class="text-muted text-center mx-auto fs-6">ecoles</p>
                            </div>
                            <div>
                                <div id="pieChart4" style="width:150px;height:150px;"></div>
                                <p class="text-muted text-center mx-auto fs-6">classes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-8 bg-white p-3 shadow position-relative"  style="border-radius: 13px;">
                    <div class="row container-fluid">
                        <div class="col-lg-3 col-md-6 mb-1">
                            <div class="px-2 py-1 rounded d-flex justify-content-between" style="background-color: #EEEEEE;">
                                <img src="{{ asset('images/dashboard/commandsAnnuler.svg') }}" class="img-fluid">
                                <div class="text-muted">
                                    <p class="p-0 m-0 fw-bold pt-1">n.T.c annulées</p>
                                    <b class="p-0 m-0">{{ $nbre_canceled_orders}}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-1">
                            <div class="px-2 py-1 rounded d-flex justify-content-between" style="background-color: #EEEEEE;">
                                <img src="{{ asset('images/dashboard/commandsTerm.svg') }}" alt="" class="img-fluid">
                                <div class="text-muted">
                                    <p class="p-0 m-0 fw-bold pt-1">n.T.c terminées</p>
                                    <b class="p-0 m-0">{{ $nbre_completed_orders }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-1">
                            <div class="px-2 py-1 rounded d-flex justify-content-between" style="background-color: #EEEEEE;">
                                <img src="{{ asset('images/dashboard/Pendingcommandes.svg') }}" alt="" class="img-fluid">
                                <div class="text-muted">
                                    <p class="p-0 m-0 fw-bold pt-1">n.T.c en attente</p>
                                    <b class="p-0 m-0">{{ $nbre_pending_orders }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-1">
                            <div class="px-2 py-1 rounded d-flex justify-content-between" style="background-color: #EEEEEE;">
                                <img src="{{ asset('images/dashboard/commandes.svg') }}" alt="" class="img-fluid">
                                <div class="text-muted">
                                    <p class="p-0 m-0 fw-bold pt-1">T.commandes</p>
                                    <b class="p-0 m-0">{{ $nbre_orders }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="px-3 pt-3 pb-2" style="color: #464646;">Dernière commandes</h3>
                    <div class="row container-fluid">
                        @foreach($commandes as $commande)
                            <table class="rounded mb-2" style="background-color: #EEEEEE;">
                                <tr>
                                    <td class="px-2 fw-bold text-muted">N° commande</td>
                                    <td class="fw-bold text-muted">Date</td>
                                    <td class="fw-bold text-muted">Nom/Prenom</td>
                                    <td class="fw-bold text-muted">Status</td>
                                </tr>
                                <tr>
                                    <td class="px-2 text-muted">{{ $commande->id }}</td>
                                    <td class="text-muted">{{ $commande->created_at }}</td>
                                    <td class="text-muted">{{ $commande->belongToUilisateur->nom .' '.$commande->belongToUilisateur->prenom }} </td>
                                    <td class="text-muted">{{ $commande->status }}</td>
                                </tr>
                            </table>
                        @endforeach
                        <h6 class="text-end nav-item">
                            <a href="{{route('ordres')}}" class="nav-link text-secondary ">Afficher plus</a>
                        </h6>
                    </div>
                </div>
                <div class="col-md-4 pe-0 position-relative mt-1">
                    <div class="bg-white shadow  pb-3" style="border-radius: 13px;">
                        <h5 class="ps-3 pt-4 fw-bold" style="color: #464646;">Aperçu de l'état</h5>
                        <small class="text-muted ps-3 mb-3">informations générales</small>                        
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de étudiants</label>
                            <span class="text-secondary text-end">{{$nbre_etudiants}}</span>
                        </div>
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de produits</label>
                            <span class="text-secondary text-end">{{$nbre_produits}}</span>
                        </div>
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de classes</label>
                            <span class="text-secondary text-end">{{$nbre_classes}}</span>
                        </div>
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de écoles</label>
                            <span class="text-secondary text-end">{{ $nbre_ecoles }}</span>
                        </div>
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de matieres</label>
                            <span class="text-secondary text-end">{{$nbre_matires}}</span>
                        </div>
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de packs</label>
                            <span class="text-secondary text-end">{{$nbre_packs}}</span>
                        </div>
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de categories</label>
                            <span class="text-secondary text-end">{{$nbre_categories}}</span>
                        </div>
                        <div class="px-3 mb-1 mt-3 d-flex justify-content-between border-bottom">
                            <label class="p-0 m-0 text-secondary fs-6">Nombre de villes</label>
                            <span class="text-secondary text-end">{{$nbre_villes}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var myChart = echarts.init(document.getElementById('main'));
    var myPieChart1 = echarts.init(document.getElementById('pieChart1'));
    var myPieChart2 = echarts.init(document.getElementById('pieChart2'));
    var myPieChart3 = echarts.init(document.getElementById('pieChart3'));
    var myPieChart4 = echarts.init(document.getElementById('pieChart4'));

    let months = ['Jan', 'Fév', 'Avr','Mar', 'Mai','Jun', 'juil', 'Août','Sep','Oct','Nov','Déc'];
    let data = [];
    
    myChart.showLoading();
    let currentYear = 2020;
    $.get(
    "{{ route('analytics.perMonths',$available_years[0]) }} ",
        function (result) {
            myChart.hideLoading();
            let nbreMissions =0; 
            for(x of result.nbres) nbreMissions+=x;
            option = {
            title: {
                subtext: nbreMissions.toFixed(2),
                text: 'Totale de commandes',
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                type: 'shadow',
                label: {
                    show: true
                }
                }
            },
            toolbox: {
                show: true,
                bottom:0,
                feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: false },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
                }
            },
            calculable: true,
            grid: {
                top: '15%',
                left: '1%',
                right: '1%',
                distance:{
                    min: 0,
                    max: 0
                },
                borderRadius:'50%',
                containLabel: true
            },
            xAxis: [
                {
                type: 'category',
                data: result.months,
                name: 'Mois',
                }
            ],
            yAxis: [
                {
                show:false
                }
            ],
            dataZoom: [
                {
                show: false,
                start: 1,
                end: 100
                },
                {
                type: 'inside',
                start: 94,
                end: 100
                },
            
            ],
            series: [
                {
                type: 'bar',
                barGap:0,
                data: result.nbres.map(nbre =>nbre-0.3),
                color: {
                    type: 'bar',
                    x: 0,
                    r: 0,
                    colorStops: [
                        {
                        offset: 1,
                        color: 'rgb(238, 238, 238)'
                        
                        },
                        {
                        offset: 1,
                        color: 'rgb(238, 238, 238)'
                        
                        }
                    ]
                    }
                },
                {
                name: 'Totale',
                type: 'bar',
                barGap:0,
                data: result.nbres,
                color: {
                    type: 'bar',
                    x: 0,
                    r: 0,
                    colorStops: [
                        {
                        offset: 1,
                        color: 'rgb(255, 196, 42)'
                        },
                        {
                        offset: 1,
                        color: 'rgb(255, 196, 42)'
                        }
                    ]
                    }
                }
            ]
            };
            myChart.setOption(option);
        }
    );



    $("#year_select").on("change",function(e){
        myChart.showLoading();
        let year = e.target.value;
        $.get( `/analytic/perMonths/${year}`,function(result){
            myChart.hideLoading();
            let nbreMissions =0; 
            for(x of result.nbres) nbreMissions+=x;
            option = {
            title: {
                subtext: nbreMissions.toFixed(2),
                text: 'Totale de missions',
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                type: 'shadow',
                label: {
                    show: true
                }
                }
            },
            toolbox: {
                show: true,
                bottom:0,
                feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: false },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
                }
            },
            calculable: true,
            grid: {
                top: '15%',
                left: '1%',
                right: '1%',
                distance:'0%',
                borderRadius:'50%',
                containLabel: true
            },
            xAxis: [
                {
                type: 'category',
                data: result.months,
                name: 'Mois',
                }
            ],
            yAxis: [
                {
                show:false
                }
            ],
            dataZoom: [
                {
                show: false,
                start: 1,
                end: 100
                },
                {
                type: 'inside',
                start: 94,
                end: 100
                },
            
            ],
            series: [
                {
                type: 'bar',
                data: result.nbres.map(nbre =>nbre-0.3),
                color: {
                    type: 'bar',
                    x: 0.4,
                    r: 1,
                    colorStops: [
                        {
                        offset: 0,
                        color: 'rgb(238, 238, 238)'
                        
                        },
                        {
                        offset: 1,
                        color: 'rgb(238, 238, 238)'
                        
                        }
                    ]
                    }
                },
                {
                name: 'Totale',
                type: 'bar',
                data: result.nbres,
                color: {
                    type: 'bar',
                    x: 0.4,
                    r: 1,
                    colorStops: [
                        {
                        offset: 0,
                        color: 'rgb(255, 196, 42)'
                        },
                        {
                        offset: 1,
                        color: 'rgb(255, 196, 42)'
                        }
                    ]
                    }
                }
            ]
            };
            myChart.setOption(option);
        });
    });

    // left charts begin
    let pie1Option = {
        tooltip: {
            trigger: 'item'
        },
        legend: {
            show:false,
            top: '5%',
            left: 'center'
        },
        series: [
            {
            name: 'Access From',
            type: 'pie',
            avoidLabelOverlap: false,
            itemStyle: {
                borderRadius: 10,
                borderColor: '#fff',
                borderWidth: 2
            },
            label: {
                show: false,
                position: 'center'
            },
            emphasis: {
                label: {
                show: false,
                fontSize: '40',
                fontWeight: 'bold'
                }
            },
            labelLine: {
                show: true
            },
            data: [
                { value: 1048, name: 'Search Engine' },
                { value: 735, name: 'Direct' },
                { value: 580, name: 'Email' },
                { value: 484, name: 'Union Ads' },
                { value: 300, name: 'Video Ads' }
            ]
            }
        ]
    };

    // myPieChart1.setOption(pie1Option);
    myPieChart1.showLoading();
    myPieChart2.showLoading();
    myPieChart3.showLoading();
    myPieChart4.showLoading();
    $.get( "{{ route('analytics.produitssAnalytics') }} ",function(response){
        myPieChart1.hideLoading();
        myPieChart2.hideLoading();
        myPieChart3.hideLoading();
        myPieChart4.hideLoading();
        myPieChart1.setOption(getPieOption("nombre des prouits par categorie",response.categories));
        myPieChart2.setOption(getPieOption("nombre des prouits par pack",response.packs));
        myPieChart3.setOption(getPieOption("nombre des prouits par ecole",response.ecoles));
        myPieChart4.setOption(getPieOption("nombre des prouits par classe",response.classes));
    })
    // left charts end

    function getPieOption( name ,param){

        return pie1Option = {
        tooltip: {
            trigger: 'item'
        },
        legend: {
            show:false,
            top: '5%',
            left: 'center'
        },
        series: [
            {
            name: name,
            type: 'pie',
            avoidLabelOverlap: false,
            itemStyle: {
                borderRadius: 10,
                borderColor: '#fff',
                borderWidth: 2
            },
            label: {
                show: false,
                position: 'center'
            },
            emphasis: {
                label: {
                show: false,
                fontSize: '40',
                fontWeight: 'bold'
                }
            },
            labelLine: {
                show: true
            },
            data: param
            }
        ]
    };

    window.onresize = function() {
            myChart.resize();
            myPieChart1.resize();
            myPieChart2.resize();
            myPieChart3.resize();
            myPieChart4.resize();
    };
    }

</script>
@endsection
