@extends('adminlte::page')

@section('title', 'Perfil de Empresa')

@section('content_header')
 	<h1>Facturación</h1><hr>
@stop

@section('content')
	<livewire:facturacioncreate />
@stop

@section('adminlte_js')
    <script>
        $('.js-example-basic-multiple').select2();
        let total = 0;
        let productos=[0];
        Livewire.on('usuario', postId => {
        	var o = $("<option/>", {value: postId["id"], text: postId["name"]});
			$('.js-example-basic-multiple').append(o);
			$('.js-example-basic-multiple option[value="' + postId["id"] + '"]').prop('selected',true);
			$('.js-example-basic-multiple').trigger('change');
		});
		Livewire.on('producto', product => {
			if(productos.includes( product['id'] )){
				let cantidad=parseInt($('#item'+product['id']+'> td input.cantidad').val())+1;
				$('#item'+product['id']+'> td input.cantidad').val(cantidad);
				cambiar(product['id']);
			}else{
				if(product['oferta']){
					$("#addproductos").before("<tr id='item"+product['id']+"'><td><input type='hidden' name='producto_id[]' value='"+product['id']+"' />"+product['codigo']+"</td><td>"+product['nombre']+"</td><td><input type='number' class='form-control cantidad' name='cantidad[]' oninput='cambiar("+product['id']+")' min='1' max='"+product['stock']+"' value='1' /></td><td class='precio'><input type='number' name='precio[]' class='form-control' value='"+product['oferta']+"' readonly></td><td class='sumar'>"+product['oferta']+"</td><td><button class='btn btn-danger' onclick='eliminar(item"+product['id']+")'><i class='fas fa-trash-alt'></i></button></td></tr>");
				}else{
					$("#addproductos").before("<tr id='item"+product['id']+"'><td><input type='hidden' name='producto_id[]' value='"+product['id']+"'>"+product['codigo']+"</td><td>"+product['nombre']+"</td><td><input type='number' class='form-control cantidad' name='cantidad[]' oninput='cambiar("+product['id']+")' min='1' max='"+product['stock']+"' value='1' /></td><td class='precio'><input type='number' class='form-control' name='precio[]' value='"+product['precio']+"' readonly></td><td class='sumar'>"+product['precio']+"</td><td><button class='btn btn-danger' onclick='eliminar(item"+product['id']+")'><i class='fas fa-trash-alt'></i></button></td></tr>");
				}
        		productos.push(product['id']);
			}
        	
        	let sumar=0;
			$(".sumar").each(function(){
		      	sumar += parseInt($(this).text());
		    });
		  	$('#subtotal').text(sumar+' Gs.');
		  	let porcentaje=sumar-((sumar*parseInt($('#descuento').val()))/100);
		  	$('#total').text(porcentaje+' Gs.');
		});

		function eliminar(data) {
			$(data).remove();
			let sumar=0;
			$(".sumar").each(function(){
		      	sumar += parseInt($(this).text());
		    });
			$('#subtotal').text(sumar+' Gs.');
			let porcentaje=sumar-((sumar*parseInt($('#descuento').val()))/100);
		  	$('#total').text(porcentaje+' Gs.')
		}

		function cambiar(e){
			let cantidad=$('#item'+e+'> td input.cantidad').val();
			let precio=$('#item'+e+'> td.precio > input').val();
			let calculo=cantidad*precio;
		  	$('#item'+e+'> td.sumar').text(calculo);

			let sumar=0;
			$(".sumar").each(function(){
		      	sumar += parseInt($(this).text());
		    });
		  	$('#subtotal').text(sumar+' Gs.');
		  	let porcentaje=sumar-((sumar*parseInt($('#descuento').val()))/100);
		  	$('#total').text(porcentaje+' Gs.')

		}


		

    </script>

@stop