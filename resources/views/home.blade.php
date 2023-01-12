@extends('layout.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GIS</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="asset/leaflet/leaflet.css">
	    <script src="asset/leaflet/leaflet.js"></script>
		<script src="asset/geojson/leneng.js" type="text/javascript"></script>
        <style>
        html, body {
			height: 100%;
			width: 100%;
			margin:0;
			padding: 0;
		}
		#map {
			width: 100%;
			height:85%;
		}
		.leaflet-popup-content {
			width:auto !important;
		}
    </style>
    </head>
    <body>
        <!-- <h1 align="center">PETA DESA</h1> -->

		<div id="map"></div>
<script>
	//##############################################//
	// Membuat BaseMap Pada Peta
	//##############################################//
	var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ',
        mbUrl = 'https://tile.openstreetmap.org/{z}/{x}/{y}.png';

var streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr}),
	grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr});
	traffic = L.tileLayer(mbUrl, {id:'mapbox.mapbox-terrain-v2', attribution:mbAttr});
	jalanv8 = L.tileLayer(mbUrl, {id:'mapbox.mapbox-streets-v8', attribution:mbAttr});
	satellite = L.tileLayer(mbUrl, {id:'mapbox.satellite', attribution:mbAttr});

	//##############################################//
	// Mendeklarasikan Peta kedalam Id Map
	//##############################################//
	var map = L.map('map', {
		center: [-8.6993554,116.2569187],
		zoom: 16,
		layers: [ streets]
	});

	//##############################################//
	// Membuat Icon Pada Peta 
	//##############################################//
	var mapIcon = L.Icon.extend({
	    iconSize:     [32, 37]
	});
var masjidIcon = new mapIcon({iconUrl: 'asset/icon/mosquee.png'}),
	rsIcon = new mapIcon({iconUrl: 'asset/icon/hospital-building.png'}),
	// bowoIcon = new mapIcon({iconUrl: 'asset/icon/hiretools.png'}),
	btnIcon = new mapIcon({iconUrl: 'asset/icon/apartment-3.png'}),
	eksIcon = new mapIcon({iconUrl: 'asset/icon/aboriginal.png'}),
	mebelIcon = new mapIcon({iconUrl: 'asset/icon/u-pick_stand.png'}),
	mknIcon = new mapIcon({iconUrl: 'asset/icon/restaurant_chinese.png'}),
	sekolahIcon = new mapIcon({iconUrl: 'asset/icon/school.png'});

	//##############################################//
	// Mendeklarasikan Marker Sekolah dan membuatnya menjadi 
	// Layer Group
	//##############################################//
	var skl1 = L.marker([-8.6935197,116.2179408],{icon:sekolahIcon}).addTo(map).bindPopup('IPDN LOMBOK TENGAH');
	var skl2 = L.marker([-8.7002911,116.2585571],{icon:sekolahIcon}).addTo(map).bindPopup('Pondok Pesantren Sa\'adatuddarain');
	var skl3 = L.marker([-8.7024867,116.2608151],{icon:sekolahIcon}).addTo(map).bindPopup('SDN 1 Leneng');
	var skl4 = L.marker([-8.7028219,116.2584039],{icon:sekolahIcon}).addTo(map).bindPopup('MI NW Leneng');
	var skl5 = L.marker([-8.6991598,116.2658757],{icon:sekolahIcon}).addTo(map).bindPopup('MIN Leneng Lombok Tengah');
	var skl6 = L.marker([-8.699338,116.2626235],{icon:sekolahIcon}).addTo(map).bindPopup('TK Mutiara Hati');
	
	var sekolah = L.layerGroup([skl1,skl2,skl3,skl4,skl5,skl6]);

	//##############################################//
	// Mendeklarasikan Marker Masjid dan membuatnya menjadi 
	// Layer Group
	//##############################################//
	var mj1 = L.marker([-8.7025576,116.260738],{icon: masjidIcon}).addTo(map).bindPopup('Masjid Nurul Islam');
	var mj2 = L.marker([-8.701644,116.2657422],{icon: masjidIcon}).addTo(map).bindPopup('Masjid Agung.<br> Lombok Tengah.');
	var mj3 = L.marker([-8.6969975,116.2549193],{icon: masjidIcon}).addTo(map).bindPopup('Masjid Miftahul Jannah');
	var mj4 = L.marker([-8.696774,116.2467347],{icon: masjidIcon}).addTo(map).bindPopup('Masjid Babussalam Juring');
	var mj5 = L.marker([-8.696774,116.2467347],{icon: masjidIcon}).addTo(map).bindPopup('Masjid Daarul Ma\'arif IPDN NTB');
	var mj6 = L.marker([-8.696774,116.2467347],{icon: masjidIcon}).addTo(map).bindPopup('Masjid al-hidayah btn bermis');

	var masjid = L.layerGroup([mj1,mj2,mj3,mj4,mj5,mj6]);

	//##############################################//
	// Mendeklarasikan Marker mebel dan membuatnya menjadi 
	// Layer Group
	//##############################################//
	var mbl1 = L.marker([-8.7019043,116.2601029],{icon: mebelIcon}).addTo(map).bindPopup('Mebel Murah Hati');
	var mbl2 = L.marker([-8.7019043,116.2601029],{icon: mebelIcon}).addTo(map).bindPopup('UD Meuble Putri');

	var mebel = L.layerGroup([mbl1,mbl2]);

	//##############################################//
	// Mendeklarasikan Marker BTN/Perumahan dan membuatnya menjadi 
	// Layer Group
	//##############################################//
	var btn1 = L.marker([-8.7019043,116.2601029],{icon: btnIcon}).addTo(map).bindPopup('BTN Mandalika Leneng');
	var btn2 = L.marker([-8.6970307,116.2560604],{icon: btnIcon}).addTo(map).bindPopup('Perumahan Permata Klui');

	var btn = L.layerGroup([btn1,btn2]);

	//##############################################//
	// Mendeklarasikan Marker tempat makan dan membuatnya menjadi 
	// Layer Group
	//##############################################//
	var mkn1 = L.marker([-8.7024729,116.264721],{icon: mknIcon}).addTo(map).bindPopup('Lesehan Taliwang Cakra');
	var mkn2 = L.marker([-8.702836,116.2668501],{icon: mknIcon}).addTo(map).bindPopup('Babanana Praya');
	var mkn3 = L.marker([-8.701364,116.2648803],{icon: mknIcon}).addTo(map).bindPopup('Rizky Pizza');
	var mkn4 = L.marker([-8.7018052,116.2646786],{icon: mknIcon}).addTo(map).bindPopup('Mie Rampok Lombok Praya');
	var mkn5 = L.marker([-8.6957293,116.2648083],{icon: mknIcon}).addTo(map).bindPopup('Kedai Makan Hadin');
	var mkn6 = L.marker([-8.6970079,116.2646789],{icon: mknIcon}).addTo(map).bindPopup('Hadin Fresh Meat Resto');
	var mkn7 = L.marker([-8.6957293,116.2648083],{icon: mknIcon}).addTo(map).bindPopup('RUMAH MAKAN HIDAYAH');
	var mkn8 = L.marker([-8.6955895,116.2624477],{icon: mknIcon}).addTo(map).bindPopup('Rumah Makan Ikhtiar');
	var mkn9 = L.marker([-8.6984458,116.2598309],{icon: mknIcon}).addTo(map).bindPopup('Bakso Kelui Leneng (BKELE)');
	var mkn10 = L.marker([-8.7002121,116.261477],{icon: mknIcon}).addTo(map).bindPopup('Bakso Rum');
	var mkn11 = L.marker([-8.7037086,116.2619902],{icon: mknIcon}).addTo(map).bindPopup('Alfamart');
	var mkn12 = L.marker([-8.7038206,116.2629167],{icon: mknIcon}).addTo(map).bindPopup('Indomart');
	var mkn13 = L.marker([-8.6988314,116.2563973],{icon: mknIcon}).addTo(map).bindPopup('Warung de Chantieq');
	var mkn14 = L.marker([-8.6976579,116.2556974],{icon: mknIcon}).addTo(map).bindPopup('Dedi steak house & grill');
	var mkn15 = L.marker([-8.6940773,116.2556119],{icon: mknIcon}).addTo(map).bindPopup('Angkringan SORGA DUNIA');
	var mkn16 = L.marker([-8.7009231,116.26658],{icon: mknIcon}).addTo(map).bindPopup('Tastura cake n bakery');
	
	var makan = L.layerGroup([mkn1,mkn2,mkn3,mkn4,mkn5,mkn6,mkn7,mkn8,mkn9,mkn10,mkn11,mkn12,mkn13,mkn14,mkn15,mkn16]);

	//##############################################//
	// Mendeklarasikan Marker ekspedisi dan membuatnya menjadi 
	// Layer Group
	//##############################################//
	var eks1 = L.marker([-8.699512,116.2639942],{icon: eksIcon}).addTo(map).bindPopup('NINJA XPRESS PRAYA');
	var eks2 = L.marker([-8.701391,116.2651182],{icon: eksIcon}).addTo(map).bindPopup('JNE Express');
	var eks3 = L.marker([-8.701391,116.2651182],{icon: eksIcon}).addTo(map).bindPopup('J&T Express Praya');
	var eks4 = L.marker([-8.6945911,116.2627518],{icon: eksIcon}).addTo(map).bindPopup('SHOPEE EXPRESS Hub Praya');

	var ekspedisi = L.layerGroup([eks1,eks2,eks3,eks4]);

	//##############################################//
	// Mendeklarasikan Marker rumah sakit/klinik dan membuatnya menjadi 
	// Layer Group
	//##############################################//
	var rs1 = L.marker([-8.699499,116.2568819],{icon: rsIcon}).addTo(map).bindPopup('Rumah Sakit Cahaya Medika');
	var rs2 = L.marker([-8.7019811,116.2644009],{icon: rsIcon}).addTo(map).bindPopup('Klinik Medical Center');
	var rs1 = L.marker([-8.6958253,116.252041],{icon: rsIcon}).addTo(map).bindPopup('APOTEK DIANA FARMA');

	kesehatan = L.layerGroup([rs1,rs2,rs3]);

	//##############################################//
	// Mendeklarasikan BaseLayer Pada Map yakni Street
	//##############################################//
	var baseLayers = {
		"Jalan": streets,
		"Hitam Putih": grayscale,
		"Trapik": traffic,
		"Jalanv8": jalanv8,
		"Satellite": satellite,
		};
	//##############################################//
	// Deklarasi untuk memilih Icon yang akan ditampilkan
	//##############################################//
	var overlays = {
		"Masjid": masjid,
		"Sekolah": sekolah,
		"Mebel": mebel,
		"BTN/Perumahan": btn,
		"Rumah Makan/Kuliner": makan,
		"Ekspedisi": ekspedisi,
		"Health": kesehatan,
	};

	//##############################################//
	// Menambah  variabel baselayaer dan overlay kedalam map
	//##############################################//
	L.control.layers(baseLayers, overlays).addTo(map);

	//##############################################//
	// Mengambil data geospesial wilayak kecamatan praya
	//##############################################//
	L.geoJSON([leneng], {
		style: function (feature) {
			return feature.properties && feature.properties.style;
		}
	}).addTo(map);

</script>
    </body>
</html>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
