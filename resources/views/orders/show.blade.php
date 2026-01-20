<x-layouts.app>
    <section class="max-w-4xl mx-auto py-12 px-6">
        <div class="mb-6">
            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-ghost">&larr; Kembali</a>
        </div>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-4">Detail Pesanan #{{ $order->id }}</h1>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-sm text-gray-500">Event</p>
                        <p class="font-semibold">{{ $order->event->judul ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Pembelian</p>
                        <p class="font-semibold">{{ $order->order_date->format('d F Y, H:i') }}</p>
                    </div>
                </div>

                <div class="divider"></div>

                <h3 class="font-bold mb-3">Detail Tiket</h3>
                <div class="space-y-2">
                    @foreach($order->detailOrders as $detail)
                        <div class="flex justify-between items-center p-3 bg-base-200 rounded">
                            <div>
                                <p class="font-semibold">{{ $detail->tiket->tipe ?? 'N/A' }}</p>
                                <p class="text-sm text-gray-500">{{ $detail->jumlah }}x</p>
                            </div>
                            <p class="font-bold">Rp {{ number_format($detail->subtotal_harga, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="divider"></div>

                <div class="flex justify-between items-center text-xl font-bold">
                    <span>Total</span>
                    <span>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
