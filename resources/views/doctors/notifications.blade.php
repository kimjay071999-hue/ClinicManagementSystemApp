<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notifications | Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                    <a href="{{ route('doctor.dashboard') }}"
                       class="transition hover:text-blue-600">
                        Dashboard
                    </a>

                    <span>/</span>

                    <span class="text-slate-700">Notifications</span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                    Notifications
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    View your appointment updates and notifications.
                </p>
            </div>

            <a href="{{ route('doctor.dashboard') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>

                Back to Dashboard
            </a>

        </div>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- VALIDATION / ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- NOTIFICATION SUMMARY --}}
        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2">

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Total Notifications
                        </p>

                        <p class="mt-1 text-2xl font-bold text-slate-800">
                            {{ $notifications->total() }}
                        </p>
                    </div>

                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Unread Notifications
                        </p>

                        <p class="mt-1 text-2xl font-bold text-slate-800">
                            {{ $unreadCount }}
                        </p>
                    </div>

                </div>
            </div>

        </div>

        {{-- NOTIFICATION LIST CARD --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex flex-col gap-3 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <h2 class="font-bold text-slate-800">
                        All Notifications
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Your latest appointment updates.
                    </p>
                </div>

                @if ($unreadCount > 0)
                    <form method="POST"
                          action="{{ route('doctor.notifications.readAll') }}">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-3 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7" />
                            </svg>

                            Mark All as Read
                        </button>

                    </form>
                @endif

            </div>

            {{-- LIST --}}
            @forelse ($notifications as $notification)

                @php
                    $data = $notification->data;

                    $isUnread = is_null($notification->read_at);

                    $event = $data['event'] ?? 'updated';

                    $eventLabel = match ($event) {
                        'created' => 'New Appointment',
                        'status_changed' => 'Status Changed',
                        'updated' => 'Appointment Updated',
                        default => 'Appointment Update',
                    };

                    $status = $data['status'] ?? 'Unknown';

                    $statusClass = match (strtolower($status)) {
                        'scheduled' => 'bg-blue-50 text-blue-700',
                        'confirmed' => 'bg-emerald-50 text-emerald-700',
                        'completed' => 'bg-green-50 text-green-700',
                        'cancelled' => 'bg-red-50 text-red-700',
                        'pending' => 'bg-amber-50 text-amber-700',
                        default => 'bg-slate-100 text-slate-600',
                    };
                @endphp

                <div class="border-b border-slate-100 px-5 py-5 transition last:border-b-0
                    {{ $isUnread ? 'bg-blue-50/40' : 'bg-white' }}">

                    <div class="flex items-start gap-3">

                        {{-- UNREAD INDICATOR --}}
                        <div class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl
                            {{ $isUnread ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-500' }}">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>

                        </div>

                        {{-- CONTENT --}}
                        <div class="min-w-0 flex-1">

                            <div class="flex flex-wrap items-center gap-2">

                                <h3 class="text-sm font-bold text-slate-800">
                                    {{ $data['title'] ?? 'Appointment Notification' }}
                                </h3>

                                @if ($isUnread)
                                    <span class="rounded-full bg-blue-100 px-2 py-0.5 text-xs font-semibold text-blue-700">
                                        New
                                    </span>
                                @endif

                            </div>

                            <p class="mt-1 text-sm text-slate-600">
                                {{ $data['message'] ?? 'There is an appointment update.' }}
                            </p>

                            <div class="mt-3 flex flex-wrap items-center gap-2 text-xs text-slate-500">

                                <span class="font-medium text-slate-700">
                                    {{ $data['patient_name'] ?? 'Unknown Patient' }}
                                </span>

                                @if (!empty($data['appointment_date']))
                                    <span>•</span>

                                    <span>
                                        {{ $data['appointment_date'] }}
                                    </span>
                                @endif

                                @if (!empty($data['appointment_time']))
                                    <span>•</span>

                                    <span>
                                        {{ $data['appointment_time'] }}
                                    </span>
                                @endif

                            </div>

                            <div class="mt-3 flex flex-wrap items-center gap-2">

                                <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600">
                                    {{ $eventLabel }}
                                </span>

                                <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $statusClass }}">
                                    {{ ucfirst($status) }}
                                </span>

                            </div>

                            <p class="mt-3 text-xs text-slate-400">
                                {{ $notification->created_at?->diffForHumans() }}
                            </p>

                            {{-- ACTIONS --}}
                            <div class="mt-4 flex flex-wrap items-center gap-3">

                                @if ($isUnread)
                                    <form method="POST"
                                          action="{{ route('doctor.notifications.read', $notification->id) }}">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="text-xs font-semibold text-blue-600 transition hover:text-blue-800">

                                            Mark as Read
                                        </button>

                                    </form>
                                @endif

                                <form method="POST"
                                      action="{{ route('doctor.notifications.destroy', $notification->id) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this notification?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-xs font-semibold text-red-500 transition hover:text-red-700">

                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- EMPTY STATE --}}
                <div class="px-5 py-16 text-center">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-8 w-8"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                    </div>

                    <h3 class="mt-4 text-base font-bold text-slate-800">
                        No notifications yet
                    </h3>

                    <p class="mx-auto mt-2 max-w-sm text-sm text-slate-500">
                        Appointment notifications will appear here when there are updates for your account.
                    </p>

                    <a href="{{ route('doctor.dashboard') }}"
                       class="mt-5 inline-flex items-center justify-center rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Return to Dashboard
                    </a>

                </div>

            @endforelse

            {{-- PAGINATION --}}
            @if ($notifications->hasPages())
                <div class="border-t border-slate-200 px-5 py-4">
                    {{ $notifications->links() }}
                </div>
            @endif

        </div>

        <p class="mt-6 text-center text-xs text-slate-400">
            Clinic Management System &copy; {{ date('Y') }}
        </p>

    </div>

</body>
</html>