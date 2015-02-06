@extends('app')
@section('content')
<div class="container" ng-app="todoApp" ng-controller="todoController">
	<div class="row">
		<h1>TodoApp index view</h1>
		<input type='text' ng-model="todo.title">
	<button ng-click="addTodo()">Add</button>
			<ul>
			<li ng-repeat='todo in todos'>
				<input type="checkbox" ng-true-value="1" ng-false-value="'0'" ng-model="todo.done" ng-change="updateTodo(todo)">
				<% todo.title %> 
				<button ng-click="deleteTodo($index)">Del</button>
			</li>
		</ul>
	</div>
</div>
@endsection