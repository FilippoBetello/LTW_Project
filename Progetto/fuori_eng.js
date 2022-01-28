/* Variabili per indicare i vari marker da inserire all'interno della mappa
sono presenti anche i livelli della mappa (3) e i diversi stili di icona del marker a seconda del tipo di luogo selezionato*/ 


var greenIcon = L.icon({
    iconUrl: 'Markers/green_marker.png',
    iconSize:     [55, 45], // size of the icon
  });


  var fa = L.marker([42.628038153556766, 12.113547529686159],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt1();\"><b style= font-size:18px>Civita di Bagnoregio</b></a> <br>Town perched on a mountain accessible only via a bridge");
  var fb = L.marker([42.49160509103441, 12.247569142214466],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt2();\"><b style= font-size:18px>Parco dei Mostri</b></a> <br>Place surrounded by nature <br> distinguished by fairytale works ..");
  var fc = L.marker([41.68187904711867, 13.582278497098475],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt3();\"><b style= font-size:18px>Isola del Liri</b></a> <br>In the province of Frosinone there is<br> this small village with a natural waterfall");
  var fd = L.marker([41.75012535380618, 12.70664845383438],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt4();\"><b style= font-size:18px>Monte cavo</b></a> <br>Scenic place where you can see both lakes");
  var fe = L.marker([42.42603019096815, 11.467524902865234],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt5();\"><b style= font-size:18px>Giardino dei Tarocchi</b></a> <br>Garden characterized by sculptures inspired by Parc Güell");
  var ff = L.marker([42.5672374355392, 12.168106332233437],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt6();\"><b style= font-size:18px>Sant'Angelo</b></a> <br>If it is defined \"land of fairy tales \" there will be a reason ..");
  var fg = L.marker([42.18355868029044, 12.37948896476511],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt7();\"><b style= font-size:18px>Cascate del Monte Gelato</b></a> <br>It is possible to take a walk <br> surrounded by nature ..");
//var fh = L.marker([41.96671466551788, 12.440621944284922],{icon: greenIcon}).bindPopup("<a href=\"javascript:bt8();\"><b style= font-size:18px>Casa di Michi</b></a> <br>Un luogo avvolto dal Mistero..");



var fuori = L.layerGroup([fa, fb, fc, fe, fd, ff, fg]);


var map = L.map('map', {
  center: [42.2120532, 12.5713144],
  zoom: 9,
  layers: [fuori]
});
var url = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var attrib = 'Map data (c)OpenStreetMap contributors';
var osm = new L.TileLayer(url, {minZoom: 7, maxZoom: 100, attribution: attrib});
map.addLayer(osm);

var redIcon = L.icon({
  iconUrl: 'Markers/red_marker.png',
  iconSize:     [50, 45], // size of the icon
});


var la = L.marker([41.92493367646735, 12.502503411320902],{icon: redIcon}).bindPopup("<b style= font-size:18px>Tempo di Flora</b></a> <br>Inside Villa Ada there is this very particular building");
var lb = L.marker([41.897751155626736, 12.472300988693377],{icon: redIcon}).bindPopup("<b style= font-size:18px>Statue parlanti</b></a> <br>A group of six statues where the Roman <br> post anonymous messages");
var lc = L.marker([41.8941874151718, 12.490026082484055],{icon: redIcon}).bindPopup("<b style= font-size:18px>Murales Totti</b></a> <br>In the Monti district there is this <br> mural dedicated to the footballer Francesco Totti");
var ld = L.marker([41.925500957264696, 12.470138868992692],{icon: redIcon}).bindPopup("<b style= font-size:18px>Piccola Londra</b></a> <br>A street in the Flaminio district <br> that takes us to England");
var le = L.marker([41.89438706434553, 12.471922097827573],{icon: redIcon}).bindPopup("<b style= font-size:18px>Galleria Spada</b></a> <br>A building where there is a famous false perspective by Borromini");
var lf = L.marker([41.911343414934684, 12.475984051798903],{icon: redIcon}).bindPopup("<b style= font-size:18px>Targa moti Carbonari</b></a> <br>On one side of Piazza del Popolo there is this commemorative plaque");
var lg = L.marker([41.85592662816318, 12.498727912635921],{icon: redIcon}).bindPopup("<b style= font-size:18px>Murales Tor Marancia</b></a> <br>A series of murals on the buildings of the Tor Marancia district");

var luoghi=L.layerGroup([la, lb, lc, ld, le, lf, lg]);






var va = L.marker([41.91265651179316, 12.447579628515268]).bindPopup("<b style= font-size:18px>Piazzale Socrate</b></a> <br> Panoramic square from which to admire Rome");
var vb = L.marker([41.909080299413844, 12.440857885386148]).bindPopup("<b style= font-size:18px>Monte Ciocci</b></a> <br>Clearance where you can enjoy a wonderful view");
var vc = L.marker([41.89120685319619, 12.442205826663319]).bindPopup("<b style= font-size:18px>Via Piccolomini</b></a> <br>Away with a very special optical effect ..");
var vd = L.marker([41.922186881129676, 12.452325715131176]).bindPopup("<b style= font-size:18px>Lo Zodiaco</b></a> <br>An evocative place that dominates Rome<br> in all its splendor from the top of Monte Mario");
var ve = L.marker([41.891696705140426, 12.461516529849145]).bindPopup("<b style= font-size:18px>Il Gianicolo</b></a> <br>At the top of the Janiculum you can enjoy this extraordinary view");
var vf = L.marker([41.932536, 12.446817]).bindPopup("<b>Riserva Monte Mario</b></a> <br>A green lung in the center of Rome");
var vg = L.marker([41.900160962976884, 12.451785230366042]).bindPopup("<a style= font-size:18px><b>Passeggiata del Gelsomino</b></a> <br>A suggestive walk");
 
var viste = L.layerGroup([va,vb,vc,vd,ve, vf, vg]);



var overlays = {
    "Panoramic spots" : viste,
    "Unusual places" : luoghi,
    "Outside Rome" : fuori
}

L.control.layers(null,overlays).addTo(map);



/*Funzioni necessarie ad aprire il popup relativo al marker selezionato --> "trova sulla mappa" presente nei file .php*/

    function trova1(){
        fa.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function trova2(){
      fb.openPopup();
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    function trova3(){
      fc.openPopup();
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    function trova4(){
      fd.openPopup();
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    function trova5(){
      fe.openPopup();
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    function trova6(){
        ff.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }

      function trova7(){
        fg.openPopup();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }

  












//navbar


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
