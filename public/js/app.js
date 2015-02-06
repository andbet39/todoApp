var app = angular.module('todoApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('todoController', function($scope, $http) {

	$scope.todos = [];

	$scope.init = function() {
		$http.get('/api/todos').
		success(function(data, status, headers, config) {
			$scope.todos = data;
		});
	}

	$scope.addTodo = function() {

		$http.post('/api/todos', {
			title: $scope.todo.title,
			done: $scope.todo.done
		}).success(function(data, status, headers, config) {
			$scope.todos.push(data);
			$scope.todo = '';
		});
	};

	$scope.updateTodo = function(todo) {

		$http.put('/api/todos/' + todo.id, {
			title: todo.title,
			done: todo.done
		}).success(function(data, status, headers, config) {
			todo=data;
		});;
	};

	$scope.deleteTodo = function(index) {

		var todo = $scope.todos[index];

		$http.delete('/api/todos/' + todo.id)
			.success(function() {
				$scope.todos.splice(index, 1);
			});;
	};


	$scope.init();

});