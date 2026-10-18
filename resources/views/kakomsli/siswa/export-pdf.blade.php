<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - Export</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f5f5;
            padding: 20px;
        }

        .print-container {
            background: white;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .header p {
            color: #7f8c8d;
            font-size: 14px;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
            font-size: 13px;
            color: #7f8c8d;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-weight: 600;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 13px;
        }

        thead {
            background-color: #34495e;
            color: white;
        }

        th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            border: 1px solid #bdc3c7;
        }

        td {
            padding: 10px 12px;
            border: 1px solid #ecf0f1;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e8f4f8;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-diterima {
            background-color: #d4edda;
            color: #155724;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-ditolak {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-belum {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .status-apply {
            background-color: #d4edda;
            color: #155724;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
            font-size: 12px;
            color: #7f8c8d;
        }

        .export-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .export-button:hover {
            background-color: #2980b9;
        }

        .back-button {
            display: inline-block;
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #95a5a6;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .back-button:hover {
            background-color: #7f8c8d;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .print-container {
                box-shadow: none;
                padding: 0;
                max-width: 100%;
            }

            .export-button, .back-button, .no-print {
                display: none !important;
            }

            table {
                page-break-inside: avoid;
            }

            tbody tr {
                page-break-inside: avoid;
            }

            .header {
                page-break-after: avoid;
            }
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            font-style: italic;
        }

        .record-count {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 4px;
            color: #2c3e50;
            font-weight: 600;
        }

        .filter-info {
            background-color: #e8f4f8;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #2c3e50;
            font-size: 13px;
        }

        .filter-info span {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="print-container">
        <div class="no-print">
            <button class="export-button" onclick="window.print()">
                <i class="fa-solid fa-print"></i> Print / Simpan sebagai PDF
            </button>
            <a href="{{ route('kakomsli.siswa.index') }}" class="back-button">Kembali</a>
        </div>

        <div class="header">
            <h1>Data Siswa SMKN 6 MALANG</h1>
            <p>Laporan Data Siswa - Kakomsli</p>
        </div>

        <div class="info-section">
            <div class="info-item">
                <span class="info-label">Tanggal Export:</span>
                <span>{{ $exportDate }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Total Siswa:</span>
                <span>{{ $siswas->count() }} siswa</span>
            </div>
            <div class="info-item">
                <span class="info-label">Guru:</span>
                <span>{{ $guru->nama ?? 'N/A' }}</span>
            </div>
        </div>

        @if($selectedKelas || $pklStatus)
            <div class="filter-info">
                <p>Filter aktif:</p>
                @if($selectedKelas)
                    <span>Kelas: {{ $selectedKelas }}</span>
                @endif
                @if($pklStatus)
                    <span>Status PKL: {{ $pklStatus === 'active' ? 'Active' : 'Inactive' }}</span>
                @endif
            </div>
        @endif

        @if($siswas->count() > 0)
            <div class="record-count">
                ✓ Menampilkan {{ $siswas->count() }} data siswa
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 10%">NIS</th>
                        <th style="width: 20%">Nama Siswa</th>
                        <th style="width: 12%">Kelas</th>
                        <th style="width: 15%">Jurusan</th>
                        <th style="width: 15%">Tempat PKL</th>
                        <th style="width: 13%">Status PKL</th>
                        <th style="width: 10%">Tgl Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $index => $siswa)
                        @php
                            $booking = $siswa->bookings()->latest()->first();
                            $statusPkl = $booking ? $booking->status : 'belum apply';
                            $tempatPkl = $booking && $booking->perusahaan ? $booking->perusahaan->nama_perusahaan : '-';
                            $tglMulai = $booking && $booking->tanggal_mulai ? $booking->tanggal_mulai->format('d/m/Y') : '-';
                            $statusClass = 'status-' . strtolower(str_replace(' ', '', $statusPkl));
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $siswa->nis }}</strong></td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->jurusan }}</td>
                            <td>{{ $tempatPkl }}</td>
                            <td>
                                <span class="status-badge {{ $statusClass }}">
                                    {{ ucfirst($statusPkl) }}
                                </span>
                            </td>
                            <td>{{ $tglMulai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">
                <p><i class="fa-solid fa-inbox"></i></p>
                <p>Tidak ada data siswa untuk ditampilkan</p>
            </div>
        @endif

        <div class="footer">
            <p>Document generated on {{ now()->format('d F Y H:i:s') }}</p>
            <p>© 2026 SMKN 6 MALANG - Sistem Informasi PKL</p>
        </div>
    </div>
</body>
</html>
