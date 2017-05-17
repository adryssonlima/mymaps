var map = new ol.Map({
    target: 'map',
    layers: [
      new ol.layer.Tile({
        source: new ol.source.OSM()
      })
    ],
    view: new ol.View({
      center: ol.proj.fromLonLat([-51.28, -15.16]),
      zoom: 4
    })
});

var selectEstados = new Vue({
    el: '#estados',
    data: {
        options: []
    }
});

var selectMunicipios = new Vue({
    el: '#municipios',
    data: {
        options: []
    }
});

$(document).ready(function(){
    let geonameId = 3469034; //referência geografica do BRASIL
    reqAjax(geonameId, selectEstados);
});

$('#estados').change(function(){
    let geonameId = $(this).val();
    let lng = parseFloat($('option:selected', this).attr('lng'));
    let lat = parseFloat($('option:selected', this).attr('lat'));
    let fcode = $('option:selected', this).attr('fcode');
    setZoom(fcode);
    let view = map.getView();
    view.setCenter(ol.proj.fromLonLat([lng, lat]));
    reqAjax(geonameId, selectMunicipios);
    $('#municipios').removeClass('hidden');
});

$('#municipios').click(function(){
    let geonameId = $(this).val();
    let lng = parseFloat($('option:selected', this).attr('lng'));
    let lat = parseFloat($('option:selected', this).attr('lat'));
    let fcode = $('option:selected', this).attr('fcode');
    setZoom(fcode);
    let view = map.getView();
    view.setCenter(ol.proj.fromLonLat([lng, lat]));
});

function setZoom(fcode) {
    let view = map.getView();
    switch (fcode) {
        case 'ADM1': view.setZoom(7);
            break;
        case 'ADM2': view.setZoom(11);
            break;
        default: view.setZoom(7);
    }
}

function reqAjax(geonameId, vueObj) {
    $.post('http://www.geonames.org/childrenJSON?geonameId='+geonameId, function(data, status){
        vueObj.options = data['geonames'];
    });
}
