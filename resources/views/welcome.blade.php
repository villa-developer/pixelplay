@extends('layouts.app')

@section('content')

<example-component :user-tasks="{{ $user->tasks }}" :task-status="{{ $task_status }}" :user="{{ $user }}"></example-component>

@endsection
