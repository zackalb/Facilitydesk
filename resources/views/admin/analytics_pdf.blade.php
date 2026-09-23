<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Realisasi Anggaran Sarpras - {{ $tahunAjaran }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 15mm 15mm 15mm 15mm;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 9pt;
            color: #1e293b;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }

        /* Kop Surat Resmi */
        .kop-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2px;
        }
        .kop-logo {
            width: 70px;
            vertical-align: middle;
            text-align: center;
        }
        .kop-text {
            text-align: center;
            vertical-align: middle;
        }
        .kop-instansi {
            font-size: 11pt;
            font-weight: bold;
            color: #0f172a;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .kop-title {
            font-size: 13pt;
            font-weight: 900;
            color: #1e3a8a;
            margin: 2px 0;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .kop-sub {
            font-size: 8pt;
            color: #64748b;
        }
        .kop-divider {
            border-top: 2px solid #0f172a;
            border-bottom: 1px solid #0f172a;
            height: 2px;
            margin: 6px 0 14px 0;
        }

        /* Metadata Laporan */
        .meta-box {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }
        .meta-box td {
            padding: 6px 10px;
            font-size: 8.5pt;
        }
        .meta-label {
            color: #64748b;
            width: 120px;
        }
        .meta-val {
            font-weight: bold;
            color: #0f172a;
        }

        /* Ringkasan Finansial */
        .summary-title {
            font-size: 9.5pt;
            font-weight: bold;
            color: #0f172a;
            text-transform: uppercase;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }
        .kpi-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }
        .kpi-table th {
            background-color: #1e3a8a;
            color: #ffffff;
            font-weight: bold;
            font-size: 8pt;
            padding: 6px 8px;
            text-align: center;
            border: 1px solid #1e3a8a;
            text-transform: uppercase;
        }
        .kpi-table td {
            border: 1px solid #cbd5e1;
            padding: 8px;
            text-align: center;
            font-size: 9.5pt;
            font-weight: bold;
            background-color: #ffffff;
        }
        .text-green { color: #059669; }
        .text-blue { color: #1d4ed8; }
        .text-amber { color: #d97706; }

        /* Tabel Data Transaksi */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .data-table th {
            background-color: #0f172a;
            color: #ffffff;
            font-size: 8pt;
            font-weight: bold;
            padding: 6px 8px;
            border: 1px solid #0f172a;
            text-align: left;
            text-transform: uppercase;
        }
        .data-table td {
            border: 1px solid #e2e8f0;
            padding: 5px 8px;
            font-size: 8pt;
            vertical-align: middle;
        }
        .data-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }
        .data-table .text-center { text-align: center; }
        .data-table .text-right { text-align: right; }
        .data-table .font-bold { font-weight: bold; }
        .data-table .total-row td {
            background-color: #f1f5f9;
            font-weight: bold;
            border-top: 2px solid #94a3b8;
        }

        /* Status Badge */
        .badge {
            display: inline-block;
            padding: 2px 6px;
            font-size: 7pt;
            font-weight: bold;
            border-radius: 3px;
            text-transform: uppercase;
        }
        .badge-success { background-color: #d1fae5; color: #065f46; }
        .badge-info { background-color: #e0f2fe; color: #075985; }

        /* Tanda Tangan */
        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            page-break-inside: avoid;
        }
        .signature-table td {
            width: 50%;
            vertical-align: top;
            text-align: center;
            font-size: 8.5pt;
        }
        .signature-space {
            height: 55px;
        }
        .signature-name {
            font-weight: bold;
            text-decoration: underline;
            color: #0f172a;
        }
        .signature-title {
            color: #475569;
            font-size: 8pt;
        }

        /* Footer Halaman */
        .footer-note {
            margin-top: 20px;
            border-top: 1px dashed #cbd5e1;
            padding-top: 6px;
            font-size: 7pt;
            color: #94a3b8;
            text-align: right;
            font-style: italic;
        }
    </style>
</head>
<body>

    <!-- KOP SURAT RESMI -->
    <table class="kop-table">
        <tr>
            <td class="kop-logo">
                <svg width="55" height="55" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="100" height="100" rx="20" fill="#1e3a8a"/>
                    <path d="M25 70V45L50 30L75 45V70H25Z" fill="#3b82f6"/>
                    <path d="M42 70V52H58V70H42Z" fill="#ffffff"/>
                    <circle cx="50" cy="42" r="6" fill="#f59e0b"/>
                </svg>
            </td>
            <td class="kop-text">
                <div class="kop-instansi">Sistem Informasi Pelaporan Fasilitas Sekolah</div>
                <div class="kop-title">Laporan Pertanggungjawaban Realisasi Anggaran</div>
                <div class="kop-sub">Badan Pengelola Sarana, Prasarana & Manajemen Aset Sekolah &bull; Dokumen Resmi Otentik</div>
            </td>
        </tr>
    </table>
    <div class="kop-divider"></div>

    <!-- METADATA DOKUMEN -->
    <table class="meta-box">
        <tr>
            <td class="meta-label">Tahun Ajaran</td>
            <td class="meta-val">: {{ $tahunAjaran }}</td>
            <td class="meta-label">Tanggal Cetak</td>
            <td class="meta-val">: {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y, H:i') }} WIB</td>
        </tr>
        <tr>
            <td class="meta-label">Periode Analisis</td>
            <td class="meta-val">: {{ $periodLabel }}</td>
            <td class="meta-label">Dicetak Oleh</td>
            <td class="meta-val">: {{ auth()->user()->nama ?? 'Administrator Sarpras' }}</td>
        </tr>
    </table>

    <!-- RINGKASAN FINANSIAL -->
    <div class="summary-title">I. Ringkasan Eksekutif Anggaran</div>
    <table class="kpi-table">
        <thead>
            <tr>
                <th>Pagu Anggaran Dialokasikan</th>
                <th>Total Realisasi Pengeluaran</th>
                <th>Sisa Saldo Kas Anggaran</th>
                <th>Persentase Penyerapan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-blue">Rp {{ number_format($totalAnggaran, 0, ',', '.') }}</td>
                <td class="text-green">Rp {{ number_format($pengeluaranTerealisasi, 0, ',', '.') }}</td>
                <td class="text-amber">Rp {{ number_format($sisaSaldo, 0, ',', '.') }}</td>
                <td>{{ number_format($persenTerpakai, 1, ',', '.') }}%</td>
            </tr>
        </tbody>
    </table>

    <!-- RINCIAN TRANSAKSI -->
    <div class="summary-title">II. Rincian Realisasi Transaksi Pekerjaan Fasilitas</div>
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 25px;" class="text-center">No</th>
                <th style="width: 75px;">Tanggal</th>
                <th>Deskripsi Proposal / Perbaikan Fasilitas</th>
                <th style="width: 95px;">Kategori</th>
                <th style="width: 75px;" class="text-center">Status</th>
                <th style="width: 105px;" class="text-right">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $index => $trx)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($trx->tanggal)->translatedFormat('d M Y') }}</td>
                    <td>
                        <span class="font-bold">{{ $trx->damageReport->judul ?? $trx->deskripsi }}</span>
                        @if($trx->damageReport && $trx->damageReport->lokasi)
                            <br><span style="font-size: 7.5pt; color: #64748b;">Lokasi: {{ $trx->damageReport->lokasi }}</span>
                        @endif
                    </td>
                    <td>{{ $trx->kategori ?? 'Umum' }}</td>
                    <td class="text-center">
                        <span class="badge {{ strtolower($trx->status) === 'selesai' ? 'badge-success' : 'badge-info' }}">
                            {{ $trx->status }}
                        </span>
                    </td>
                    <td class="text-right font-bold">
                        Rp {{ number_format($trx->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 15px; color: #94a3b8;">
                        Tidak ada riwayat transaksi pengeluaran anggaran untuk periode ini.
                    </td>
                </tr>
            @endforelse
            <tr class="total-row">
                <td colspan="5" class="text-right font-bold">TOTAL REALISASI PENGELUARAN</td>
                <td class="text-right font-bold text-green">
                    Rp {{ number_format($pengeluaranTerealisasi, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <!-- PENGESAHAN / TANDA TANGAN -->
    <table class="signature-table">
        <tr>
            <td>
                Mengetahui,<br>
                <strong>Kepala Sekolah</strong>
                <div class="signature-space"></div>
            </td>
            <td>
                Disahkan di Bandung, {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}<br>
                <strong>Koordinator Sarana & Prasarana</strong>
                <div class="signature-space"></div>
            </td>
        </tr>
    </table>

    <div class="footer-note">
        Dokumen ini dibuat otomatis oleh Sistem Informasi Pelaporan Fasilitas Sekolah (SIPERFAS) pada {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y H:i:s') }} dan diakui secara sah sebagai laporan pertanggungjawaban internal sekolah.
    </div>

</body>
</html>
