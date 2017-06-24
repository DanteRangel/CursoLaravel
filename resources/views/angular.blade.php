@extends('layouts.app')
@section('content')
<div class="container" ng-app="prueba">
	<div ng-controller="ctrl1" ng-init="getCar();">
		<div class="row" >
			<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
				<div class="form-group">
					<label for="" ng-bind="nombre"></label>
					<input type="text" ng-model="nombre" ng-keyup="buscar();" name="nombre" class="form-control">
				</div>	
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
				<table class="table table-responsive">
					<thead>
						<th>Producto</th>
						<th>Precio</th>
						<th>Total</th>
						<th>Acción</th>
					</thead>
					<tbody>
						<tr ng-repeat="pro in carrito">
							<td><span ng-bind="pro.id"></span></td>
							<td><span ng-bind="pro.precio"></span></td>
							<td><span ng-bind="pro.total"></span></td>
							<td><span class="btn btn-danger fa fa-trash" ng-click="deleteItem(pro.id)" ></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
				<div class="row text-left">
					<h4>Totales <% totales %></h4>
					<h4>Numero Productos <% no_Productos %></h4>
				</div>
			</div>
		
			
		</div>
		<div class="row" ng-show="mostrarMensaje">
			<h1>No se encuentra el producto "<span ng-bind="nombre"></span>" </h1>
			
		</div>
		<div class="row" ng-show="mostrarTabla">
			<table class="table table-responsive">
				<thead>
					<th></th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Precio</th>
					<th>Acción</th>
				</thead>
				<tbody>
					<tr ng-repeat="producto in productos">
						<td width="10px"><img width="40px" ng-src="<% producto.img %>" alt=""></td>
						<td><span ng-bind="producto.nombre"></span></td>
						<td><span ng-bind="producto.descripcion"></span></td>
						<td><span ng-bind="producto.precio"></span></td>
						<td><span class="btn btn-info fa fa-cart-plus" ng-click="agregarCarrito(producto.id)"></span></td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</div>
</div>
@endsection

@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script>
    	var app=angular.module('prueba',[],function($interpolateProvider){
    		$interpolateProvider.startSymbol('<%');
    		$interpolateProvider.endSymbol('%>');

    	});


    	app.controller('ctrl1',function($scope,$http){
    		$
    		$scope.buscar=function(){
    			$http.post('{{url('/getProductos')}}',{'nombre':$scope.nombre,'descripcion':$scope.nombre,'_token':'{{csrf_token()}}'}).then(function(response){
    					if(response.status==200){
    						if(response.data.length>0){
    							$scope.mostrarTabla=true;
    							$scope.mostrarMensaje=false;
    							$scope.productos=response.data;
    							console.log(response.data);
    						}else{
    							$scope.mostrarTabla=false;
								$scope.mostrarMensaje=true;
								$scope.productos=[];
    						}
    					}

    			});

    		};
   		   $scope.getCar=function(){
    			
    			
    			$http.post('/getCar',{'_token':'{{csrf_token()}}'}).then(function(response){
    				console.log(response);
    				if(response.status==200){
    					
    					$scope.carrito=response.data.carrito;
    					console.log($scope.carrito);
    					$scope.totales=response.data.totales;
    					$scope.no_Productos=response.data.no_Productos;
    				}
    			});
    		};
    		$scope.agregarCarrito=function(id){
    			carrito=$scope.carrito;
    			
    			$producto=$scope.productos.filter(p=> p.id==id)[0];
    			$http.post('/addCar',{'id':id,'producto':$producto,'_token':'{{csrf_token()}}'}).then(function(response){
    				console.log(response);
    				if(response.status==200){
    					
    					$scope.carrito=response.data.carrito;
    					console.log($scope.carrito);
    					$scope.totales=response.data.totales;
    					$scope.no_Productos=response.data.no_Productos;
    				}
    			});
    		};
    		$scope.deleteItem=function(id){
    			$http.post('/deleteItem',{'id':id,'_token':'{{csrf_token()}}'}).then(function(response){
    				console.log(response);
    				if(response.status==200){
    					
    					$scope.carrito=response.data.carrito;
    					console.log($scope.carrito);
    					$scope.totales=response.data.totales;
    					$scope.no_Productos=response.data.no_Productos;
    				}
    			});	
    		}

    	});

    </script>
@endsection
