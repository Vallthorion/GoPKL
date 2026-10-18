<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11px;
            color: #333;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .print-button {
            display: inline-block;
            padding: 10px 20px;
            background: #1E3A5F;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
            text-decoration: none;
            font-weight: 600;
        }
        .print-button:hover {
            background: #2C5282;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #1E3A5F;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #1E3A5F;
            font-size: 24px;
            margin-bottom: 8px;
            font-weight: 800;
        }
        .header p {
            color: #666;
            font-size: 13px;
        }
        .summary {
            margin-bottom: 30px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .summary-box {
            padding: 15px 20px;
            background: linear-gradient(135deg, #EBF4FF 0%, #E6F7F5 100%);
            border-left: 5px solid #1E3A5F;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .summary-box .label {
            color: #666;
            font-size: 12px;
            margin-bottom: 5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .summary-box .value {
            color: #1E3A5F;
            font-size: 28px;
            font-weight: 800;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }
        table th {
            background: #1E3A5F;
            color: white;
            padding: 12px 10px;
            text-align: left;
            font-weight: 700;
            font-size: 12px;
            border: 1px solid #1E3A5F;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        table td {
            padding: 10px;
            border: 1px solid #e0e0e0;
            vertical-align: middle;
            font-size: 11px;
        }
        table tr:nth-child(even) {
            background: #f9fafb;
        }
        table tr:hover {
            background: #f0f4f8;
        }
        .no {
            width: 40px;
            text-align: center;
            font-weight: 600;
        }
        .nama {
            width: 150px;
            font-weight: 600;
            color: #1E3A5F;
        }
        .bidang {
            width: 120px;
        }
        .lokasi {
            width: 130px;
        }
        .jurusan {
            width: 150px;
            font-size: 10px;
        }
        .kuota {
            width: 80px;
            text-align: center;
            font-weight: 600;
            color: #D97706;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 10px;
            color: #999;
        }
        .timestamp {
            text-align: right;
        }

        /* PRINT STYLES */
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .container {
                max-width: 100%;
                box-shadow: none;
                padding: 0;
            }
            .print-button {
                display: none;
            }
            .summary-box {
                page-break-inside: avoid;
                box-shadow: none;
            }
            table {
                page-break-inside: avoid;
            }
            tr {
                page-break-inside: avoid;
            }
        }

        @page {
            margin: 1cm;
            size: A4 landscape;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- PRINT BUTTON -->
        <button class="print-button" onclick="window.print()">
            🖨️ Print / Simpan sebagai PDF
        </button>

        <!-- HEADER -->
        <div class="header">
            <h1>📊 Data Perusahaan Mitra PKL</h1>
            <p>Laporan Lengkap - {{ date('d F Y H:i:s') }}</p>
        </div>

        <!-- SUMMARY -->
        <div class="summary">
            <div class="summary-box">
                <div class="label">📦 Total Perusahaan</div>
                <div class="value">{{ $totalPerusahaan }}</div>
            </div>
            <div class="summary-box">
                <div class="label">👥 Total Kuota</div>
                <div class="value">{{ number_format($totalKuota, 0, '', '.') }}</div>
            </div>
            <div class="summary-box">
                <div class="label">📈 Rata-rata Kuota</div>
                <div class="value">{{ $totalPerusahaan > 0 ? number_format($totalKuota / $totalPerusahaan, 0, '', '.') : 0 }}</div>
            </div>
        </div>

        <!-- TABLE -->
        <table>
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th class="nama">Nama Perusahaan</th>
                    <th class="bidang">Bidang</th>
                    <th class="lokasi">Lokasi</th>
                    <th class="jurusan">Jurusan Dibutuhkan</th>
                    <th class="kuota">Kuota</th>
                </tr>
            </thead>
            <tbody>
                @forelse($perusahaans as $index => $perusahaan)
                <tr>
                    <td class="no">{{ $index + 1 }}</td>
                    <td class="nama">{{ $perusahaan->nama_perusahaan }}</td>
                    <td class="bidang">{{ $perusahaan->bidang }}</td>
                    <td class="lokasi">
                        {{ $perusahaan->kota ?? '-' }}
                        @if($perusahaan->provinsi)
                            , {{ $perusahaan->provinsi }}
                        @endif
                    </td>
                    <td class="jurusan">
                        @php
                            $jurusan = $perusahaan->jurusan_dibutuhkan;
                            if (is_string($jurusan)) {
                                $jurusan = json_decode($jurusan, true);
                            }
                            if (is_array($jurusan)) {
                                echo implode(', ', $jurusan);
                            } else {
                                echo '-';
                            }
                        @endphp
                    </td>
                    <td class="kuota">{{ $perusahaan->kuota }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px; color: #999;">
                        Tidak ada data perusahaan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- FOOTER -->
        <div class="footer">
            <span>GO-PKL Sistem Manajemen PKL</span>
            <span class="timestamp">Dicetak: {{ date('d/m/Y H:i:s') }}</span>
        </div>
    </div>

    <script>
        // Auto-open print dialog
        window.addEventListener('load', function() {
            // Uncomment berikut jika ingin auto-print
            // window.print();
        });
    </script>
</body>
</html>
