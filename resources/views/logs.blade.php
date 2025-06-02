<?php
@extends('layouts.app') {{-- Use your main layout --}}

@section('content')
    <div class="container">
        <h1 class="mb-4">Activity Logs</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Model</th>
                    <th>Model ID</th>
                    <th>Description</th>
                    <th>IP</th>
                    <th>User Agent</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @forelse($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->user->name ?? 'Guest' }}</td>
                        <td>{{ $log->action }}</td>
                        <td>{{ class_basename($log->model) }}</td>
                        <td>{{ $log->model_id }}</td>
                        <td>{{ $log->description }}</td>
                        <td>{{ $log->ip }}</td>
                        <td style="max-width: 150px; word-break: break-word;">{{ $log->user_agent }}</td>
                        <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No activity logs found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $logs->links() }}
        </div>
    </div>
@endsection
