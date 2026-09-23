<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        body {
            font-family: Calibri, 'Segoe UI', Arial, sans-serif;
            font-size: 10pt;
            color: #1e293b;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        .header-instansi {
            font-size: 10pt;
            font-weight: bold;
            color: #1e3a8a;
            height: 22px;
            vertical-align: middle;
        }
        .header-title {
            font-size: 14pt;
            font-weight: bold;
            color: #0f172a;
            height: 32px;
            vertical-align: middle;
        }
        .header-sub {
            font-size: 9pt;
            color: #64748b;
            height: 20px;
            vertical-align: middle;
        }
        .meta-cell {
            background-color: #f8fafc;
            border: 0.5pt solid #cbd5e1;
            padding: 6px 10px;
            font-size: 9pt;
            vertical-align: middle;
        }
        .meta-label {
            font-weight: bold;
            color: #475569;
        }
        .kpi-th-navy {
            background-color: #1e3a8a;
            color: #ffffff;
            font-weight: bold;
            font-size: 8.5pt;
            text-align: center;
            border: 0.5pt solid #1e3a8a;
            height: 26px;
            vertical-align: middle;
        }
        .kpi-th-green {
            background-color: #047857;
            color: #ffffff;
            font-weight: bold;
            font-size: 8.5pt;
            text-align: center;
            border: 0.5pt solid #047857;
            height: 26px;
            vertical-align: middle;
        }
        .kpi-th-amber {
            background-color: #b45309;
            color: #ffffff;
            font-weight: bold;
            font-size: 8.5pt;
            text-align: center;
            border: 0.5pt solid #b45309;
            height: 26px;
            vertical-align: middle;
        }
        .kpi-th-slate {
            background-color: #334155;
            color: #ffffff;
            font-weight: bold;
            font-size: 8.5pt;
            text-align: center;
            border: 0.5pt solid #334155;
            height: 26px;
            vertical-align: middle;
        }
        .kpi-val {
            border: 0.5pt solid #cbd5e1;
            font-size: 11pt;
            font-weight: bold;
            text-align: center;
            height: 32px;
            vertical-align: middle;
            background-color: #ffffff;
        }
        .val-navy { color: #1e3a8a; }
        .val-green { color: #047857; }
        .val-amber { color: #b45309; }
        .val-slate { color: #0f172a; }

        .th-main {
            background-color: #0f172a;
            color: #ffffff;
            font-weight: bold;
            font-size: 9pt;
            border: 0.5pt solid #0f172a;
            height: 30px;
            text-align: center;
            vertical-align: middle;
        }
        .td-main {
            border: 0.5pt solid #cbd5e1;
            font-size: 9.5pt;
            padding: 6px 8px;
            vertical-align: middle;
            height: 24px;
        }
        .td-center { text-align: center; }
        .td-left { text-align: left; }
        .td-right { text-align: right; }
        .td-num {
            text-align: right;
            border: 0.5pt solid #cbd5e1;
            font-size: 9.5pt;
            font-weight: 500;
            padding: 6px 8px;
            vertical-align: middle;
        }
        .td-total-label {
            background-color: #f1f5f9;
            font-weight: bold;
            text-align: right;
            border-top: 1pt solid #0f172a;
            border-bottom: 2.5pt double #0f172a;
            border-left: 0.5pt solid #cbd5e1;
            border-right: 0.5pt solid #cbd5e1;
            height: 28px;
            vertical-align: middle;
            padding: 6px 8px;
            font-size: 9.5pt;
        }
        .td-total-val {
            background-color: #f1f5f9;
            font-weight: bold;
            color: #047857;
            text-align: right;
            border-top: 1pt solid #0f172a;
            border-bottom: 2.5pt double #0f172a;
            border-left: 0.5pt solid #cbd5e1;
            border-right: 0.5pt solid #cbd5e1;
            height: 28px;
            vertical-align: middle;
            padding: 6px 8px;
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <table>
        <colgroup>
            <col width="50" style="width: 50px;">
            <col width="110" style="width: 110px;">
            <col width="340" style="width: 340px;">
            <col width="130" style="width: 130px;">
            <col width="120" style="width: 120px;">
            <col width="160" style="width: 160px;">
        </colgroup>

        <!-- 1. HEADER RESMI -->
        <tr>
            <td colspan="6" class="header-instansi">SIPERFAS &bull; SISTEM INFORMASI PELAPORAN FASILITAS SEKOLAH</td>
        </tr>
        <tr>
            <td colspan="6" class="header-title">LAPORAN REALISASI ANGGARAN & PEMELIHARAAN SARPRAS</td>
        </tr>
        <tr>
            <td colspan="6" class="header-sub">Badan Pengelola Sarana, Prasarana & Manajemen Aset Sekolah &bull; Data Riil Otentik</td>
        </tr>
        <tr><td colspan="6" style="height: 10px;"></td></tr>

        <!-- 2. METADATA LAPORAN -->
        <tr>
            <td colspan="3" class="meta-cell">
                <span class="meta-label">Tahun Ajaran:</span> {{ $tahunAjaran }} &nbsp;|&nbsp; 
                <span class="meta-label">Periode:</span> {{ $periodLabel }}
            </td>
            <td colspan="3" class="meta-cell" style="text-align: right;">
                <span class="meta-label">Tanggal Unduh:</span> {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y, H:i') }} WIB &nbsp;|&nbsp;
                <span class="meta-label">Koordinator:</span> {{ auth()->user()->nama ?? 'Admin Sarpras' }}
            </td>
        </tr>
        <tr><td colspan="6" style="height: 12px;"></td></tr>

        <!-- 3. RINGKASAN EKSEKUTIF ANGGARAN (GRID 4 KPI MERGED) -->
        <tr>
            <th colspan="2" class="kpi-th-navy">PAGU ANGGARAN SEKOLAH</th>
            <th colspan="1" class="kpi-th-green">TOTAL REALISASI</th>
            <th colspan="2" class="kpi-th-amber">SISA SALDO KAS</th>
            <th colspan="1" class="kpi-th-slate">% PENYERAPAN</th>
        </tr>
        <tr>
            <td colspan="2" class="kpi-val val-navy">Rp {{ number_format($totalAnggaran, 0, ',', '.') }}</td>
            <td colspan="1" class="kpi-val val-green">Rp {{ number_format($pengeluaranTerealisasi, 0, ',', '.') }}</td>
            <td colspan="2" class="kpi-val val-amber">Rp {{ number_format($sisaSaldo, 0, ',', '.') }}</td>
            <td colspan="1" class="kpi-val val-slate">{{ number_format($persenTerpakai, 1, ',', '.') }}%</td>
        </tr>
        <tr><td colspan="6" style="height: 14px;"></td></tr>

        <!-- 4. TABEL RINCIAN TRANSAKSI -->
        <thead>
            <tr>
                <th class="th-main" style="width: 50px;">NO</th>
                <th class="th-main" style="width: 110px;">TANGGAL</th>
                <th class="th-main" style="width: 340px; text-align: left; padding-left: 8px;">DESKRIPSI PROPOSAL / PEKERJAAN</th>
                <th class="th-main" style="width: 130px; text-align: left; padding-left: 8px;">KATEGORI</th>
                <th class="th-main" style="width: 120px;">STATUS</th>
                <th class="th-main" style="width: 160px; text-align: right; padding-right: 8px;">REALISASI BIAYA (RP)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $index => $trx)
                <tr style="{{ $index % 2 == 1 ? 'background-color: #f8fafc;' : 'background-color: #ffffff;' }}">
                    <td class="td-main td-center">{{ $index + 1 }}</td>
                    <td class="td-main td-center">{{ \Carbon\Carbon::parse($trx->tanggal)->translatedFormat('d/m/Y') }}</td>
                    <td class="td-main td-left">
                        <strong>{{ $trx->damageReport->judul ?? $trx->deskripsi }}</strong>
                        @if($trx->damageReport && $trx->damageReport->lokasi)
                            <br><span style="font-size: 8pt; color: #64748b;">Lokasi: {{ $trx->damageReport->lokasi }}</span>
                        @endif
                    </td>
                    <td class="td-main td-left">{{ $trx->kategori ?? 'Umum' }}</td>
                    <td class="td-main td-center">{{ $trx->status }}</td>
                    <td class="td-num">Rp {{ number_format($trx->jumlah, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="td-main td-center" style="color: #94a3b8; height: 35px;">
                        Tidak ada riwayat transaksi pengeluaran anggaran untuk periode ini.
                    </td>
                </tr>
            @endforelse

            <!-- TOTAL SUMMARY ROW -->
            <tr>
                <td colspan="5" class="td-total-label">TOTAL REALISASI PENGELUARAN</td>
                <td class="td-total-val">Rp {{ number_format($pengeluaranTerealisasi, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
