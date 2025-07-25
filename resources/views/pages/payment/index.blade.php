@extends('layouts.main')
@section('title', 'Checkout - Pembayaran Donasi')

@push('style')
    <style>
        .payment-method {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .payment-method::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .payment-method:hover::before {
            left: 100%;
        }

        .payment-method:hover {
            @apply bg-gradient-to-br from-blue-50 to-indigo-50 -translate-y-2 shadow-lg scale-105;
            border-color: #3b82f6;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .payment-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            backdrop-filter: blur(10px);
        }

        .detail-card {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .status-badge {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .pay-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .pay-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .pay-button:hover::before {
            left: 100%;
        }

        .pay-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .loading-spinner {
            border: 4px solid #f3f4f6;
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .info-card {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            border-left: 4px solid #3b82f6;
        }

        .method-icon {
            transition: all 0.3s ease;
        }

        .payment-method:hover .method-icon {
            transform: scale(1.2) rotate(5deg);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
@endpush
@section('content')
    <div class="min-h-screen py-12">
        <div class="md:max-w-5xl w-full mx-auto mt-10 md:mt-16 px-1 md:px-4">
            {{-- Header --}}
            <div class="text-center md:block hidden mb-8">
                <h1 class="md:text-4xl text-2xl font-bold text-primary mb-2">Pembayaran Donasi</h1>
                <p class="dark:text-slate-200 md:text-base text-sm dark:text-gray-600">Lanjutkan untuk menyelesaikan donasi Anda</p>
            </div>

            <div class="grid lg:grid-cols-1 gap-8">
                {{-- Detail Section --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Main Payment Card --}}
                    <div class="bg-white rounded-2xl card-shadow overflow-hidden">
                        <div class="bg-gradient-primary text-white px-3 md:px-8 py-6">
                            <div class="flex items-center">
                                <div class="bg-white bg-opacity-20 rounded-full p-3 mr-4">
                                    <i class="fas fa-credit-card text-2xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold">Checkout Pembayaran</h2>
                                    <p class="text-blue-100">Terima kasih atas kepercayaan Anda</p>
                                </div>
                            </div>
                        </div>

                        <div class="md:p-8 p-3">
                            {{-- Donatur & Payment Details --}}
                            <div class="grid md:grid-cols-2 gap-8 mb-8">
                                {{-- Donatur Details --}}
                                <div class="space-y-4">
                                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                        <div class="bg-blue-100 rounded-full p-2 mr-3">
                                            <i class="fas fa-user text-blue-600"></i>
                                        </div>
                                        Detail Donatur
                                    </h3>
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 space-y-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-user-circle text-blue-500 mr-3"></i>
                                            <div>
                                                <span class="text-sm text-gray-500">Nama</span>
                                                <p class="font-semibold text-gray-800">{{ $donatur->name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt text-blue-500 mr-3"></i>
                                            <div>
                                                <span class="text-sm text-gray-500">Kota</span>
                                                <p class="font-semibold text-gray-800">{{ $donatur->city }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-phone text-blue-500 mr-3"></i>
                                            <div>
                                                <span class="text-sm text-gray-500">Telepon</span>
                                                <p class="font-semibold text-gray-800">{{ $donatur->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <i class="fas fa-pray text-blue-500 mr-3 mt-1"></i>
                                            <div>
                                                <span class="text-sm text-gray-500">Doa</span>
                                                <p class="font-semibold text-gray-800">{{ $donatur->doa }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Payment Summary --}}
                                <div class="space-y-4">
                                    <h3 class="text-xl  font-bold text-gray-800 flex items-center">
                                        <div class="bg-green-100 rounded-full p-2 mr-3">
                                            <i class="fas fa-receipt text-green-600"></i>
                                        </div>
                                        Ringkasan Pembayaran
                                    </h3>
                                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6">
                                        <div class="space-y-4">
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-600">Jumlah Donasi</span>
                                                <span class="md:text-2xl text-lg font-bold text-green-600">
                                                    Rp {{ number_format($donatur->amount, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            <div class="border-t border-green-200 pt-4">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-lg font-semibold mr-2 text-gray-800">Total
                                                        Pembayaran</span>
                                                    <span class="md:text-3xl text-lg font-bold text-gradient">
                                                        Rp {{ number_format($donatur->amount, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="info-card p-6 rounded-xl mb-8">
                                <div class="flex items-center text-center">
                                    <div class="flex-1">
                                        <p class="text-gray-700 mb-2">
                                            <strong>Status Pembayaran:</strong>
                                        </p>
                                        <div class="md:flex block items-center">
                                            <div
                                                class="status-badge px-4 py-2 rounded-full text-orange-800 font-bold text-sm uppercase mr-3">
                                                {{ ucfirst($donatur->status_pembayaran) }}
                                            </div>
                                            <div class="text-gray-600 mt-3">Silakan lanjutkan pembayaran dengan mengklik tombol
                                                di bawah ini.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Payment Button --}}
                            <div class="text-center space-y-4">
                                <button id="pay-button"
                                    class="pay-button text-white font-bold px-12 py-4 rounded-2xl transition-all duration-300 text-lg shadow-lg">
                                    <i class="fas fa-credit-card mr-3"></i>
                                    Bayar Sekarang
                                </button>

                                <div class="flex items-center justify-center text-sm text-gray-500">
                                    <i class="fas fa-shield-alt mr-2 text-green-500"></i>
                                    Pembayaran aman dilindungi oleh
                                    <img src="https://midtrans.com/assets/images/main/midtrans-logo.png" alt="Midtrans"
                                        class="h-6 ml-2">
                                </div>
                            </div>

                            {{-- Loading State --}}
                            <div id="loading" class="text-center py-8 hidden">
                                <div class="loading-spinner mx-auto mb-4"></div>
                                <p class="text-gray-600 font-medium">Memproses pembayaran...</p>
                                <p class="text-sm text-gray-500 mt-1">Mohon tunggu sebentar</p>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Methods --}}
                    <div class="bg-white rounded-2xl card-shadow overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-6">
                            <h3 class="md:text-xl text-lg font-bold flex items-center">
                                <i class="fas fa-money-check-alt mr-3"></i>
                                Metode Pembayaran Tersedia
                            </h3>
                            <p class="text-purple-100 md:text-base text-sm mt-1">Pilih metode pembayaran yang nyaman untuk Anda</p>
                        </div>

                        <div class="md:p-8 p-4">
                            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                                <div
                                    class="payment-method p-6 rounded-xl border-2 border-gray-200 text-center cursor-pointer">
                                    <div class="method-icon">
                                        <i class="fas fa-credit-card fa-3x text-blue-500 mb-4"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Kartu Kredit</h4>
                                    <p class="text-xs text-gray-500">Visa, Mastercard</p>
                                </div>

                                <div
                                    class="payment-method p-6 rounded-xl border-2 border-gray-200 text-center cursor-pointer">
                                    <div class="method-icon">
                                        <i class="fas fa-university fa-3x text-green-500 mb-4"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Transfer Bank</h4>
                                    <p class="text-xs text-gray-500">BCA, BNI, Mandiri</p>
                                </div>

                                <div
                                    class="payment-method p-6 rounded-xl border-2 border-gray-200 text-center cursor-pointer">
                                    <div class="method-icon">
                                        <i class="fas fa-mobile-alt fa-3x text-yellow-500 mb-4"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-1">E-Wallet</h4>
                                    <p class="text-xs text-gray-500">GoPay, OVO, DANA</p>
                                </div>

                                <div
                                    class="payment-method p-6 rounded-xl border-2 border-gray-200 text-center cursor-pointer">
                                    <div class="method-icon">
                                        <i class="fas fa-store fa-3x text-teal-500 mb-4"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Minimarket</h4>
                                    <p class="text-xs text-gray-500">Indomaret, Alfamart</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{config('service.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js'}}"
        data-client-key="{{ config('service.midtrans.client_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('pay-button').onclick = function() {
            document.getElementById('loading').classList.remove('hidden');
            document.getElementById('pay-button').classList.add('hidden');

            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    updatePaymentStatus(result, 'success', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pembayaran Berhasil!',
                            text: 'Terima kasih atas donasi Anda',
                            confirmButtonColor: '#667eea',
                            background: '#f8fafc',
                            customClass: {
                                popup: 'rounded-2xl'
                            }
                        }).then(() => window.location.href = "{{route('donation.success',['id' => $donatur->id])}}");
                    });
                },
                onPending: function(result) {
                    updatePaymentStatus(result, 'pending', function() {
                        document.getElementById('loading').classList.add('hidden');
                        Swal.fire({
                            icon: 'info',
                            title: 'Pembayaran Tertunda',
                            text: 'Silakan selesaikan pembayaran Anda',
                            confirmButtonColor: '#667eea',
                            background: '#f8fafc',
                            customClass: {
                                popup: 'rounded-2xl'
                            }
                        }).then(() => window.location.href = "#");
                    });
                },
                onError: function(result) {
                    updatePaymentStatus(result, 'failed', function() {
                        document.getElementById('loading').classList.add('hidden');
                        document.getElementById('pay-button').classList.remove('hidden');
                        Swal.fire({
                            icon: 'error',
                            title: 'Pembayaran Gagal',
                            text: 'Terjadi kesalahan saat memproses pembayaran',
                            confirmButtonColor: '#667eea',
                            background: '#f8fafc',
                            customClass: {
                                popup: 'rounded-2xl'
                            }
                        });
                    });
                }
            });
        };

        function updatePaymentStatus(result, status, callback) {
            fetch("{{ route('donation.update-status') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        donatur_id: @json($donatur->id),
                        transaction_id: result.transaction_id,
                        status: status,
                        payment_type: result.payment_type || '',
                        response_data: result
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log('Status updated:', data);
                    if (typeof callback === 'function') callback(); // Jalankan setelah update selesai
                })
                .catch(err => {
                    console.error('Update failed:', err);
                    if (typeof callback === 'function') callback();
                });
        }
    </script>
@endpush
