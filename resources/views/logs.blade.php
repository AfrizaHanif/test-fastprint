@extends('template')

@section('styles')
    <style>
        /* body {
                                font-family: sans-serif;
                                padding: 20px;
                                background: #f3f4f6;
                            } */

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        .log-viewer {
            background: #1a202c;
            color: #cbd5e0;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            /* font-family: 'Courier New', Courier, monospace; */
            font-size: 14px;
            white-space: pre-wrap;
        }

        .log-line {
            border-bottom: 1px solid #2d3748;
            padding: 2px 0;
        }

        .empty {
            color: #718096;
            font-style: italic;
        }
    </style>
@endsection

@section('contents')
    <div class="container">
        <h1>System Logs (Last 100 Lines)</h1>
        <div class="log-viewer">
            @forelse($logs as $log)
            <div class="log-line">{{ $log }}</div>@empty<div class="empty">No logs found.</div>
            @endforelse
        </div>
    </div>
@endsection
