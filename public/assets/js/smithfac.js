    //****** Calcular Monto Factura ********//
//****** Tanto para clientes como proveedores ********//
    function calcularMontoR(){
        var iva = $('#iva').val();
        var porcentajeRetencion = $('#porcentajeRetencion').val();
        var monto_retencion = (iva * porcentajeRetencion);
        $('#monto_retencion').val(monto_retencion);
    } 


    function calcularMonto(){
        var monto = $('#monto').val();
        var porcentajeIVA = $('#porcentajeIVA').val();   

        var iva = (monto * porcentajeIVA);
        var monto_total = parseFloat(monto) + parseFloat(iva);


        $('#iva').val(iva);
        $('#monto_total').val(monto_total);

        if( $('#checkRetencion').is(':checked') ) {
            var porcentajeRetencion = $('#porcentajeRetencion').val();
            var monto_retencion = (iva * porcentajeRetencion);
            $('#monto_retencion').val(monto_retencion);
        }

        $('#exento').val('');
        $('#iva2').val('');
        $('#monto_total2').val('');


    }







    function LimpiarForm(){
        $('#cliente_id').val('');
        $('#proveedor_id').val('');
        $('#nombre').val('');
        $('#rif').val('');
        $('#rifProveedor').val('');
        $('#num_fact').val('');
        $('#num_control').val('');
        $('#fecha_fact').val('');
        $('#datepicker').val('');
        $('#fecha_apli_compra').val('');
        $('#datepicker2').val('');
        $('#monto').val('');
        $('#iva').val('');
        $('#exento').val('');
        $('#monto_total').val(''); 
        $('#cod_retencion').val(''); 
        $('#monto_retencion').val('');
        $('#fecha_apli_retencion').val(''); 
        $('#datepicker3').val('');
        $('#cod_ncredito').val('');
        $('#monto_ncredito').val('');
        $('#iva_ncredito').val('');
        $('#total_ncredito').val('');
        $('#cod_ndebito').val('');
        $('#monto_ndebito').val('');  
        $('#iva_ndebito').val('');
        $('#total_ndebito').val(''); 
    }



    function CheckExento(){
                if( $('#checkExento').is(':checked') ) {
                    $('#exento').show();
                    $('#LblExcento').show();
                    $('#BttExento').show();
                } else {
                    $('#exento').val('');
                    $('#exento').hide('');
                    $('#LblExcento').hide();
                    $('#BttExento').hide();
                    $('#monto').val('');
                    $('#iva').val('');
                    $('#monto_total').val('');
                    $('#iva2').val('');
                    $('#monto_total2').val('');
                }
            }



        function CheckRetencion(){
                if( $('#checkRetencion').is(':checked') ) {
                    $('#FieldRetenciones').show();
                } else {
                    $('#FieldRetenciones').hide();
                    $('#cod_retencion').val('');
                    $('#fecha_apli_retencion').val('');
                    $('#datepicker3').val('');
                    $('#monto_retencion').val('');
                    $('#porcentajeRetencion').val('0');
                }
            }






        function cambiarFormVentas(){
            var opcionFormVenta = $('#opcionFormVenta').val();

            if (opcionFormVenta == 'venta') {
                LimpiarForm();
                $('#legend_fact').show();
                $('#legend_ncredito').hide();
                $('#legend_ndebito').hide();

                $('#num_factlbl').show();
                $('#ncreditolbl').hide();
                $('#ndebitolbl').hide();

                $('#num_fact').show();
                $('#cod_ncredito').hide();
                $('#cod_ndebito').hide();

                $('#legend_monto_fact').show();
                $('#legend_monto_ncredito').hide();
                $('#legend_monto_ndebito').hide();

                $('#bttFactura').show();
                $('#bttNC').hide();
                $('#bttND').hide();

                $('#transaccion').val('venta');


            }else if (opcionFormVenta == 'ncredito_venta') {
                LimpiarForm();
                $('#legend_fact').hide();
                $('#legend_ncredito').show();
                $('#legend_ndebito').hide();

                $('#num_factlbl').hide();
                $('#ncreditolbl').show();
                $('#ndebitolbl').hide();

                $('#num_fact').hide();
                $('#cod_ncredito').show();
                $('#cod_ndebito').hide();

                $('#legend_monto_fact').hide();
                $('#legend_monto_ncredito').show();
                $('#legend_monto_ndebito').hide();

                $('#bttFactura').hide();
                $('#bttNC').show();
                $('#bttND').hide();

                $('#transaccion').val('ncredito_venta');

            }else if (opcionFormVenta == 'ndebito_venta') {
                LimpiarForm();
                $('#legend_fact').hide();
                $('#legend_ncredito').hide();
                $('#legend_ndebito').show();

                $('#num_factlbl').hide();
                $('#ncreditolbl').hide();
                $('#ndebitolbl').show();

                $('#num_fact').hide();
                $('#cod_ncredito').hide();
                $('#cod_ndebito').show();

                $('#legend_monto_fact').hide();
                $('#legend_monto_ncredito').hide();
                $('#legend_monto_ndebito').show();

                $('#bttFactura').hide();
                $('#bttNC').hide();
                $('#bttND').show();

                $('#transaccion').val('ndebito_venta');

            }

        }









        function cambiarFormCompras(){
            var opcionFormCompra = $('#opcionFormCompra').val();

            if (opcionFormCompra == 'compra') {
                LimpiarForm();
                $('#legend_fact').show();
                $('#legend_ncredito').hide();
                $('#legend_ndebito').hide();

                $('#num_factlbl').show();
                $('#ncreditolbl').hide();
                $('#ndebitolbl').hide();

                $('#num_fact').show();
                $('#cod_ncredito').hide();
                $('#cod_ndebito').hide();

                $('#legend_monto_fact').show();
                $('#legend_monto_ncredito').hide();
                $('#legend_monto_ndebito').hide();

                $('#bttAgregarFactura').show();
                $('#bttAgregarNC').hide();
                $('#bttAgregarND').hide();

                $('#transaccion').val('compra');


                $('#fecha_apli_compra').show();
                $('#fecha_apli_lbl').show();

                $('#fecha_fact').show();
                $('#fecha_fact_lbl').show();
                $('#fecha_nota_lbl').hide();

            }else if (opcionFormCompra == 'ncredito_compra') {
                LimpiarForm();
                $('#legend_fact').hide();
                $('#legend_ncredito').show();
                $('#legend_ndebito').hide();

                $('#num_factlbl').hide();
                $('#ncreditolbl').show();
                $('#ndebitolbl').hide();

                $('#num_fact').hide();
                $('#cod_ncredito').show();
                $('#cod_ndebito').hide();

                $('#legend_monto_fact').hide();
                $('#legend_monto_ncredito').show();
                $('#legend_monto_ndebito').hide();

                $('#bttAgregarFactura').hide();
                $('#bttAgregarNC').show();
                $('#bttAgregarND').hide();

                $('#transaccion').val('ncredito_compra');

                $('#datepicker').hide();
                $('#fecha_fact_lbl').hide();

                $('#fecha_apli_lbl').hide();
                $('#fecha_nota_lbl').show();
                

                

            }else if (opcionFormCompra == 'ndebito_compra') {
                LimpiarForm();
                $('#legend_fact').hide();
                $('#legend_ncredito').hide();
                $('#legend_ndebito').show();

                $('#num_factlbl').hide();
                $('#ncreditolbl').hide();
                $('#ndebitolbl').show();

                $('#num_fact').hide();
                $('#cod_ncredito').hide();
                $('#cod_ndebito').show();

                $('#legend_monto_fact').hide();
                $('#legend_monto_ncredito').hide();
                $('#legend_monto_ndebito').show();

                $('#bttAgregarFactura').hide();
                $('#bttAgregarNC').hide();
                $('#bttAgregarND').show();

                $('#transaccion').val('ndebito_compra');

                $('#datepicker').hide();
                $('#fecha_fact_lbl').hide();

                $('#fecha_apli_lbl').hide();
                $('#fecha_nota_lbl').show();


            }

        }





