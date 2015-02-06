@extends('app')
@section('content')
<div class="container" ng-app="todoApp" ng-controller="todoController">
	<div class="row">
		<h1>TodoApp index view</h1>
		<% name %>
		<input type='text' ng-model="todo.title">
	<button ng-click="addTodo()">Add</button>
			<ul>
			<li ng-repeat='todo in todos'>
				<% todo.title %>
			</li>
		</ul>
	</div>
</div>
@endsection