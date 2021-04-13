<div>
    <script>
    	$(".mensajes p span").text('{{ $contador ?? '' }}');
    	$(".servicios p span").text('{{ $contadorservicios ?? '' }}');
    	$(".productos p span").text('{{ $contadorproductos ?? '' }}');
    </script>
</div>
