    <style>
        .badge {
            color: white;
            padding: 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .bg-admin {
            background-color: #2135cb;
            /* Active: Green */
        }

        .bg-dealer {
            background-color: #46cd34;
            /* Active: Green */
        }

        .bg-default {
            background-color: #a7287b;
            /* Active: Green */
        }
    </style>
    <div
        class="badge @if ($getState() === 'Admin') bg-admin
    @elseif ($getState() === 'Dealer') bg-dealer
    @else bg-default @endif">
        {{ $getState() }}
    </div>
