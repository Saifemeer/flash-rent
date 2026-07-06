<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #BK-{{ $booking->id }} | {{ config('app.name', 'RentWheels') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900" rel="stylesheet" />

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', -apple-system, sans-serif; background: #f3f4f6; color: #111827; -webkit-font-smoothing: antialiased; }
        
        .invoice-container { max-width: 800px; margin: 2rem auto; background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        
        /* Action Bar */
        .action-bar { display: flex; justify-content: space-between; align-items: center; padding: 1rem 2rem; background: #f9fafb; border-bottom: 1px solid #e5e7eb; }
        .action-bar a, .action-bar button { font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none; border-radius: 6px; transition: all 0.2s; display: inline-flex; align-items: center; gap: 6px; }
        .back-btn { color: #6b7280; padding: 8px 0; }
        .back-btn:hover { color: #111827; }
        .btn-group { display: flex; gap: 8px; }
        .print-btn { background: #fff; color: #374151; border: 1px solid #d1d5db; padding: 8px 16px; }
        .print-btn:hover { background: #f9fafb; border-color: #9ca3af; }
        .download-btn { background: #111827; color: #fff; border: 1px solid #111827; padding: 8px 16px; }
        .download-btn:hover { background: #1f2937; }

        /* Invoice Body */
        .invoice-body { padding: 2.5rem; }
        
        /* Header */
        .invoice-header { display: flex; justify-content: space-between; align-items: flex-start; padding-bottom: 2rem; border-bottom: 1px solid #e5e7eb; }
        .brand-name { font-size: 20px; font-weight: 800; color: #111827; letter-spacing: -0.5px; }
        .brand-tagline { font-size: 11px; color: #9ca3af; margin-top: 4px; font-weight: 500; letter-spacing: 0.5px; text-transform: uppercase; }
        .invoice-meta { text-align: right; }
        .invoice-label { font-size: 11px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: 1.5px; }
        .invoice-number { font-size: 22px; font-weight: 800; color: #111827; margin-top: 2px; }
        .invoice-date { font-size: 13px; color: #6b7280; margin-top: 4px; font-weight: 500; }

        /* Status Badge */
        .status-badge { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 50px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 8px; }
        .status-approved { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .status-completed { background: #eff6ff; color: #1e40af; border: 1px solid #bfdbfe; }
        .status-pending { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .status-cancelled { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
        .status-dot { width: 6px; height: 6px; border-radius: 50%; }
        .dot-approved { background: #10b981; }
        .dot-completed { background: #3b82f6; }
        .dot-pending { background: #f59e0b; }
        .dot-cancelled { background: #ef4444; }

        /* Info Grid */
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin: 2rem 0; }
        .info-block h4 { font-size: 11px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .info-block p { font-size: 14px; color: #374151; font-weight: 500; line-height: 1.6; }
        .info-block .name { font-size: 15px; font-weight: 700; color: #111827; }

        /* Vehicle Card */
        .vehicle-card { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.25rem; margin: 1.5rem 0; display: flex; gap: 1rem; align-items: center; }
        .vehicle-img { width: 100px; height: 70px; border-radius: 8px; overflow: hidden; background: #e5e7eb; flex-shrink: 0; }
        .vehicle-img img { width: 100%; height: 100%; object-fit: cover; }
        .vehicle-img-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; }
        .vehicle-img-placeholder svg { width: 28px; height: 28px; color: #d1d5db; }
        .vehicle-info .v-name { font-size: 15px; font-weight: 700; color: #111827; }
        .vehicle-info .v-detail { font-size: 12px; color: #9ca3af; margin-top: 2px; font-weight: 500; }
        .vehicle-tags { display: flex; gap: 6px; margin-top: 6px; }
        .vehicle-tags span { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; padding: 3px 8px; border-radius: 4px; background: #f3f4f6; color: #6b7280; border: 1px solid #e5e7eb; }

        /* Bill Table */
        .bill-table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
        .bill-table thead th { font-size: 11px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 16px; border-bottom: 2px solid #e5e7eb; text-align: left; }
        .bill-table thead th:last-child { text-align: right; }
        .bill-table thead th.center { text-align: center; }
        .bill-table tbody td { font-size: 14px; color: #374151; font-weight: 500; padding: 16px; border-bottom: 1px solid #f3f4f6; }
        .bill-table tbody td:last-child { text-align: right; font-weight: 700; color: #111827; }
        .bill-table tbody td.center { text-align: center; }

        /* Totals */
        .totals-section { display: flex; justify-content: flex-end; margin-top: 1rem; }
        .totals-box { width: 320px; }
        .total-row { display: flex; justify-content: space-between; padding: 8px 0; font-size: 14px; color: #6b7280; font-weight: 500; }
        .total-row.grand { border-top: 2px solid #111827; padding-top: 12px; margin-top: 4px; font-size: 18px; font-weight: 800; color: #111827; }

        /* Duration Bar */
        .duration-bar { display: grid; grid-template-columns: 1fr auto 1fr; gap: 1rem; align-items: center; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.25rem; margin: 1.5rem 0; }
        .duration-point { text-align: center; }
        .duration-point .d-label { font-size: 10px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: 1px; }
        .duration-point .d-date { font-size: 16px; font-weight: 700; color: #111827; margin-top: 4px; }
        .duration-point .d-year { font-size: 12px; color: #9ca3af; font-weight: 500; }
        .duration-arrow { display: flex; flex-direction: column; align-items: center; gap: 4px; }
        .duration-arrow .arrow-line { width: 60px; height: 1px; background: #d1d5db; position: relative; }
        .duration-arrow .arrow-line::after { content: ''; position: absolute; right: -1px; top: -3px; width: 0; height: 0; border-left: 6px solid #d1d5db; border-top: 4px solid transparent; border-bottom: 4px solid transparent; }
        .duration-arrow .days-badge { font-size: 11px; font-weight: 700; color: #111827; background: #e5e7eb; padding: 2px 10px; border-radius: 50px; }

        /* Footer */
        .invoice-footer { border-top: 1px solid #e5e7eb; padding: 1.5rem 2.5rem; text-align: center; }
        .footer-text { font-size: 12px; color: #9ca3af; font-weight: 500; line-height: 1.8; }

        /* Print Styles */
        @media print {
            body { background: #fff; padding: 0; }
            .action-bar { display: none !important; }
            .invoice-container { margin: 0; border: none; border-radius: 0; box-shadow: none; }
            .invoice-body { padding: 2rem; }
            .invoice-footer { padding: 1.5rem 2rem; }
        }

        /* Mobile */
        @media (max-width: 640px) {
            .invoice-body { padding: 1.5rem; }
            .invoice-header { flex-direction: column; gap: 1rem; }
            .invoice-meta { text-align: left; }
            .info-grid { grid-template-columns: 1fr; gap: 1.5rem; }
            .duration-bar { grid-template-columns: 1fr; gap: 0.75rem; text-align: center; }
            .duration-arrow { flex-direction: row; }
            .duration-arrow .arrow-line { width: 1px; height: 30px; }
            .duration-arrow .arrow-line::after { display: none; }
            .totals-box { width: 100%; }
            .vehicle-card { flex-direction: column; align-items: flex-start; }
            .vehicle-img { width: 100%; height: 120px; }
            .btn-group { flex-direction: column; width: 100%; }
            .print-btn, .download-btn { width: 100%; justify-content: center; }
            .action-bar { flex-direction: column; gap: 12px; align-items: flex-start; }
        }
    </style>
</head>
<body>

    <div class="invoice-container">

        {{-- Action Bar --}}
        <div class="action-bar">
            <a href="{{ route('bookings.my_bookings') }}" class="back-btn">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Bookings
            </a>
            <div class="btn-group">
                <button onclick="window.print()" class="print-btn">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    Print
                </button>
               
            </div>
        </div>

        {{-- Invoice Body --}}
        <div class="invoice-body">

            {{-- Header --}}
            <div class="invoice-header">
                <div>
                    <div class="brand-name">{{ config('app.name', 'RentWheels') }}</div>
                    <div class="brand-tagline">Premium Car Rental Service</div>
                </div>
                <div class="invoice-meta">
                    <div class="invoice-label">Invoice</div>
                    <div class="invoice-number">#BK-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</div>
                    <div class="invoice-date">Issued: {{ now()->format('d M, Y') }}</div>
                    @if($booking->status == 'approved')
                        <div class="status-badge status-approved"><span class="status-dot dot-approved"></span> Approved</div>
                    @elseif($booking->status == 'completed')
                        <div class="status-badge status-completed"><span class="status-dot dot-completed"></span> Completed</div>
                    @elseif($booking->status == 'pending')
                        <div class="status-badge status-pending"><span class="status-dot dot-pending"></span> Pending</div>
                    @elseif($booking->status == 'cancelled')
                        <div class="status-badge status-cancelled"><span class="status-dot dot-cancelled"></span> Cancelled</div>
                    @endif
                </div>
            </div>

            {{-- Client & Company Info --}}
            <div class="info-grid">
                <div class="info-block">
                    <h4>Billed To</h4>
                    <p class="name">{{ $booking->user->name }}</p>
                    <p>{{ $booking->user->email }}</p>
                </div>
                <div class="info-block">
                    <h4>From</h4>
                    <p class="name">{{ config('app.name', 'RentWheels') }}</p>
                    <p>info@rentwheels.pk</p>
                    <p>+92 300 1234567</p>
                </div>
            </div>

            {{-- Vehicle Card --}}
            <div class="vehicle-card">
                <div class="vehicle-img">
                    @if($booking->car->image)
                        <img src="{{ asset('storage/' . $booking->car->image) }}" alt="{{ $booking->car->name }}">
                    @else
                        <div class="vehicle-img-placeholder">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                </div>
                <div class="vehicle-info">
                    <div class="v-name">{{ $booking->car->brand }} {{ $booking->car->name }}</div>
                    <div class="v-detail">{{ $booking->car->model_year }} Model</div>
                    <div class="vehicle-tags">
                        <span>{{ $booking->car->category }}</span>
                        <span>{{ $booking->car->brand }}</span>
                    </div>
                </div>
            </div>

            {{-- Duration Bar --}}
            <div class="duration-bar">
                <div class="duration-point">
                    <div class="d-label">Pickup</div>
                    <div class="d-date">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M') }}</div>
                    <div class="d-year">{{ \Carbon\Carbon::parse($booking->start_date)->format('Y, l') }}</div>
                </div>
                <div class="duration-arrow">
                    <div class="arrow-line"></div>
                    <div class="days-badge">{{ $totalDays }} {{ Str::plural('Day', $totalDays) }}</div>
                </div>
                <div class="duration-point">
                    <div class="d-label">Return</div>
                    <div class="d-date">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M') }}</div>
                    <div class="d-year">{{ \Carbon\Carbon::parse($booking->end_date)->format('Y, l') }}</div>
                </div>
            </div>

            {{-- Bill Table --}}
            <table class="bill-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="center">Rate / Day</th>
                        <th class="center">Days</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong style="color: #111827;">{{ $booking->car->brand }} {{ $booking->car->name }}</strong><br>
                            <span style="font-size: 12px; color: #9ca3af;">{{ $booking->car->category }} &middot; {{ $booking->car->model_year }}</span>
                        </td>
                        <td class="center">Rs. {{ number_format($booking->car->price_per_day) }}</td>
                        <td class="center">{{ $totalDays }}</td>
                        <td>Rs. {{ number_format($booking->car->price_per_day * $totalDays) }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Totals --}}
            <div class="totals-section">
                <div class="totals-box">
                    <div class="total-row">
                        <span>Subtotal</span>
                        <span>Rs. {{ number_format($booking->car->price_per_day * $totalDays) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Service Charges</span>
                        <span>Rs. 0</span>
                    </div>
                    <div class="total-row">
                        <span>Tax (0%)</span>
                        <span>Rs. 0</span>
                    </div>
                    <div class="total-row grand">
                        <span>Grand Total</span>
                        <span>Rs. {{ number_format($booking->car->price_per_day * $totalDays) }}</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Footer --}}
        <div class="invoice-footer">
            <p class="footer-text">
                Thank you for choosing {{ config('app.name', 'RentWheels') }}. Have a safe journey.<br>
                This is a system-generated invoice and does not require a physical signature.
            </p>
        </div>

    </div>

</body>
</html>