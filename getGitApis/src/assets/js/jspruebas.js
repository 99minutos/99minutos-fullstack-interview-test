function find() {
    var id = $('#prodId').val();
    $.getJSON(uri + '/' + id)
        .done(function (data) {
            $('#product').text(formatItem(data));
        })
        .fail(function (jqXHR, textStatus, err) {
            $('#product').text('Error: ' + err);
        });
}
var uri = '../api/firstRequest';
function allins() {
    $.getJSON(uri)
                  .done(function (data) {
                      // On success, 'data' contains a list of products.
                      $.each(data, function (key, item) {
                          // Add a list item for the product.
                          $('<li>', { text: formatItem(item) }).appendTo($('#products'));
                      });
                  });
}

function formatItem(item) {
    return item.Name + ': $' + item.Price;
}



        function DameNumPedido() {
            $('#MyNumPedido').modal('show');
            document.getElementById('mynumPedido').innerText = '58';

        }
function GuardameCantidad() {
    // var cantidad = document.getElementById('').value;
    var CantidadMetida = document.getElementById('txtCantidad').value;
    if (CantidadMetida != null) {
        if (CantidadMetida != '') {
            if (CantidadMetida != '0') {
                var Productos = document.getElementById('CantProd').value;
                var spliti = Productos.split('_');
                if (spliti.length > 0) {
                    for (var i = 0; i < spliti.length; i++) {
                        if (intproducto == spliti[i].substring(0, 1)) {
                            document.getElementById('lstProds').value += '_' + spliti[i] + '|' + CantidadMetida;
                        }
                    }
                }
            }
        }
    }

}


function QuitoLista(cual) {
    document.getElementById(cual).checked = false;
    var misProductos = document.getElementById('lstProds').value.split('_');
    var cantidades = document.getElementById('CantProd').value.split('_');

    var aquitar = cual.substring(6, cual.length)
    document.getElementById('lstProds').value = '';
    document.getElementById('CantProd').value = '';
    // if (misProductos.length > 2 && cantidades.length > 2) {
    for (var f = 0; f < misProductos.length; f++) {
        var identificador = misProductos[f].split('|');

        if (identificador != '') {
            if (identificador[2] != aquitar)
                document.getElementById('lstProds').value += '_' + misProductos[f];
            else if (identificador[4] > 1) {
                identificador[4]--;
                document.getElementById('lstProds').value += '_' + identificador[0] + '|' + identificador[1] + '|' + identificador[2] + '|' + identificador[3] + '|' + identificador[4];
            }
        }
    }
    for (var t = 0; t < cantidades.length; t++) {
        var ident = cantidades[t].split('|');
        if (ident[2] != aquitar && ident != '') {
            document.getElementById('CantProd').value += '_' + cantidades[t];
        }
    }
    if (document.getElementById('lstProds').value != '')
        MiOrden();
        //}
    else
        $('#MyModalPedido').modal('hide');

}

function MiOrden() {

    var Orden = document.getElementById('lstProds').value;
    if (Orden.length > 0) {
        $('#MyModalPedido').modal('show');
        var OrdenSplit = Orden.split('_');
        var div = '';
        var htm = '';
        var capa = '';
        div = document.getElementById("DivPath");
        div.innerHTML = '';
        capa = document.createElement("div");
        htm = '<table><tr><td><b>Esta es tu Orden: </b></td></tr></table><p></p>';
        htm += '<table><tr><td><b>Cantidad &nbsp;&nbsp;&nbsp;</b></td><td><b>Descripción &nbsp;&nbsp;&nbsp;</b></td><td><b>Precio &nbsp;&nbsp;&nbsp;</b></td><td> <b>Quitar</b></td></tr>';
        for (var j = 0; j < OrdenSplit.length; j++) {
            if (OrdenSplit[j] != '') {
                var productoSplit = OrdenSplit[j].split('|');



                htm += ' <tr><td>' + productoSplit[4] + '&nbsp;&nbsp;&nbsp;</td><td>' + productoSplit[1] + '&nbsp;&nbsp;&nbsp;</td> <td>' + productoSplit[3] + '&nbsp;&nbsp;&nbsp;</td><td><input type="checkbox" id="Chckid' + productoSplit[2] + '" checked class="price"  onclick="javascript:QuitoLista(this.id)" /></td></tr>';
                //htm += ' <tr><td><b>Duración Aprox.</b>' + duration + ' <b> min</b></td></tr>';                       
                //htm += '  <tr><td><b>Horario Salida:</b></td><td><b>Horario Regreso:</b></td></tr>';
            }

        }
        htm += '</table>';
        capa.innerHTML = htm;
        div.appendChild(capa);
    }
    else
        alert('debes seleccionar un producto');
}

$('#bebidasButon').click(function () {
    $('#myModalInfo').modal('show');
});

var intproducto = 0;
function abreCant() {

    
        $('#myModalUpdate').modal('show');
     

}

//window.onload = function () {
           
//    var bandera=document.getElementById('<%=HFFlagins.ClientID%>').value;
//    switch (bandera)
//    {
//        case ('1'):
//            $('#myModalCodigo').modal('show');
//            break;
//    }
//}
