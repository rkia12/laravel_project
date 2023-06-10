<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <title> Commande N° : {{$commande->id}} </title>
    <style>
        *{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 300;
            text-align: left
        }
        .marginTH{
            width: 120px;
            text-align:center;
        }
        .tbody{
            text-align:center;

        }
        .tfoot{
            width: 400px;
            text-align:end;
        }
        .footer{
            margin-top: 40px;
            font-size: 12px;
        }
    </style>
</head>
<body style="position:relative;">
    <header style="text-align: center;">
        <h2 style="text-align:center;margin:0;padding:0;">Livreeo.ma</h2>
        <h5 style="text-align:center;margin:0;"></h5>
        <h5 style="text-align: left;font-weight:bold;padding:1px;">Ticket provisoire : {{date('m/d/Y h:i:s a', time())}}</h5>
        <h5 style="text-align: left;font-weight:bold;padding:1px;">Commande N° : {{$commande->id}}</h5>
        <h5 style="text-align: left;font-weight:bold;padding:1px;">Client N° : {{$commande->belongToUilisateur->id}}</h5>
        <p>--------------------------------------------------------------------------------------------------------------------------------</p>
    </header>

    <main>
        <table class="table table-striped">
            <thead>
                <tr class="padding:14px;">
                    <th class="marginTH">N°</th>
                    <th class="marginTH">Quantite</th>
                    <th class="marginTH">Prix Uni</th>
                    <th class="marginTH">Prix Total</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach($produitsCommande as $produitCommande)
                    <tr>
                        <td class="marginTH">{{$produitCommande->ordre_produit_id}}</td>
                        <td class="marginTH">{{$produitCommande->quantiteOrdre}}</td>
                        <td class="marginTH">{{$produitCommande->prix}}</td>
                        <td class="marginTH">{{$produitCommande->prix * $produitCommande->quantiteOrdre}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="marginTH">--------------------------------</td>
                    <td class="marginTH">--------------------------------</td>
                    <td class="marginTH">--------------------------------</td>
                    <td class="marginTH">--------------------------------</td>
                </tr>
                <tr>
                    <td class="marginTH">Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="marginTH" colSpan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$commande->prix_total . ' DH'}}</td>
                </tr>
            </tfoot>
        </table>

        <p class="footer">
            Rue 1230 Hay ennahda agadir
        </p>
    </main>
    <footer style="position:absolute;bottom:0;margin-top:12%;margin-bottom:0;text-align:center;">
        <img src="images/dashboard/footer.png" style="width:160mm;height:25mm;">
    </footer>

</body>
</html>