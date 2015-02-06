
var app =  angular.module('todoApp',[],function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

	app.controller('todoController', function($scope,$http){
 
			$scope.name = "Coder01";

			$scope.init= function(){
					$http.get('/api/todos').
					  success(function(data, status, headers, config) {
					    $scope.todos=data;

					  });
			}

			$scope.addTodo =  function(){
	
                     $http.post('/api/todos', { 
                		title : $scope.todo.title,
                		done:$scope.todo.done
            		 }).success(function() {
                        $scope.todos.push(angular.copy($scope.todo));
                        $scope.todo='';
                    });;
			};



			$scope.init();
 
	});