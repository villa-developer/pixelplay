@extends('layouts.app')

@section('content')

<example-component :task-status="{{ $task_status }}" :user="{{ $user }}"></example-component>

@endsection
