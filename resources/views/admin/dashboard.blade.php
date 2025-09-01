<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">👑 Dasbor Admin Dewabot</h1>
        
        <div class="mb-8 bg-gray-800 rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Worker Baru</h2>
            <form action="{{ route('admin.workers.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-400">Nama Worker</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="ip_address" class="block text-sm font-medium text-gray-400">IP Address</label>
                        <input type="text" name="ip_address" id="ip_address" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="port" class="block text-sm font-medium text-gray-400">Port</label>
                        <input type="number" name="port" id="port" required class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500" value="8000">
                    </div>
                    <div class="self-end">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md">
                            Simpan Worker
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="bg-gray-800 rounded-lg shadow">
            <div class="p-4 border-b border-gray-700">
                <h2 class="text-xl font-semibold">Daftar Worker</h2>
            </div>
            <div class="p-4">
                <table class="min-w-full">
                    <thead class="border-b border-gray-700">
                        <tr>
                            <th class="text-left py-2 px-3">Nama Worker</th>
                            <th class="text-left py-2 px-3">IP Address & Port</th>
                            <th class="text-left py-2 px-3">Status</th>
                            <th class="text-left py-2 px-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($workers as $worker)
                            <tr class="border-b border-gray-800 hover:bg-gray-700">
                                <td class="py-3 px-3">{{ $worker->name }}</td>
                                <td class="py-3 px-3 font-mono">{{ $worker->ip_address }}:{{ $worker->port }}</td>
                                <td class="py-3 px-3">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $worker->status == 'online' ? 'bg-green-500 text-green-900' : 'bg-red-500 text-red-900' }}">
                                        {{ ucfirst($worker->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-3">
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">
                                    Belum ada worker yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>