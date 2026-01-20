<x-layouts.app>
    <section class="max-w-7xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold mb-6">Riwayat Pembelian</h1>

        @if(session('success'))
            <div class="alert alert-success mb-6">
                {{ session('success') }}
            </div>
        @endif

        @forelse($orders as $order)
            <div class="card bg-base-100 shadow mb-4">
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="card-title">{{ $order->event->judul ?? 'Event tidak ditemukan' }}</h2>
                            <p class="text-sm text-gray-500">
                                Order #{{ $order->id }} • {{ $order->order_date->format('d M Y H:i') }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Belum ada riwayat pembelian.
            </div>
        @endforelse
    </section>
</x-layouts.app>
