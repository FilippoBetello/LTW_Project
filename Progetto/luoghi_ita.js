/* Variabili per indicare i vari marker da inserire all'interno della mappa
sono presenti anche i livelli della mappa (3) e i diversi stili di icona del marker a seconda del tipo di luogo selezionato*/ 



var redIcon = L.icon({
    iconUrl: 'Markers/red_marker.png',
    iconSize:     [50, 45], // size of the icon
  });
  
  
  var la = L.marker([41.92493367646735, 12.502503411320902],{icon: redIcon}).bindPopup("<a href=\"javascript:bt2();\"><b style= font-size:18px>Tempo di Flora</b></a> <br>All'interno di Villa Ada si trova questa<br> costruzione molto particolare");
  var lb = L.marker([41.897751155626736, 12.472300988693377],{icon: redIcon}).bindPopup("<a href=\"javascript:bt1();\"><b style= font-size:18px>Statue parlanti</b></a> <br>Un gruppo di sei statue dove i <br> romani affiggono messaggi anonimi");
  var lc = L.marker([41.8941874151718, 12.490026082484055],{icon: redIcon}).bindPopup("<a href=\"javascript:bt3();\"><b style= font-size:18px>Murales Totti</b></a> <br>Nel quartiere Monti è presente questo<br> murales dedicato al calciatore Francesco Totti");
  var ld = L.marker([41.925500957264696, 12.470138868992692],{icon: redIcon}).bindPopup("<a href=\"javascript:bt4();\"><b style= font-size:18px>Piccola Londra</b></a> <br>Una via nel quartiere Flaminio<br> che ci porta in Inghilterra");
  var le = L.marker([41.89438706434553, 12.471922097827573],{icon: redIcon}).bindPopup("<a href=\"javascript:bt5();\"><b style= font-size:18px>Galleria Spada</b></a> <br>Un palazzo dove è presente una <br> celebre falsa prospettiva del Borromini");
  var lf = L.marker([41.911343414934684, 12.475984051798903],{icon: redIcon}).bindPopup("<a href=\"javascript:bt6();\"><b style= font-size:18px>Targa moti Carbonari</b></a> <br>Su un lato di Piazza del Popolo è presente<br> questa targa commemorativa");
  var lg = L.marker([41.85592662816318, 12.498727912635921],{icon: redIcon}).bindPopup("<a href=\"javascript:bt7();\"><b style= font-size:18px>Murales Tor Marancia</b></a> <br>Una serie di murales sui palazzi<br> del quartiere di Tor Marancia");
  
  
  var luoghi=L.layerGroup([la, lb, lc, ld, le, lf, lg]);


  var map = L.map('map', {
    center: [41.9120532, 12.4713144],
    zoom: 13,
    layers: [luoghi]
  });
  var url = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
  var attrib = 'Map data (c)OpenStreetMap contributors';
  var osm = new L.TileLayer(url, {minZoom: 7, maxZoom: 100, attribution: attrib});
  map.addLayer(osm);
  
  var redIcon = L.icon({
    iconUrl: 'Markers/red_marker.png',
    iconSize:     [50, 45], // size of the icon
  });


  var va = L.marker([41.91265651179316, 12.447579628515268]).bindPopup("<a style= font-size:18px><b>Piazzale Socrate</b></a> <br> Piazzale panoramico da cui ammirare Roma");
  var vb = L.marker([41.909080299413844, 12.440857885386148]).bindPopup("<a style= font-size:18px><b>Monte Ciocci</b></a> <br> Slargo dove si gode una vista meravigliosa");
  var vc = L.marker([41.89120685319619, 12.442205826663319]).bindPopup("<a style= font-size:18px ><b>Via Piccolomini</b></a> <br>Via con un effetto ottico molto particolare..");
  var vd = L.marker([41.922186881129676, 12.452325715131176]).bindPopup("<a style= font-size:18px ><b>Lo Zodiaco</b></a> <br>Un luogo suggestivo che domina Roma in <br> tutto il suo splendore dalla cima di Monte Mario");
  var ve = L.marker([41.891696705140426, 12.461516529849145]).bindPopup("<a style= font-size:18px><b>Il Gianicolo</b></a> <br>In cima al Gianicolo si gode di questa vista strordinaria");
  var vf = L.marker([41.932536, 12.446817]).bindPopup("<b>Riserva Monte Mario</b></a> <br>Un polmone verde in mezzo a Roma");
  var vg = L.marker([41.900160962976884, 12.451785230366042]).bindPopup("<a style= font-size:18px><b>Passeggiata del Gelsomino</b></a> <br>Una passeggiata suggestiva");
 
  var viste = L.layerGroup([va,vb,vc,vd,ve, vf, vg]);

  
  var greenIcon = L.icon({
    iconUrl: 'Markers/green_marker.png',
    iconSize:     [55, 45], // size of the icon
  });
  
  
  var fa = L.marker([42.628038153556766, 12.113547529686159],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Civita di Bagnoregio</b></a> <br>Cittadina arroccata su un monte accessibile solo tramite un ponte");
  var fb = L.marker([42.49160509103441, 12.247569142214466],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Parco dei Mostri</b></a> <br>Luogo immerso nella natura<br> contraddistinto da opere fiabesche..");
  var fc = L.marker([41.68187904711867, 13.582278497098475],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Isola del Liri</b></a> <br>In provincia di Frosinone è presente questo<br> piccolo paese con una cascata naturale");
  var fd = L.marker([41.75012535380618, 12.70664845383438],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Monte cavo</b></a> <br>Luogo panoramico dove è possibile vedere entrambi i laghi");
  var fe = L.marker([42.42603019096815, 11.467524902865234],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Giardino dei Tarocchi</b></a> <br>Giardino contraddistinto da sculture ispirate al Parc Güell");
  var ff = L.marker([42.5672374355392, 12.168106332233437],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Sant'Angelo</b></a> <br>Se è definito \"paese delle fiabe\"<br> un motivo ci sarà..");
  var fg = L.marker([42.18355868029044, 12.37948896476511],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Cascate del Monte Gelato</b></a> <br>È possibile fare una passeggiata<br> immersi nella natura..");
  //var fh = L.marker([41.96671466551788, 12.440621944284922],{icon: greenIcon}).bindPopup("<b style= font-size:18px>Casa di Michi</b></a> <br>Un luogo avvolto dal Mistero..");
  
  
  
  var fuori = L.layerGroup([fa, fb, fc, fe, fd, ff, fg]);
  
  
  
  var overlays = {
      "Le viste" : viste,
      "Luoghi Insoliti" : luoghi,
      "Fuori Roma" : fuori
  }
  
  L.control.layers(null,overlays).addTo(map);
  
  
  /*Funzioni necessarie ad aprire il popup relativo al marker selezionato --> "trova sulla mappa" presente nei file .php*/
  
  
      function trova1(){
          lb.openPopup();
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
      }
  
      function trova2(){
        la.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
  
      function trova3(){
        lc.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
  
      function trova4(){
        ld.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
  
      function trova5(){
        le.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
  
      function trova6(){
        lf.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }

      function trova7(){
        lg.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }


  
     
  
  
  
  
  
  
  
  
  
  
  
  
//login



function signin(){
  var x = document.getElementById("login");
  var y = document.getElementById("signin");
  var z = document.getElementById("btn");
  x.style.left = "-415px";
  y.style.left = "15px";
  z.style.left = "110px";
  document.getElementById("btnlog").style.color = "black";
  document.getElementById("btnsig").style.color = "white";
}

function login(){
  var x = document.getElementById("login");
  var y = document.getElementById("signin");
  var z = document.getElementById("btn");
  x.style.left = "15px";
  y.style.left = "415px"
  z.style.left = "0px";
  document.getElementById("btnsig").style.color = "black";
  document.getElementById("btnlog").style.color = "white";
}
